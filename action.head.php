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

// initialize
$this->divid = '';
// selected themes
$this->themes = get_parameter_value($params, 'themes', $this->GetPreference('frontend_theme'));
// selected modes
$this->modes = get_parameter_value($params, 'modes', $this->GetPreference('frontend_mode'));

	if (isset($params['divid']))
		$this->divid = trim($params['divid']);
	if (!is_array($this->mode)) {
		$this->modes = explode(',', $this->modes);
	}
	if (isset($this->themes) && !is_array($this->themes)) {
		$this->themes = explode(',', $this->themes);
	}
	if (isset($this->themes)) {
		$smarty->assign('themes', $this->themes);
	}

	$smarty->assign('modes', $this->modes);
	$smarty->assign('ace_url', $this->GetModuleURLPath());
	// output template
	echo $this->ProcessTemplate('orig_head.js');
?>