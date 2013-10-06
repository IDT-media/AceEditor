<?php
/**
 *
 * Copyright:
 *
 * IDT Media - Goran Ilic & Tapio Löytty
 * Web: www.i-do-this.com
 * Email: hi@i-do-this.com
 *
 *
 * Authors:
 *
 * Goran Ilic, <ja@ich-mach-das.at>
 * Web: www.ich-mach-das.at
 * 
 * Tapio Löytty, <tapsa@orange-media.fi>
 * Web: www.orange-media.fi
 *
 * License:
 *-------------------------------------------------------------------------
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
 * Or read it online: http://www.gnu.org/licenses/licenses.html#GPL
 *
 * ------------------------------------------------------------------------- */

class AceEditor extends CMSModule
{

	#---------------------
	# Attributes
	#---------------------	

	protected $noeditors       = 0;
	public $headerinfosent     = false;
	private $_htmlactive       = false;
	private $_plainactive      = false;
	private $_javascriptactive = false;
	private $_cssactive        = false;
	private $_phpactive        = false;
	private $_xmlactive        = false;
	private $_jsonactive       = false;
	private $_defaultactive    = false;
	
	#---------------------
	# Module api methods
	#---------------------		

	public function GetName()
	{
		return get_class($this);
	}

	public function GetFriendlyName()
	{
		return $this->Lang('friendlyname');
	}

	public function GetVersion()
	{
		return '1.0';
	}

	public function GetAuthor()
	{
		return 'Goran Ilic';
	}

	public function GetAuthorEmail()
	{
		return 'uniqu3e@gmail.com';
	}

	public function GetChangeLog()
	{
		return @file_get_contents(dirname(__FILE__).'/changelog.html');
	}

	public function IsPluginModule()
	{
		return true;
	}	
	
	public function HasAdmin()
	{
		return true;
	}

	public function GetAdminSection()
	{
		return 'myprefs';
	}

	public function GetAdminDescription()
	{
		return $this->Lang('admindescription');
	}

	public function VisibleToAdminUser()
	{
		return $this->CheckPermission('Modify Site Preferences') || $this->CheckPermission('AceEditor User Preference') || $this->CheckPermission('Modify Templates');
	}

	public function MinimumCMSVersion()
	{
		return "1.11";
	}

	public function InstallPostMessage()
	{
		return $this->Lang('postinstall');
	}

	public function UninstallPostMessage()
	{
		return $this->Lang('postuninstall');
	}

	public function UninstallPreMessage()
	{
		return $this->Lang('really_uninstall');
	}	
	
	public function LazyLoadFrontend()
	{
		return false; 
	}

	public function LazyLoadAdmin()
	{
		return true;
	}

	public function HasCapability($capability, $params = array())
	{
		switch ($capability) {
					
			case 'syntaxhighlighting':
				return true;
				
			default:
				return false;
		}
	}

	public function IsWYSIWYG()
	{
		return false;
	}

	public function IsSyntaxHighlighter()
	{
		return true;
	}

	public function SyntaxPageFormSubmit()
	{
		return;
	}	
	
	public function GetHelp()
	{
		$smarty = cmsms()->GetSmarty();
		
		$smarty->assign('module_path', ($this->GetModuleURLPath()));
		$smarty->assign('help_general_title', $this->Lang('help_general_title'));
		$smarty->assign('help_general_text', $this->Lang('help_general_text'));
		$smarty->assign('help_keyboardshortcuts_title', $this->Lang('help_keyboardshortcuts_title'));
		$smarty->assign('help_keyboardshortcuts_content', htmlspecialchars_decode($this->Lang('help_keyboardshortcuts_content')));
		$smarty->assign('help_frontend_title', $this->Lang('help_frontend_title'));
		$smarty->assign('help_frontend_content', $this->Lang('help_frontend_content'));
		$smarty->assign('help_frontend_sample', cms_htmlentities($this->Lang('help_frontend_sample')));
		$smarty->assign('help_about_title', $this->Lang('help_about_title'));
		$smarty->assign('help_available_themes', $this->Lang('help_available_themes'));
		$smarty->assign('help_available_modes', $this->Lang('help_available_modes'));
		$smarty->assign('modes_list', $this->AceGetModes());
		$smarty->assign('themes_list', $this->AceGetThemes());

		return $this->ProcessTemplate('help.tpl');
	}

	public function InitializeFrontend()
	{
		$this->RestrictUnknownParams();

		$this->SetParameterType('action', CLEAN_STRING); // removed
		$this->SetParameterType('modes', CLEAN_STRING); // removed
		$this->SetParameterType('themes', CLEAN_STRING); // removed
		$this->SetParameterType('mode', CLEAN_STRING); 
		$this->SetParameterType('theme', CLEAN_STRING);
		$this->SetParameterType('width', CLEAN_STRING);
		$this->SetParameterType('height', CLEAN_STRING);
		$this->SetParameterType('divid', CLEAN_STRING);
		$this->SetParameterType('htmlentities', CLEAN_INT);
	}

