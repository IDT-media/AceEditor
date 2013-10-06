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

#---------------------
# Init
#---------------------
$fonts = array(
	'10px' => '10',
	'11px' => '11',
	'12px' => '12',
	'13px' => '13',
	'14px' => '14',
	'16px' => '16',
	'18px' => '18',
	'20px' => '20',
	'24px' => '24'
);

$units = array(
	'px' => 'px',
	'%' => '%',
	'em' => 'em'
);

#---------------------
# Smarty processing
#---------------------

$smarty->assign('startform', $this->CreateFormStart($id, 'savefrontendsettings', $returnid));
$smarty->assign('endform', $this->CreateFormEnd());
$smarty->assign('fontsizeinput', $fonts);
$smarty->assign('unitsinput', $units);
// submit settings
$smarty->assign('frontendsubmit', $this->CreateInputSubmit($id, 'frontendsubmit', $this->Lang('savesettings')));

/* ProcessTempalte */
echo $this->ProcessTemplate('frontendsettings.tpl');

?>