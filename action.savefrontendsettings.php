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

if (!is_object(cmsms())) exit;

	if (!$this->CheckPermission('Modify Site Preferences')) {
		echo $this->ShowErrors($this->Lang('needpermission', array('Modify Site Preferences')));
		return;
	}

	if(isset($params['frontend_width'])) 
	$this->SetPreference('frontend_width', $params['frontend_width']);	

	if(isset($params['frontend_height'])) 
	$this->SetPreference('frontend_height', $params['frontend_height']);		

	if(isset($params['frontend_mode'])) 
	$this->SetPreference('frontend_mode', implode(',', $params['frontend_mode']));

	if(isset($params['frontend_syntaxarea_mode']))
	$this->SetPreference('frontend_syntaxarea_mode', $params['frontend_syntaxarea_mode']);	

	if(isset($params['frontend_theme'])) 
	$this->SetPreference('frontend_theme', implode(',', $params['frontend_theme']));	
	
	if(isset($params['frontend_syntaxarea_theme']))
	$this->SetPreference('frontend_syntaxarea_theme', $params['frontend_syntaxarea_theme']);
	
	if(isset($params['frontend_fontsize']))
	$this->SetPreference('frontend_fontsize', $params['frontend_fontsize']);					

	// redirect to tab			
	$params = array('module_message' => $this->Lang('settingssaved'), 'active_tab' => 'frontendsettings');
	$this->Redirect($id, 'defaultadmin', '', $params);

?>