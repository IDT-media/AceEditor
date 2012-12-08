{strip}
{$startform}
{* NO NEED FOR THIS ANYMORE
<fieldset>
	<legend>
		{$ace_mod->Lang('frontend_head_settings')}
	</legend>
	<p>{$ace_mod->Lang('head_description')}</p>
	<div class="pageoverflow">
		<p class="pagetext">
			{$ace_mod->Lang('syntax_mode')}
		</p>
		<p class="pageinput">
			{$frontend_syntax_modeinput}
		</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">
			{$ace_mod->Lang('themes')}
		</p>
		<p class="pageinput">
			{$frontend_themeinput}
		</p>
	</div>
</fieldset>
*}
<fieldset>	
	<legend>
		{$ace_mod->Lang('frontend_syntaxarea_settings')}
	</legend>
	<p>{$ace_mod->Lang('content_description')}</p>			
	<div class="pageoverflow">
		<p class="pagetext">
			{$ace_mod->Lang('frontend_width_title')}
		</p>
		<p class="pageinput">
			{$width_input}
		</p>
	</div>	
	<div class="pageoverflow">
		<p class="pagetext">
			{$ace_mod->Lang('frontend_height_title')}
		</p>
		<p class="pageinput">
			{$height_input}
		</p>
	</div>	
	<div class="pageoverflow">
		<p class="pagetext">
			{$ace_mod->Lang('syntax_mode')}
		</p>
		<p class="pageinput">
			{$frontend_syntaxarea_modeinput}
		</p>
	</div>		
	<div class="pageoverflow">
		<p class="pagetext">
			{$ace_mod->Lang('themes')}
		</p>
		<p class="pageinput">
			{$themeinput}
		</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">
			{$ace_mod->Lang('font_size')}
		</p>
		<p class="pageinput">
			{$fontsizeinput}
		</p>
	</div>							
</fieldset>
	<div class="pageoverflow">
		<p class="pagetext">
			&nbsp;
		</p>
		<p class="pageinput">
			{$submit}
		</p>
	</div>
{$endform}
{/strip}
