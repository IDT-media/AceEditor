<?php
#-------------------------------------------------------------------------
# Module: AceEditor - Syntax highlighting editor http://ace.ajax.org/.
# Version: 0.2.3, Goran Ilic uniqu3e@gmail.com http://www.ich-mach-das.at
#
#-------------------------------------------------------------------------
# CMS - CMS Made Simple is (c) 2007 by Ted Kulp (wishy@cmsmadesimple.org)
# This project's homepage is: http://www.cmsmadesimple.org
#
#-------------------------------------------------------------------------
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
# Or read it online: http://www.gnu.org/licenses/licenses.html#GPL
#
#-------------------------------------------------------------------------

#-------------------------------------------------------------------------
# For Help building modules:
# - Read the Documentation as it becomes available at
#   http://dev.cmsmadesimple.org/
# - Check out the Skeleton Module for a commented example
# - Look at other modules, and learn from the source
# - Check out the forums at http://forums.cmsmadesimple.org
# - Chat with developers on the #cms IRC channel
#-------------------------------------------------------------------------

if (isset($params['example_syntax'])) {
	$this->SetPreference('example_syntax', $params['example_syntax']);
}
$smarty->assign('startform', $this->CreateFormStart($id, 'savefrontendsettings', $returnid));
$smarty->assign('endform', $this->CreateFormEnd());

$smarty->assign('width_input', $this->CreateInputText($id, 'frontend_width', $this->GetPreference('frontend_width', '500'), 10, 255));
$smarty->assign('height_input', $this->CreateInputText($id, 'frontend_height', $this->GetPreference('frontend_height', '400'), 10, 255));

/* modes */
$modes = array(
    $this->Lang('js') => 'javascript',
    $this->Lang('plain') => 'plain',
    $this->Lang('svg') => 'svg',
    $this->Lang('html') => 'html',
    $this->Lang('css') => 'css',
    $this->Lang('scss') => 'scss',
    $this->Lang('coffee') => 'coffee',
    $this->Lang('json') => 'json',
    $this->Lang('python') => 'python',
    $this->Lang('ruby') => 'ruby',
    $this->Lang('perl') => 'perl',
    $this->Lang('php') => 'php',
    $this->Lang('java') => 'java',
    $this->Lang('csharp') => 'csharp',
    $this->Lang('c_cpp') => 'c_cpp',
    $this->Lang('clojure') => 'clojure',
    $this->Lang('coldfusion') => 'coldfusion',
    $this->Lang('diff') => 'diff',
    $this->Lang('haxe') => 'haxe',
    $this->Lang('latex') => 'latex',
    $this->Lang('lua') => 'lua',
    $this->Lang('markdown') => 'markdown',
    $this->Lang('powershell') => 'powershell',
    $this->Lang('sql') => 'sql',
    $this->Lang('pgsql') => 'pgsql',
    $this->Lang('ocaml') => 'ocaml',
    $this->Lang('textile') => 'textile',
    $this->Lang('groovy') => 'groovy',
    $this->Lang('golang') => 'golang',
    $this->Lang('jsx') => 'jsx',
    $this->Lang('less') => 'less',
    $this->Lang('liquid') => 'liquid',
    $this->Lang('scad') => 'scad',
    $this->Lang('sh') => 'sh',
    $this->Lang('xquery') => 'xquery',
    $this->Lang('yaml') => 'yaml',
    $this->Lang('scala') => 'scala'
);
// head multiselect		
$smarty->assign('frontend_syntax_modeinput', $this->CreateInputSelectList($id, 'frontend_mode[]', $modes, explode(',', $this->GetPreference('frontend_mode', 'html')), 5));
// syntaxarea pref
$smarty->assign('frontend_syntaxarea_modeinput', $this->CreateInputDropdown($id, 'frontend_syntaxarea_mode', $modes, -1, $this->GetPreference('frontend_syntaxarea_mode', 'html')));

/* themes */
$themes = array(
    $this->Lang('ambiance') => 'ambiance',
    $this->Lang('chrome') => 'chrome',
    $this->Lang('clouds') => 'clouds',
    $this->Lang('clouds_midnight') => 'clouds_midnight',
    $this->Lang('cobalt') => 'cobalt',
    $this->Lang('crimson_editor') => 'crimson_editor',
    $this->Lang('dawn') => 'dawn',
    $this->Lang('dreamweaver') => 'dreamweaver',
    $this->Lang('eclipse') => 'eclipse',
    $this->Lang('idle_fingers') => 'idle_fingers',
    $this->Lang('kr_theme') => 'kr_theme',
    $this->Lang('merbivore') => 'merbivore',
    $this->Lang('merbivore_soft') => 'merbivore_soft',
    $this->Lang('mono_industrial') => 'mono_industrial',
    $this->Lang('monokai') => 'monokai',
    $this->Lang('pastel_on_dark') => 'pastel_on_dark',
    $this->Lang('solarized_dark') => 'solarized_dark',
    $this->Lang('solarized_light') => 'solarized_light',
    $this->Lang('textmate') => 'textmate',
    $this->Lang('tomorrow') => 'tomorrow',
    $this->Lang('tomorrow_night') => 'tomorrow_night',
    $this->Lang('tomorrow_night_blue') => 'tomorrow_night_blue',
    $this->Lang('tomorrow_night_bright') => 'tomorrow_night_bright',
    $this->Lang('tomorrow_night_eighties') => 'tomorrow_night_eighties',
    $this->Lang('twilight') => 'twilight',
    $this->Lang('vibrant_ink') => 'vibrant_ink'
);
// head themes
$smarty->assign('frontend_themeinput', $this->CreateInputSelectList($id, 'frontend_theme[]', $themes, explode(',', $this->GetPreference('frontend_theme', 'textmate')), 5));
// syntaxarea theme	
$smarty->assign('themeinput', $this->CreateInputDropdown($id, 'frontend_syntaxarea_theme', $themes, -1, $this->GetPreference('frontend_syntaxarea_theme', 'textmate')));

/* font size */
$smarty->assign('fontsizetext', $this->Lang('font_size'));
$fonts = array(
	'10px' => '10px',
	'11px' => '11px',
	'12px' => '12px',
	'14px' => '14px',
	'16px' => '16px',
	'20px' => '20px',
	'24px' => '24px'
);
$smarty->assign('fontsizeinput', $this->CreateInputDropdown($id, 'frontend_fontsize', $fonts, -1, $this->GetPreference('frontend_fontsize', '12px')));
// submit settings
$smarty->assign('frontendsubmit', $this->CreateInputSubmit($id, 'frontendsubmit', $this->Lang('savesettings')));

/* ProcessTempalte */
echo $this->ProcessTemplate('frontendsettings.tpl');

?>