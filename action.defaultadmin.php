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

	if (!$this->CheckPermission('Modify Site Preferences')||!$this->CheckPermission('AceEditor User Preference')||!$this->CheckPermission('Modify Templates')) {
	    echo $this->ShowErrors($this->Lang('needpermission', array('Modify Site Preferences')));
		return;
	}
	
    $userid = get_userid(); // get user id
    
 	if (!empty($params['active_tab'])) {
	$tab = $params['active_tab'];
	} else {
		$tab = 'settings';
	}	
	/* TabHeaders */
	echo $this->StartTabHeaders();
		// backend
		if ($this->CheckPermission('Modify Site Preferences')||$this->CheckPermission('AceEditor User Preference')||$this->CheckPermission('Modify Templates')) {
		    echo $this->SetTabHeader('settings', $this->Lang('settings_tab'), ($tab == 'settings'));
        }
		// frontend
		echo $this->SetTabHeader('frontendsettings', $this->Lang('frontendsettings_tab'), ($tab == 'frontendsettings'));
	echo $this->EndTabHeaders();
	
	/* TabContent */
	echo $this->StartTabContent();
		// backend
		echo $this->StartTab('settings', $params);
		include(dirname(__FILE__).'/function.admin_prefstab.php');
		echo $this->EndTab();
		// frontend
		echo $this->StartTab('frontendsettings', $params);
		include(dirname(__FILE__).'/function.admin_frontendprefstab.php');
		echo $this->EndTab();
	echo $this->EndTabContent();
?>