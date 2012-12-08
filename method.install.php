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

// Backend editor prefs
$this->SetPreference('width', '80');
$this->SetPreference('height', '40');
$this->SetPreference('mode', 'html');
$this->SetPreference('theme', 'textmate');
$this->SetPreference('fontsize', '12px');
$this->SetPreference('full_line', 1);
$this->SetPreference('enable_ie', 0);
$this->SetPreference('show_invisibles', 0);
$this->SetPreference('soft_wrap', '80,80');
$this->SetPreference('highlight_active', 1);
$this->SetPreference('persistent_hscroll', 1);
$this->SetPreference('key_binding', 'ace');
$this->SetPreference('soft_tab', 1);
$this->SetPreference('print_margin', 0);
$this->SetPreference('highlight_selected', 1);
$this->SetPreference('enable_behaviors', 1);

// Frontend syntaxarea prefs
$this->SetPreference('frontend_mode', 'html');
$this->SetPreference('frontend_syntaxarea_mode', 'html');
$this->SetPreference('frontend_syntaxarea_theme', 'textmate');
$this->SetPreference('frontend_theme', 'textmate');
$this->SetPreference('frontend_fontsize', '12px');
$this->SetPreference('frontend_width', '500');
$this->SetPreference('frontend_height', '400');

// permissions
$this->CreatePermission('AceEditor User Preference', 'AceEditor User Preference');

?>