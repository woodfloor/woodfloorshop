<form action="{$VAL_SELF}" method="post" enctype="multipart/form-data">
  <div id="SFWS_Banner_Manager_Custom" class="tab_content">
	<h3>{$LANG.sfws_banner_manager_custom.module_title} ({$PLUGIN_VERSION})</h3>
	<p><strong>Created and Developed by <a href="http://www.semperfiwebservices.com/index.php" title="SemperFiWebServices" alt="SemperFiWebServices" target="_blank">SemperFiWebServices</a></strong></p>
	<p>{$LANG.sfws_banner_manager_custom.module_description}</p>
	<p>Full instructions for this plugin can be found <a href="{$STORE_URL}/modules/plugins/SFWS_Banner_Manager_Custom/SFWS-Banner-Manager-Custom-CC6-Plugin-Install-Instructions.txt" title="Plugin Instructions" target="_blank">here</a>.</p>
	<fieldset><legend>{$LANG.module.config_settings}</legend>
	  <div><label for="status">{$LANG.common.status}</label><span><input type="hidden" name="module[status]" id="status" class="toggle" value="{$MODULE.status}" />&nbsp;</span></div>
	</fieldset>
	
		<fieldset><legend>{$LANG.sfws_banner_manager_custom.admin_config_title_header}</legend>
			<div><label for="sfws_header_banner_status">{$LANG.sfws_banner_manager_custom.admin_config_field_status}</label><span>
			<select name="module[sfws_header_banner_status]" id="sfws_header_banner_status" class="textbox">
				<option value="0" {if $MODULE.sfws_header_banner_status == 0}selected="selected"{/if}>Disabled</option>
				<option value="1" {if $MODULE.sfws_header_banner_status == 1}selected="selected"{/if}>Enabled</option>
			</select> ({$LANG.sfws_banner_manager_custom.admin_config_field_status_description})</span></div>
			<div><label for="sfws_header_banner_effect">{$LANG.sfws_banner_manager_custom.admin_config_field_effect}</label><span>
			<select name="module[sfws_header_banner_effect]" id="sfws_header_banner_effect" type="text" class="textbox">
				<option value="blindX"  {if $MODULE.sfws_header_banner_effect == 'blindX'}selected="selected"{/if}>BlindX</option>
				<option value="blindY"  {if $MODULE.sfws_header_banner_effect == 'blindY'}selected="selected"{/if}>BlindY</option>
				<option value="blindZ"  {if $MODULE.sfws_header_banner_effect == 'blindZ'}selected="selected"{/if}>BlindZ</option>
				<option value="cover"  {if $MODULE.sfws_header_banner_effect == 'cover'}selected="selected"{/if}>Cover</option>
				<option value="curtainX"  {if $MODULE.sfws_header_banner_effect == 'curtainX'}selected="selected"{/if}>CurtainX</option>
				<option value="curtainY"  {if $MODULE.sfws_header_banner_effect == 'curtainY'}selected="selected"{/if}>CurtainY</option>
				<option value="fade"  {if $MODULE.sfws_header_banner_effect == 'fade'}selected="selected"{/if}>Fade</option>
				<option value="fadeZoom"  {if $MODULE.sfws_header_banner_effect == 'fadeZoom'}selected="selected"{/if}>FadeZoom</option>
				<option value="growX"  {if $MODULE.sfws_header_banner_effect == 'growX'}selected="selected"{/if}>GrowX</option>
				<option value="growY"  {if $MODULE.sfws_header_banner_effect == 'growY'}selected="selected"{/if}>GrowY</option>
				<option value="none"  {if $MODULE.sfws_header_banner_effect == 'none'}selected="selected"{/if}>None</option>
				<option value="scrollUp"  {if $MODULE.sfws_header_banner_effect == 'scrollUp'}selected="selected"{/if}>ScrollUp</option>
				<option value="scrollDown"  {if $MODULE.sfws_header_banner_effect == 'scrollDown'}selected="selected"{/if}>ScrollDown</option>
				<option value="scrollLeft"  {if $MODULE.sfws_header_banner_effect == 'scrollLeft'}selected="selected"{/if}>ScrollLeft</option>
				<option value="scrollRight"  {if $MODULE.sfws_header_banner_effect == 'scrollRight'}selected="selected"{/if}>ScrollRight</option>
				<option value="scrollHorz"  {if $MODULE.sfws_header_banner_effect == 'scrollHorz'}selected="selected"{/if}>ScrollHorz</option>
				<option value="scrollVert"  {if $MODULE.sfws_header_banner_effect == 'scrollVert'}selected="selected"{/if}>ScrollVert</option>
				<option value="shuffle"  {if $MODULE.sfws_header_banner_effect == 'shuffle'}selected="selected"{/if}>Shuffle</option>
				<option value="slideX"  {if $MODULE.sfws_header_banner_effect == 'slideX'}selected="selected"{/if}>SlideX</option>
				<option value="slideY"  {if $MODULE.sfws_header_banner_effect == 'slideY'}selected="selected"{/if}>SlideY</option>
				<option value="toss"  {if $MODULE.sfws_header_banner_effect == 'toss'}selected="selected"{/if}>Toss</option>
				<option value="turnUp"  {if $MODULE.sfws_header_banner_effect == 'turnUp'}selected="selected"{/if}>TurnUp</option>
				<option value="turnDown"  {if $MODULE.sfws_header_banner_effect == 'turnDown'}selected="selected"{/if}>TurnDown</option>
				<option value="turnLeft"  {if $MODULE.sfws_header_banner_effect == 'turnLeft'}selected="selected"{/if}>TurnLeft</option>
				<option value="turnRight"  {if $MODULE.sfws_header_banner_effect == 'turnRight'}selected="selected"{/if}>TurnRight</option>
				<option value="uncover"  {if $MODULE.sfws_header_banner_effect == 'uncover'}selected="selected"{/if}>Uncover</option>
				<option value="wipe"  {if $MODULE.sfws_header_banner_effect == 'wipe'}selected="selected"{/if}>Wipe</option>
				<option value="zoom"  {if $MODULE.sfws_header_banner_effect == 'zoom'}selected="selected"{/if}>Zoom</option>
			</select> ({$LANG.sfws_banner_manager_custom.admin_config_field_effect_description})</span></div>
			<div><label for="sfws_header_banner_effect_pause">{$LANG.sfws_banner_manager_custom.admin_config_field_effect_pause}</label><span>
			<select name="module[sfws_header_banner_effect_pause]" id="sfws_header_banner_effect_pause" class="textbox">
				<option value="0" {if $MODULE.sfws_header_banner_effect_pause == 0}selected="selected"{/if}>Disabled</option>
				<option value="1" {if $MODULE.sfws_header_banner_effect_pause == 1}selected="selected"{/if}>Enabled</option>
			</select> ({$LANG.sfws_banner_manager_custom.admin_config_field_effect_pause_description})</span></div>
			<div><label for="sfws_header_banner_effect_speed">{$LANG.sfws_banner_manager_custom.admin_config_field_effect_speed}</label><span><input name="module[sfws_header_banner_effect_speed]" id="sfws_header_banner_effect_speed" type="text" class="textbox number" value="{$MODULE.sfws_header_banner_effect_speed}" /> ({$LANG.sfws_banner_manager_custom.admin_config_field_effect_speed_description})</span></div>
			<div><label for="sfws_header_banner_effect_timeout">{$LANG.sfws_banner_manager_custom.admin_config_field_effect_timeout}</label><span><input name="module[sfws_header_banner_effect_timeout]" id="sfws_header_banner_effect_timeout" type="text" class="textbox number" value="{$MODULE.sfws_header_banner_effect_timeout}" /> ({$LANG.sfws_banner_manager_custom.admin_config_field_effect_timeout_description})</span></div>
			<div><label for="sfws_header_banner_width">{$LANG.sfws_banner_manager_custom.admin_config_field_width}</label><span><input name="module[sfws_header_banner_width]" id="sfws_header_banner_width" type="text" class="textbox number" value="{$MODULE.sfws_header_banner_width}" /> ({$LANG.sfws_banner_manager_custom.admin_config_field_width_description})</span></div>
			<div><label for="sfws_header_banner_height">{$LANG.sfws_banner_manager_custom.admin_config_field_height}</label><span><input name="module[sfws_header_banner_height]" id="sfws_header_banner_height" type="text" class="textbox number" value="{$MODULE.sfws_header_banner_height}" /> ({$LANG.sfws_banner_manager_custom.admin_config_field_height_description})</span></div>
			<div><label for="sfws_header_banner_padding">{$LANG.sfws_banner_manager_custom.admin_config_field_padding}</label><span><input name="module[sfws_header_banner_padding]" id="sfws_header_banner_padding" type="text" class="textbox number" value="{$MODULE.sfws_header_banner_padding}" /> ({$LANG.sfws_banner_manager_custom.admin_config_field_padding_description})</span></div>
			<div><label for="sfws_header_banner_border_width">{$LANG.sfws_banner_manager_custom.admin_config_field_border_width}</label><span><input name="module[sfws_header_banner_border_width]" id="sfws_header_banner_border_width" type="text" class="textbox number" value="{$MODULE.sfws_header_banner_border_width}" /> ({$LANG.sfws_banner_manager_custom.admin_config_field_border_width_description})</span></div>
			<div><label for="sfws_header_banner_border_color">{$LANG.sfws_banner_manager_custom.admin_config_field_border_color}</label><span><input name="module[sfws_header_banner_border_color]" id="sfws_header_banner_border_color" type="text" class="textbox number" value="{$MODULE.sfws_header_banner_border_color}" /> ({$LANG.sfws_banner_manager_custom.admin_config_field_border_color_description})</span></div>
			<div><label for="sfws_header_banner_background_color">{$LANG.sfws_banner_manager_custom.admin_config_field_background_color}</label><span><input name="module[sfws_header_banner_background_color]" id="sfws_header_banner_background_color" type="text" class="textbox number" value="{$MODULE.sfws_header_banner_background_color}" /> ({$LANG.sfws_banner_manager_custom.admin_config_field_background_color_description})</span></div>
		</fieldset>

		<fieldset><legend>{$LANG.sfws_banner_manager_custom.admin_config_title_footer}</legend>
			<div><label for="sfws_footer_banner_status">{$LANG.sfws_banner_manager_custom.admin_config_field_status}</label><span>
			<select name="module[sfws_footer_banner_status]" id="sfws_footer_banner_status" class="textbox">
				<option value="0" {if $MODULE.sfws_footer_banner_status == 0}selected="selected"{/if}>Disabled</option>
				<option value="1" {if $MODULE.sfws_footer_banner_status == 1}selected="selected"{/if}>Enabled</option>
			</select> ({$LANG.sfws_banner_manager_custom.admin_config_field_status_description})</span></div>
			<div><label for="sfws_footer_banner_effect">{$LANG.sfws_banner_manager_custom.admin_config_field_effect}</label><span>
			<select name="module[sfws_footer_banner_effect]" id="sfws_footer_banner_effect" type="text" class="textbox">
				<option value="blindX"  {if $MODULE.sfws_footer_banner_effect == 'blindX'}selected="selected"{/if}>BlindX</option>
				<option value="blindY"  {if $MODULE.sfws_footer_banner_effect == 'blindY'}selected="selected"{/if}>BlindY</option>
				<option value="blindZ"  {if $MODULE.sfws_footer_banner_effect == 'blindZ'}selected="selected"{/if}>BlindZ</option>
				<option value="cover"  {if $MODULE.sfws_footer_banner_effect == 'cover'}selected="selected"{/if}>Cover</option>
				<option value="curtainX"  {if $MODULE.sfws_footer_banner_effect == 'curtainX'}selected="selected"{/if}>CurtainX</option>
				<option value="curtainY"  {if $MODULE.sfws_footer_banner_effect == 'curtainY'}selected="selected"{/if}>CurtainY</option>
				<option value="fade"  {if $MODULE.sfws_footer_banner_effect == 'fade'}selected="selected"{/if}>Fade</option>
				<option value="fadeZoom"  {if $MODULE.sfws_footer_banner_effect == 'fadeZoom'}selected="selected"{/if}>FadeZoom</option>
				<option value="growX"  {if $MODULE.sfws_footer_banner_effect == 'growX'}selected="selected"{/if}>GrowX</option>
				<option value="growY"  {if $MODULE.sfws_footer_banner_effect == 'growY'}selected="selected"{/if}>GrowY</option>
				<option value="none"  {if $MODULE.sfws_footer_banner_effect == 'none'}selected="selected"{/if}>None</option>
				<option value="scrollUp"  {if $MODULE.sfws_footer_banner_effect == 'scrollUp'}selected="selected"{/if}>ScrollUp</option>
				<option value="scrollDown"  {if $MODULE.sfws_footer_banner_effect == 'scrollDown'}selected="selected"{/if}>ScrollDown</option>
				<option value="scrollLeft"  {if $MODULE.sfws_footer_banner_effect == 'scrollLeft'}selected="selected"{/if}>ScrollLeft</option>
				<option value="scrollRight"  {if $MODULE.sfws_footer_banner_effect == 'scrollRight'}selected="selected"{/if}>ScrollRight</option>
				<option value="scrollHorz"  {if $MODULE.sfws_footer_banner_effect == 'scrollHorz'}selected="selected"{/if}>ScrollHorz</option>
				<option value="scrollVert"  {if $MODULE.sfws_footer_banner_effect == 'scrollVert'}selected="selected"{/if}>ScrollVert</option>
				<option value="shuffle"  {if $MODULE.sfws_footer_banner_effect == 'shuffle'}selected="selected"{/if}>Shuffle</option>
				<option value="slideX"  {if $MODULE.sfws_footer_banner_effect == 'slideX'}selected="selected"{/if}>SlideX</option>
				<option value="slideY"  {if $MODULE.sfws_footer_banner_effect == 'slideY'}selected="selected"{/if}>SlideY</option>
				<option value="toss"  {if $MODULE.sfws_footer_banner_effect == 'toss'}selected="selected"{/if}>Toss</option>
				<option value="turnUp"  {if $MODULE.sfws_footer_banner_effect == 'turnUp'}selected="selected"{/if}>TurnUp</option>
				<option value="turnDown"  {if $MODULE.sfws_footer_banner_effect == 'turnDown'}selected="selected"{/if}>TurnDown</option>
				<option value="turnLeft"  {if $MODULE.sfws_footer_banner_effect == 'turnLeft'}selected="selected"{/if}>TurnLeft</option>
				<option value="turnRight"  {if $MODULE.sfws_footer_banner_effect == 'turnRight'}selected="selected"{/if}>TurnRight</option>
				<option value="uncover"  {if $MODULE.sfws_footer_banner_effect == 'uncover'}selected="selected"{/if}>Uncover</option>
				<option value="wipe"  {if $MODULE.sfws_footer_banner_effect == 'wipe'}selected="selected"{/if}>Wipe</option>
				<option value="zoom"  {if $MODULE.sfws_footer_banner_effect == 'zoom'}selected="selected"{/if}>Zoom</option>
			</select> ({$LANG.sfws_banner_manager_custom.admin_config_field_effect_description})</span></div>
			<div><label for="sfws_footer_banner_effect_pause">{$LANG.sfws_banner_manager_custom.admin_config_field_effect_pause}</label><span>
			<select name="module[sfws_footer_banner_effect_pause]" id="sfws_footer_banner_effect_pause" class="textbox">
				<option value="0" {if $MODULE.sfws_footer_banner_effect_pause == 0}selected="selected"{/if}>Disabled</option>
				<option value="1" {if $MODULE.sfws_footer_banner_effect_pause == 1}selected="selected"{/if}>Enabled</option>
			</select> ({$LANG.sfws_banner_manager_custom.admin_config_field_effect_pause_description})</span></div>
			<div><label for="sfws_footer_banner_effect_speed">{$LANG.sfws_banner_manager_custom.admin_config_field_effect_speed}</label><span><input name="module[sfws_footer_banner_effect_speed]" id="sfws_footer_banner_effect_speed" type="text" class="textbox number" value="{$MODULE.sfws_footer_banner_effect_speed}" /> ({$LANG.sfws_banner_manager_custom.admin_config_field_effect_speed_description})</span></div>
			<div><label for="sfws_footer_banner_effect_timeout">{$LANG.sfws_banner_manager_custom.admin_config_field_effect_timeout}</label><span><input name="module[sfws_footer_banner_effect_timeout]" id="sfws_footer_banner_effect_timeout" type="text" class="textbox number" value="{$MODULE.sfws_footer_banner_effect_timeout}" /> ({$LANG.sfws_banner_manager_custom.admin_config_field_effect_timeout_description})</span></div>
			<div><label for="sfws_footer_banner_width">{$LANG.sfws_banner_manager_custom.admin_config_field_width}</label><span><input name="module[sfws_footer_banner_width]" id="sfws_footer_banner_width" type="text" class="textbox number" value="{$MODULE.sfws_footer_banner_width}" /> ({$LANG.sfws_banner_manager_custom.admin_config_field_width_description})</span></div>
			<div><label for="sfws_footer_banner_height">{$LANG.sfws_banner_manager_custom.admin_config_field_height}</label><span><input name="module[sfws_footer_banner_height]" id="sfws_footer_banner_height" type="text" class="textbox number" value="{$MODULE.sfws_footer_banner_height}" /> ({$LANG.sfws_banner_manager_custom.admin_config_field_height_description})</span></div>
			<div><label for="sfws_footer_banner_padding">{$LANG.sfws_banner_manager_custom.admin_config_field_padding}</label><span><input name="module[sfws_footer_banner_padding]" id="sfws_footer_banner_padding" type="text" class="textbox number" value="{$MODULE.sfws_footer_banner_padding}" /> ({$LANG.sfws_banner_manager_custom.admin_config_field_padding_description})</span></div>
			<div><label for="sfws_footer_banner_border_width">{$LANG.sfws_banner_manager_custom.admin_config_field_border_width}</label><span><input name="module[sfws_footer_banner_border_width]" id="sfws_footer_banner_border_width" type="text" class="textbox number" value="{$MODULE.sfws_footer_banner_border_width}" /> ({$LANG.sfws_banner_manager_custom.admin_config_field_border_width_description})</span></div>
			<div><label for="sfws_footer_banner_border_color">{$LANG.sfws_banner_manager_custom.admin_config_field_border_color}</label><span><input name="module[sfws_footer_banner_border_color]" id="sfws_footer_banner_border_color" type="text" class="textbox number" value="{$MODULE.sfws_footer_banner_border_color}" /> ({$LANG.sfws_banner_manager_custom.admin_config_field_border_color_description})</span></div>
			<div><label for="sfws_footer_banner_background_color">{$LANG.sfws_banner_manager_custom.admin_config_field_background_color}</label><span><input name="module[sfws_footer_banner_background_color]" id="sfws_footer_banner_background_color" type="text" class="textbox number" value="{$MODULE.sfws_footer_banner_background_color}" /> ({$LANG.sfws_banner_manager_custom.admin_config_field_background_color_description})</span></div>
		</fieldset>

		<fieldset><legend>{$LANG.sfws_banner_manager_custom.admin_config_title_side}</legend>
			<div><label for="sfws_side_banner_status">{$LANG.sfws_banner_manager_custom.admin_config_field_status}</label><span>
			<select name="module[sfws_side_banner_status]" id="sfws_side_banner_status" class="textbox">
				<option value="0" {if $MODULE.sfws_side_banner_status == 0}selected="selected"{/if}>Disabled</option>
				<option value="1" {if $MODULE.sfws_side_banner_status == 1}selected="selected"{/if}>Enabled</option>
			</select> ({$LANG.sfws_banner_manager_custom.admin_config_field_status_description})</span></div>
			<div><label for="sfws_side_banner_effect">{$LANG.sfws_banner_manager_custom.admin_config_field_effect}</label><span>
			<select name="module[sfws_side_banner_effect]" id="sfws_side_banner_effect" type="text" class="textbox">
				<option value="blindX"  {if $MODULE.sfws_side_banner_effect == 'blindX'}selected="selected"{/if}>BlindX</option>
				<option value="blindY"  {if $MODULE.sfws_side_banner_effect == 'blindY'}selected="selected"{/if}>BlindY</option>
				<option value="blindZ"  {if $MODULE.sfws_side_banner_effect == 'blindZ'}selected="selected"{/if}>BlindZ</option>
				<option value="cover"  {if $MODULE.sfws_side_banner_effect == 'cover'}selected="selected"{/if}>Cover</option>
				<option value="curtainX"  {if $MODULE.sfws_side_banner_effect == 'curtainX'}selected="selected"{/if}>CurtainX</option>
				<option value="curtainY"  {if $MODULE.sfws_side_banner_effect == 'curtainY'}selected="selected"{/if}>CurtainY</option>
				<option value="fade"  {if $MODULE.sfws_side_banner_effect == 'fade'}selected="selected"{/if}>Fade</option>
				<option value="fadeZoom"  {if $MODULE.sfws_side_banner_effect == 'fadeZoom'}selected="selected"{/if}>FadeZoom</option>
				<option value="growX"  {if $MODULE.sfws_side_banner_effect == 'growX'}selected="selected"{/if}>GrowX</option>
				<option value="growY"  {if $MODULE.sfws_side_banner_effect == 'growY'}selected="selected"{/if}>GrowY</option>
				<option value="none"  {if $MODULE.sfws_side_banner_effect == 'none'}selected="selected"{/if}>None</option>
				<option value="scrollUp"  {if $MODULE.sfws_side_banner_effect == 'scrollUp'}selected="selected"{/if}>ScrollUp</option>
				<option value="scrollDown"  {if $MODULE.sfws_side_banner_effect == 'scrollDown'}selected="selected"{/if}>ScrollDown</option>
				<option value="scrollLeft"  {if $MODULE.sfws_side_banner_effect == 'scrollLeft'}selected="selected"{/if}>ScrollLeft</option>
				<option value="scrollRight"  {if $MODULE.sfws_side_banner_effect == 'scrollRight'}selected="selected"{/if}>ScrollRight</option>
				<option value="scrollHorz"  {if $MODULE.sfws_side_banner_effect == 'scrollHorz'}selected="selected"{/if}>ScrollHorz</option>
				<option value="scrollVert"  {if $MODULE.sfws_side_banner_effect == 'scrollVert'}selected="selected"{/if}>ScrollVert</option>
				<option value="shuffle"  {if $MODULE.sfws_side_banner_effect == 'shuffle'}selected="selected"{/if}>Shuffle</option>
				<option value="slideX"  {if $MODULE.sfws_side_banner_effect == 'slideX'}selected="selected"{/if}>SlideX</option>
				<option value="slideY"  {if $MODULE.sfws_side_banner_effect == 'slideY'}selected="selected"{/if}>SlideY</option>
				<option value="toss"  {if $MODULE.sfws_side_banner_effect == 'toss'}selected="selected"{/if}>Toss</option>
				<option value="turnUp"  {if $MODULE.sfws_side_banner_effect == 'turnUp'}selected="selected"{/if}>TurnUp</option>
				<option value="turnDown"  {if $MODULE.sfws_side_banner_effect == 'turnDown'}selected="selected"{/if}>TurnDown</option>
				<option value="turnLeft"  {if $MODULE.sfws_side_banner_effect == 'turnLeft'}selected="selected"{/if}>TurnLeft</option>
				<option value="turnRight"  {if $MODULE.sfws_side_banner_effect == 'turnRight'}selected="selected"{/if}>TurnRight</option>
				<option value="uncover"  {if $MODULE.sfws_side_banner_effect == 'uncover'}selected="selected"{/if}>Uncover</option>
				<option value="wipe"  {if $MODULE.sfws_side_banner_effect == 'wipe'}selected="selected"{/if}>Wipe</option>
				<option value="zoom"  {if $MODULE.sfws_side_banner_effect == 'zoom'}selected="selected"{/if}>Zoom</option>
			</select> ({$LANG.sfws_banner_manager_custom.admin_config_field_effect_description})</span></div>
			<div><label for="sfws_side_banner_effect_pause">{$LANG.sfws_banner_manager_custom.admin_config_field_effect_pause}</label><span>
			<select name="module[sfws_side_banner_effect_pause]" id="sfws_side_banner_effect_pause" class="textbox">
				<option value="0" {if $MODULE.sfws_side_banner_effect_pause == 0}selected="selected"{/if}>Disabled</option>
				<option value="1" {if $MODULE.sfws_side_banner_effect_pause == 1}selected="selected"{/if}>Enabled</option>
			</select> ({$LANG.sfws_banner_manager_custom.admin_config_field_effect_pause_description})</span></div>
			<div><label for="sfws_side_banner_effect_speed">{$LANG.sfws_banner_manager_custom.admin_config_field_effect_speed}</label><span><input name="module[sfws_side_banner_effect_speed]" id="sfws_side_banner_effect_speed" type="text" class="textbox number" value="{$MODULE.sfws_side_banner_effect_speed}" /> ({$LANG.sfws_banner_manager_custom.admin_config_field_effect_speed_description})</span></div>
			<div><label for="sfws_side_banner_effect_timeout">{$LANG.sfws_banner_manager_custom.admin_config_field_effect_timeout}</label><span><input name="module[sfws_side_banner_effect_timeout]" id="sfws_side_banner_effect_timeout" type="text" class="textbox number" value="{$MODULE.sfws_side_banner_effect_timeout}" /> ({$LANG.sfws_banner_manager_custom.admin_config_field_effect_timeout_description})</span></div>
			<div><label for="sfws_side_banner_width">{$LANG.sfws_banner_manager_custom.admin_config_field_width}</label><span><input name="module[sfws_side_banner_width]" id="sfws_side_banner_width" type="text" class="textbox number" value="{$MODULE.sfws_side_banner_width}" /> ({$LANG.sfws_banner_manager_custom.admin_config_field_width_description})</span></div>
			<div><label for="sfws_side_banner_height">{$LANG.sfws_banner_manager_custom.admin_config_field_height}</label><span><input name="module[sfws_side_banner_height]" id="sfws_side_banner_height" type="text" class="textbox number" value="{$MODULE.sfws_side_banner_height}" /> ({$LANG.sfws_banner_manager_custom.admin_config_field_height_description})</span></div>
			<div><label for="sfws_side_banner_padding">{$LANG.sfws_banner_manager_custom.admin_config_field_padding}</label><span><input name="module[sfws_side_banner_padding]" id="sfws_side_banner_padding" type="text" class="textbox number" value="{$MODULE.sfws_side_banner_padding}" /> ({$LANG.sfws_banner_manager_custom.admin_config_field_padding_description})</span></div>
			<div><label for="sfws_side_banner_border_width">{$LANG.sfws_banner_manager_custom.admin_config_field_border_width}</label><span><input name="module[sfws_side_banner_border_width]" id="sfws_side_banner_border_width" type="text" class="textbox number" value="{$MODULE.sfws_side_banner_border_width}" /> ({$LANG.sfws_banner_manager_custom.admin_config_field_border_width_description})</span></div>
			<div><label for="sfws_side_banner_border_color">{$LANG.sfws_banner_manager_custom.admin_config_field_border_color}</label><span><input name="module[sfws_side_banner_border_color]" id="sfws_side_banner_border_color" type="text" class="textbox number" value="{$MODULE.sfws_side_banner_border_color}" /> ({$LANG.sfws_banner_manager_custom.admin_config_field_border_color_description})</span></div>
			<div><label for="sfws_side_banner_background_color">{$LANG.sfws_banner_manager_custom.admin_config_field_background_color}</label><span><input name="module[sfws_side_banner_background_color]" id="sfws_side_banner_background_color" type="text" class="textbox number" value="{$MODULE.sfws_side_banner_background_color}" /> ({$LANG.sfws_banner_manager_custom.admin_config_field_background_color_description})</span></div>
		</fieldset>

	<p>The banners can be managed here <a href="?_g=plugin&name=manage_banners_custom">here</a>.</p>	
	<p>The default language entries for this plugin can be changed <a href="?_g=settings&node=language&language={$CONFIG.default_language}&type=modules%2Fplugins%2FSFWS_Banner_Manager_Custom%2Flanguage%2Fmodule.definitions.xml#general">here</a>.</p>
	<p>The hooks for this plugin can be managed <a href="?_g=settings&node=hooks&plugin=SFWS_Banner_Manager_Custom">here</a>.</p>
	
	<p>To show the banners, these macros:<br />
	<strong>{literal}{$SFWS_BANNER_MANAGER_CUSTOM_HEADER}{/literal}</strong><br />
	<strong>{literal}{$SFWS_BANNER_MANAGER_CUSTOM_SIDE}{/literal}</strong><br />
	<strong>{literal}{$SFWS_BANNER_MANAGER_CUSTOM_FOOTER}{/literal}</strong><br />
	needs to be added in your skin's main.php template file. </p> 

	<p>To show the banners, these lines:
	<pre style="white-space: pre-wrap; margin-top: -10px; margin-bottom: 0px; padding: 5px; border: 1px solid #666;">&lt;image reference=&quot;sfws_banner_manager_custom_header&quot; maximum=&quot;1000&quot; quality=&quot;100&quot; default=&quot;&quot; /&gt;<br />&lt;image reference=&quot;sfws_banner_manager_custom_side&quot; maximum=&quot;1000&quot; quality=&quot;100&quot; default=&quot;&quot; /&gt;<br />&lt;image reference=&quot;sfws_banner_manager_custom_footer&quot; maximum=&quot;1000&quot; quality=&quot;100&quot; default=&quot;&quot; /&gt;</pre>
	needs to be added in your skin's config.xml file. </p> 

  </div>
  {$MODULE_ZONES}
  <div class="form_control">
	<input type="submit" name="save" value="{$LANG.common.save}" />
  </div>
  <input type="hidden" name="token" value="{$SESSION_TOKEN}" />
</form>