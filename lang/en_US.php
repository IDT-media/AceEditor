<?php
$lang['friendlyname']="AceEditor";
$lang['admindescription'] = "AceEditor is a Syntaxhighlighter module using <strong>Ace</strong> a standalone code editor written in JavaScript.";

/* --- Tabs --- */
$lang['settings_tab'] = "Preferences";
$lang['frontendsettings_tab'] = "Frontend Preferences";
$lang['frontend_head_settings'] = "Frontend Head Preferences";
$lang['frontend_syntaxarea_settings'] = "Frontend Syntaxarea Preferences";
$lang['head_description'] = "These preferences are used for default settings of Ace scripts that should be included in page <code>&lt;head&gt;</code> when calling <code>{AceEditor action='head'}</code> from Page Specific Metadata or Template.";
$lang['content_description'] = "These preferences are used for default settings of Syntaxhighlighting area when calling <code>{AceEditor divid='editor'}</code> tag within a Page.";
$lang['syntaxareadescription'] = "These preferences are used for default settings of Ace behavior when calling <code>{AceEditor divid='foo'}</code> from a Page or Template";

/* --- Settings labels --- */
$lang['example_document'] = "Document";
$lang['width_title'] = "Editor width (in em)";
$lang['height_title'] = "Editor height (in em)";
$lang['enable_ie'] = "Enable Internet Explorer";
$lang['use_uncompressed'] = "Use uncompressed";
$lang['use_uncompressed_text'] = 'Might help if you have problems using in Safari.';
$lang['enable_iedescription'] = "Ace Syntaxhighlighter does not behave properly when using Internet Explorer. Enable this at your own risk!";
$lang['frontend_width_title'] = "Frontend Syntaxarea width (in px)";
$lang['frontend_height_title'] = "Frontend Syntaxarea height (in px)";
$lang['syntax_mode'] = "Mode";
$lang['themes'] = "Theme";
$lang['font_size'] = "Font Size";
$lang['full_line'] = "Full Line Selection";
$lang['highlight_active'] = "Highlight Active Line";
$lang['show_invisibles'] = "Show Invisibles";
$lang['persistent_hscroll'] = "Persitent HScroll";
$lang['key_binding'] = "Key Binding";
$lang['soft_wrap'] = "Soft Wrap";
$lang['show_gutter'] = "Show Gutter";
$lang['print_margin'] = "Show Print Margin";
$lang['soft_tab'] = "Use Soft Tab";
$lang['highlight_selected'] = "Highlight selected word";
$lang['enable_behaviors'] = "Enable Behaviors";
$lang['testareatext'] = "Preview";

/* --- Select options --- */

/* languages */
$lang['js'] = "JavaScript";
$lang['plain'] = "Plain Text";
$lang['svg'] = "SVG";
$lang['html'] = "HTML";
$lang['css'] = "CSS";
$lang['scss'] = "SCSS";
$lang['coffee'] = "CoffeeScript";
$lang['json'] = "JSON";
$lang['python'] = "Python";
$lang['ruby'] = "Ruby";
$lang['perl'] = "Perl";
$lang['php'] = "PHP";
$lang['java'] = "Java";
$lang['csharp'] = "C#";
$lang['c_cpp'] = "C++";
$lang['clojure'] = "Clojure";
$lang['coldfusion'] = "Coldfusion";
$lang['haxe'] = "Haxe";
$lang['latex'] = "Latex";
$lang['lua'] = "Lua";
$lang['markdown'] = "Markdown";
$lang['powershell'] = "PowerShell";
$lang['sql'] = "SQL";
$lang['pgsql'] = "pgSQL";
$lang['ocaml'] = "OCaml";
$lang['textile'] = "Textile";
$lang['groovy'] = "Groovy";
$lang['scala'] = "Scala";

