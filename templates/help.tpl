{strip}
<div style="float:right;">
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
		<input type="hidden" name="cmd" value="_s-xclick" />
		<input type="hidden" name="hosted_button_id" value="FLH2AN89UPPAG" />
		<input type="image" src="https://www.paypalobjects.com/en_GB/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal — The safer, easier way to pay online." style="background:none;border:none;" />
		<img alt="" border="0" src="https://www.paypalobjects.com/de_DE/i/scr/pixel.gif" width="1" height="1" />
	</form>
</div>
<div id="page_tabs">
	<div id="general">
		{$help_general_title}
	</div>
	<div id="shortcuts">
		{$help_keyboardshortcuts_title}
	</div>
	<div id="frontend">
		{$help_frontend_title}
	</div>	
	<div id="about">
		{$help_about_title}
	</div>	
</div>
<div class="clearb"></div>
<div id="page_content">
	<div id="general_c">
		<img style="float:right;margin:0 10px 10px 10px; border: 5px solid #f0f0f0;" src="{$module_path}/images/editor.jpg" alt="Editor" width="316" height="259" />
		{$help_general_text}
		<br style ="clear:both;" />
	</div>
	<div id="shortcuts_c">
		<div class="pageoverflow">
		{$help_keyboardshortcuts_content}
		</div>
	</div>
	<div id="frontend_c">
		<div class="pageoverflow">
		{$help_frontend_content}
		<pre>{$help_frontend_sample}</pre>
		</div>
	</div>
	<div id="about_c">
		<div class="pageoverflow">
		{$help_about_text}
		</div>
	</div>		
</div>
{/strip}
