<form action="{$VAL_SELF}" method="post" enctype="multipart/form-data">
<div id="general" class="tab_content">
	<h3>{$MODULE_LANG.admin_manage_page_title}</h3>
	<p>{$MODULE_LANG.admin_manage_page_description}</p>

	{if isset($DISPLAY_CATEGORIES)}
		{$MODULE_LANG.admin_manage_page_step_1}
		<br />
		<select id="sfws_categories">
			<option value="psc">--- {$MODULE_LANG.admin_manage_page_please_select} ---</option>
			{foreach from=$CAT_LIST item=cat_dropdown}
				<option value="{$cat_dropdown.cat_id}" {if $cat_dropdown.cat_id == $CURRENT_CAT}selected="selected"{/if}>{$cat_dropdown.name}</option>
			{/foreach}
		</select>
	{/if}

	{if isset($DISPLAY_PRODUCTS)}
		<br /><br />
		{$MODULE_LANG.admin_manage_page_step_2}
		<br />
		<select id="sfws_products">
			<option value="psp">--- {$MODULE_LANG.admin_manage_page_please_select} ---</option>
			{foreach from=$PRODUCTS item=product}
				<option value="{$product.product_id}" {if $product.product_id == $CURRENT_PRODUCT}selected="selected"{/if}>{$product.formatted_name}</option>
			{/foreach}
		</select>
	{/if}

	{if isset($DISPLAY_CATEGORIES_FROM)}
		<br /><br />
		{$MODULE_LANG.admin_manage_page_step_3}
		<br />
		<select id="sfws_categories_from">
			<option value="pscf">--- {$MODULE_LANG.admin_manage_page_please_select} ---</option>
			{foreach from=$CAT_LIST_FROM item=cat_dropdown}
				<option value="{$cat_dropdown.cat_id}" {if $cat_dropdown.cat_id == $CURRENT_CAT_FROM}selected="selected"{/if}>{$cat_dropdown.name}</option>
			{/foreach}
		</select>
	{/if}

	{if isset($DISPLAY_RELATED_PRODUCTS)}
		<br /><br />
		{$MODULE_LANG.admin_manage_page_step_4}
		<br />
		<table class="list" width="100%">
			<thead>
				<tr>
					<th width="10%" align="center">{$MODULE_LANG.admin_manage_page_heading_assignment}</th>
					<th width="10%" align="center">{$MODULE_LANG.admin_manage_page_heading_product_id}</th>
					<th width="10%" align="center">{$MODULE_LANG.admin_manage_page_heading_product_code}</th>
					<th width="10%" align="center">{$MODULE_LANG.admin_manage_page_heading_product_image}</th>
					<th width="60%" align="left">{$MODULE_LANG.admin_manage_page_heading_product_name}</th>
				</tr>
			</thead>
			<tbody>
				{if isset($RELATED_PRODUCTS)}
					{foreach from=$RELATED_PRODUCTS item=related_product}
						<tr>
							<td width="10%" align="center">
								<input type="radio" name="related_products[{$related_product.product_id}]" value="0" {$related_product.no_checked}> No
								<input type="radio" name="related_products[{$related_product.product_id}]" value="1" {$related_product.yes_checked}> Yes
							</td>
							<td width="10%" align="center">{$related_product.product_id}</td>
							<td width="10%" align="center">{$related_product.product_code}</td>
							<td width="10%" align="center">
							{if !empty({$related_product.main_image})}
								<img src="{$related_product.main_image}" id="master_image_preview" />
							{else}
								---
							{/if}
							</td>
							<td width="60%" align="left">{$related_product.name}</td>
						</tr>
					{/foreach}
				{else}
					<tr>
						<td colspan="5" align="center">{$MODULE_LANG.admin_manage_page_no_products_found}</td>
					</tr>
				{/if}
			</tbody>
		</table>
		<br />
		<div class="form_control" style="padding-left: 0px;">
			<input type="hidden" name="save" value="{$FORM_HASH}" />
			<input type="hidden" name="previous-tab" id="previous-tab" value="" />
			<input type="hidden" name="active_product_id" value="{$ACTIVE_PRODUCT_ID}" />
			<input type="hidden" name="active_cat_id" value="{$ACTIVE_CAT_ID}" />
			<input type="hidden" name="token" value="{$SESSION_TOKEN}" />				
			<input type="submit" value="{$LANG.common.save}" />
		</div>

	{/if}
</div>
</form>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript">
$('#sfws_categories').change(function(){
	$location = document.URL;
        if ($location.indexOf('cat_id') != -1) {
		$location = removeVariableFromURL($location, 'cat_id');
        }
        if ($(this).val() != 'psc') {
                $location += "&cat_id=" + $(this).val();
        }
        window.location.replace($location);
});
$('#sfws_products').change(function(){
	$location = document.URL;
        if ($location.indexOf('product_id') != -1) {
		$location = removeVariableFromURL($location, 'product_id');
        }
        if ($(this).val() != 'psp') {
		$location += "&product_id=" + $(this).val();
        }
        window.location.replace($location);
});
$('#sfws_categories_from').change(function(){
        $location = document.URL;
        if ($location.indexOf('from_cat_id') != -1) {
                $location = removeVariableFromURL($location, 'from_cat_id');
        }
        if ($(this).val() != 'pscf') {
                $location += "&from_cat_id=" + $(this).val();
        }
        window.location.replace($location);
 });
</script>