/* themes */
$lang['clouds'] = "Clouds"; 
$lang['chrome'] = "Chrome"; 
$lang['clouds_midnight'] = "Clouds Midnight"; 
$lang['cobalt'] = "Cobalt"; 
$lang['crimson_editor'] = "Crimson Editor";
$lang['dawn'] = "Dawn";
$lang['dreamweaver'] = "Dreamweaver"; 
$lang['eclipse'] = "Eclipse";
$lang['idle_fingers'] = "idleFingers";
$lang['kr_theme'] = "krTheme";
$lang['merbivore'] = "Merbivore";
$lang['merbivore_soft'] = "Merbivore Soft";
$lang['mono_industrial'] = "Mono Industrial";
$lang['monokai'] = "Monokai";
$lang['pastel_on_dark'] = "Pastel on dark";
$lang['solarized_dark'] = "Solarized Dark";
$lang['solarized_light'] = "Solarized Light";
$lang['textmate'] = "TextMate";
$lang['tomorrow'] = "Tomorrow";
$lang['tomorrow_night'] = "Tomorrow Night";
$lang['tomorrow_night_bright'] = "Tomorrow Night Bright";
$lang['tomorrow_night_blue'] = "Tomorrow Night Blue";
$lang['tomorrow_night_eighties'] = "Tomorrow Night Eighties";
$lang['twilight'] = "Twilight";
$lang['vibrant_ink'] = "Vibrant Ink";

/* key binding */
$lang['ace'] = "Ace"; 
$lang['vim'] = "Vim"; 
$lang['cobalt'] = "Cobalt"; 
$lang['emacs'] = "EMacs";
$lang['custom'] = "Custom";

/* Soft wrap */
$lang['off'] = "Off"; 
$lang['40'] = "40 Chars"; 
$lang['80'] = "80 Chars"; 
$lang['100'] = "100 Chars"; 
$lang['140'] = "140 Chars"; 

/* --- Common --- */
$lang['savesettings'] = "Save Preferences";
$lang['settingssaved'] = "Your AceEditor settings have been saved";
$lang['frontendsettingssaved'] = "Your AceEditor Frontend settings have been saved";
$lang['postinstall'] = "AceEditor Successfully Installed! Set \"Modify Site Preferences\" permissions to use this module! If you're surfing with Safari, set the option \"Use uncompressed\".";
$lang['postuninstall'] = "AceEditor Successfully Uninstalled";
$lang['really_uninstall'] = "Really? Are you sure you want to uninstall AceEditor? Think again!";

/* --- Help --- */
$lang['help_param_action'] = "is used to determine the action of Module tag. Possible values are 'default' and 'head'. Both are needed for correct Frontend Syntaxhighlighting function. <br />Possible values are:
<ul>
	<li>head</li>
	<li>default</li>
</ul>";
$lang['help_param_modes'] = "is used with <code>{AceEditor action='head'}</code>. You can include multiple comma separated 'modes' that you will be using on your website. This should be included in your &lt;head&gt; of Template or Page specific Metadata. This will override you Preferences selected in Module Admin area. <br />Possible values are:
<ul>
	<li>javascript</li> 
	<li>plain</li> 
	<li>svg</li> 
	<li>html</li>
	<li>css</li>
	<li>scss</li>
	<li>coffee</li>
	<li>json</li>
	<li>python</li>
	<li>ruby</li>
	<li>perl</li>
	<li>php</li>
	<li>java</li>
	<li>csharp</li>
	<li>c_cpp</li>
	<li>clojure</li>
	<li>ocaml</li>
	<li>textile</li>
	<li>groovy</li>
	<li>scala</li>
</ul>";
$lang['help_param_themes'] = "is used with <code>{AceEditor action='head'}</code>. You can include multiple comma separated 'themes' that you will be using on your website. This should be included in your &lt;head&gt; of Template or Page specific Metadata. This will override you Preferences selected in Module Admin area. <br />Possible values are:
<ul>
	<li>clouds</li> 
	<li>clouds_midnight</li> 
	<li>cobalt</li> 
	<li>crimson_editor</li>
	<li>dawn</li>
	<li>eclipse</li>
	<li>idle_fingers</li>
	<li>kr_theme</li>
	<li>merbivore</li>
	<li>merbivore_soft</li>
	<li>mono_industrial</li>
	<li>monokai</li>
	<li>pastel_on_dark</li>
	<li>solarized_dark</li>
	<li>solarized_light</li>
	<li>textmate</li>
	<li>twilight</li>
	<li>vibrant_ink</li>
