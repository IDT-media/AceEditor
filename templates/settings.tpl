{strip}
{$startform}
<fieldset>
    <legend>
        {$AceEditor->Lang('settings_tab')}
    </legend>
    <div class="pageoverflow">
        <p class="pagetext"> {$AceEditor->Lang('width_title')} </p>
        <p class="pageinput">
            <input type="text" id="{$actionid}width" name="{$actionid}width" size="5" maxlength="255" value="{$AceEditor->AceGetPreference('width', '100')}" />
            <select name="{$actionid}width_units" id="{$actionid}width_units">
                {html_options options=$unitsinput selected=$AceEditor->AceGetPreference('width_units', '%')}
            </select>
            
        </p>
    </div>
    <div class="pageoverflow">
        <p class="pagetext"> {$AceEditor->Lang('height_title')} </p>
        <p class="pageinput">
            <input type="text" id="{$actionid}height" name="{$actionid}height" size="5" maxlength="255" value="{$AceEditor->AceGetPreference('height', '600')}" />
            <select name="{$actionid}height_units" id="{$actionid}height_units">
                {html_options options=$unitsinput selected=$AceEditor->AceGetPreference('height_units', 'px')}
            </select>
            <br />
            <input type="checkbox" id="{$actionid}auto_height" name="{$actionid}auto_height" value="{$AceEditor->AceGetPreference('auto_height', 0)}"{if $AceEditor->AceGetPreference('auto_height') == 1} checked="checked"{/if} /> {$AceEditor->Lang('auto_height')}
        </p>
    </div>
    <div class="pageoverflow">
        <p class="pagetext"> {$AceEditor->Lang('syntax_mode')} </p>
        <p class="pageinput">
            <select name='{$actionid}mode' id='{$actionid}mode' onchange="this.form.submit()">
                {html_options options=$AceEditor->AceGetModes() selected=$AceEditor->AceGetPreference('mode', 'html')}
            </select>
        </p>
    </div>
    <div class="pageoverflow">
        <p class="pagetext"> {$AceEditor->Lang('themes')} </p>
        <p class="pageinput">
            <select name="{$actionid}theme" id="{$actionid}theme" onchange="this.form.submit()">
                {html_options options=$AceEditor->AceGetThemes() selected=$AceEditor->AceGetPreference('theme', 'twilight')}
            </select>
        </p>
    </div>
    <div class="pageoverflow">
        <p class="pagetext"> {$AceEditor->Lang('font_size')} </p>
        <p class="pageinput">
            <select name="{$actionid}fontsize" id="{$actionid}fontsize">
                {html_options options=$fontsizeinput selected=$AceEditor->AceGetPreference('fontsize', '13px')}
            </select>
        </p>
    </div>
    <div class="pageoverflow">
        <p class="pagetext"> {$AceEditor->Lang('full_line')} </p>
        <p class="pageinput">
            <input type="checkbox" id="{$actionid}full_line" name="{$actionid}full_line" value="{$AceEditor->AceGetPreference('full_line', 1)}" {if $AceEditor->AceGetPreference('full_line') == '' || $AceEditor->AceGetPreference('full_line') == 1}checked{/if} />
        </p>
    </div>
    <div class="pageoverflow">
        <p class="pagetext"> {$AceEditor->Lang('highlight_active')} </p>
        <p class="pageinput">
            <input type="checkbox" id="{$actionid}highlight_active" name="{$actionid}highlight_active" value="{$AceEditor->AceGetPreference('highlight_active', 1)}"{if $AceEditor->AceGetPreference('highlight_active') == '' || $AceEditor->AceGetPreference('highlight_active') == 1} checked="checked"{/if} />
        </p>
    </div>
    <div class="pageoverflow">
        <p class="pagetext"> {$AceEditor->Lang('show_invisibles')} </p>
        <p class="pageinput">
            <input type="checkbox" id="{$actionid}show_invisibles" name="{$actionid}show_invisibles" value="{$AceEditor->AceGetPreference('show_invisibles', 0)}"{if $AceEditor->AceGetPreference('show_invisibles') == 1} checked="checked"{/if} />
        </p>
    </div>
    <div class="pageoverflow">
        <p class="pagetext"> {$AceEditor->Lang('persistent_hscroll')} </p>
        <p class="pageinput">
            <input type="checkbox" id="{$actionid}persistent_hscroll" name="{$actionid}persistent_hscroll" value="{$AceEditor->AceGetPreference('persistent_hscroll', 0)}"{if $AceEditor->AceGetPreference('persistent_hscroll') == 1} checked="checked"{/if} />
        </p>
    </div>
    <div class="pageoverflow">
        <p class="pagetext"> {$AceEditor->Lang('soft_wrap')} </p>
        <p class="pageinput">
            <select name="{$actionid}soft_wrap" id="{$actionid}soft_wrap">
                {html_options options=$soft_wrapinput selected=$AceEditor->AceGetPreference('soft_wrap', '80')}
            </select>
        </p>
    </div>
    <div class="pageoverflow">
        <p class="pagetext"> {$AceEditor->Lang('show_gutter')} </p>
        <p class="pageinput">
            <input type="checkbox" id="{$actionid}show_gutter" name="{$actionid}show_gutter" value="{$AceEditor->AceGetPreference('show_gutter', 1)}"{if $AceEditor->AceGetPreference('show_gutter') == '' || $AceEditor->AceGetPreference('show_gutter') == 1} checked="checked"{/if} />
        </p>
    </div>
    <div class="pageoverflow">
        <p class="pagetext"> {$AceEditor->Lang('wrap_line')} </p>
        <p class="pageinput">
            <input type="checkbox" id="{$actionid}wrap_line" name="{$actionid}wrap_line" value="{$AceEditor->AceGetPreference('wrap_line', 1)}"{if $AceEditor->AceGetPreference('wrap_line') == '' || $AceEditor->AceGetPreference('wrap_line') == 1} checked="checked"{/if} />
        </p>
    </div>
    <div class="pageoverflow">
        <p class="pagetext"> {$AceEditor->Lang('print_margin')} </p>
        <p class="pageinput">
            <input type="checkbox" id="{$actionid}print_margin" name="{$actionid}print_margin" value="{$AceEditor->AceGetPreference('print_margin', 0)}"{if $AceEditor->AceGetPreference('print_margin') == 1} checked="checked"{/if} />
        </p>
    </div>
    <div class="pageoverflow">
        <p class="pagetext"> {$AceEditor->Lang('soft_tab')} </p>
        <p class="pageinput">
            <input type="checkbox" id="{$actionid}soft_tab" name="{$actionid}soft_tab" value="{$AceEditor->AceGetPreference('soft_tab', 1)}"{if $AceEditor->AceGetPreference('soft_tab') == '' || $AceEditor->AceGetPreference('soft_tab') == 1} checked="checked"{/if} />
        </p>
    </div>
    <div class="pageoverflow">
        <p class="pagetext"> {$AceEditor->Lang('tab_size')} </p>
        <p class="pageinput">
            <select name="{$actionid}tab_size" id="{$actionid}tab_size">
                {html_options options=$tab_sizeinput selected=$AceEditor->AceGetPreference('tab_size', '4')}
            </select>
        </p>
    </div>
    <div class="pageoverflow">
        <p class="pagetext"> {$AceEditor->Lang('highlight_selected')} </p>
        <p class="pageinput">
            <input type="checkbox" id="{$actionid}highlight_selected" name="{$actionid}highlight_selected" value="{$AceEditor->AceGetPreference('highlight_selected', 1)}"{if $AceEditor->AceGetPreference('highlight_selected') == '' || $AceEditor->AceGetPreference('highlight_selected') == 1} checked="checked"{/if} />
        </p>
    </div>
    <div class="pageoverflow">
        <p class="pagetext"> {$AceEditor->Lang('enable_behaviors')} </p>
        <p class="pageinput">
            <input type="checkbox" id="{$actionid}enable_behaviors" name="{$actionid}enable_behaviors" value="{$AceEditor->AceGetPreference('enable_behaviors', 1)}"{if $AceEditor->AceGetPreference('enable_behaviors') == '' || $AceEditor->AceGetPreference('enable_behaviors') == 1} checked="checked"{/if} />
        </p>
    </div>
    <div class="pageoverflow">
        <p class="pagetext"> &nbsp; </p>
        <p class="pageinput"> {$submit} </p>
    </div>
</fieldset>
<fieldset>
    <legend>
        {$AceEditor->Lang('testareatext')}
    </legend>
    <div class="pageoverflow">
        <div class="pageinput"> {$testarea} </div>
    </div>
</fieldset>
{$endform}
{/strip}
