<script type="text/javascript" charset="utf-8" src="{$ace_url}/ace/src/ace.js"></script>
{foreach from=$modes item='mode'}
<script type="text/javascript" charset="utf-8" src="{$ace_url}/ace/src/mode-{$mode}.js"></script>
{/foreach}
{if isset($themes)}
{foreach from=$themes item='theme'}
<script type="text/javascript" charset="utf-8" src="{$ace_url}/ace/src/theme-{$theme}.js"></script>
{/foreach}
{/if}