</ul>";
$lang['help_param_mode'] = "is used within a page with <code>{AceEditor action='default'}</code> module tag. This specifies Syntaxhighlighter mode for specific code area. <br />Possible values are:
<ul>
	<li>javascript</li> 
	<li>plain</li> 
	<li>svg</li> 
	<li>html</li>
	<li>css</li>
	<li>scss</li>
	<li>coffee</li>
	<li>json</li>
	<li>python</li>
	<li>ruby</li>
	<li>perl</li>
	<li>php</li>
	<li>java</li>
	<li>csharp</li>
	<li>c_cpp</li>
	<li>clojure</li>
	<li>ocaml</li>
	<li>textile</li>
	<li>groovy</li>
	<li>scala</li>
</ul>";
$lang['help_param_theme'] = "is used within a page with <code>{AceEditor action='default'}</code> module tag. This specifies Syntaxhighlighter theme for specific code area. <br />Possible values are:
<ul>
	<li>clouds</li> 
	<li>clouds_midnight</li> 
	<li>cobalt</li> 
	<li>crimson_editor</li>
	<li>dawn</li>
	<li>eclipse</li>
	<li>idle_fingers</li>
	<li>kr_theme</li>
	<li>merbivore</li>
	<li>merbivore_soft</li>
	<li>mono_industrial</li>
	<li>monokai</li>
	<li>pastel_on_dark</li>
	<li>solarized_dark</li>
	<li>solarized_light</li>
	<li>textmate</li>
	<li>twilight</li>
	<li>vibrant_ink</li>
</ul>";
$lang['help_param_width'] = "specifies width of Syntaxhighlighter area in pixel.";
$lang['help_param_height'] = "specifies height of Syntaxhighlighter area in pixel.";
$lang['help_param_divid'] = "id of the element containing your code. Use unique id for each code chunck.";
$lang['help_general_title'] = "General";
$lang['help_general_text'] = "
<h3>What does this module do?</h3>
<p>AceEditor is a Syntaxhighlighter module using <strong>Ace</strong> a standalone code editor written in JavaScript.<br /> 
Goal of Ace code editor group is to create a web based code editor that matches and extends the features, usability and performance of existing native editors such as TextMate, Vim or Eclipse.<br />
It can be easily embedded in any web page and JavaScript application.<br /> 
Ace is developed as the primary editor for <a href=\"http://www.cloud9ide.com\">Cloud9 IDE</a> and the successor of the Mozilla Skywriter (Bespin) Project.</p>
<h3>Ace is hosted on GitHub</h3>
<p>The Ace source code is hosted on GitHub. It is released under the Mozilla tri-license (MPL/GPL/LGPL).<br />
This is the same license used by Firefox. This license is friendly to all kinds of projects, whether open source or not.<br />
 Take charge of your editor and add your favorite language highlighting and keybindings!</p>
<h3>Using AceEditor Module</h3>
<p>Using AceEditor Module is simple.<br />
After AceEditor was installed go to \"My Preferences &raquo; User Preferences\" and choose AceEditor as your Syntaxhighlighter of choice from \"Select syntax highlighter to use:\" Dropdown.<br />
Make sure you have 'Modify Site Preferences' Permsission.</p>
<h3>Settings</h3>
<p>You can change default Settings and Themes in \"Extensions &raquo; AceEditor\"</p>";

$lang['help_keyboardshortcuts_title'] = "Keyboard Shortcuts";
$lang['help_keyboardshortcuts_content'] = '
      <h3>Default Keyboard Shortcuts</h3>

