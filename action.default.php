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

$divid    = '';
$fontsize = '12px';
$theme    = 'twilight';

if (!isset($params['divid'])) {
	return;
}
// id of wrapping element
$divid    = trim($params['divid']);
// fontsize
$fontsize = $this->GetPreference('frontend_fontsize');
// width of wrapping element
$width    = get_parameter_value($params, 'width', $this->GetPreference('frontend_width'));
// height of wrapping element
$height   = get_parameter_value($params, 'height', $this->GetPreference('frontend_height'));
// mode for current area
$mode     = get_parameter_value($params, 'mode', $this->GetPreference('frontend_syntaxarea_mode'));
// theme for current area
$theme    = get_parameter_value($params, 'theme', $this->GetPreference('frontend_syntaxarea_theme'));

$smarty->assign('divid', $divid);
if ($mode)
	$smarty->assign('mode', $mode);
if ($theme)
	$smarty->assign('theme', $theme);
if ($fontsize)
	$smarty->assign('fontsize', $fontsize);
if ($width)
	$smarty->assign('width', $width);
if ($height)
	$smarty->assign('height', $height);

$smarty->assign('ace_url', $this->GetModuleURLPath());
// output template
echo $this->ProcessTemplate('orig_default.tpl');
?>