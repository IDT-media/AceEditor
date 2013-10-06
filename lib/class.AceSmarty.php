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

class AceSmarty {

	private function __construct() {}


	static final public function code_block($params, $content, &$smarty, $repeat) {
		
		$mod = cms_utils::get_module('AceEditor');
		
		$output = '';
		$block = '';
		
		if (isset($content)) {

			$block = array(
				'divid' => isset($params['divid']) ? $params['divid'] : 'ace-code',
				'mode' => isset($params['mode'])  ? $params['mode'] : $mod->GetPreference('frontend_syntaxarea_mode'),
				'theme' => isset($params['theme'])  ? $params['theme'] : $mod->GetPreference('frontend_syntaxarea_theme'),
				'width' => isset($params['width'])  ? $params['width'] : $mod->GetPreference('frontend_width'),
				'height' => isset($params['width'])  ? $params['height'] : $mod->GetPreference('frontend_height'),
				'fontsize' => $mod->GetPreference('frontend_fontsize'),
				'auto_height' => $mod->GetPreference('frontend_auto_height'),
				'width_units' => $mod->GetPreference('frontend_width_units', 'px'),
				'height_units' => $mod->GetPreference('frontend_height_units', 'px'),
				'content' => isset($params['htmlentities']) ? htmlentities($content) : $content
			);
			
			$smarty->assign('ace_block', $block);
			
			return $smarty->fetch(cms_join_path($mod->GetModulePath(), 'templates/') . 'ace_code.tpl');
		}

	}
	
	static final public function head_output($params, &$smarty) {
		
		$mod = cms_utils::get_module('AceEditor');
		
		return <<<EOT
		<script type="text/javascript" src="{$mod->GetModuleURLPath()}/lib/ace/ace.js"></script>
		<script type="text/javascript"src="{$mod->GetModuleURLPath()}/lib/js/aceInit.js"></script>
		<link rel="stylesheet" type="text/css" href="{$mod->GetModuleURLPath()}/lib/css/aceLayout.css" media="screen" />
EOT;
	}	

} // end of class
?>