<div class="ace_wrapper">
<div class="{$textareaid}_toolbar">
	<div class="ace_toolbar">
		<input type="radio" id="{$textareaid}_on" name="radio_{$ace_id}" checked="checked" /><label for="{$textareaid}_on">{$ace_mod->Lang('on')}</label>
		<input type="radio" id="{$textareaid}_off" name="radio_{$ace_id}" /><label for="{$textareaid}_off">{$ace_mod->Lang('off')}</label>
		<label>{$ace_mod->Lang('current_line')}:</label><input type="text" id="{$textareaid}_linenum" class="input wide" name="ace_linenum" value="" readonly="readonly" />
		<label>{$ace_mod->Lang('total_lines')}:</label><input type="text" id="{$textareaid}_totallines" class="input" name="ace_goline" value="" readonly="readonly" />
		<label>{$ace_mod->Lang('go_line')}:</label><input type="text" id="{$textareaid}_goline" class="input" name="ace_goline" value="" />
		<label>{$ace_mod->Lang('keybindings')}:</label>
		<input type="radio" id="{$textareaid}_ace" name="radio2_{$ace_id}" checked="checked" value="null" /><label for="{$textareaid}_ace">{$ace_mod->Lang('ace')}</label>
		<input type="radio" id="{$textareaid}_vim" name="radio2_{$ace_id}" value="vim" /><label for="{$textareaid}_vim">{$ace_mod->Lang('vim')}</label>
		<input type="radio" id="{$textareaid}_emacs" name="radio2_{$ace_id}" value="emacs" /><label for="{$textareaid}_emacs">{$ace_mod->Lang('emacs')}</label>
	</div>
</div>
<textarea id="{$textareaid}" name="{$textareaname}">{$syntax_content}</textarea>
</div>
<style type="text/css">{strip}
.ace_wrapper textarea {ldelim}
	min-width: {$width}em;
	width: 100%;
{rdelim}
#{$editorid} {ldelim}
	position: relative;
    width: {$width}em;
    height: {$height}em;
    background: #fefefe;
{rdelim}
#{$editorid}.fullscreen {ldelim}
	position: fixed;
	z-index: 9999;
	margin:0;
	left:0;
	top:0;
{rdelim}
{/strip}</style>

