<?php
if (!is_object(cmsms())) exit;

if (!$this->CheckPermission('Modify Site Preferences')) {
	echo $this->ShowErrors($this->Lang('needpermission', array('Modify Site Preferences')));
	return;
}

if(!empty($params['width']))
{
	$this->SetPreference('width', $params['width']);
}

if(!empty($params['height']))
{
	$this->SetPreference('height', $params['height']);
}

$this->SetPreference('enable_ie', (isset($params['enable_ie']) ? 1 : 0));
$this->SetPreference('use_uncompressed', (isset($params['use_uncompressed']) ? 1 : 0));
$this->SetPreference('mode', $params['mode']);
$this->SetPreference('theme', $params['theme']);
$this->SetPreference('fontsize', $params['fontsize']);	
$this->SetPreference('full_line', (isset($params['full_line']) ? 1 : 0));
$this->SetPreference('highlight_active', (isset($params['highlight_active']) ? 1 : 0));
$this->SetPreference('show_invisibles', (isset($params['show_invisibles']) ? 1 : 0));
$this->SetPreference('persistent_hscroll', (isset($params['persistent_hscroll']) ? 1 : 0));
$this->SetPreference('keybinding', (isset($params['keybinding']) ? 1 : 0));
$this->SetPreference('soft_wrap', $params['soft_wrap']);
$this->SetPreference('show_gutter', (isset($params['show_gutter']) ? 1 : 0));
$this->SetPreference('print_margin', (isset($params['print_margin']) ? 1 : 0));
$this->SetPreference('soft_tab', (isset($params['soft_tab']) ? 1 : 0));
$this->SetPreference('highlight_selected', (isset($params['highlight_selected']) ? 1 : 0));
$this->SetPreference('enable_behaviors', (isset($params['enable_behaviors']) ? 1 : 0));					

// redirect to tab
$params = array('module_message' => $this->Lang('settingssaved'), 'active_tab' => 'settings');
$this->Redirect($id, 'defaultadmin', '', $params);
?>