<table class="pagetable" cellspacing="0" summary="Default Keyboard Shortcuts">
<thead><tr>
<th>PC (Windows/Linux)</td>
<th>Mac</td>
<th>action</td>
</tr></thead>
<tbody>
<tr class="row1">
<td align="left">Ctrl-Return</td>
<td align="left">Command-Return</td>
<td align="left">fullscreen</td>
</tr>
<tr class="row2">
<td align="left">Ctrl-S</td>
<td align="left">Command-S</td>
<td align="left">perform save</td>
</tr>
<tr class="row1">
<td align="left"></td>
<td align="left">Ctrl-L</td>
<td align="left">center selection</td>
</tr>
<tr class="row2">
<td align="left">Ctrl-Alt-Down</td>
<td align="left">Command-Option-Down</td>
<td align="left">copy lines down</td>
</tr>
<tr lcass="row1">
<td align="left">Ctrl-Alt-Up</td>
<td align="left">Command-Option-Up</td>
<td align="left">copy lines up</td>
</tr>
<tr class="row2">
<td align="left">Ctrl-F</td>
<td align="left">Command-F</td>
<td align="left">find</td>
</tr>
<tr class="row1">
<td align="left">Ctrl-K</td>
<td align="left">Command-G</td>
<td align="left">find next</td>
</tr>
<tr class="row2">
<td align="left">Ctrl-Shift-K</td>
<td align="left">Command-Shift-G</td>
<td align="left">find previous</td>
</tr>
<tr class="row1">
<td align="left">Down</td>
<td align="left">Down,Ctrl-N</td>
<td align="left">go line down</td>
</tr>
<tr class="row2">
<td align="left">Up</td>
<td align="left">Up,Ctrl-P</td>
<td align="left">go line up</td>
</tr>
<tr class="row1">
<td align="left">Ctrl-End,Ctrl-Down</td>
<td align="left">Command-End,Command-Down</td>
<td align="left">go to end</td>
</tr>
<tr class="row2">
<td align="left">Left</td>
<td align="left">Left,Ctrl-B</td>
<td align="left">go to left</td>
</tr>
<tr class="row1">
<td align="left">Ctrl-L</td>
<td align="left">Command-L</td>
<td align="left">go to line</td>
</tr>
<tr class="row2">
<td align="left">Alt-Right,End</td>
<td align="left">Command-Right,End,Ctrl-E</td>
<td align="left">go to line end</td>
</tr>
<tr class="row1">
<td align="left">Alt-Left,Home</td>
<td align="left">Command-Left,Home,Ctrl-A</td>
<td align="left">go to line start</td>
</tr>
<tr class="row2">
<td align="left">PageDown</td>
<td align="left">Option-PageDown,Ctrl-V</td>
<td align="left">go to page down</td>
</tr>
<tr class="row1">
<td align="left">PageUp</td>
<td align="left">Option-PageUp</td>
<td align="left">go to page up</td>
</tr>
<tr class="row2">
<td align="left">Right</td>
<td align="left">Right,Ctrl-F</td>
<td align="left">go to right</td>
</tr>
<tr class="row1">
<td align="left">Ctrl-Home,Ctrl-Up</td>
<td align="left">Command-Home,Command-Up</td>
<td align="left">go to start</td>
</tr>
<tr class="row2">
<td align="left">Ctrl-Left</td>
<td align="left">Option-Left</td>
<td align="left">go to word left</td>
</tr>
<tr class="row1">
<td align="left">Ctrl-Right</td>
<td align="left">Option-Right</td>
<td align="left">go to word right</td>
</tr>
<tr class="row2">
<td align="left">Tab</td>
<td align="left">Tab</td>
<td align="left">indent</td>
</tr>
<tr class="row1">
<td align="left">Alt-Down</td>
<td align="left">Option-Down</td>
<td align="left">move lines down</td>
</tr>
<tr class="row2">
<td align="left">Alt-Up</td>
<td align="left">Option-Up</td>
<td align="left">move lines up</td>
</tr>
<tr class="row1">
<td align="left">Shift-Tab</td>
<td align="left">Shift-Tab</td>
<td align="left">outdent</td>
</tr>
<tr class="row2">
<td align="left">Insert</td>
<td align="left">Insert</td>
<td align="left">overwrite</td>
</tr>
<tr class="row1">
<td align="left"></td>
<td align="left">PageDown</td>
<td align="left">pagedown</td>
</tr>
<tr class="row2">
<td align="left"></td>
<td align="left">PageUp</td>
<td align="left">pageup</td>
</tr>
<tr class="row1">
<td align="left">Ctrl-Shift-Z,Ctrl-Y</td>
<td align="left">Command-Shift-Z,Command-Y</td>
<td align="left">redo</td>
</tr>
<tr class="row2">
<td align="left">Ctrl-D</td>
<td align="left">Command-D</td>
<td align="left">remove line</td>
</tr>
<tr class="row1">
<td align="left"></td>
<td align="left">Ctrl-K</td>
<td align="left">remove to line end</td>
</tr>
<tr class="row2">
<td align="left"></td>
<td align="left">Option-Backspace</td>
<td align="left">remove to linestart</td>
</tr>
<tr class="row1">
<td align="left"></td>
<td align="left">Alt-Backspace,Ctrl-Alt-Backspace</td>
<td align="left">remove word left</td>
</tr>
<tr class="row2">
<td align="left"></td>
<td align="left">Alt-Delete</td>
<td align="left">remove word right</td>
</tr>
<tr class="row1">
<td align="left">Ctrl-R</td>
<td align="left">Command-Option-F</td>
<td align="left">replace</td>
</tr>
<tr class="row2">
<td align="left">Ctrl-Shift-R</td>
<td align="left">Command-Shift-Option-F</td>
<td align="left">replace all</td>
</tr>
<tr class="row1">
<td align="left">Ctrl-A</td>
<td align="left">Command-A</td>
<td align="left">select all</td>
</tr>
<tr class="row2">
<td align="left">Shift-Down</td>
<td align="left">Shift-Down</td>
<td align="left">select down</td>
</tr>
<tr class="row1">
<td align="left">Shift-Left</td>
<td align="left">Shift-Left</td>
<td align="left">select left</td>
</tr>
<tr class="row2">
<td align="left">Shift-End</td>
<td align="left">Shift-End</td>
<td align="left">select line end</td>
</tr>
<tr class="row1">
<td align="left">Shift-Home</td>
<td align="left">Shift-Home</td>
<td align="left">select line start</td>
</tr>
<tr class="row2">
<td align="left">Shift-PageDown</td>
<td align="left">Shift-PageDown</td>
<td align="left">select page down</td>
</tr>
<tr class="row1">
<td align="left">Shift-PageUp</td>
<td align="left">Shift-PageUp</td>
<td align="left">select page up</td>
</tr>
<tr class="row2">
<td align="left">Shift-Right</td>
<td align="left">Shift-Right</td>
<td align="left">select right</td>
</tr>
<tr class="row1">
<td align="left">Ctrl-Shift-End,Alt-Shift-Down</td>
<td align="left">Command-Shift-Down</td>
<td align="left">select to end</td>
</tr>
<tr class="row2">
<td align="left">Alt-Shift-Right</td>
<td align="left">Command-Shift-Right</td>
<td align="left">select to line end</td>
</tr>
<tr class="row1">
<td align="left">Alt-Shift-Left</td>
<td align="left">Command-Shift-Left</td>
<td align="left">select to line start</td>
</tr>
<tr class="row2">
<td align="left">Ctrl-Shift-Home,Alt-Shift-Up</td>
<td align="left">Command-Shift-Up</td>
<td align="left">select to start</td>
</tr>
<tr class="row1">
<td align="left">Shift-Up</td>
<td align="left">Shift-Up</td>
<td align="left">select up</td>
</tr>
<tr class="row2">
<td align="left">Ctrl-Shift-Left</td>
<td align="left">Option-Shift-Left</td>
<td align="left">select word left</td>
</tr>
<tr class="row1">
<td align="left">Ctrl-Shift-Right</td>
<td align="left">Option-Shift-Right</td>
<td align="left">select word right</td>
</tr>
<tr class="row2">
<td align="left"></td>
<td align="left">Ctrl-O</td>
<td align="left">split line</td>
</tr>
<tr class="row1">
<td align="left">Ctrl-7</td>
<td align="left">Command-7</td>
<td align="left">toggle comment</td>
</tr>
<tr class="row2">
<td align="left">Ctrl-T</td>
<td align="left">Ctrl-T</td>
<td align="left">transpose letters</td>
</tr>
<tr class="row1">
<td align="left">Ctrl-Z</td>
<td align="left">Command-Z</td>
<td align="left">undo</td>
</tr>
</tbody>
</table>';

