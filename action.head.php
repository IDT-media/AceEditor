<?php
if (!isset($gCms))
	exit ;

// initialize
$this -> divid = '';
// selected themes
$this -> themes = get_parameter_value($params, 'themes', $this -> GetPreference('frontend_theme'));
// selected modes
$this -> modes = get_parameter_value($params, 'modes', $this -> GetPreference('frontend_mode'));

	if (isset($params['divid']))
		$this -> divid = trim($params['divid']);
	if (!is_array($this -> mode)) {
		$this -> modes = explode(',', $this -> modes);
	}
	if (isset($this -> themes) && !is_array($this -> themes)) {
		$this -> themes = explode(',', $this -> themes);
	}
	if (isset($this -> themes)) {
		$smarty -> assign('themes', $this -> themes);
	}

	$smarty -> assign('modes', $this -> modes);
	$smarty -> assign('ace_url', $this -> GetModuleURLPath());
	// output template
	echo $this -> ProcessTemplate('orig_head.js');
?>