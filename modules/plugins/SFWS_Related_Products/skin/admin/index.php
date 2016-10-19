<style>
#new-version-available {
	display: inline-block; 
	border: 2px solid #008000; 
	color: #008000; 
	font-weight: bold; 
	padding: 5px;
}
#new-version-available a {
	color: #008000; 
}
#new-version-available a:hover {
	color: #F3068F; 
}
</style>

<form action="{$VAL_SELF}" method="post" enctype="multipart/form-data">
	<div id="SFWS_Related_Products" class="tab_content">
		<h3>{$LANG.sfws_related_products.module_title} ({$PLUGIN_VERSION})</h3>
		{if $NEW_VERSION_AVAILABLE}
			<div id="new-version-available">
				<a href="https://www.semperfiwebservices.com/index.php?_a=downloads" target="_blank" title="Version {$LATEST_VERSION} is now available!">Version {$LATEST_VERSION} is now available!</a>
			</div>
		{/if}
		<p><strong>Created and Developed by <a href="http://www.semperfiwebservices.com/index.php" title="SemperFiWebServices" alt="SemperFiWebServices" target="_blank">SemperFiWebServices</a></strong></p>
		<p>{$LANG.sfws_related_products.module_description}</p>
		<p>Full instructions for this plugin can be found <a href="{$STORE_URL}/modules/plugins/SFWS_Related_Products/SFWS-Related-Products-CC6-Plugin-Install-Instructions.txt" title="Plugin Instructions" target="_blank">here</a>.</p>
		<p>The related products can be managed <a href="?_g=plugin&name=manage_related_products">here</a>.</p>
		<p>The language entries for this plugin can be changed <a href="?_g=settings&node=language&language={$CONFIG.default_language}&type=modules%2Fplugins%2FSFWS_Related_Products%2Flanguage%2Fmodule.definitions.xml">here</a>.</p>
		<p>The hooks for this plugin can be managed <a href="?_g=settings&node=hooks&plugin=SFWS_Related_Products">here</a>.</p>
		<fieldset><legend>{$LANG.module.config_settings}</legend>
			<div><label for="status">{$LANG.common.status}</label><span><input type="hidden" name="module[status]" id="status" class="toggle" value="{$MODULE.status}" />&nbsp;</span></div>
			<div><label for="sfws_related_products_product_pages_status">{$LANG.sfws_related_products.admin_config_product_pages_status}</label><span><input type="hidden" name="module[sfws_related_products_product_pages_status]" id="sfws_related_products_product_pages_status" class="toggle" value="{$MODULE.sfws_related_products_product_pages_status}" />&nbsp;</span></div>
			<div><label for="sfws_related_products_product_pages_random_status">{$LANG.sfws_related_products.admin_config_product_pages_random_status}</label><span><input type="hidden" name="module[sfws_related_products_product_pages_random_status]" id="sfws_related_products_product_pages_random_status" class="toggle" value="{$MODULE.sfws_related_products_product_pages_random_status}" />&nbsp;</span></div>
			<div><label for="sfws_related_products_product_pages_amount">{$LANG.sfws_related_products.admin_config_product_pages_amount}</label><span><input name="module[sfws_related_products_product_pages_amount]" id="sfws_related_products_product_pages_amount" class="textbox number" type="text" value="{$MODULE.sfws_related_products_product_pages_amount}" /></span></div>
			<div><label for="sfws_related_products_checkout_pages_status">{$LANG.sfws_related_products.admin_config_checkout_pages_status}</label><span><input type="hidden" name="module[sfws_related_products_checkout_pages_status]" id="sfws_related_products_checkout_pages_status" class="toggle" value="{$MODULE.sfws_related_products_checkout_pages_status}" />&nbsp;</span></div>
			<div><label for="sfws_related_products_checkout_pages_random_status">{$LANG.sfws_related_products.admin_config_checkout_pages_random_status}</label><span><input type="hidden" name="module[sfws_related_products_checkout_pages_random_status]" id="sfws_related_products_checkout_pages_random_status" class="toggle" value="{$MODULE.sfws_related_products_checkout_pages_random_status}" />&nbsp;</span></div>
			<div><label for="sfws_related_products_checkout_pages_amount">{$LANG.sfws_related_products.admin_config_checkout_pages_amount}</label><span><input name="module[sfws_related_products_checkout_pages_amount]" id="sfws_related_products_checkout_pages_amount" class="textbox number" type="text" value="{$MODULE.sfws_related_products_checkout_pages_amount}" /></span></div>
		</fieldset>
	</div>
	{$MODULE_ZONES}
	<div class="form_control">
		<input type="submit" name="save" value="{$LANG.common.save}" />
	</div>
	<input type="hidden" name="token" value="{$SESSION_TOKEN}" />
</form>