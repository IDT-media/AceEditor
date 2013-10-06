/** ==========================================================
 * CMSMS AceEditor Module Functions
 * @module ACEEDIT
 * @author (c) Goran Ilic - uniqu3 <ja@ich-mach-das.at>
 *
 * This project's homepage is: http://www.cmsmadesimple.org
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 * ========================================================== */

( function(global, $) {'use strict';
    /**
     * @namespace Namespace for ACEEDIT app
     * @global
     */
    var ACEEDIT = global.ACEEDIT || {};

    // Run the app
    $(function() {
        ACEEDIT.INIT.load();
    });

    ACEEDIT.INIT = {
        
        /** 
         * @description Starts AceEdit app
         * @function load
         */
        load : function() {

            ACEEDIT.GLOBALS.common();
            ACEEDIT.EDITOR.editorInit();

        }
    };

    /** =============================
     *  ACEEDIT global functions
     *  ============================== */

    ACEEDIT.GLOBALS = {

        /** 
         * @description Loads common functions
         * @function common
         */
        common : function() {

            if (!window.ace) {
                console.log('Ace Library not loaded');
                return;
            }
            // TODO when in native fullscreen mode, message isn't visible :-S
            $('.pagemcontainer,.pageerrorcontainer').each(function() {
                var c = $(this);
                window.setTimeout(function() {
                    c.hide();
                }, 9000);
            });
        }
    };

    /** ===================================
     *  ACEEDIT editor settings & functions
     *  =================================== */
    ACEEDIT.EDITOR = {

        /**
         * @description Initializes all AceEditor settings and functions
         * @function editorInit
         */
        editorInit : function() {

            var editors = $('.ace_editor_textarea'), 
                config = require('ace/config'), 
                $tabs = $('#navt_tabs');
            // Setup paths
            config.set('themePath', config.get('basePath') + '/themes');
            config.set('modePath', config.get('basePath') + '/modes');
            config.set('workerPath', config.get('basePath') + '/workers');

            if (window.ace) {
                editors.each(function() {

                    var $el = $(this), 
                        textareaid = $el.attr('id'), // get textarea id
                        $container = $el.closest('.ace-wrapper'), $data = $el.data(), // get html data
                        textarea = '#' + textareaid, 
                        editorid = '#' + $data.aceEditorId, // get editor id
                        editor = null;

                    // create editor
                    $('<div />').attr('id', $data.aceEditorId).addClass('ace_editor_content').insertBefore(textarea);
                    $(textarea).hide(); // hide textarea
                    editor = ace.edit($data.aceEditorId); // start ace

                    // make editor working within tabs
                    if ($tabs.length === 0) {
                        $tabs = $('#page_tabs');
                    }

                    $tabs.find('div').on('click', function() {
                        editor.resize();
                    });

                    // Load Editor Settings
                    ACEEDIT.EDITOR.editorSettings(editorid, editor, $data);
                    ACEEDIT.EDITOR.editorSaveContent(textarea, editor);
                    ACEEDIT.EDITOR.editorUI(textareaid, $container, editorid, editor);
                    ACEEDIT.EDITOR.editorFullScreen($container, editor, editorid, textarea);
                    ACEEDIT.EDITOR.editorSizeUpdate($container, $data, editor);

                });
            }
        },
        
        /**
         * @description Sets all AceEditor Settings
         * @function editorSettings
         * @param {String} id
         * @param {Object} editor
         * @param {Object} data
         */
        editorSettings : function(id, editor, data) {

            $(id).css('font-size', data.aceFontSize);// set fontsize
            editor.setTheme('ace/theme/' + data.aceSelectedTheme);// set theme
            if (data.aceSelectedMode !== 'plain') {
                editor.getSession().setMode('ace/mode/' + data.aceSelectedMode);
            }
            if (data.aceSoftWrap !== 'off') {
                editor.getSession().setWrapLimitRange(data.aceSoftWrap, data.aceSoftWrap);
                editor.setPrintMarginColumn(data.aceSoftWrap);
            }

            editor.setSelectionStyle(data.aceSelectionStyle); // full line selection
            editor.setHighlightActiveLine(data.aceHighlightLine); // highlight active line
            editor.setHighlightSelectedWord(data.aceHighlightWord); // highlight selected word
            editor.setShowInvisibles(data.aceShowInvisibles); // show invisibles
            editor.renderer.setHScrollBarAlwaysVisible(data.aceHscrollBar); // persistent hscroll
            editor.renderer.setShowGutter(data.aceShowGutter); // show gutter
            editor.getSession().setUseSoftTabs(data.aceSoftTab); // set soft tab
            editor.getSession().setTabSize(data.aceTabSize); // set tab size
            editor.getSession().setUseWrapMode(data.aceWrapLine); // wrap line
            editor.setBehavioursEnabled(data.aceBehavioursEnabled);//set behaviours
            editor.setShowPrintMargin(data.acePrintMargin); // set print margin
            editor.commands.removeCommand('fold'); // allows @ symbol on mac

        },

        /**
         * @description Sets AceEditor UI functions
         * @function editorUI
         * @param {Object} el
         * @param {Object} container
         * @param {String} id
         * @param {Object} editor
         */
        editorUI : function(el, container, id, editor) {

            var tid = '#' + el, 
                tclass = '.' + el, 
                eid = id, 
                vim = require('ace/keyboard/vim').handler, 
                emacs = require('ace/keyboard/emacs').handler;
                
            // search editor content
            ACEEDIT.EDITOR.editorSearch(el, container, editor);
            // editor options menu
            ACEEDIT.EDITOR.editorToggleMenu();

            // set keybindings
            $(tclass + '_toolbar input[type="radio"]').on('click', function() {
                var keybindings = null;

                if ($(tid + '_ace').is(':checked')) {
                    keybindings = null;
                } else if ($(tid + '_vim').is(':checked')) {
                    keybindings = vim;
                } else if ($(tid + '_emacs').is(':checked')) {
                    keybindings = emacs;
                }

                editor.setKeyboardHandler(keybindings);
            });

            // toggle editor
            $(tclass + '_toolbar input[type="radio"]').on('click', function() {
                if ($(tid + '_off').is(':checked')) {
                    $(tid).show();
                    $(eid).hide();
                } else {
                    $(eid).show();
                    $(tid).hide();
                }
            });

            editor.getSession().selection.on('changeCursor', function() {
                var position = editor.selection.getCursor(), // Show current line and column
                    token = editor.session.getTokenAt(position.row, position.column); // get token information on this line
                    
                $(tid + '_ace-editor-cursor').text('Ln:' + ( position.row + 1 ) + ' Col:' + ( position.column + 1 ));
                if (token) {
                    $(tid + '_ace-editor-token').children('span').text(token.type);
                }
            });
            
            // total count of lines
            editor.getSession().on('change', function() {
                var total = editor.session.getLength();
                $(tid + '_ace-editor-linenum').children('span').text(total);
            });
            
            // go to line
            $(tid + '_goline').keypress(function(e) {
                if (e.which === 13) {
                    editor.gotoLine($(tid + '_goline').val());
                    editor.focus();
                    return false; // prevent submitting
                }
            });
            
            // get the token info
            editor.on('mousemove', function(e) {
                var position = e.getDocumentPosition(), 
                    token = editor.session.getTokenAt(position.row, position.column);

                if (token) {
                    $(tid + '_ace-editor-token').children('span').text(token.type);
                }
            });

            // resize ace with jui
            $(container).resizable({
                stop : function(event, ui) {
                    editor.renderer.onResize(true);
                    editor.renderer.updateFull();
                    editor.focus();
                },
                ghost : true
            });
            
            $('.ui-resizable-handle').css({zIndex: '10'});
            
            // detect theme color scheme
            editor.renderer.addEventListener('themeLoaded', function(e) {
                if (!$(eid).hasClass('ace_dark')) {
                    $('.ace-ui-container').addClass('ace-bright');
                }
            });
            
            // change editor syntax mode
            $(tid + '_modes li').on('click', function() {
                
                var $opt = $(tid + '_modes li.ace-selected'),
                    $data = $(this).data(),
                    mode = $data.aceMode;
                    
                $opt.removeClass('ace-selected');
                $(this).addClass('ace-selected');
                
                editor.getSession().setMode('ace/mode/' + mode);
                editor.renderer.updateFull();
    
            });

        },
        
        /**
         * @description Initializes AcEEditor fullscreen mode
         * @function editorFullScreen
         * @param {Object} container
         * @param {Object} editor
         * @param {String} id
         */
        editorFullScreen : function(container, editor, id, textarea) {

            var el = document.getElementById(container.attr('id')), 
            nativeFullScreen = false, 
            
            /**
             * @description Updates container wrapper layout 
             * @function layoutUpdate
             */
            layoutUpdate = function() {

                if (container.hasClass('fullscreen')) {
                    $(container).css({
                        position : 'static'
                    });
                } else {
                    $(container).css({
                        position : 'relative'
                    });
                }
            }, 
            
            /**
             * @description Detects native support for FullScreen API
             * @function detectFullScreen
             * @returns boolean 
             */
            detectFullScreen = function() {

                if ( typeof document.cancelFullScreen !== 'undefined' 
                  || typeof document.webkitCancelFullScreen !== 'undefined' 
                  || typeof document.mozCancelFullScreen !== 'undefined' 
                  || typeof document.oCancelFullScreen !== 'undefined' 
                  || typeof document.msCancelFullScreen !== 'undefined' 
                  || typeof document.khtmlCancelFullScreen !== 'undefined') {
                      
                      var ua = navigator.userAgent.toLowerCase();
                      
                      // sniff stupid safari on windows, native fullscreen api seems to have a bug
                      if (ua.indexOf('safari/') !== -1 && ua.indexOf('windows') !== -1 && ua.indexOf('chrome/') === -1) {
                          nativeFullScreen = false;
                      } else {
                          nativeFullScreen = true;
                      }
                }
            }, 
            
            /*
             * @description Starts FullScreen mode, if native FullScreen API is detected else it falls back to jQuery method
             * @function startFullScreen
             */
            startFullScreen = function() {

                container.addClass('fullscreen'); // add class to container
                $(id + '_ace-fullscreen').addClass('ace-icon-contract'); // change button icon
                detectFullScreen();

                // if native HTML5 FullScreen API is supported
                if (nativeFullScreen === true) {

                    layoutUpdate();

                    if (el.requestFullscreen) {
                        el.requestFullscreen();
                    } else if (el.mozRequestFullScreen) {
                        el.mozRequestFullScreen();
                    } else if (el.webkitRequestFullscreen) {
                        el.webkitRequestFullScreen(el.ALLOW_KEYBOARD_INPUT);
                    } else if (el.msRequestFullscreen) {
                        el.msRequestFullscreen();
                    } else if (el.oRequestFullscreen) {
                        el.oRequestFullscreen();
                    } else if (el.khtmlRequestFullscreen) {
                        el.khtmlRequestFullscreen();
                    }

                // else resize Editor with jQuery
                } else {
                    container.data('origWidth', container.width())
                        .data('origHeight', container.height())
                        .width($(window).width() * 0.9999)
                        .height($(window).height() * 0.999)
                        .css({
                            position : 'fixed'
                        });
                }

                editor.renderer.onResize(true);
                editor.renderer.updateFull();
                editor.focus();
            }, 
            
            /*
             * @description Ends FullScreen mode, if native FullScreen API is detected else it falls back to jQuery method
             * @function endFullScreen
             */
            endFullScreen = function() {

                container.removeClass('fullscreen');

                if (nativeFullScreen) {

                    layoutUpdate();
                    if (document.cancelFullScreen) {
                        document.cancelFullScreen();
                    } else if (document.mozCancelFullScreen) {
                        document.mozCancelFullScreen();
                    } else if (document.webkitCancelFullScreen) {
                        document.webkitCancelFullScreen();
                    } else if (document.msCancelFullScreen) {
                        document.msCancelFullScreen();
                    } else if (document.oCancelFullScreen) {
                        document.oCancelFullScreen();
                    } else if (document.khtmlCancelFullScreen) {
                        document.khtmlCancelFullScreen();
                    }

                } else {

                    var tmp = container.data();

                    $(id + '_ace-fullscreen').removeClass('ace-icon-contract');
                    // put original icon back
                    container.width(tmp.origWidth).height(tmp.origHeight).css({
                        position : 'relative'
                    });
                }

                editor.renderer.onResize(true);
                editor.renderer.updateFull();
                editor.focus();
            };

            // trigger fullscreen on button click or CTRL + enter
            $(id + '_ace-fullscreen').on('click', function(e) {
                if (container.hasClass('fullscreen')) {
                    endFullScreen();
                } else {
                    startFullScreen();
                }
                e.preventDefault();
            });

            editor.commands.addCommand({
                name : 'fullScreenEditing',
                bindKey : {
                    win : 'Ctrl-Return',
                    mac : 'Command-Return'
                },
                exec : function(env, args, request) {
                    if (container.hasClass('fullscreen')) {
                        endFullScreen();
                    } else {
                        startFullScreen();
                    }
                }
            });
            
            $(document).keyup(function(e) {
                if (container.hasClass('fullscreen') && e.keyCode === 27) {
                    endFullScreen();
                }
            });
        },

        /**
         * @description Handles loading and saving of content in Ace and Textarea, detects changes of content and saves to session
         * @function editorSaveCotnent
         * @param {String} id
         * @param {Object} editor
         */
        editorSaveContent : function(id, editor) {

            var textarea = $(id), 
                content = $(textarea).val(); // get the value from textarea

            // SAVE VALUES
            editor.getSession().setValue(content);
            //everytime it changes
            $(textarea).on('change', function() {
                editor.getSession().setValue(textarea.val());
            });
            // Update the textarea on change
            editor.getSession().on('change', function() {
                // Get the value from the editor and place it into the textarea.
                var text = editor.getSession().getValue();
                textarea.val(text);
            });

            // Save shortcut
            editor.commands.addCommand({
                name : 'acesave',
                bindKey : {
                    win : 'Ctrl-S',
                    mac : 'Command-S'
                },
                exec : function(env, args, request) {
                    var text = editor.getSession().getValue();
                    textarea.val(text);
                    // find the parent form. and a child button named 'apply', and click it.
                    textarea.closest('form').find('[name*="apply"]').first().click();
                }
            });
        },

        /**
         * @description Handles resizing of Editor area
         * @function editorSizeUpdate
         * @param {Object} container
         * @param {Object} data
         * @param {Object} editor
         */
        editorSizeUpdate : function(container, data, editor) {

            $(container).css({
                width : data.aceWidth + data.aceWidthUnits,
                height : data.aceHeight + data.aceHeightUnits
            });

            /**
             * @description Sets the size of Editor container
             * @function resizeEditorContainer 
             */
            var resizeEditorContainer = function() {

                var getHeight = data.aceHeight, 
                    newHeight = editor.getSession().getLength() * editor.renderer.lineHeight + editor.renderer.scrollBar.getWidth() + 110;

                if (newHeight > getHeight) {
                    $(container).height(newHeight);
                    editor.resize();
                }
            };

            if (data.aceAutoHeight === 1) {

                editor.getSession().on('change', function() {
                    resizeEditorContainer();
                });
                editor.addEventListener('focus', function() {
                    resizeEditorContainer();
                });
            }
        },

        /**
         * @description Handles search functions
         * @function editorSearch
         * @param {Object} el
         * @param {Object} container
         * @param {Object} editor
         */
        editorSearch : function(el, container, editor) {

            var tid = '#' + el, 
                tclass = '.' + el, 
                action = 'find',
                replace = null,
                settings = {
                    backwards : false,
                    wrap : true,
                    caseSensitive : false,
                    wholeWord : false,
                    regExp : false
                },
                
                /**
                 * @description Initializes search action type and sets search settings
                 * TODO Needs work, not fully functional yet
                 * @function searchAction
                 * @param {String} action
                 * @param {String} find
                 * @param {Object} editor
                 */
                searchAction = function(action, find, replace, settings, editor) {

                    switch (action) {
                        case 'find':
                            editor.find(find,settings);
                            break;
                        case 'replace':
                            editor.find(find,settings);
                            editor.replace(replace);
                            break;
                        case 'replaceAll':
                            editor.find(find,settings);
                            editor.replaceAll(replace);
                            break;
                    }
            };

            // change action value based on search option menu selection
            $(tid + '_options li').on('click', function() {
                
                var $opt = $(tid + '_options li.ace-selected'),
                    $data = $(this).data(),
                    val = $data.aceSearchOption,
                    $replaceinput = $(tid + '_replace');
                    
                $opt.removeClass('ace-selected');
                $(this).addClass('ace-selected');
                
                action = val;
                
                if (action === 'replace' || action === 'replaceAll') {
                    $replaceinput.show();
                } else {
                    $replaceinput.hide().val('');
                }
    
            });
            
            // change search settings based on search settings menu
            $(tid + '_search_settings li').on('click', function() {
                
                var $opt = $(tid + '_search_settings li.ace-selected'),
                    $data = $(this).data(),
                    val = $data.aceSearchOption;

                $opt.removeClass('ace-selected');
                $(this).addClass('ace-selected');
                
                switch (val) {
                    case 'reset':
                        settings = {
                            backwards : false,
                            wrap : true,
                            caseSensitive : false,
                            wholeWord : false,
                            regExp : false
                        };
                        break;
                    case 'caseSensitive':
                        settings = {
                            backwards : false,
                            wrap : true,
                            caseSensitive : true,
                            wholeWord : false,
                            regExp : false
                        };
                        break;
                    case 'wholeWord':
                        settings = {
                            backwards : false,
                            wrap : true,
                            caseSensitive : false,
                            wholeWord : true,
                            regExp : false
                        };
                        break;
                    case 'regExp': 
                        settings = {
                            backwards : false,
                            wrap : true,
                            caseSensitive : false,
                            wholeWord : false,
                            regExp : true
                        };
                        break;
                }

            });

            $(tid + '_search').keypress(function(e) {

                var find = $(tid + '_search').val(),
                    replace = $(tid + '_replace').val();

                if (e.which === 13) {
                    searchAction(action, find, replace, settings, editor);
                    return false; // prevent submitting
                }
            });
            
            $(tid + '_replace').keypress(function(e) {

                var find = $(tid + '_search').val(),
                    replace = $(tid + '_replace').val();

                if (e.which === 13) {
                    searchAction(action, find, replace, settings, editor);
                    return false; // prevent submitting
                }
            });

        },
    
        editorToggleMenu : function() {
            
              var $dropdown = $('.ace-list');
              
              $('.ace-toggle-menu').on('click', function(e) {
                  e.stopPropagation();
                  e.preventDefault();
                  
                  $dropdown.hide();
                  $('.ace-toggle-menu').removeClass('ace-menu-active');
                  
                  $(this).siblings('ul.ace-list').show();
                  $(this).addClass('ace-menu-active');
              });
              
              $(document).on('click', function() {
                  
                  $dropdown.hide();
                  $('.ace-toggle-menu').removeClass('ace-menu-active');
              });
              
              $dropdown.on('click', function(e) {
                  e.stopPropagation();
              });
        }
    };

} )(this, jQuery); 