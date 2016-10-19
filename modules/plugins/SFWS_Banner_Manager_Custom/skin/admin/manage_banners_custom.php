<form action="{$VAL_SELF}" method="post" enctype="multipart/form-data">

{if isset($MODE_ADDEDIT)}
  
  <div id="banner_general" class="tab_content">
	<h3>{$MODULE_LANG.admin_manage_form_page_title}</h3>
	<fieldset><legend>{$LANG.common.general}</legend>
	  <div><label for="banner_status">{$MODULE_LANG.admin_manage_form_page_field_status}</label><span><input type="hidden" name="banner[banner_status]" id="banner_status" value="{$BANNER.banner_status}" class="toggle" /></span></div>
	  <div><label for="banner_order">{$MODULE_LANG.admin_manage_form_page_field_order}</label><span><input type="text" name="banner[banner_order]" id="banner_order" class="textbox number" value="{$BANNER.banner_order}" /></span></div>
	  <div><label for="banner_name">{$MODULE_LANG.admin_manage_form_page_field_name}</label><span><input type="text" name="banner[banner_name]" id="banner_name" class="textbox" value="{$BANNER.banner_name}" /></span></div>
	  <div><label for="banner_location">{$MODULE_LANG.admin_manage_form_page_field_location}</label>
	  <span>
	  		<select name="banner[banner_location]" id="banner_location" class="textbox" type="text">
	  			<option value="0" {if $BANNER.banner_location == 0}selected="selected"{/if}>{$MODULE_LANG.admin_manage_form_page_field_location_0}</option>
				<option value="1" {if $BANNER.banner_location == 1}selected="selected"{/if}>{$MODULE_LANG.admin_manage_form_page_field_location_1}</option>
				<option value="2" {if $BANNER.banner_location == 2}selected="selected"{/if}>{$MODULE_LANG.admin_manage_form_page_field_location_2}</option>
				<option value="3" {if $BANNER.banner_location == 3}selected="selected"{/if}>{$MODULE_LANG.admin_manage_form_page_field_location_3}</option>
	  		</select>
	  </span>
	  </div>
	  {if $MANUFACTURERS}
      <div><label for="banner_manufacturer">{$MODULE_LANG.admin_manage_form_page_field_manufacturer}</label>
	  <span>
	  		<select name="banner[banner_manufacturer]" id="banner_manufacturer" class="textbox" type="text">
	  			<option value="">{$LANG.form.none}</option>
	  			{foreach from=$MANUFACTURERS item=manufacturer}
	  				<option value="{$manufacturer.id}"{$manufacturer.selected}>{$manufacturer.name}</option>
	  			{/foreach}
	  		</select>
	  </span>
	  </div>
	  {/if}
	  {if $CATEGORIES}
      <div><label for="banner_categories">{$MODULE_LANG.admin_manage_form_page_field_categories}</label>
		  <div style="height: 210px;">
			<div id="categories" style="height: 200px; overflow-y: scroll; border: 1px solid #c7c7c7; padding: 3px; margin: 5px 0; float: left">
			{foreach from=$CATEGORIES item=category}
				<input type="checkbox" id="cat_{$category.id}" name="banner_categories[]" value="{$category.id}" style="position: relative; top: 0px;" {$category.selected}> <span style="position: relative; top: -3px;">{$category.name}</span><br />
			{/foreach}
			</div>
		  </div>
	  </div>
	  {/if}
	  <div><label for="banner_url">{$MODULE_LANG.admin_manage_form_page_field_url}</label><span><input type="text" name="banner[banner_url]" id="banner_url" class="textbox" value="{$BANNER.banner_url}" /></span></div>
	  <div><label for="banner_url_target">{$MODULE_LANG.admin_manage_form_page_field_url_target}</label>
	  <span>
	  		<select name="banner[banner_url_target]" id="banner_url_target" class="textbox" type="text">
	  			<option value="_self" {if $BANNER.banner_url_target == '_self'}selected="selected"{/if}>{$MODULE_LANG.admin_manage_form_page_field_url_target_self}</option>
				<option value="_blank" {if $BANNER.banner_url_target == '_blank'}selected="selected"{/if}>{$MODULE_LANG.admin_manage_form_page_field_url_target_blank}</option>
	  		</select>
	  </span>
	  </div>
	  <div><label for="banner_image_width">{$MODULE_LANG.admin_manage_form_page_field_width}</label><span><input type="text" name="banner[banner_image_width]" id="banner_image_width" class="textbox number" value="{$BANNER.banner_image_width}" /> {$MODULE_LANG.admin_manage_form_page_field_width_description}</span></div>
	  <div><label for="banner_image_height">{$MODULE_LANG.admin_manage_form_page_field_height}</label><span><input type="text" name="banner[banner_image_height]" id="banner_image_height" class="textbox number" value="{$BANNER.banner_image_height}" /> {$MODULE_LANG.admin_manage_form_page_field_height_description}</span></div>
	</fieldset>
  </div>

  <div id="banner_image" class="tab_content">
	<h3>{$MODULE_LANG.admin_manage_form_page_title}</h3>
	<div class="fm-container">
	  <div id="image" rel="1" class="fm-filelist unique"></div>
	</div>
	<div><label for="uploader">{$MODULE_LANG.admin_manage_form_page_field_upload}</label><span><input name="image" id="uploader" type="file" /></span></div>
	<script type="text/javascript">
	var file_list = {$JSON_IMAGES}
	</script>
  </div>

  <input type="hidden" name="banner[banner_id]" value="{$BANNER.banner_id}" />