<script type="text/javascript">{literal}
jQuery(function($) {
	if(!window.ace) return;
	if(navigator.userAgent.match(/(iPod|iPhone|iPad)/)) return; {/literal}{if $enable_ie == 'false'}
	
	if($.browser.msie) return; {/if}{literal}
	
	// SETTINGS 
	// create editor
	$('#{/literal}{$textareaid}{literal}').before('<div id="{/literal}{$editorid}{literal}" />');
	// init editor
	var editor   = ace.edit('{/literal}{$editorid}{literal}');
	var textarea = $('#{/literal}{$textareaid}{literal}').hide();
	var vim 	 = require('ace/keyboard/vim').handler;
	var emacs 	 = require('ace/keyboard/emacs').handler;
	
	// set theme
	editor.setTheme('ace/theme/{/literal}{$theme}{literal}');
	// set highlighter mode 
	{/literal}{if $mode != 'plain'}	
	editor.getSession().setMode('ace/mode/{$mode}'); {/if}{literal}
	// set fontsize
	$('#{/literal}{$editorid}').css('font-size', '{$fontsize}{literal}');
	// full line selection
	editor.setSelectionStyle('{/literal}{$full_line}{literal}');
	// highlight active line
	editor.setHighlightActiveLine({/literal}{$highlight_active}{literal});
	// highlight selected word
	editor.setHighlightSelectedWord({/literal}{$highlight_selected}{literal});
	// show invisibles
	editor.setShowInvisibles({/literal}{$show_invisibles}{literal});
	// persistent hscroll
	editor.renderer.setHScrollBarAlwaysVisible({/literal}{$persistent_hscroll}{literal});
	// show gutter
	editor.renderer.setShowGutter({/literal}{$show_gutter}{literal});
	{/literal}{if $soft_wrap != 'off'}
	//  soft wrap
	editor.getSession().setUseWrapMode(true);
	editor.getSession().setWrapLimitRange({$soft_wrap}); {/if}{literal}
	// set soft tab
	editor.getSession().setUseSoftTabs({/literal}{$soft_tab}{literal});
	//set behviours
	editor.setBehavioursEnabled({/literal}{$enable_behaviors}{literal});
	// set print margin
	editor.setShowPrintMargin({/literal}{$print_margin}{literal});
	// allows @ symbol on mac
	editor.commands.removeCommand('fold');
	
	// FUNCTIONS
	// toggle highlighter on/off
	$('.ace_toolbar').buttonset();
	// resize ace with jui
	$('#{/literal}{$editorid}{literal}').resizable({
		stop: function (event, ui) {
			editor.renderer.onResize(true);
			editor.renderer.updateFull();
			editor.focus();
		},
		ghost: true
	});	
	// bind ctrl+enter to full screen mode.
	editor.commands.addCommand({
		name: 'fullScreenEditing',
		bindKey: {
			win: 'Ctrl-Return',
			mac: 'Command-Return'
		},
		exec: function (env, args, request) {
			var editorDiv = $('#{/literal}{$editorid}{literal}');
			if(editorDiv.hasClass('fullscreen')) {
				// shut down full screen
				editorDiv.removeClass('fullscreen');
				var tmp = editorDiv.data();
				editorDiv.width(tmp.origWidth);
				editorDiv.height(tmp.origHeight);
			} else {
				// turn on full screen
				editorDiv.addClass('fullscreen');
				editorDiv.data('origWidth', editorDiv.width());
				editorDiv.data('origHeight', editorDiv.height());
				editorDiv.width($(window).width() * 0.999);
				editorDiv.height($(window).height() * 0.99);
			}
			editor.renderer.onResize(true);
			editor.renderer.updateFull();
			editor.focus();
			//editor.refresh();
		}
	});
	// Save shortcut
	editor.commands.addCommand({
		name: 'mysave',
		bindKey: {
			win: 'Ctrl-S',
			mac: 'Command-S'
		},
		exec: function (env, args, request) {
			// update the text area field.
			var text = editor.getSession().getValue();
			textarea.val(text);
			// find the parent form. and a child button named 'apply', and click it.
			$('#{/literal}{$editorid}{literal}').closest('form').find('[name$="apply"]').first().click();
		}
	});
	// set keybindings
	var keybindings = null;
	$('.{/literal}{$textareaid}{literal}_toolbar input[type="radio"]').click(function () {
		if($('#{/literal}{$textareaid}{literal}_ace').is(':checked')) {
			var keybindings = null;
		} else if ($('#{/literal}{$textareaid}{literal}_vim').is(':checked')) {
			var keybindings = vim;
		} else if ($('#{/literal}{$textareaid}{literal}_emacs').is(':checked')) {
			var keybindings = emacs;
		}
		editor.setKeyboardHandler(keybindings);
	});
	// toggle editor
	$('.{/literal}{$textareaid}{literal}_toolbar input[type="radio"]').click(function () {
		if($('#{/literal}{$textareaid}{literal}_off').is(':checked')) {
			$('#{/literal}{$textareaid}{literal}').show();
			$('#{/literal}{$editorid}{literal}').hide();
		} else {
			$('#{/literal}{$editorid}{literal}').show();
			$('#{/literal}{$textareaid}{literal}').hide();
		}
	});
	// current line
	editor.getSession().selection.on('changeCursor', function() {
		// Show current line and column
		position = editor.selection.getCursor();
		$('#{/literal}{$textareaid}_linenum{literal}').val('{/literal}{$ace_mod->Lang('line')}:' + (position.row+1) + ' {$ace_mod->Lang('column')}{literal}: ' + (position.column+1));
	});
	// total count of lines
	editor.getSession().on('change', function() { 
		total = editor.session.getLength();
		$('#{/literal}{$textareaid}_totallines{literal}').val(total);
	});	
	// go to line
	$('form').find('.input').keypress(function(e){
		if ( e.which == 13 ) {
			editor.gotoLine($('#{/literal}{$textareaid}_goline{literal}').val());
			return false; // prevent submitting
		}
	}); 
	// make it working within tabs
	var tabs = jQuery('#navt_tabs');
	if(tabs.length === 0) {
		tabs = jQuery('#page_tabs');
	}
	tabs.find('div').bind('click', function () {
		editor.resize();
		editor.focus();
	});	
	
	// SAVE VALUES 
	// get the value from textarea
	var intialData = $('#{/literal}{$textareaid}{literal}').val();
	editor.getSession().setValue(intialData);
	// ... everytime it changes
	$('#{/literal}{$textareaid}{literal}').change(function () {
		editor.getSession().setValue(textarea.val());
	});
	// Update the textarea on change
	editor.getSession().on('change', function () {
		// Get the value from the editor and place it into the textarea.
		var text = editor.getSession().getValue();
		textarea.val(text);
	});
});{/literal}
</script>