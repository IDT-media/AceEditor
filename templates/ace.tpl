<div class="ace_wrapper">
    <div class="{$textareaid}_toolbar">
        <div class="ace_toolbar">
            <input type="radio" id="{$textareaid}_on" name="radio_{$ace_id}" checked="checked" />
            <label for="{$textareaid}_on">{$ace_mod->Lang('on')}</label>
            <input type="radio" id="{$textareaid}_off" name="radio_{$ace_id}" />
            <label for="{$textareaid}_off">{$ace_mod->Lang('off')}</label>
            <label>{$ace_mod->Lang('current_line')}:</label>
            <input type="text" id="{$textareaid}_linenum" class="input wide" name="ace_linenum" value="" readonly="readonly" />
            <label>{$ace_mod->Lang('total_lines')}:</label>
            <input type="text" id="{$textareaid}_totallines" class="input" name="ace_goline" value="" readonly="readonly" />
            <label>{$ace_mod->Lang('go_line')}:</label>
            <input type="text" id="{$textareaid}_goline" class="input" name="ace_goline" value="" />
            <label>{$ace_mod->Lang('keybindings')}:</label>
            <input type="radio" id="{$textareaid}_ace" name="radio2_{$ace_id}" checked="checked" value="null" />
            <label for="{$textareaid}_ace">{$ace_mod->Lang('ace')}</label>
            <input type="radio" id="{$textareaid}_vim" name="radio2_{$ace_id}" value="vim" />
            <label for="{$textareaid}_vim">{$ace_mod->Lang('vim')}</label>
            <input type="radio" id="{$textareaid}_emacs" name="radio2_{$ace_id}" value="emacs" />
            <label for="{$textareaid}_emacs">{$ace_mod->Lang('emacs')}</label>
        </div>
    </div>
    <textarea 
        id="{$textareaid}" 
        data-ace-editor-id="{$editorid}"
        data-ace-width="{$ace_mod->AceGetPreference('width')}"
        data-ace-height="{$ace_mod->AceGetPreference('height')}"
        data-ace-selected-theme="{$ace_mod->AceGetPreference('theme')}"
        data-ace-selected-mode="{$ace_mod->AceGetPreference('mode')}"
        data-ace-font-size="{$ace_mod->AceGetPreference('fontsize')}"
        data-ace-soft-wrap="{$ace_mod->AceGetPreference('soft_wrap')}"
        data-ace-selection-style="{$ace_mod->AceGetPreference('full_line')}"
        data-ace-highlight-line="{$ace_mod->AceGetPreference('highlight_active')}"
        data-ace-highlight-word="{$ace_mod->AceGetPreference('highlight_selected')}"
        data-ace-show-invisibles="{$ace_mod->AceGetPreference('show_invisibles')}"
        data-ace-hscroll-bar="{$ace_mod->AceGetPreference('persistent_hscroll')}"
        data-ace-show-gutter="{$ace_mod->AceGetPreference('show_gutter')}"
        data-ace-soft-tab="{$ace_mod->AceGetPreference('soft_tab')}"
        data-ace-behaviours-enabled="{$ace_mod->AceGetPreference('enable_behaviors')}"
        data-ace-print-margin="{$ace_mod->AceGetPreference('print_margin')}"
        class="ace_editor_textarea" 
        name="{$textareaname}">{$syntax_content}</textarea>
</div>
