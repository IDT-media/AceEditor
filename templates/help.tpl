{strip}
<link rel="stylesheet" href="{$module_path}/lib/css/colorbox.css" type="text/css" />
<link rel="stylesheet" href="{$module_path}/lib/css/aceHelp.css" type="text/css" />
<script type="text/javascript" language="javascript" src="{$module_path}/lib/js/jquery.colorbox.js"></script>
<script>
jQuery(document).ready(function(){ldelim}
	jQuery('.cbox').colorbox({ldelim}
		rel:'group',
		iframe: true,
		innerWidth: 800,
		innerHeight: 450,
		opacity: 0.2
	{rdelim});
{rdelim});
</script>
<div style="float:right;">
	<a target="_blank" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=9XRWPLJ6DNC2G">
		<img src="{$module_path}/images/btn_donate_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online." />
	</a>
</div>
<div class="clear"></div>
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
		IDT Media
	</div>	
</div>
<div class="clearb"></div>
<div id="page_content">
	<div id="general_c">
		<img class="img-right" src="{$module_path}/images/screenshots/editor_screenshot.jpg" alt="Editor" width="481" height="308" />
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
		<pre>
		<code>
		{literal}
{ace_code id='some-id' theme='twilight' htmlentities='1' mode='javascript}
&lt;html&gt;
&lt;head&gt;
	&lt;style type="text/css"&gt;
	.text-layer {
		font-family: Monaco, "Courier New", monospace;
		font-size: 12px;
		cursor: text;
	}
	&lt;/style&gt;
&lt;/head&gt;
&lt;body&gt;
	&lt;h1 style="color:red"&gt;YES!&lt;/h1&gt;
&lt;/body&gt;
&lt;/html&gt;
{/ace_code}
		{/literal}
		</code>
		</pre>
		<h3>{$help_available_themes}</h3>
		<ul>
			{foreach $themes_list as $k => $v}
			<li>{$k}</li>
			{/foreach}
		</ul>
		<h3>{$help_available_modes}</h3>
		<ul>
			{foreach $modes_list as $k => $v}
			<li>{$k}</li>
			{/foreach}
		</ul>
		</div>
	</div>
	<div id="about_c">
		<div class="pageoverflow">
			<h3>Who is IDT Media?</h3>
			<p>
				<img class="img-right" src="{$module_path}/images/idt-logo.jpg" alt="IDT Media" width="177" height="121" />
				Is a young, experienced Team of two, Tapio Löytty (Stikki) and Goran Ilic (uniqu3), who have been working together on various projects,<br />
				where the idea of forming a Team and regulary collaborate was born.<br />
				We are not a Company, but two individuals that work as a Team and complement each other through out the projects and tasks.
			</p>
			<h3>What do we offer?</h3>
			<p>
				Our approach is to understand, research and identify your key project objectives. We then decide on how to achieve them, and what solutions we will use.<br />
				We work across a variety of on and offline media and can offer you solutions like Web design, Mobile design, Branding, Custom Programming, Module Development and more.<br /><br />
				<a class="ui-state-default ui-corner-all contact-button" href="mailto:hi@idt-media.com?subject=Request from AceEditor Module"><span style="display: inline-block;" class="ui-icon ui-icon-mail-closed"></span>Get in touch</a>
			</p>
			<h4>IDT Media Team</h4>
			<ul>
				<li>Goran Ilic (uniqu3) g.ilic@idt-media.com <br />www.ich-mach-das.at</li>
				<li>Tapio Löytty(Stikki) tapsa@idt-media.com <br />www.orange-media.fi</li>
			</ul>
			<br class="clear" />
			<h4>Modules &amp; Plugins built &amp; maintained by IDT Media</h4>
			<div class="videos-container">
				<ul>
					<li>
						<a title="Adding List Items" class="cbox" rel="group" href="//player.vimeo.com/video/50821317">
							<img src="{$module_path}/images/screenshots/video-thumb.jpg" alt="Adding List Items" />
							<h5>ListItExtended</h5>
						</a>
					</li>
					<li>
						<a title="ListItExtended Fielddefinitions with ListIt2XDefs" class="cbox" rel="group" href="//player.vimeo.com/video/76208109">
							<img src="{$module_path}/images/screenshots/video-thumb.jpg" alt="ListItExtended Fielddefinitions with ListIt2XDefs" />
							<h5>ListIt2XDefs</h5>
						</a>
					</li>
					<li>
						<a title="ListIt2XIUtilities - ListItExtended cross instance connector" class="cbox" rel="group" href="//player.vimeo.com/video/76212199">
							<img src="{$module_path}/images/screenshots/video-thumb.jpg" alt="ListIt2XIUtilities - ListItExtended cross instance connector" />
							<h5>ListIt2XIUtilities</h5>
						</a>
					</li>
					<li>
						<a title="ListIt2MegaUpload - Multiupload tool for ListItExtended" class="cbox" rel="group" href="//player.vimeo.com/video/76210015">
							<img src="{$module_path}/images/screenshots/video-thumb.jpg" alt="ListIt2MegaUpload - Multiupload tool for ListItExtended" />
							<h5>ListIt2MegaUpload</h5>
						</a>
					</li>
					<li>
						<a title="ListIt2FEUExporter - ListItExtended to Front End Users connector module with export capability" class="cbox" rel="group" href="//player.vimeo.com/video/76215947">
							<img src="{$module_path}/images/screenshots/video-thumb.jpg" alt="ListIt2FEUExporter - ListItExtended to Front End Users connector module with export capability" />
							<h5>ListIt2FEUExporter</h5>
						</a>
					</li>
					<li>
						<a title="AceEditor Syntaxhighlighter" class="cbox" rel="group" href="//player.vimeo.com/video/76220050">
							<img src="{$module_path}/images/screenshots/video-thumb.jpg" alt="AceEditor Syntaxhighlighter" />
							<h5>AceEditor</h5>
						</a>
					</li>
					<li>
						<a title="Using Notifications module" class="cbox" rel="group" href="//player.vimeo.com/video/49488011">
							<img src="{$module_path}/images/screenshots/video-thumb.jpg" alt="Using Notifications module" />
							<h5>Notifications</h5>
						</a>
					</li>
					<li>
						<a title="Mobile detection plugin based on Mobile_DEtect PHP Class" class="cbox" rel="group" href="//player.vimeo.com/video/76251494">
							<img src="{$module_path}/images/screenshots/video-thumb.jpg" alt="Mobile detection plugin based on Mobile_DEtect PHP Class" />
							<h5>MobileDetect</h5>
						</a>
					</li>
				</ul>
			</div>
			<h3>Support</h3>
			<p>As per the GPL, this software is provided as-is. Please read the text of the license for the full disclaimer.</p>
			
			<h3>Copyright and License</h3>
			
			<p>Copyright &copy; 2013, Goran Ilic <a href="mailto:uniqu3e@gmail.com">&lt;uniqu3e@gmail.com&gt;</a> <a href="http://www.ich-mach-das.at" rel="external">www.ich-mach-das.at</a>. All Rights Are Reserved.</p>
			<p>This module has been released under the <a href="http://www.gnu.org/licenses/licenses.html#GPL">GNU Public License</a>. You must agree to this license before using the module.</p>
					
			<h4>AceEditor Contributors</h4>
			<ul>
				<li>Robert Campbell (calguy1000) calguy1000@cmsmadesimple.org  <br />www.calguy1000.com</li>
				<li>Jonathan Schmid (Foaly*) hi@jonathanschmid.de <br />www.jonathanschmid.de</li>
			</ul>
		</div>
	</div>
	<div class="clearb"></div>
</div>
{/strip}