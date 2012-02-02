<?php
if (!isset($gCms)) 
exit;

	if (!$this -> CheckPermission('Modify Site Preferences'))
	{
		echo $this -> ShowErrors($this -> Lang('needpermission', array('Modify Site Preferences')));
		return;
	}
	
 	if (!empty($params['active_tab'])) {
	$tab = $params['active_tab'];
	} else {
		$tab = 'settings';
	}	
	/* TabHeaders */
	echo $this -> StartTabHeaders();
		// backend
		echo $this -> SetTabHeader('settings', $this -> Lang('settings_tab'), ($tab == 'settings'));
		// frontend
		echo $this -> SetTabHeader('frontendsettings', $this -> Lang('frontendsettings_tab'), ($tab == 'frontendsettings'));
	echo $this -> EndTabHeaders();
	
	/* TabContent */
	echo $this -> StartTabContent();
		// backend
		echo $this -> StartTab('settings', $params);
		include(dirname(__FILE__).'/function.admin_prefstab.php');
		echo $this -> EndTab();
		// frontend
		echo $this -> StartTab('frontendsettings', $params);
		include(dirname(__FILE__).'/function.admin_frontendprefstab.php');
		echo $this -> EndTab();
	echo $this -> EndTabContent();
?>