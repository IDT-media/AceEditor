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

if (!is_object(cmsms()))
	exit;

if (!$this->CheckPermission('Modify Site Preferences')) {
	echo $this->ShowErrors($this->Lang('needpermission', array(
		'Modify Site Preferences'
	)));
	return;
}

$this->SetPreference('frontend_width', $params['frontend_width']);
$this->SetPreference('frontend_width_units', $params['frontend_width_units']);
$this->SetPreference('frontend_height', $params['frontend_height']);
$this->SetPreference('frontend_height_units', $params['frontend_height_units']);
$this->SetPreference('frontend_auto_height', isset($params['frontend_auto_height']) ? 1 : 0);
$this->SetPreference('frontend_syntaxarea_mode', $params['frontend_syntaxarea_mode']);
$this->SetPreference('frontend_syntaxarea_theme', $params['frontend_syntaxarea_theme']);
$this->SetPreference('frontend_fontsize', $params['frontend_fontsize']);

// redirect to tab
$params = array(
	'module_message' => $this->Lang('settingssaved')
);

$this->RedirectToAdminTab('frontendsettings', $params, 'defaultadmin');
?>