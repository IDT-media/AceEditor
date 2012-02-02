<?php
	if (isset($params['example_syntax'])) 
	{
		$this -> SetPreference('example_syntax', $params['example_syntax']);
	}
		$this -> smarty -> assign('startform', $this -> CreateFormStart($id, 'savefrontendsettings', $returnid));
		$this -> smarty -> assign('endform', $this -> CreateFormEnd());
		$this -> smarty -> assign('settingstext', $this -> Lang('frontend_head_settings'));
		$this -> smarty -> assign('syntax_settingstext', $this -> Lang('frontend_syntaxarea_settings'));
		$this -> smarty -> assign('head_description', $this -> Lang('head_description'));
		$this -> smarty -> assign('content_description', $this -> Lang('content_description'));
		
		$smarty->assign('width_title', $this -> Lang('frontend_width_title'));
		$smarty->assign('width_input', $this->CreateInputText($id, 'frontend_width', $this -> GetPreference('frontend_width', '500'), 10, 255));		
		$smarty->assign('height_title', $this -> Lang('frontend_height_title'));
		$smarty->assign('height_input', $this->CreateInputText($id, 'frontend_height', $this -> GetPreference('frontend_height', '400'), 10, 255));
		
		/* modes */
		$this -> smarty -> assign('frontend_syntax_mode', $this -> Lang('syntax_mode'));
			$modes = array(
				$this -> Lang('js') => 'javascript', 
				$this -> Lang('plain') => 'plain', 
				$this -> Lang('svg') => 'svg', 
				$this -> Lang('html') => 'html',
				$this -> Lang('css') => 'css',
				$this -> Lang('scss') => 'scss',
				$this -> Lang('coffee') => 'coffee',
				$this -> Lang('json') => 'json',
				$this -> Lang('python') => 'python',
				$this -> Lang('ruby') => 'ruby',
				$this -> Lang('perl') => 'perl',
				$this -> Lang('php') => 'php',
				$this -> Lang('java') => 'java',
				$this -> Lang('csharp') => 'csharp',
				$this -> Lang('c_cpp') => 'c_cpp',
				$this -> Lang('clojure') => 'clojure',
				$this -> Lang('ocaml') => 'ocaml',
				$this -> Lang('textile') => 'textile',
				$this -> Lang('groovy') => 'groovy',
				$this -> Lang('scala') => 'scala'
				);	
		// head multiselect		
		$this -> smarty -> assign('frontend_syntax_modeinput', $this -> CreateInputSelectList($id, 'frontend_mode[]', $modes, explode(',', $this -> GetPreference('frontend_mode', 'html')), 5));
		// syntaxarea pref
		$this -> smarty -> assign('frontend_syntaxarea_modeinput', $this -> CreateInputDropdown($id, 'frontend_syntaxarea_mode', $modes, -1, $this -> GetPreference('frontend_syntaxarea_mode', 'html')));		
		
		/* themes */		
		$this -> smarty -> assign('themetext', $this -> Lang('themes'));
			$themes = array(
				$this -> Lang('chrome') => 'chrome', 
				$this -> Lang('clouds') => 'clouds', 
				$this -> Lang('clouds_midnight') => 'clouds_midnight', 
				$this -> Lang('cobalt') => 'cobalt', 
				$this -> Lang('crimson_editor') => 'crimson_editor',
				$this -> Lang('dawn') => 'dawn',
				$this -> Lang('dreamweaver') => 'dreamweaver', 
				$this -> Lang('eclipse') => 'eclipse',
				$this -> Lang('idle_fingers') => 'idle_fingers',
				$this -> Lang('kr_theme') => 'kr_theme',
				$this -> Lang('merbivore') => 'merbivore',
				$this -> Lang('merbivore_soft') => 'merbivore_soft',
				$this -> Lang('mono_industrial') => 'mono_industrial',
				$this -> Lang('monokai') => 'monokai',
				$this -> Lang('pastel_on_dark') => 'pastel_on_dark',
				$this -> Lang('solarized_dark') => 'solarized_dark',
				$this -> Lang('solarized_light') => 'solarized_light',
				$this -> Lang('textmate') => 'textmate',
				$this -> Lang('twilight') => 'twilight',
				$this -> Lang('vibrant_ink') => 'vibrant_ink'		
			);
		// head themes
		$this -> smarty -> assign('frontend_themeinput', $this -> CreateInputSelectList($id, 'frontend_theme[]', $themes, explode(',', $this -> GetPreference('frontend_theme', 'textmate')), 5));
		// syntaxarea theme	
		$this -> smarty -> assign('themeinput', $this -> CreateInputDropdown($id, 'frontend_syntaxarea_theme', $themes, -1, $this -> GetPreference('frontend_syntaxarea_theme', 'textmate')));
		
		/* font size */
		$this -> smarty -> assign('fontsizetext', $this -> Lang('font_size'));
			$fonts = array(
				'10px' => '10px', 
				'11px' => '11px', 
				'12px' => '12px', 
				'14px' => '14px',
				'16px' => '16px',
				'20px' => '20px',
				'24px' => '24px'
			);
		$this -> smarty -> assign('fontsizeinput', $this -> CreateInputDropdown($id, 'frontend_fontsize', $fonts, -1, $this -> GetPreference('frontend_fontsize', '12px')));		
		// submit settings
		$this -> smarty -> assign('frontendsubmit', $this -> CreateInputSubmit($id, 'frontendsubmit', $this -> Lang('savesettings')));
		
	/* ProcessTempalte */
	echo $this -> ProcessTemplate('frontendsettings.tpl');

?>	