	public function InitializeAdmin()
	{
		$this->CreateParameter('mode', 'html', $this->Lang('help_param_mode'));
		$this->CreateParameter('theme', 'textmate', $this->Lang('help_param_theme'));
		$this->CreateParameter('width', '400', $this->Lang('help_param_width'));
		$this->CreateParameter('height', '400', $this->Lang('help_param_height'));
		$this->CreateParameter('divid', 'editor', $this->Lang('help_param_divid'));
		$this->CreateParameter('htmlentities', 0, $this->Lang('help_param_htmlentities'));
	}

	public function DoAction($name, $id, $params, $returnid = '')
	{
		$smarty = cmsms()->GetSmarty();
		
		$smarty->assignByRef($this->GetName(), $this);
		
		parent::DoAction($name, $id, $params, $returnid);
	}

	public function SyntaxTextarea($name = 'textarea', $syntax = 'html', $columns = '80', $rows = '15', $encoding = '', $content = '', $stylesheet = '', $addtext = '')
	{
		$this->syntaxactive = true;
		$smarty = cmsms()->GetSmarty();
		
		$smarty->assignByRef($this->GetName(), $this);
		$smarty->assign('textareaid', "ace_editor" . $this->noeditors);
		$smarty->assign('editorid', "ace-editor" . $this->noeditors);
		$smarty->assign('textareaname', $name);
		$smarty->assign('syntax_content', htmlspecialchars($content));
		$smarty->assign('ace_id', $this->noeditors);

		switch ($syntax) {
			case 'html':
				$smarty->assign('mode', 'smarty');
				$this->_htmlactive = true;
				break;
			case 'js':
			case 'javascript':
				$smarty->assign('mode', 'javascript');
				$this->_javascriptactive = true;
				break;
			case 'css':
				$smarty->assign('mode', 'css');
				$this->_cssactive = true;
				break;
			case 'php':
				$smarty->assign('mode', 'php');
				$this->_phpactive = true;
				break;
			case 'plain':
				$smarty->assign('mode', 'plain');
				$this->_plainactive = true;
				break;
			case 'xml':
				$smarty->assign('mode', 'xml');
				$this->_xmlactive = true;
				break; 
			case 'json':
				$smarty->assign('mode', 'json');
				$this->_jsonactive = true;
				break;
			default:
				$smarty->assign('mode', $this->AceGetPreference('mode'));
				$this->_defaultactive = true;
				break;
		}

		$this->noeditors++;
		
		return $this->ProcessTemplate('ace.tpl');
	}

	public function SyntaxGenerateHeader($htmlresult = '')
	{
		return <<<EOT
		<link rel="stylesheet" type="text/css" href="{$this->GetModuleURLPath()}/lib/css/aceUI.css" />
		<script src="{$this->GetModuleURLPath()}/lib/ace/ace.js"></script>
		<script src="{$this->GetModuleURLPath()}/lib/ace/keybinding-vim.js"></script>
		<script src="{$this->GetModuleURLPath()}/lib/ace/keybinding-emacs.js"></script>	
		<script src="{$this->GetModuleURLPath()}/lib/js/functions.js"></script>
EOT;
	}

	#---------------------
	# Module methods
	#--------------------- 

	final public function AceGetPreference($name, $default = '')
	{
		$userid = get_userid();
		$result = cms_userprefs::get_for_user($userid, $this->GetName() . '_' . $name);
		
		if ($result === '') 
			return $default;
				
		return $result;
	}
	
	final protected function AceSetPreference($name, $value)
	{
		$userid = get_userid();
		cms_userprefs::set_for_user($userid, $this->GetName() . '_' . $name, $value);	
	}
	
	final public function AceGetModes()
	{
		$modes = array();
		foreach(glob(cms_join_path($this->GetModulePath(), 'lib', 'ace', 'modes') . DS . '*.js') as $filename) {

			$mode = basename($filename);
			$mode = explode('.', $mode);
			$mode = explode('-', $mode[0]);
		
			$modes[$mode[1]] = $this->Lang($mode[1]);
		}
		
		return $modes;
	}
	
	final public function AceGetThemes()
	{
		$themes = array();
		foreach(glob(cms_join_path($this->GetModulePath(), 'lib', 'ace', 'themes') . DS . '*.js') as $filename) {
		
			$theme = basename($filename);
			$theme = explode('.', $theme);
			$theme = explode('-', $theme[0]);
			
			$themes[$theme[1]] = $this->Lang($theme[1]);
		}
		
		return $themes;
	}
}
?>