$lang['help_frontend_title'] = "Frontend";
$lang['help_frontend_content'] = "<p>This Module and Ace Script can also be used as a Frontend Syntaxhighlighter.<br />
To make it work you have to include jQuery Framework, for example using CMSMS {cms_jquery} tag and as well include {AceEditor} in your page twice. First add the module tag in your &lt;head&gt; section of Template or in &quot;Page Specific Metdata&quot; field of your Content page, like {AceEditor action='head'} and another call to specify which area should be highlighted, for example {AceEditor divid='foo'}, which would target a page element with id <em>foo</em>.</p>
<h3>So how do you use it?</h3>
<p>First include jQuery and Module tag in your Page &lt;head&gt; area, for example in &quot;Page Specific Metdata&quot;:</p>
	<pre>
	{cms_jquery}
	{AceEditor action='head'}
	</pre>
<p>This includes needed scripts for Ace Syntaxhighlighter to work.<br />
In Modules Admin interface you can select default settings for your 'head' action or use parameter modes='html,javascript' and themes='textmate' which would override selected Preferences.</p>
<p>Now when you have needed scripts included, one more Module tag call is needed (for example in your Content Editor area) to specify which area of your Page should be highlighted.</p>
	<pre>
	{AceEditor divid='some-id'}
	</pre>