{else}

	<div id="bannerimages" class="tab_content">

	  {if $LIST_HEADERBANNERIMAGES}
		<h3>{$MODULE_LANG.admin_manage_list_title_header}</h3>
		<table class="list" width="100%">
		  <thead>
			<tr>
			  <td width="5%" align="center">{$MODULE_LANG.admin_manage_list_heading_status}</td>
			  <td width="20%" align="center">{$MODULE_LANG.admin_manage_list_heading_image}</td>
			  <td width="20%" align="center">{$MODULE_LANG.admin_manage_list_heading_name}</td>
			  <td width="20%" align="center">{$MODULE_LANG.admin_manage_list_heading_manufacturer_name}</td>
			  <td width="25%" align="center">{$MODULE_LANG.admin_manage_list_heading_url}</td>
			  <td width="10%" align="center">&nbsp;</td>
			</tr>
		  </thead>
		  <tbody class="reorder-list">
		  {if isset($HEADERBANNERIMAGES)}
		  {foreach from=$HEADERBANNERIMAGES item=headerbannerimage}
			<tr>
			  <td align="center">
				<input type="hidden" name="banner_status[{$headerbannerimage.banner_id}]" id="headerbanner_{$headerbannerimage.banner_id}" value="{$headerbannerimage.banner_status}" class="toggle" />
			  </td>
			  <td align="center">
				{if !empty($headerbannerimage.image_path)}
					<a href="{$headerbannerimage.image_path}" class="colorbox" title="{$headerbannerimage.banner_name}" target="_blank"><img src="{$headerbannerimage.image_thumb}" alt="{$headerbannerimage.banner_name}" /></a>
				{/if}
			  </td>
			  <td align="center">
				{$headerbannerimage.banner_name}
			  </td>
			  <td align="center">
				{$headerbannerimage.banner_manufacturer_name}
			  </td>
			  <td align="center">
				{$headerbannerimage.banner_url}
			  </td>
			  <td align="center">
				<a href="{$headerbannerimage.edit}" title="{$LANG.common.edit}"><img src="{$SKIN_VARS.admin_folder}/skins/{$SKIN_VARS.skin_folder}/images/edit.png" alt="{$LANG.common.edit}" /></a>
				<a href="{$headerbannerimage.delete}" class="delete" title="{$LANG.notification.confirm_delete}"><img src="{$SKIN_VARS.admin_folder}/skins/{$SKIN_VARS.skin_folder}/images/delete.png" alt="{$LANG.common.delete}" /></a>
			  </td>
			</tr>
			{/foreach}
			{else}
			<tr>
			  <td colspan="6" align="center"><strong>{$LANG.form.none}</strong></td>
			</tr>
			{/if}
		  </tbody>
		</table>
		<br />
	  {/if}

	  {if $LIST_SIDEBOXBANNERIMAGES}
		<h3>{$MODULE_LANG.admin_manage_list_title_sidebox}</h3>
		<table class="list" width="100%">
		  <thead>
			<tr>
			  <td width="5%" align="center">{$MODULE_LANG.admin_manage_list_heading_status}</td>
			  <td width="20%" align="center">{$MODULE_LANG.admin_manage_list_heading_image}</td>
			  <td width="20%" align="center">{$MODULE_LANG.admin_manage_list_heading_name}</td>
			  <td width="20%" align="center">{$MODULE_LANG.admin_manage_list_heading_manufacturer_name}</td>
			  <td width="25%" align="center">{$MODULE_LANG.admin_manage_list_heading_url}</td>
			  <td width="10%" align="center">&nbsp;</td>
			</tr>
		  </thead>
		  <tbody class="reorder-list">
		  {if isset($SIDEBOXBANNERIMAGES)}
		  {foreach from=$SIDEBOXBANNERIMAGES item=sideboxbannerimage}
			<tr>
			  <td align="center">
				<input type="hidden" name="banner_status[{$sideboxbannerimage.banner_id}]" id="sideboxbanner_{$sideboxbannerimage.banner_id}" value="{$sideboxbannerimage.banner_status}" class="toggle" />
			  </td>
			  <td align="center">
				{if !empty($sideboxbannerimage.image_path)}
					<a href="{$sideboxbannerimage.image_path}" class="colorbox" title="{$sideboxbannerimage.banner_name}" target="_blank"><img src="{$sideboxbannerimage.image_thumb}" alt="{$sideboxbannerimage.banner_name}" /></a>
				{/if}
			  </td>
			  <td align="center">
				{$sideboxbannerimage.banner_name}
			  </td>
			  <td align="center">
				{$sideboxbannerimage.banner_manufacturer_name}
			  </td>
			  <td align="center">
				{$sideboxbannerimage.banner_url}
			  </td>
			  <td align="center">
				<a href="{$sideboxbannerimage.edit}" title="{$LANG.common.edit}"><img src="{$SKIN_VARS.admin_folder}/skins/{$SKIN_VARS.skin_folder}/images/edit.png" alt="{$LANG.common.edit}" /></a>
				<a href="{$sideboxbannerimage.delete}" class="delete" title="{$LANG.notification.confirm_delete}"><img src="{$SKIN_VARS.admin_folder}/skins/{$SKIN_VARS.skin_folder}/images/delete.png" alt="{$LANG.common.delete}" /></a>
			  </td>
			</tr>
			{/foreach}
			{else}
			<tr>
			  <td colspan="6" align="center"><strong>{$LANG.form.none}</strong></td>
			</tr>
			{/if}
		  </tbody>
		</table>
		<br />
	  {/if}

	  {if $LIST_FOOTERBANNERIMAGES}
		<h3>{$MODULE_LANG.admin_manage_list_title_footer}</h3>
		<table class="list" width="100%">
		  <thead>
			<tr>
			  <td width="5%" align="center">{$MODULE_LANG.admin_manage_list_heading_status}</td>
			  <td width="20%" align="center">{$MODULE_LANG.admin_manage_list_heading_image}</td>
			  <td width="20%" align="center">{$MODULE_LANG.admin_manage_list_heading_name}</td>
			  <td width="20%" align="center">{$MODULE_LANG.admin_manage_list_heading_manufacturer_name}</td>
			  <td width="25%" align="center">{$MODULE_LANG.admin_manage_list_heading_url}</td>
			  <td width="10%" align="center">&nbsp;</td>
			</tr>
		  </thead>
		  <tbody class="reorder-list">
		  {if isset($FOOTERBANNERIMAGES)}
		  {foreach from=$FOOTERBANNERIMAGES item=footerbannerimage}
			<tr>
			  <td align="center">
				<input type="hidden" name="banner_status[{$footerbannerimage.banner_id}]" id="footerbanner_{$footerbannerimage.banner_id}" value="{$footerbannerimage.banner_status}" class="toggle" />
			  </td>
			  <td align="center">
				{if !empty($footerbannerimage.image_path)}
					<a href="{$footerbannerimage.image_path}" class="colorbox" title="{$footerbannerimage.banner_name}" target="_blank"><img src="{$footerbannerimage.image_thumb}" alt="{$footerbannerimage.banner_name}" /></a>
				{/if}
			  </td>
			  <td align="center">
				{$footerbannerimage.banner_name}
			  </td>
			  <td align="center">
				{$footerbannerimage.banner_manufacturer_name}
			  </td>
			  <td align="center">
				{$footerbannerimage.banner_url}
			  </td>
			  <td align="center">
				<a href="{$footerbannerimage.edit}" title="{$LANG.common.edit}"><img src="{$SKIN_VARS.admin_folder}/skins/{$SKIN_VARS.skin_folder}/images/edit.png" alt="{$LANG.common.edit}" /></a>
				<a href="{$footerbannerimage.delete}" class="delete" title="{$LANG.notification.confirm_delete}"><img src="{$SKIN_VARS.admin_folder}/skins/{$SKIN_VARS.skin_folder}/images/delete.png" alt="{$LANG.common.delete}" /></a>
			  </td>
			</tr>
			{/foreach}
			{else}
			<tr>
			  <td colspan="6" align="center"><strong>{$LANG.form.none}</strong></td>
			</tr>
			{/if}
		  </tbody>
		</table>
		<br />
	  {/if}

	  {if $LIST_NOTASSIGNEDBANNERIMAGES}
		<h3>{$MODULE_LANG.admin_manage_list_title_notassigned}</h3>
		<table class="list" width="100%">
		  <thead>
			<tr>
			  <td width="5%" align="center">{$MODULE_LANG.admin_manage_list_heading_status}</td>
			  <td width="20%" align="center">{$MODULE_LANG.admin_manage_list_heading_image}</td>
			  <td width="20%" align="center">{$MODULE_LANG.admin_manage_list_heading_name}</td>
			  <td width="20%" align="center">{$MODULE_LANG.admin_manage_list_heading_manufacturer_name}</td>
			  <td width="25%" align="center">{$MODULE_LANG.admin_manage_list_heading_url}</td>
			  <td width="10%" align="center">&nbsp;</td>
			</tr>
		  </thead>
		  <tbody class="reorder-list">
		  {if isset($NOTASSIGNEDBANNERIMAGES)}
		  {foreach from=$NOTASSIGNEDBANNERIMAGES item=notassignedbannerimage}
			<tr>
			  <td align="center">
				<input type="hidden" name="banner_status[{$notassignedbannerimage.banner_id}]" id="notassignedbanner_{$notassignedbannerimage.banner_id}" value="{$notassignedbannerimage.banner_status}" class="toggle" />
			  </td>
			  <td align="center">
				{if !empty($notassignedbannerimage.image_path)}
					<a href="{$notassignedbannerimage.image_path}" class="colorbox" title="{$notassignedbannerimage.banner_name}" target="_blank"><img src="{$notassignedbannerimage.image_thumb}" alt="{$notassignedbannerimage.banner_name}" /></a>
				{/if}
			  </td>
			  <td align="center">
				{$notassignedbannerimage.banner_name}
			  </td>
			  <td align="center">
				{$notassignedbannerimage.banner_manufacturer_name}
			  </td>
			  <td align="center">
				{$notassignedbannerimage.banner_url}
			  </td>
			  <td align="center">
				<a href="{$notassignedbannerimage.edit}" title="{$LANG.common.edit}"><img src="{$SKIN_VARS.admin_folder}/skins/{$SKIN_VARS.skin_folder}/images/edit.png" alt="{$LANG.common.edit}" /></a>
				<a href="{$notassignedbannerimage.delete}" class="delete" title="{$LANG.notification.confirm_delete}"><img src="{$SKIN_VARS.admin_folder}/skins/{$SKIN_VARS.skin_folder}/images/delete.png" alt="{$LANG.common.delete}" /></a>
			  </td>
			</tr>
			{/foreach}
			{else}
			<tr>
			  <td colspan="6" align="center"><strong>{$LANG.form.none}</strong></td>
			</tr>
			{/if}
		  </tbody>
		</table>
		<br />
	  {/if}

	</div>

{/if}

  <div class="form_control">
	<input type="hidden" name="previous-tab" id="previous-tab" value="" />
	<input type="submit" id="slide_save" value="{$LANG.common.save}" class="button" />
  </div>
  <input type="hidden" name="token" value="{$SESSION_TOKEN}" />

</form>