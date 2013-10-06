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

if( version_compare($oldversion, '0.2') < 0 ) {
	$this->SetPreference('enable_ie', 0);
}

if( version_compare($oldversion, '0.2.2') < 0 ) {
	// permissions
	$this->CreatePermission('AceEditor User Preference', 'AceEditor User Preference');
}

if( version_compare($oldversion, '0.2.5') < 0 ) {
	// remove User preferences from DB
	$this->RemovePreference('width');
	$this->RemovePreference('height');
	$this->RemovePreference('mode');
	$this->RemovePreference('theme');
	$this->RemovePreference('fontsize');
	$this->RemovePreference('full_line');
	$this->RemovePreference('enable_ie');
	$this->RemovePreference('show_invisibles');
	$this->RemovePreference('soft_wrap');
	$this->RemovePreference('highlight_active');
	$this->RemovePreference('persistent_hscroll');
	$this->RemovePreference('key_binding');
	$this->RemovePreference('soft_tab');
	$this->RemovePreference('print_margin');
	$this->RemovePreference('highlight_selected');
	$this->RemovePreference('enable_behaviors');
	$this->RemovePreference('frontend_mode');
	$this->RemovePreference('frontend_theme');
	
	// add preference
	$this->SetPreference('frontend_auto_height', 0);

	// Register as plugin
	$this->RegisterModulePlugin(TRUE);
	$this->RegisterSmartyPlugin('ace_code','block', array('AceSmarty', 'code_block'));
	$this->RegisterSmartyPlugin('ace_head','function', array('AceSmarty', 'head_output'));
}
?>