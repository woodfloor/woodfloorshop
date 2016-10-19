<form action="{$VAL_SELF}" method="post" enctype="multipart/form-data">
	<div id="SFWS_Category_Navigation" class="tab_content">
		<h3>{$LANG.sfws_category_navigation.module_title} ({$PLUGIN_VERSION})</h3>
		<p><strong>Created and Developed by <a href="http://www.semperfiwebservices.com" title="SemperFiWebServices" target="_blank">SemperFiWebServices</a></strong></p>
		<p>{$LANG.sfws_category_navigation.module_description}</p>
		<p>Full instructions for this plugin can be found <a href="{$STORE_URL}/modules/plugins/SFWS_Category_Navigation/SFWS-Category-Navigation-CC6-Plugin-Install-Instructions.txt" title="Plugin Instructions" target="_blank">here</a>.</p>
		<p>The default language entries for this plugin can be changed <a href="?_g=settings&node=language&language={$CONFIG.default_language}&type=modules%2Fplugins%2FSFWS_Category_Navigation%2Flanguage%2Fmodule.definitions.xml#general">here</a>.</p>
		<p>The hooks for this plugin can be managed <a href="?_g=settings&node=hooks&plugin=SFWS_Category_Navigation">here</a>.</p>
		<fieldset><legend>{$LANG.sfws_category_navigation.admin_config_title_settings}</legend>
			<div><label for="status">{$LANG.sfws_category_navigation.admin_config_field_status}</label><span><input type="hidden" name="module[status]" id="status" class="toggle" value="{$MODULE.status}" />&nbsp;</span></div>
		</fieldset>

		<fieldset><legend>{$LANG.sfws_category_navigation.admin_config_title_categories_settings_desktop}</legend>
			<div><label for="cbd_status">{$LANG.sfws_category_navigation.admin_config_field_status}</label><span><input type="hidden" name="module[cbd_status]" id="cbd_status" class="toggle" value="{$MODULE.cbd_status}" />&nbsp;</span></div>
			<div><label for="cbd_home_status">{$LANG.sfws_category_navigation.admin_config_field_home_status}</label>
				<span>
					<select name="module[cbd_home_status]" id="cbd_home_status" class="textbox">
						<option value="0" {if $MODULE.cbd_home_status == 0}selected="selected"{/if}>{$LANG.sfws_category_navigation.admin_config_option_disabled}</option>
						<option value="1" {if $MODULE.cbd_home_status == 1}selected="selected"{/if}>{$LANG.sfws_category_navigation.admin_config_option_enabled}</option>
					</select>
				</span>
			</div>
			<div><label for="cbd_sale_status">{$LANG.sfws_category_navigation.admin_config_field_sale_status}</label>
				<span>
					<select name="module[cbd_sale_status]" id="cbd_sale_status" class="textbox">
						<option value="0" {if $MODULE.cbd_sale_status == 0}selected="selected"{/if}>{$LANG.sfws_category_navigation.admin_config_option_disabled}</option>
						<option value="1" {if $MODULE.cbd_sale_status == 1}selected="selected"{/if}>{$LANG.sfws_category_navigation.admin_config_option_enabled}</option>
					</select>
				</span>
			</div>
			<div><label for="cbd_gc_status">{$LANG.sfws_category_navigation.admin_config_field_gc_status}</label>
				<span>
					<select name="module[cbd_gc_status]" id="cbd_gc_status" class="textbox">
						<option value="0" {if $MODULE.cbd_gc_status == 0}selected="selected"{/if}>{$LANG.sfws_category_navigation.admin_config_option_disabled}</option>
						<option value="1" {if $MODULE.cbd_gc_status == 1}selected="selected"{/if}>{$LANG.sfws_category_navigation.admin_config_option_enabled}</option>
					</select>
				</span>
			</div>
			<div><label for="cbd_expand_status">{$LANG.sfws_category_navigation.admin_config_field_expand_status}</label>
				<span>
					<select name="module[cbd_expand_status]" id="cbd_expand_status" class="textbox">
						<option value="0" {if $MODULE.cbd_expand_status == 0}selected="selected"{/if}>{$LANG.sfws_category_navigation.admin_config_option_disabled}</option>
						<option value="1" {if $MODULE.cbd_expand_status == 1}selected="selected"{/if}>{$LANG.sfws_category_navigation.admin_config_option_enabled}</option>
					</select>
				</span>
			</div>
			<div><label for="cbd_expand_effect">{$LANG.sfws_category_navigation.admin_config_field_expand_effect}</label>
				<span>
					<select name="module[cbd_expand_effect]" id="cbd_expand_effect" class="textbox">
						<option value="fadeToggle" {if $MODULE.cbd_expand_effect == 'fadeToggle'}selected="selected"{/if}>fadeToggle</option>
						<option value="slideToggle" {if $MODULE.cbd_expand_effect == 'slideToggle'}selected="selected"{/if}>slideToggle</option>
						<option value="toggle" {if $MODULE.cbd_expand_effect == 'toggle'}selected="selected"{/if}>toggle</option>
					</select>
				</span>
			</div>
			<div><label for="cbd_expand_effect_speed">{$LANG.sfws_category_navigation.admin_config_field_expand_effect_speed}</label>
				<span>
					<input type="text" name="module[cbd_expand_effect_speed]" id="cbd_expand_effect_speed" class="textbox number" value="{$MODULE.cbd_expand_effect_speed}" >
				</span>
			</div>
			<div><label for="cbd_box_background_color">{$LANG.sfws_category_navigation.admin_config_field_box_background_color}</label>
				<span>
					<input type="text" name="module[cbd_box_background_color]" id="cbd_box_background_color" class="textbox number" value="{$MODULE.cbd_box_background_color}" >
				</span>
			</div>
			<div><label for="cbd_box_border_color">{$LANG.sfws_category_navigation.admin_config_field_box_border_color}</label>
				<span>
					<input type="text" name="module[cbd_box_border_color]" id="cbd_box_border_color" class="textbox number" value="{$MODULE.cbd_box_border_color}" >
				</span>
			</div>
			<div><label for="cbd_link_color">{$LANG.sfws_category_navigation.admin_config_field_link_color}</label>
				<span>
					<input type="text" name="module[cbd_link_color]" id="cbd_link_color" class="textbox number" value="{$MODULE.cbd_link_color}" >
				</span>
			</div>
			<div><label for="cbd_link_hover_color">{$LANG.sfws_category_navigation.admin_config_field_link_hover_color}</label>
				<span>
					<input type="text" name="module[cbd_link_hover_color]" id="cbd_link_hover_color" class="textbox number" value="{$MODULE.cbd_link_hover_color}" >
				</span>
			</div>
			<div><label for="cbd_link_hover_background_color">{$LANG.sfws_category_navigation.admin_config_field_link_hover_background_color}</label>
				<span>
					<input type="text" name="module[cbd_link_hover_background_color]" id="cbd_link_hover_background_color" class="textbox number" value="{$MODULE.cbd_link_hover_background_color}" >
				</span>
			</div>
			<div><label for="cbd_sc_box1_width">{$LANG.sfws_category_navigation.admin_config_field_sc_box1_width}</label>
				<span>
					<input type="text" name="module[cbd_sc_box1_width]" id="cbd_sc_box1_width" class="textbox number" value="{$MODULE.cbd_sc_box1_width}" >
				</span>
			</div>
			<div><label for="cbd_sc_box1_height">{$LANG.sfws_category_navigation.admin_config_field_sc_box1_height}</label>
				<span>
					<input type="text" name="module[cbd_sc_box1_height]" id="cbd_sc_box1_height" class="textbox number" value="{$MODULE.cbd_sc_box1_height}" >
				</span>
			</div>
			<div><label for="cbd_sc_box2_width">{$LANG.sfws_category_navigation.admin_config_field_sc_box2_width}</label>
				<span>
					<input type="text" name="module[cbd_sc_box2_width]" id="cbd_sc_box2_width" class="textbox number" value="{$MODULE.cbd_sc_box2_width}" >
				</span>
			</div>
			<div><label for="cbd_sc_box2_height">{$LANG.sfws_category_navigation.admin_config_field_sc_box2_height}</label>
				<span>
					<input type="text" name="module[cbd_sc_box2_height]" id="cbd_sc_box2_height" class="textbox number" value="{$MODULE.cbd_sc_box2_height}" >
				</span>
			</div>
			<div><label for="cbd_sc_box3_width">{$LANG.sfws_category_navigation.admin_config_field_sc_box3_width}</label>
				<span>
					<input type="text" name="module[cbd_sc_box3_width]" id="cbd_sc_box3_width" class="textbox number" value="{$MODULE.cbd_sc_box3_width}" >
				</span>
			</div>
			<div><label for="cbd_sc_box3_height">{$LANG.sfws_category_navigation.admin_config_field_sc_box3_height}</label>
				<span>
					<input type="text" name="module[cbd_sc_box3_height]" id="cbd_sc_box3_height" class="textbox number" value="{$MODULE.cbd_sc_box3_height}" >
				</span>
			</div>
			<div><label for="cbd_sc_box4_width">{$LANG.sfws_category_navigation.admin_config_field_sc_box4_width}</label>
				<span>
					<input type="text" name="module[cbd_sc_box4_width]" id="cbd_sc_box4_width" class="textbox number" value="{$MODULE.cbd_sc_box4_width}" >
				</span>
			</div>
			<div><label for="cbd_sc_box4_height">{$LANG.sfws_category_navigation.admin_config_field_sc_box4_height}</label>
				<span>
					<input type="text" name="module[cbd_sc_box4_height]" id="cbd_sc_box4_height" class="textbox number" value="{$MODULE.cbd_sc_box4_height}" >
				</span>
			</div>
			<div><label for="cbd_sc_box5_width">{$LANG.sfws_category_navigation.admin_config_field_sc_box5_width}</label>
				<span>
					<input type="text" name="module[cbd_sc_box5_width]" id="cbd_sc_box5_width" class="textbox number" value="{$MODULE.cbd_sc_box5_width}" >
				</span>
			</div>
			<div><label for="cbd_sc_box5_height">{$LANG.sfws_category_navigation.admin_config_field_sc_box5_height}</label>
				<span>
					<input type="text" name="module[cbd_sc_box5_height]" id="cbd_sc_box5_height" class="textbox number" value="{$MODULE.cbd_sc_box5_height}" >
				</span>
			</div>
		</fieldset>

		<fieldset><legend>{$LANG.sfws_category_navigation.admin_config_title_categories_settings_mobile}</legend>
			<div><label for="cbm_status">{$LANG.sfws_category_navigation.admin_config_field_status}</label><span><input type="hidden" name="module[cbm_status]" id="cbm_status" class="toggle" value="{$MODULE.cbm_status}" />&nbsp;</span></div>
			<div><label for="cbm_title_status">{$LANG.sfws_category_navigation.admin_config_field_title_status}</label>
				<span>
					<select name="module[cbm_title_status]" id="cbm_title_status" class="textbox">
						<option value="0" {if $MODULE.cbm_title_status == 0}selected="selected"{/if}>{$LANG.sfws_category_navigation.admin_config_option_disabled}</option>
						<option value="1" {if $MODULE.cbm_title_status == 1}selected="selected"{/if}>{$LANG.sfws_category_navigation.admin_config_option_enabled}</option>
					</select>
				</span>
			</div>
			<div><label for="cbm_home_status">{$LANG.sfws_category_navigation.admin_config_field_home_status}</label>
				<span>
					<select name="module[cbm_home_status]" id="cbm_home_status" class="textbox">
						<option value="0" {if $MODULE.cbm_home_status == 0}selected="selected"{/if}>{$LANG.sfws_category_navigation.admin_config_option_disabled}</option>
						<option value="1" {if $MODULE.cbm_home_status == 1}selected="selected"{/if}>{$LANG.sfws_category_navigation.admin_config_option_enabled}</option>
					</select>
				</span>
			</div>
			<div><label for="cbm_sale_status">{$LANG.sfws_category_navigation.admin_config_field_sale_status}</label>
				<span>
					<select name="module[cbm_sale_status]" id="cbm_sale_status" class="textbox">
						<option value="0" {if $MODULE.cbm_sale_status == 0}selected="selected"{/if}>{$LANG.sfws_category_navigation.admin_config_option_disabled}</option>
						<option value="1" {if $MODULE.cbm_sale_status == 1}selected="selected"{/if}>{$LANG.sfws_category_navigation.admin_config_option_enabled}</option>
					</select>
				</span>
			</div>
			<div><label for="cbm_gc_status">{$LANG.sfws_category_navigation.admin_config_field_gc_status}</label>
				<span>
					<select name="module[cbm_gc_status]" id="cbm_gc_status" class="textbox">
						<option value="0" {if $MODULE.cbm_gc_status == 0}selected="selected"{/if}>{$LANG.sfws_category_navigation.admin_config_option_disabled}</option>
						<option value="1" {if $MODULE.cbm_gc_status == 1}selected="selected"{/if}>{$LANG.sfws_category_navigation.admin_config_option_enabled}</option>
					</select>
				</span>
			</div>
			<div><label for="cbm_expand_status">{$LANG.sfws_category_navigation.admin_config_field_expand_status}</label>
				<span>
					<select name="module[cbm_expand_status]" id="cbm_expand_status" class="textbox">
						<option value="0" {if $MODULE.cbm_expand_status == 0}selected="selected"{/if}>{$LANG.sfws_category_navigation.admin_config_option_disabled}</option>
						<option value="1" {if $MODULE.cbm_expand_status == 1}selected="selected"{/if}>{$LANG.sfws_category_navigation.admin_config_option_enabled}</option>
					</select>
				</span>
			</div>
			<div><label for="cbm_box_title_color">{$LANG.sfws_category_navigation.admin_config_field_box_title_color}</label>
				<span>
					<input type="text" name="module[cbm_box_title_color]" id="cbm_box_title_color" class="textbox number" value="{$MODULE.cbm_box_title_color}" >
				</span>
			</div>
			<div><label for="cbm_box_title_background_color">{$LANG.sfws_category_navigation.admin_config_field_box_title_background_color}</label>
				<span>
					<input type="text" name="module[cbm_box_title_background_color]" id="cbm_box_title_background_color" class="textbox number" value="{$MODULE.cbm_box_title_background_color}" >
				</span>
			</div>
			<div><label for="cbm_box_title_border_top_color">{$LANG.sfws_category_navigation.admin_config_field_box_title_border_top_color}</label>
				<span>
					<input type="text" name="module[cbm_box_title_border_top_color]" id="cbm_box_title_border_top_color" class="textbox number" value="{$MODULE.cbm_box_title_border_top_color}" >
				</span>
			</div>
			<div><label for="cbm_category_link_color">{$LANG.sfws_category_navigation.admin_config_field_category_link_color}</label>
				<span>
					<input type="text" name="module[cbm_category_link_color]" id="cbm_category_link_color" class="textbox number" value="{$MODULE.cbm_category_link_color}" >
				</span>
			</div>
			<div><label for="cbm_category_link_background_color">{$LANG.sfws_category_navigation.admin_config_field_category_link_background_color}</label>
				<span>
					<input type="text" name="module[cbm_category_link_background_color]" id="cbm_category_link_background_color" class="textbox number" value="{$MODULE.cbm_category_link_background_color}" >
				</span>
			</div>
			<div><label for="cbm_category_link_border_bottom_color">{$LANG.sfws_category_navigation.admin_config_field_category_link_border_bottom_color}</label>
				<span>
					<input type="text" name="module[cbm_category_link_border_bottom_color]" id="cbm_category_link_border_bottom_color" class="textbox number" value="{$MODULE.cbm_category_link_border_bottom_color}" >
				</span>
			</div>
			<div><label for="cbm_category_link_hover_color">{$LANG.sfws_category_navigation.admin_config_field_category_link_hover_color}</label>
				<span>
					<input type="text" name="module[cbm_category_link_hover_color]" id="cbm_category_link_hover_color" class="textbox number" value="{$MODULE.cbm_category_link_hover_color}" >
				</span>
			</div>
			<div><label for="cbm_category_link_hover_background_color">{$LANG.sfws_category_navigation.admin_config_field_category_link_hover_background_color}</label>
				<span>
					<input type="text" name="module[cbm_category_link_hover_background_color]" id="cbm_category_link_hover_background_color" class="textbox number" value="{$MODULE.cbm_category_link_hover_background_color}" >
				</span>
			</div>
			<div><label for="cbm_category_link_hover_border_bottom_color">{$LANG.sfws_category_navigation.admin_config_field_category_link_hover_border_bottom_color}</label>
				<span>
					<input type="text" name="module[cbm_category_link_hover_border_bottom_color]" id="cbm_category_link_hover_border_bottom_color" class="textbox number" value="{$MODULE.cbm_category_link_hover_border_bottom_color}" >
				</span>
			</div>
			<div><label for="cbm_back_link_color">{$LANG.sfws_category_navigation.admin_config_field_back_link_color}</label>
				<span>
					<input type="text" name="module[cbm_back_link_color]" id="cbm_back_link_color" class="textbox number" value="{$MODULE.cbm_back_link_color}" >
				</span>
			</div>
			<div><label for="cbm_back_link_background_color">{$LANG.sfws_category_navigation.admin_config_field_back_link_background_color}</label>
				<span>
					<input type="text" name="module[cbm_back_link_background_color]" id="cbm_back_link_background_color" class="textbox number" value="{$MODULE.cbm_back_link_background_color}" >
				</span>
			</div>
			<div><label for="cbm_back_link_border_bottom_color">{$LANG.sfws_category_navigation.admin_config_field_back_link_border_bottom_color}</label>
				<span>
					<input type="text" name="module[cbm_back_link_border_bottom_color]" id="cbm_back_link_border_bottom_color" class="textbox number" value="{$MODULE.cbm_back_link_border_bottom_color}" >
				</span>
			</div>
			<div><label for="cbm_back_link_hover_color">{$LANG.sfws_category_navigation.admin_config_field_back_link_hover_color}</label>
				<span>
					<input type="text" name="module[cbm_back_link_hover_color]" id="cbm_back_link_hover_color" class="textbox number" value="{$MODULE.cbm_back_link_hover_color}" >
				</span>
			</div>
			<div><label for="cbm_back_link_hover_background_color">{$LANG.sfws_category_navigation.admin_config_field_back_link_hover_background_color}</label>
				<span>
					<input type="text" name="module[cbm_back_link_hover_background_color]" id="cbm_back_link_hover_background_color" class="textbox number" value="{$MODULE.cbm_back_link_hover_background_color}" >
				</span>
			</div>
			<div><label for="cbm_back_link_hover_border_bottom_color">{$LANG.sfws_category_navigation.admin_config_field_back_link_hover_border_bottom_color}</label>
				<span>
					<input type="text" name="module[cbm_back_link_hover_border_bottom_color]" id="cbm_back_link_hover_border_bottom_color" class="textbox number" value="{$MODULE.cbm_back_link_hover_border_bottom_color}" >
				</span>
			</div>
		</fieldset>

	</div>
	{$MODULE_ZONES}
	<div class="form_control">
		<input type="submit" name="save" value="{$LANG.common.save}" />
	</div>
	<input type="hidden" name="token" value="{$SESSION_TOKEN}" />
</form>