<p>This tag includes needed Script and Style that is used to Highlight selected element with specified id.<br />
All you need then is write your Code that you want to Highlight and wrap it inside an elemen like &lt;div&gt; with specified id.</p>";
$lang['help_frontend_sample'] = '
<pre id="some-id">
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
         &lt;h1 style="color:red"&gt;Juhu Kinners&lt;/h1&gt;
     &lt;/body&gt; &lt;/html&gt;
</pre>';

$lang['help_about_title'] = "About";
$lang['help_about_text'] = '<h3>Support</h3>
<p>As per the GPL, this software is provided as-is. Please read the text of the license for the full disclaimer.</p>
<h3>Copyright and License</h3>
<p>Copyright &copy; 2012, Goran Ilic <a href="mailto:uniqu3e@gmail.com">&lt;uniqu3e@gmail.com&gt;</a> <a href="http://www.ich-mach-das.at" rel="external">www.ich-mach-das.at</a>. All Rights Are Reserved.</p>
<p>This module has been released under the <a href="http://www.gnu.org/licenses/licenses.html#GPL">GNU Public License</a>. You must agree to this license before using the module.</p>
	<h3>Team</h3>
	<ul>
		<li>Goran Ilic (uniqu3) g.ilic@i-arts.eu <br />www.ich-mach-das.at</li>	
		<li>Robert Campbell (calguy1000) calguy1000@cmsmadesimple.org  <br />www.calguy1000.com</li>		
		<li>Jonathan Schmid (Foaly*) hi@jonathanschmid.de <br />www.jonathanschmid.de</li>
	</ul>
';

/* --- Changelog --- */
$lang['changelog'] = "
<h3>Version 0.1</h3>
<ul>
	<li>It's fresh! Nothing changed yet!</li>
	<li>Using Ace Version 0.2.0</li>
</ul>
<h3>Version 0.2</h3>
<ul>
	<li>Added CTRL-S Keybinding</li>
	<li>Added Fullscreenmode</li>
	<li>Added Frontend Highlighting</li>
	<li>Updated Ace</li>
</ul>
<h3>Version 0.2.1</h3>
<ul>
	<li>Added Internet Explorer preference</li>
	<li>Updated ACE with themes</li>
</ul>
<h3>Version 0.2.2</h3>
<ul>
	<li>Fix for Safari/Mac</li>
</ul>
<h3>Roadmap</h3>
<ul>
	<li><del>Add Frontend Syntaxhighlighting</del></li>
	<li><del>Add Fullscreenmode</del></li>
	<li><del>Add Keybinding (CTRL+S)</del></li>
	<li>Add Editor behavior (Vim, EMacs)</li>
	<li>Maybe add Toolbar</li>
</ul>";

?>
