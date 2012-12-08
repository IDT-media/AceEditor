{strip}
{$startform}
<fieldset>
	<legend>
		{$ace_mod->Lang('settings_tab')}
	</legend>
	<div class="pageoverflow">
		<p class="pagetext">
			{$ace_mod->Lang('width_title')}
		</p>
		<p class="pageinput">
			{$width_input}
		</p>
	</div>	
	<div class="pageoverflow">
		<p class="pagetext">
			{$ace_mod->Lang('height_title')}
		</p>
		<p class="pageinput">
			{$height_input}
		</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">
			{$ace_mod->Lang('enable_ie')}
		</p>
		<p class="pageinput">
			{$enable_ieinput} {$ace_mod->Lang('enable_iedescription')}
		</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">
			{$ace_mod->Lang('syntax_mode')}
		</p>
		<p class="pageinput">
			{$syntax_modeinput}
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
	<div class="pageoverflow">
		<p class="pagetext">
			{$ace_mod->Lang('full_line')}
		</p>
		<p class="pageinput">
			{$full_lineinput}
		</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">
			{$ace_mod->Lang('highlight_active')}
		</p>
		<p class="pageinput">
			{$highlight_activeinput}
		</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">
			{$ace_mod->Lang('show_invisibles')}
		</p>
		<p class="pageinput">
			{$show_invisiblesinput}
		</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">
			{$ace_mod->Lang('persistent_hscroll')}
		</p>
		<p class="pageinput">
			{$persistent_hscrollinput}
		</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">
			{$ace_mod->Lang('soft_wrap')}
		</p>
		<p class="pageinput">
			{$soft_wrapinput}
		</p>
	</div>	
	<div class="pageoverflow">
		<p class="pagetext">
			{$ace_mod->Lang('show_gutter')}
		</p>
		<p class="pageinput">
			{$show_gutterinput}
		</p>
	</div>	
	<div class="pageoverflow">
		<p class="pagetext">
			{$ace_mod->Lang('print_margin')}
		</p>
		<p class="pageinput">
			{$print_margininput}
		</p>
	</div>	
	<div class="pageoverflow">
		<p class="pagetext">
			{$ace_mod->Lang('soft_tab')}
		</p>
		<p class="pageinput">
			{$soft_tabinput}
		</p>
	</div>	
	<div class="pageoverflow">
		<p class="pagetext">
			{$ace_mod->Lang('highlight_selected')}
		</p>
		<p class="pageinput">
			{$highlight_selectedinput}
		</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">
			{$ace_mod->Lang('enable_behaviors')}
		</p>
		<p class="pageinput">
			{$behaviours_input}
		</p>
	</div>					
	<div class="pageoverflow">
		<p class="pagetext">
			&nbsp;
		</p>
		<p class="pageinput">
			{$submit}
		</p>
	</div>
</fieldset>
<fieldset>
	<legend>{$ace_mod->Lang('testareatext')}</legend>
	<div class="pageoverflow">
		<p class="pageinput">
			{$testarea}
		</p>
	</div>	
	
</fieldset>
{$endform} 
{/strip}
