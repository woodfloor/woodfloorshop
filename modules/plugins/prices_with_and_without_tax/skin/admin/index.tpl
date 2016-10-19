<form action="{$VAL_SELF}" method="post" enctype="multipart/form-data">
  <div id="{$PLUGIN_NAME}" class="tab_content">
	<h3>{$PLUGIN_TITLE}</h3>
	<p>This plugin can be used in one of two ways. </p>
		<ol>
			<li>You can use the configuration options below to force your prices to show with tax or without tax. This option requires no changes to your store skin, however as of version 1.0.2 it is now possible to allow your customers to choose if they want to see prices including or excluding tax. There is a code example below on how to do this, but you will need to include the code in your store skin and design it as required. Support can assist with this if you are unsusre on how to edit your store skin files.</li>
			<li>You can manually modify your store skin template and use the additional smarty template variables that this module adds. The table below shows the values that can be used in your store.</li>
		</ol>

	<fieldset><legend>Configuration Settings</legend>
		<div><label for="status">{$LANG.common.status}</label><span><input type="hidden" name="module[status]" id="status" class="toggle" value="{$MODULE.status}" />&nbsp;</span></div>
		<div><label for="force_tax_display1">Do not force override any prices</label><span><input type="radio" name="module[force_price_display]" id="force_tax_display1" value="1" {$CHECKED_force_price_display_1} />&nbsp;</span></div>
		<div><label for="force_tax_display2">Force all prices to display including tax</label><span><input type="radio" name="module[force_price_display]" id="force_tax_display2" value="2" {$CHECKED_force_price_display_2} />&nbsp;</span></div>
		<div><label for="force_tax_display3">Force all prices to display excluding tax</label><span><input type="radio" name="module[force_price_display]" id="force_tax_display3" value="3" {$CHECKED_force_price_display_3} />&nbsp;</span></div>
		<div><label for="enable_tax_link_box">Show Links In Skin (Requires Skin Change)</label><span><input type="hidden" name="module[enable_tax_link_box]" id="enable_tax_link_box" class="toggle" value="{$MODULE.enable_tax_link_box}" />&nbsp;</span></div>
		<div><label for="default_price_includes_tax">Prices Include Tax Unless Changed by Customer When using Links</label><span><input type="hidden" name="module[default_price_includes_tax]" id="default_price_includes_tax" class="toggle" value="{$MODULE.default_price_includes_tax}" />&nbsp;</span></div>
	</fieldset>
	
	<fieldset><legend>License Settings</legend>
		<div><label for="ndl_license_key">License Key</label><span><input name="module[ndl_license_key]" id="ndl_license_key" class="textbox" type="text" value="{$PLUGIN_LICENSE_KEY}" /></span></div>

		{$PLUGIN_LICENSE_STATUS}
		{$PLUGIN_SUPPORT_STATUS}
		{if isset($PLUGIN_SUPPORT_ENDS)}
			{$PLUGIN_SUPPORT_ENDS}	
		{/if}
		
		<input type="hidden" name="module[general_tab]" value="general_tab">
	</fieldset>
	
	<input type="submit" value="{$LANG.common.save}" />	

	<fieldset><legend>Plugin Version Information & Messages</legend>
		<div>Version: {$PLUGIN_VERSION} </div>
		{if isset($PLUGIN_MESSAGES)}
			{$PLUGIN_MESSAGES}
		{/if}
	</fieldset>	
	
	<fieldset><legend>Code Sample - Allow your customers to choose</legend>
		<p>As of version 1.0.2 it is possible to give your customers the choice of which prices they would like to see. It is recommended this option be used if you only intend to show a single price in your store, tax inclusive or tax excluded. If you are using the custom smarty variables as defined below this option is not recommended. If using this option customers can either to view your store with prices either including or excluding tax.. This is achieved by setting the value &quot;display_tax_prices&quot; via a URL. </p>
		<p>A new smarty variable named &quot;PRICES_INCLUDE_TAX&quot; will have a value of true if prices are being displayed inclusive of tax.</p>

		<p>If you wish to use this option you must configure the &quot;Do not override any prices&quot; option to be checked. You can define if prices are initially displayed to your customer inclusive of tax or excluding tax. When the &quot;Prices Include Tax Unless Changed by Customer When using Links&quot; setting is checked prices are displayed inclusive of tax, when unchecked prices are displayed excluding tax unless the customer has overridden the default.</p>
		
		<p>The code sample below serves as an example on how to build this into your store skin. If you wish to use this option you will need to build this into your skin to match your store style. Support can assist you with this activity if required.</p>
		
		<textarea style="width:90%; height:250px;">
{literal}			
{if isset($ENABLE_TAX_LINK_BOX) && $ENABLE_TAX_LINK_BOX == true}	
	<div id="tax_display_settings">
	  <h3>Show Prices</h3>
		<a title="Including VAT" href="?display_tax_prices=1">Including VAT</a>
		<br/>
		<a title="Excluding VAT" href="?display_tax_prices=0">Excluding VAT</a>
		
		{if $PRICES_INCLUDE_TAX == true}
			<p>Including Tax</p>
		{else}
			<p>Excluding Tax</p>
		{/if}
	</div>		
{/if}	
{/literal}
		</textarea>
		
	</fieldset>
	
	
	
	<fieldset><legend>Skin Template Values</legend>
	<p>The plugin makes the following smarty variables are made available for use in store template files. These can be used to build custom price displays into your store. If you are using the dynamic price update feature of the foundation skin you should also update the &quot;data-price&quot; attributes of the product options with the unformatted values. The correct prices will then be calculated correctly</p>
		<table>
			<thead>
				<tr>
					<td>Skin Page</td>
					<td>Skin File Name</td>
					<td>New Option</td>
					<td>New Option Description</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Latest Products</td>
					<td>content.homepage.php</td>
					<td>$product.price_including_tax_unformatted</td>
					<td>Displays the product price inclusive of tax without the currency symbol</td>
				</tr>
				<tr>
					<td>Latest Products</td>
					<td>content.homepage.php</td>
					<td>$product.price_including_tax</td>
					<td>Displays the product price inclusive of tax with the currency symbol</td>
				</tr>				
				<tr>
					<td>Latest Products</td>
					<td>content.homepage.php</td>
					<td>$product.price_excluding_tax_unformatted</td>
					<td>Displays the product price excluding tax without the currency symbol</td>
				</tr>								
				<tr>
					<td>Latest Products</td>
					<td>content.homepage.php</td>
					<td>$product.price_excluding_tax</td>
					<td>Displays the product price excluding tax with the currency symbol</td>
				</tr>												
				<tr>
					<td>Latest Products</td>
					<td>content.homepage.php</td>
					<td>$product.sale_price_including_tax_unformatted</td>
					<td>Displays the product sale price including tax without the currency symbol</td>
				</tr>						
				<tr>
					<td>Latest Products</td>
					<td>content.homepage.php</td>
					<td>$product.sale_price_including_tax</td>
					<td>Displays the product sale price including tax with the currency symbol</td>
				</tr>										
				<tr>
					<td>Latest Products</td>
					<td>content.homepage.php</td>
					<td>$product.sale_price_excluding_tax_unformatted</td>
					<td>Displays the product sale price excluding tax without the currency symbol</td>
				</tr>														
				<tr>
					<td>Latest Products</td>
					<td>content.homepage.php</td>
					<td>$product.sale_price_excluding_tax</td>
					<td>Displays the product sale price excluding tax with the currency symbol</td>
				</tr>		
				<tr>
					<td>Latest Products</td>
					<td>content.homepage.php</td>
					<td>$product.tax_name</td>
					<td>Displays the name of the tax detail being applied</td>
				</tr>												
				<tr>
					<td>Latest Products</td>
					<td>content.homepage.php</td>
					<td>$product.tax_display_name</td>
					<td>Displays the display name of the tax detail being applied</td>
				</tr>																
				<tr>
					<td>Latest Products</td>
					<td>content.homepage.php</td>
					<td>$product.tax_percent</td>
					<td>Displays the applied tax rate as a percentage</td>
				</tr>									
				<tr>
					<td>Categories Product List</td>
					<td>content.category.php</td>
					<td>$product.price_including_tax_unformatted</td>
					<td>Displays the product price inclusive of tax without the currency symbol</td>
				</tr>
				<tr>
					<td>Categories Product List</td>
					<td>content.category.php</td>
					<td>$product.price_including_tax</td>
					<td>Displays the product price inclusive of tax with the currency symbol</td>
				</tr>				
				<tr>
					<td>Categories Product List</td>
					<td>content.category.php</td>
					<td>$product.price_excluding_tax_unformatted</td>
					<td>Displays the product price excluding tax without the currency symbol</td>
				</tr>								
				<tr>
					<td>Categories Product List</td>
					<td>content.category.php</td>
					<td>$product.price_excluding_tax</td>
					<td>Displays the product price excluding tax with the currency symbol</td>
				</tr>												
				<tr>
					<td>Categories Product List</td>
					<td>content.category.php</td>
					<td>$product.sale_price_including_tax_unformatted</td>
					<td>Displays the product sale price including tax without the currency symbol</td>
				</tr>						
				<tr>
					<td>Categories Product List</td>
					<td>content.category.php</td>
					<td>$product.sale_price_including_tax</td>
					<td>Displays the product sale price including tax with the currency symbol</td>
				</tr>										
				<tr>
					<td>Categories Product List</td>
					<td>content.category.php</td>
					<td>$product.sale_price_excluding_tax_unformatted</td>
					<td>Displays the product sale price excluding tax without the currency symbol</td>
				</tr>														
				<tr>
					<td>Categories Product List</td>
					<td>content.category.php</td>
					<td>$product.sale_price_excluding_tax</td>
					<td>Displays the product sale price excluding tax with the currency symbol</td>
				</tr>		
				<tr>
					<td>Categories Product List</td>
					<td>content.category.php</td>
					<td>$product.tax_name</td>
					<td>Displays the name of the tax detail being applied</td>
				</tr>												
				<tr>
					<td>Categories Product List</td>
					<td>content.category.php</td>
					<td>$product.tax_display_name</td>
					<td>Displays the display name of the tax detail being applied</td>
				</tr>																
				<tr>
					<td>Categories Product List</td>
					<td>content.category.php</td>
					<td>$product.tax_percent</td>
					<td>Displays the applied tax rate as a percentage</td>
				</tr>					
				<tr>
					<td>Viewing a Product</td>
					<td>content.product.php</td>
					<td>$PRODUCT.price_including_tax_unformatted</td>
					<td>Displays the product price inclusive of tax without the currency symbol</td>
				</tr>
				<tr>
					<td>Viewing a Product</td>
					<td>content.product.php</td>
					<td>$PRODUCT.price_including_tax</td>
					<td>Displays the product price inclusive of tax with the currency symbol</td>
				</tr>				
				<tr>
					<td>Viewing a Product</td>
					<td>content.product.php</td>
					<td>$PRODUCT.price_excluding_tax_unformatted</td>
					<td>Displays the product price excluding tax without the currency symbol</td>
				</tr>								
				<tr>
					<td>Viewing a Product</td>
					<td>content.product.php</td>
					<td>$PRODUCT.price_excluding_tax</td>
					<td>Displays the product price excluding tax with the currency symbol</td>
				</tr>												
				<tr>
					<td>Viewing a Product</td>
					<td>content.product.php</td>
					<td>$PRODUCT.sale_price_including_tax_unformatted</td>
					<td>Displays the product sale price including tax without the currency symbol</td>
				</tr>						
				<tr>
					<td>Viewing a Product</td>
					<td>content.product.php</td>
					<td>$PRODUCT.sale_price_including_tax</td>
					<td>Displays the product sale price including tax with the currency symbol</td>
				</tr>										
				<tr>
					<td>Viewing a Product</td>
					<td>content.product.php</td>
					<td>$PRODUCT.sale_price_excluding_tax_unformatted</td>
					<td>Displays the product sale price excluding tax without the currency symbol</td>
				</tr>														
				<tr>
					<td>Viewing a Product</td>
					<td>content.product.php</td>
					<td>$PRODUCT.sale_price_excluding_tax</td>
					<td>Displays the product sale price excluding tax with the currency symbol</td>
				</tr>		
				<tr>
					<td>Viewing a Product</td>
					<td>content.product.php</td>
					<td>$PRODUCT.tax_name</td>
					<td>Displays the name of the tax detail being applied</td>
				</tr>												
				<tr>
					<td>Viewing a Product</td>
					<td>content.product.php</td>
					<td>$PRODUCT.tax_display_name</td>
					<td>Displays the display name of the tax detail being applied</td>
				</tr>																
				<tr>
					<td>Viewing a Product</td>
					<td>content.product.php</td>
					<td>$PRODUCT.tax_percent</td>
					<td>Displays the applied tax rate as a percentage</td>
				</tr>	
				<tr>
					<td>Product Options</td>
					<td>content.product.php</td>
					<td>$value.price_including_tax_unformatted</td>
					<td>Displays the product price inclusive of tax without the currency symbol</td>
				</tr>
				<tr>
					<td>Product Options</td>
					<td>content.product.php</td>
					<td>$value.price_including_tax</td>
					<td>Displays the product price inclusive of tax with the currency symbol</td>
				</tr>				
				<tr>
					<td>Product Options</td>
					<td>content.product.php</td>
					<td>$value.price_excluding_tax_unformatted</td>
					<td>Displays the product price excluding tax without the currency symbol</td>
				</tr>								
				<tr>
					<td>Product Options</td>
					<td>content.product.php</td>
					<td>$value.price_excluding_tax</td>
					<td>Displays the product price excluding tax with the currency symbol</td>
				</tr>
				<tr>
					<td>Product Options</td>
					<td>content.product.php</td>
					<td>$value.tax_name</td>
					<td>Displays the name of the tax detail being applied</td>
				</tr>												
				<tr>
					<td>Product Options</td>
					<td>content.product.php</td>
					<td>$value.tax_display_name</td>
					<td>Displays the display name of the tax detail being applied</td>
				</tr>																
				<tr>
					<td>Product Options</td>
					<td>content.product.php</td>
					<td>$value.tax_percent</td>
					<td>Displays the applied tax rate as a percentage</td>
				</tr>	

				<tr>
					<td>Featured Product</td>
					<td>box.featured.php</td>
					<td>$featured.price_including_tax_unformatted</td>
					<td>Displays the product price inclusive of tax without the currency symbol</td>
				</tr>
				<tr>
					<td>Featured Product</td>
					<td>box.featured.php</td>
					<td>$featured.price_including_tax</td>
					<td>Displays the product price inclusive of tax with the currency symbol</td>
				</tr>				
				<tr>
					<td>Featured Product</td>
					<td>box.featured.php</td>
					<td>$featured.price_excluding_tax_unformatted</td>
					<td>Displays the product price excluding tax without the currency symbol</td>
				</tr>								
				<tr>
					<td>Featured Product</td>
					<td>box.featured.php</td>
					<td>$featured.price_excluding_tax</td>
					<td>Displays the product price excluding tax with the currency symbol</td>
				</tr>
				<tr>
					<td>Featured Product</td>
					<td>box.featured.php</td>
					<td>$featured.tax_name</td>
					<td>Displays the name of the tax detail being applied</td>
				</tr>												
				<tr>
					<td>Featured Product</td>
					<td>box.featured.php</td>
					<td>$featured.tax_display_name</td>
					<td>Displays the display name of the tax detail being applied</td>
				</tr>																
				<tr>
					<td>Featured Product</td>
					<td>box.featured.php</td>
					<td>$featured.tax_percent</td>
					<td>Displays the applied tax rate as a percentage</td>
				</tr>	
				<tr>
					<td>Popular Products / Best Sellers</td>
					<td>box.popular.php</td>
					<td>$product.price_including_tax</td>
					<td>Displays the product price inclusive of tax with the currency symbol</td>
				</tr>				
				<tr>
					<td>Popular Products / Best Sellers</td>
					<td>box.popular.php</td>
					<td>$product.price_excluding_tax_unformatted</td>
					<td>Displays the product price excluding tax without the currency symbol</td>
				</tr>								
				<tr>
					<td>Popular Products / Best Sellers</td>
					<td>box.popular.php</td>
					<td>$product.price_excluding_tax</td>
					<td>Displays the product price excluding tax with the currency symbol</td>
				</tr>
				<tr>
					<td>Popular Products / Best Sellers</td>
					<td>box.popular.php</td>
					<td>$product.tax_name</td>
					<td>Displays the name of the tax detail being applied</td>
				</tr>												
				<tr>
					<td>Popular Products / Best Sellers</td>
					<td>box.popular.php</td>
					<td>$product.tax_display_name</td>
					<td>Displays the display name of the tax detail being applied</td>
				</tr>																
				<tr>
					<td>Popular Products / Best Sellers</td>
					<td>box.popular.php</td>
					<td>$product.tax_percent</td>
					<td>Displays the applied tax rate as a percentage</td>
				</tr>					
			</tbody>
		</table>
	</fieldset>		
	
  <div class="form_control">
	<input type="submit" value="{$LANG.common.save}" />
  </div>
  <input type="hidden" name="token" value="{$SESSION_TOKEN}" />
</form>