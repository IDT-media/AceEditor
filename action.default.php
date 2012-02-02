<?php
if (!isset($gCms))
	exit ;

$divid = '';
$fontsize = '12px';
$theme = 'twilight';

if (!isset($params['divid']))
	return;
	// id of wrapping element
	$divid = trim($params['divid']);
	// fontsize
	$fontsize = $this->GetPreference('frontend_fontsize');
	// width of wrapping element
	$width = get_parameter_value($params,'width',$this->GetPreference('frontend_width'));
	// height of wrapping element
	$height = get_parameter_value($params,'height',$this->GetPreference('frontend_height'));
	// mode for current area
	$mode = get_parameter_value($params,'mode', $this->GetPreference('frontend_syntaxarea_mode'));
	// theme for current area
	$theme = get_parameter_value($params,'theme', $this->GetPreference('frontend_syntaxarea_theme'));

	$smarty -> assign('divid', $divid);
	if ($mode)
		$smarty -> assign('mode', $mode);
	if ($theme)
		$smarty -> assign('theme', $theme);
	if ($fontsize)
		$smarty -> assign('fontsize', $fontsize);
	if ($width)
		$smarty -> assign('width', $width);
	if ($height)
		$smarty -> assign('height', $height);
	
	$smarty -> assign('ace_url', $this -> GetModuleURLPath());
	// output template
	echo $this -> ProcessTemplate('orig_default.tpl');
?>