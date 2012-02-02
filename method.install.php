<?php
if (!isset($gCms)) exit;

	// Backend editor prefs
	$this->SetPreference('mode','html');
	$this->SetPreference('theme','textmate');
	$this->SetPreference('fontsize','12px');
	$this->SetPreference('full_line',1);
	$this->SetPreference('enable_ie',0);	
	$this->SetPreference('show_invisibles',0);
	$this->SetPreference('soft_wrap','80,80');
	$this->SetPreference('highlight_active',1);
	$this->SetPreference('persistent_hscroll',1);
	$this->SetPreference('key_binding','ace');
	$this->SetPreference('soft_tab',1);
	$this->SetPreference('print_margin',0);	
	$this->SetPreference('highlight_selected',1);
	$this->SetPreference('enable_behaviors',1);

	// Frontend syntaxarea prefs
	$this->SetPreference('frontend_mode','html');
	$this->SetPreference('frontend_syntaxarea_mode','html');
	$this->SetPreference('frontend_syntaxarea_theme','textmate');		
	$this->SetPreference('frontend_theme','textmate');
	$this->SetPreference('frontend_fontsize','12px');
	$this->SetPreference('frontend_width','500');
	$this->SetPreference('frontend_height','400');	
		
?>