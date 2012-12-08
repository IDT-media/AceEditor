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

if (!is_object(cmsms()))
	exit;

if (!($this->CheckPermission('AceEditor User Preference') || $this->CheckPermission('Modify Templates'))) {
	echo $this->ShowErrors($this->Lang('needpermission', array(
		'Modify Site Preferences'
	)));
	return;
}

$userid = get_userid();

if (!empty($params['width'])) {
	cms_userprefs::set_for_user($userid, $this->GetName() . '_width', $params['width']);
}

if (!empty($params['height'])) {
	cms_userprefs::set_for_user($userid, $this->GetName() . '_height', $params['height']);
}

cms_userprefs::set_for_user($userid, $this->GetName() . '_enable_ie', (isset($params['enable_ie']) ? 1 : 0));
cms_userprefs::set_for_user($userid, $this->GetName() . '_mode', $params['mode']);
cms_userprefs::set_for_user($userid, $this->GetName() . '_theme', $params['theme']);
cms_userprefs::set_for_user($userid, $this->GetName() . '_fontsize', $params['fontsize']);
cms_userprefs::set_for_user($userid, $this->GetName() . '_full_line', (isset($params['full_line']) ? 1 : 0));
cms_userprefs::set_for_user($userid, $this->GetName() . '_highlight_active', (isset($params['highlight_active']) ? 1 : 0));
cms_userprefs::set_for_user($userid, $this->GetName() . '_show_invisibles', (isset($params['show_invisibles']) ? 1 : 0));
cms_userprefs::set_for_user($userid, $this->GetName() . '_persistent_hscroll', (isset($params['persistent_hscroll']) ? 1 : 0));
cms_userprefs::set_for_user($userid, $this->GetName() . '_keybinding', (isset($params['keybinding']) ? 1 : 0));
cms_userprefs::set_for_user($userid, $this->GetName() . '_soft_wrap', $params['soft_wrap']);
cms_userprefs::set_for_user($userid, $this->GetName() . '_show_gutter', (isset($params['show_gutter']) ? 1 : 0));
cms_userprefs::set_for_user($userid, $this->GetName() . '_print_margin', (isset($params['print_margin']) ? 1 : 0));
cms_userprefs::set_for_user($userid, $this->GetName() . '_soft_tab', (isset($params['soft_tab']) ? 1 : 0));
cms_userprefs::set_for_user($userid, $this->GetName() . '_highlight_selected', (isset($params['highlight_selected']) ? 1 : 0));
cms_userprefs::set_for_user($userid, $this->GetName() . '_enable_behaviors', (isset($params['enable_behaviors']) ? 1 : 0));

// redirect to tab
$params = array(
	'module_message' => $this->Lang('settingssaved'),
	'active_tab' => 'settings'
);
$this->Redirect($id, 'defaultadmin', '', $params);
?>