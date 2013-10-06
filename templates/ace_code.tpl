{strip}
<div class="ace-container" style="width: {$ace_block.width}{$ace_block.width_units}; height: {$ace_block.height}{$ace_block.height_units};">
    <pre class="ace-element" id="{$ace_block.divid}" style="font-size: {$ace_block.fontsize};">{$ace_block.content}</pre>
</div>
{/strip}
<script type="text/javascript">
$('#{$ace_block.divid}').aceInit({
    theme : '{$ace_block.theme}',
    mode : '{$ace_block.mode}',
    autoHeight : {$ace_block.auto_height}
}); 
</script>
