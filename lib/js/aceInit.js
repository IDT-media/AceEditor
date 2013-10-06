/** ==========================================================
 * CMSMS AceEditor AceInit Plugin
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
;( function($, window, document, ace, undefined) {'use strict';

    var pluginName = 'aceInit', 
        defaults = {
            mode : 'html',
            theme : 'github',
            autoHeight: 0
    };

    // plugin constructor
    function Plugin(element, options) {
        this.element = element;
        this.settings = $.extend({}, defaults, options);
        this.defaults = defaults;
        this.name = pluginName;
        this.init();
    }


    Plugin.prototype = {
        init : function() {
            
            this.editorBuild();
            
            if (this.settings.autoHeight === 1) {
                
                var container = $(this.element).parent();
                
                $(window).on('resize', this.editorHeight(container));
                this.editorHeight(container);
            }
        },
        
        editorBuild : function() {

            var el = this.element, 
                editor = ace.edit(el), 
                session = editor.getSession(), 
                config = require('ace/config');
                
            // Setup editor paths
            config.set('themePath', config.get('basePath') + '/themes');
            config.set('modePath', config.get('basePath') + '/modes');
            config.set('workerPath', config.get('basePath') + '/workers');
            
            // initialize editor settings
            this.editorSettings(editor, session);
            
        },

        editorSettings : function(editor, session) {

            // set up editor options
            editor.setTheme('ace/theme/' + this.settings.theme);
            editor.setReadOnly(true);
            editor.setShowFoldWidgets(false);
            editor.setShowPrintMargin(false);
            editor.setHighlightActiveLine(false);
            
            session.setMode('ace/mode/' + this.settings.mode);
            session.setUseWrapMode(true);

        },
        
        editorHeight: function(container) {
            
            var editor = ace.edit(this.element),
                newHeight = editor.getSession().getLength() * editor.renderer.lineHeight * 1.08;
                
                $(container).height(newHeight);
                editor.resize();
                
        }
    };

    $.fn[pluginName] = function(options) {
        return this.each(function() {
            if (!$.data(this, "plugin_" + pluginName)) {
                $.data(this, "plugin_" + pluginName, new Plugin(this, options));
            }
        });
    };

} )(jQuery, window, document, ace); 