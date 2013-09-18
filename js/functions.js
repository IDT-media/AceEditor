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

/**
 * @namespace Namespace for ACEEDIT app
 */
var ACEEDIT = ACEEDIT || {};

ACEEDIT.INIT = {

    load : ( function() {
        'use strict';

        ACEEDIT.GLOBALS.common();
        ACEEDIT.EDITOR.editorInit();

    } )
};

/** =============================
 *  ACEEDIT global functions
 *  ============================== */

ACEEDIT.GLOBALS = {

    common : function() {
        'use strict';

        if (!window.ace) {
            console.log('Ace Library not loaded');
            return;
        }
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

    editorInit : function() {
        'use strict';

        var editors = $('.ace_editor_textarea');

        editors.each(function() {

            var $el = $(this), 
                $textareaid = $el.attr('id'), // get textarea id
                $textarea = '#' + $textareaid,
                $data = $el.data(), // get html data
                $editorid = '#' + $data.aceEditorId, // get editor id
                $editor = null,
                $tabs = $('#navt_tabs');

            // create editor
            $('<div />').attr('id', $data.aceEditorId).addClass('ace_editor_content')
                .width($data.aceWidth + 'em')
                .height($data.aceHeight + 'em')
                .insertBefore($textarea);
            $($textarea).hide(); // hide textarea
            $editor = ace.edit($data.aceEditorId); // start ace
            
            // make editor working within tabs
            if($tabs.length === 0) {
                $tabs = $('#page_tabs');
            }
            
            $tabs.find('div').on('click', function () {
                editor.resize();
                editor.focus();
            });
            
            // Load Editor Settings
            ACEEDIT.EDITOR.editorSettings($editorid, $editor, $data);
            ACEEDIT.EDITOR.editorUI($textareaid, $editorid, $editor);
            ACEEDIT.EDITOR.editorFullScreen($editor, $editorid);
            ACEEDIT.EDITOR.editorSaveContent($textarea, $editor);

        });
    },

    editorSettings : function(id, editor, data) {
        'use strict';
        
        $(id).css('font-size', data.aceFontSize); // set fontsize
        editor.setTheme('ace/theme/' + data.aceSelectedTheme); // set theme
        if (data.aceSelectedMode !== 'plain') {
            editor.getSession().setMode('ace/mode/' + data.aceSelectedMode); //
        }
        if (data.aceSoftWrap !== 'off') {
            editor.getSession().setUseWrapMode(true); // soft wrap
            editor.getSession().setWrapLimitRange(data.aceSoftWrap);
        }

        editor.setSelectionStyle(data.aceSelectionStyle); // full line selection
        editor.setHighlightActiveLine(data.aceHighlightLine); // highlight active line
        editor.setHighlightSelectedWord(data.aceHighlightWord); // highlight selected word
        editor.setShowInvisibles(data.aceShowInvisibles); // show invisibles
        editor.renderer.setHScrollBarAlwaysVisible(data.aceHscrollBar); // persistent hscroll
        editor.renderer.setShowGutter(data.aceShowGutter); // show gutter
        editor.getSession().setUseSoftTabs(data.aceSoftTab); // set soft tab
        editor.setBehavioursEnabled(data.aceBehavioursEnabled); //set behaviours
        editor.setShowPrintMargin(data.acePrintMargin); // set print margin
        editor.commands.removeCommand('fold'); // allows @ symbol on mac
    },
    
    editorUI : function(el, id, editor) {
        'use strict';
        
        var $id = '#' + el,
            $class = '.' + el,
            $editorid = id,
            vim = require('ace/keyboard/vim').handler, 
            emacs = require('ace/keyboard/emacs').handler;
        
        $($class + '_toolbar .ace_toolbar').buttonset(); // create jQueryUI Buttonset
        
        // set keybindings
        $($class + '_toolbar input[type="radio"]').click(function () {
            var keybindings = null;
            
            if($($id + '_ace').is(':checked')) {
                var keybindings = null;
            } else if ($($id + '_vim').is(':checked')) {
                var keybindings = vim;
            } else if ($($id + '_emacs').is(':checked')) {
                var keybindings = emacs;
            }

            editor.setKeyboardHandler(keybindings);
        });

        // toggle editor
        $($class + '_toolbar input[type="radio"]').click(function () {
            if($($id + '_off').is(':checked')) {
                $($id).show();
                $($editorid).hide();
            } else {
                $($editorid).show();
                $($id).hide();
            }
        });

        editor.getSession().selection.on('changeCursor', function() {
            var position = editor.selection.getCursor(); // Show current line and column
            $($id + '_linenum').val((position.row+1) + ' : ' + (position.column+1));
        });
        // total count of lines
        editor.getSession().on('change', function() {
            var total = editor.session.getLength();
            $($id + '_totallines').val(total);
        });
        // go to line
        $('form').find('.input').keypress(function(e){
            if ( e.which === 13 ) {
                editor.gotoLine($($id + '_goline').val());
                return false; // prevent submitting
            }
        });
        
        // resize ace with jui
        $($editorid).resizable({
            stop: function (event, ui) {
                editor.renderer.onResize(true);
                editor.renderer.updateFull();
                editor.focus();
            },
            ghost: true
        });
    },
    
    editorFullScreen : function(editor, id) {
        'use strict';
        
        var $id = $(id);
        
        // bind ctrl+enter to full screen mode.
        editor.commands.addCommand({
            name: 'fullScreenEditing',
            bindKey: {
                win: 'Ctrl-Return',
                mac: 'Command-Return'
            },
            exec: function (env, args, request) {
                if($id.hasClass('fullscreen')) {
                    // shut down full screen
                    $id.removeClass('fullscreen');
                    var tmp = $id.data();
                    $id.width(tmp.origWidth);
                    $id.height(tmp.origHeight);
                } else {
                    // turn on full screen
                    $id.addClass('fullscreen');
                    $id.data('origWidth', $id.width());
                    $id.data('origHeight', $id.height());
                    $id.width($(window).width() * 0.9999);
                    $id.height($(window).height() * 0.999);
                }
                
                editor.renderer.onResize(true);
                editor.renderer.updateFull();
                editor.focus();
            }
        });
    },
    
    editorSaveContent : function(id, editor) {
        'use strict';
        
        var textarea = $(id),
            content = $(textarea).val(); // get the value from textarea
        
        // SAVE VALUES
        editor.getSession().setValue(content);
        //everytime it changes
        $(textarea).on('change' , function () {
            editor.getSession().setValue(textarea.val());
        });
        // Update the textarea on change
        editor.getSession().on('change', function () {
            // Get the value from the editor and place it into the textarea.
            var text = editor.getSession().getValue();
            textarea.val(text);
        });
        
        // Save shortcut
        editor.commands.addCommand({
            name: 'acesave',
            bindKey: {
                win: 'Ctrl-S',
                mac: 'Command-S'
            },
            exec: function (env, args, request) {
                var text = editor.getSession().getValue();
                textarea.val(text);
                // find the parent form. and a child button named 'apply', and click it.
                textarea.closest('form').find('[name*="apply"]').first().click();
            }
        });
    }
};

// Run the app

$(function() {
    ACEEDIT.INIT.load();
});