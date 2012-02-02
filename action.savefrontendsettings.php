<?php
if (!isset($gCms)) 
exit;

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