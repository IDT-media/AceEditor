<script type="text/javascript">
jQuery(document).ready(function(){ldelim}
	var txt = $('#{$divid}').text();
  	var editor = ace.edit('{$divid}');
  		editor.setReadOnly(true);
  		document.getElementById('{$divid}').style.fontSize='{$fontsize}';
{if isset($theme)}
		editor.setTheme('ace/theme/{$theme}');
{/if}
{if isset($mode)}
		var theMode = require('ace/mode/{$mode}').Mode;
  		editor.getSession().setMode(new theMode);
{/if}
  		editor.renderer.setShowPrintMargin(false);
  		editor.getSession().setValue(txt);
{rdelim});
</script>
<style type="text/css">
	#{$divid} {ldelim}
		position: relative;
		height: {$height}px;
		width: {$width}px;
		background: #fff;
		display: block;
	{rdelim}
</style>
