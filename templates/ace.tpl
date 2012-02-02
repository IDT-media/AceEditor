<textarea id="{$textareaid}" name="{$textareaname}">{$syntax_content}</textarea>
	<style>
	#{$editorid} {ldelim}
		position: relative;
	    width: {$width}em;
	    height: {$height}em;
	    border: 5px solid #ddd;
	    background: #fefefe; 
	{rdelim}
	#{$editorid}.fullscreen {ldelim}
		position: absolute;
		z-index: 9999;
		margin:0;
		left:0;
		top:0;
		{rdelim}
	</style>	
<script type="text/javascript">
	$(document).ready(function(){ldelim}
	if (!window.ace)return;
	if (navigator.userAgent.match(/(iPod|iPhone|iPad)/)) return;
	{if $enable_ie == 'false'}
	if ($.browser.msie) return;	
	{/if}
		
		$('#{$textareaid}').before('<div id="{$editorid}"></div>');
		// init editor
		var editor = ace.edit("{$editorid}");
		var textarea = $('#{$textareaid}').hide();

		// resize ace with jui
		$('#{$editorid}').resizable({ldelim}
			stop: function(event, ui){ldelim}
				editor.renderer.onResize(true);
				editor.renderer.updateFull();
				editor.focus();
			{rdelim},			
			ghost: true
		{rdelim});

		// set theme
		editor.setTheme("ace/theme/{$theme}");
		// set highlighter mode
		{if $mode != 'plain'}
		
		var setMode = require("ace/mode/{$mode}").Mode;
		editor.getSession().setMode(new setMode());
		{/if}
		// set fontsize
		document.getElementById('{$editorid}').style.fontSize='{$fontsize}';
		// full line selection
		editor.setSelectionStyle('{$full_line}');
		// highlight active line
		editor.setHighlightActiveLine({$highlight_active});
		// highlight selected word
		editor.setHighlightSelectedWord({$highlight_selected});
		// show invisibles
		editor.setShowInvisibles({$show_invisibles});
		// persistent hscroll
		editor.renderer.setHScrollBarAlwaysVisible({$persistent_hscroll});
		// show gutter
		editor.renderer.setShowGutter({$show_gutter});
		{if $soft_wrap != 'off'}
		//  soft wrap
		editor.getSession().setUseWrapMode(true);
		editor.getSession().setWrapLimitRange({$soft_wrap});
		{/if}
		// set soft tab
		editor.getSession().setUseSoftTabs({$soft_tab});
		// set print margin
		editor.setShowPrintMargin({$print_margin});
		
	        // bind ctrl+enter to full screen mode.
                {literal}
		editor.commands.addCommand({
                  name: 'fullScreenEditing',
                  bindKey: {
                    win: 'Ctrl-Return',
                    mac: 'Command-Return',
                    sender: 'editor'
                  },
                  exec: function(env,args,request) {
	            var editorDiv = $('#{/literal}{$editorid}{literal}');
                    if( editorDiv.hasClass('fullscreen') )
                    {
                       // shut down full screen
	               editorDiv.removeClass('fullscreen');
                       var tmp = editorDiv.data();
                       editorDiv.width(tmp.origWidth);
		       editorDiv.height(tmp.origHeight);
                    }
                    else
                    {
                       // turn on full screen
		       editorDiv.addClass('fullscreen');
                       editorDiv.data('origWidth',editorDiv.width());
                       editorDiv.data('origHeight',editorDiv.height());
		       		   editorDiv.width($(window).width()*0.995);
                       editorDiv.height($(window).height()*0.98);
                    }
		    editor.renderer.onResize(true);
	            editor.renderer.updateFull();
	            editor.focus();
                    //editor.refresh();
                  }
                });
		editor.commands.addCommand({
                  name: 'mysave',
                  bindKey: {
                    win: 'Ctrl-S',
                    mac: 'Command-S',
                    sender: 'editor'
                  },
                  exec: function(env,args,request) {
		    // update the text area field.
         	    var text = editor.getSession().getValue();
		    textarea.val(text);
                    // find the parent form. and a child button named 'apply', and click it.
                    $('{/literal}#{$editorid}{literal}').closest('form').find('[name$="apply"]').first().click();
                  }
                });

                {/literal}

		// get the value from textarea
		var intialData = $('#{$textareaid}').val();
		editor.getSession().setValue(intialData);
		// Update the textarea on change.
		editor.getSession().on('change', function(){ldelim}
			// Get the value from the editor and place it into the textarea.
			var text = editor.getSession().getValue();
			textarea.val(text);
			//alert(text);
		{rdelim});
	{rdelim});
</script>
