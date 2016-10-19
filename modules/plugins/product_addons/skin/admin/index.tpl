<div id="{$PLUGIN_NAME}" class="tab_content">
<form action="{$VAL_SELF}" method="post" enctype="multipart/form-data">
	<h3>{$PLUGIN_TITLE}</h3>

	<fieldset><legend>Configuration Settings</legend>
		<div><label for="status">{$LANG.common.status}</label><span><input type="hidden" name="module[status]" id="status" class="toggle" value="{$MODULE.status}" />&nbsp;</span></div>
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

	<fieldset><legend>Plugin Version Information & Messages</legend>
		<div>Version: {$PLUGIN_VERSION} </div>
		{if isset($PLUGIN_MESSAGES)}
			{$PLUGIN_MESSAGES}
		{/if}
	</fieldset>	
	
  <div class="form_control">
	<input type="submit" value="{$LANG.common.save}" />
  </div>
  <input type="hidden" name="token" value="{$SESSION_TOKEN}" />
</form>
</div>

<div id="install_guide" class="tab_content">
	<h3>Install Guide</h3>
	<p>The following sample code is for use if you are using the standard foundation skin included with CubeCart 6. The code is a working example and can be modified to suit your own requirements.</p>
	
	<ol>
		<li>
			<p><span style="font-weight:bold;">Open file /skins/foundation/templates/content.product.php</span>, around line number 125 find:</p>
<textarea style="width:100%; height:66px;">{literal}
<div class="small-12 medium-10 columns">
  <button type="submit" value="{$LANG.catalogue.add_to_basket}" class="button postfix">{$LANG.catalogue.add_to_basket}</button>
</div>
{/literal}</textarea>
			<p>AFTER ON A NEW LINE ADD:<p>
<textarea style="width:100%; height:2000px;">{literal}
{if $ADD_ONS_PRODUCT}
	<div style="clear:both;margin-top: 20px;">
		<br/>
		{literal}        	
		        <style type="text/css">
			@CHARSET "UTF-8";
			#navigation {width:100%;}								
			#addoncontent {width:350px;}								
			.collapsible,.page_collapsible {margin: 0;padding:10px;height:40px;border-top:#f0f0f0 1px solid;background: #cccccc;font-family: Arial, Helvetica, sans-serif;text-decoration:none;text-transform:uppercase;color: #000;font-size:1em;}								
			.collapse-open {background:#cccccc;color: #B92636; cursor: pointer; cursor: hand;}							
			.collapse-open span {display:block;float:right;padding:10px;}								
			.collapse-open span {background:url({/literal}{$STORE_URL}/modules/plugins/product_addons/images/minus.png{literal}) center center no-repeat;}								
			.collapse-close span {display:block;float:right;background:url({/literal}{$STORE_URL}/modules/plugins/product_addons/images/plus.png{literal}) center center no-repeat;padding:10px;cursor: pointer;}								
			div.addoncontainer {padding:0;margin:0;}								
			div.addoncontent {background:#f0f0f0;margin: 0;padding:10px;font-size:.9em;line-height:1.5em;font-family:"Helvetica Neue", Arial, Helvetica, Geneva, sans-serif;}								
			div.addoncontent ul, div.addoncontent p {margin:0;padding:3px;}								
			div.addoncontent ul li {list-style-position:inside;line-height:25px;}								
			div.addoncontent ul li a {color:#555555;}
			table.addons{border-collapse:collapse; width:100%;}
			.addonproduct-information {
				background: none;
				border: 0px;
				border-radius: 0px;
				padding: 0px;
				width:380px;
				text-align:left;
				margin-left:0px;
			}
			.addonscontrols{margin-left:120px;}  
			.small-7 {
				width: 40%;
			}	
			.small-5 {
				width: 60%;
			}					
		</style>
	{/literal}	
                       
	<div id="navigation">
        <div class="collapsible" id="section1">Accessories and Essentials<span></span></div>
        	<div class="addoncontainer">
                <div class="addoncontent">                                        				
                    
                    <table class="addons">  
                     <tbody>  
                     {foreach from=$ADD_ONS_PRODUCT item=product}
                     	{if isset($product.options) && is_array($product.options)}                 
                        <tr>
                        {else}
                        <tr style="border-bottom:1px dashed #CCC; text-align:center;height:65px;">
                        {/if}
                            <td width="12%"><a href="{$product.link}" title="{$product.name}"><img style="border:1px solid #FFF;" src="{$product.image}" alt="{$product.name}" /></a><br />
                            </td>
                            <td width="60%" style="text-align:left;">&nbsp;{$product.name}</td>
                            
							
							<!-- <td width="5%" valign="middle"><input type="checkbox" name="add_addons[{$product.addon_product_id}]" value="{$product.addon_product_id}" /></td> -->
							<input type="hidden" name="addon_id[{$product.addon_product_id}]" value="{$product.addon_id}" />
							<input type="hidden" name="add_addons[{$product.addon_product_id}]" value="{$product.addon_product_id}" />							
							
							
                            <td width="15%" valign="middle" style="text-align:center;"> <input style="width: 60px;" type="number" name="quantity_addons[{$product.addon_product_id}]" value="0" min="0"  {if $product.stock_level}max="{$product.stock_level}"{/if} class="input-mini" /></td>
                            <td width="8%" style="text-align:right;">{$product.addon_price}</td>                            
                        </tr>
                        {if isset($product.options) && is_array($product.options)}
                		<tr style="border-bottom:1px dashed #CCC; text-align:center;">
                            <td colspan="5" valign="top">
                            	<div class="addonproduct-information form-horizontal">
                                <div class="product-options">                    	   
                                {foreach from=$product.options item=option}
                                    <div class="control-group">
                                    	<label class="control-label" for="addonsproduct-option-{$product.addon_product_id}{$option.option_id}">
                                           <strong> {$option.option_name}</strong>
                                        </label>                                
                                        <div class="addonscontrols">                                	
                                            {if $option.type == '0'}
                                                <select id="addonsproduct-option-{$product.addon_product_id}{$option.option_id}" name="productOptions_addons[{$product.addon_product_id}][{$option.option_id}]" class="input-fill chzn-select" style=" width:260px;">
                                                    <option value="" data-symbol="" data-price="">{$LANG.form.please_select}</option>
                                                    {foreach from=$option.values item=value}
                                                        <option value="{$value.assign_id}" data-symbol="{$value.symbol}" data-price="{$value.price}">
                                                            {$value.value_name}
                                                            {if $value.price}({$value.symbol}{$value.price}){/if}
                                                        </option>
                                                    {/foreach}
                                                </select>
                                            {else}
                                                {$price = preg_replace('/[^0-9-.]/', '', $option.price)}
                                                {if $price > 0}<div class="input-append">{/if}
                                                    {strip}
                                                        {if $option.type == '1'}
                                                            <input type="text" id="addonproduct-option-{$option.option_id}" name="productOptions_addons[{$option.option_id}][{$OPT.assign_id}]" data-symbol="{$option.symbol}" data-price="{$option.price}" class="input-fill" />
                                                
                                                        {else if $option.type == '2'}
                                                            &lt;textarea id="addonproduct-option-{$option.option_id}" name="productOptions_addons[{$option.option_id}][{$OPT.assign_id}]" data-symbol="{$option.symbol}" data-price="{$option.price}" class="input-fill" style="margin: 0;"&gt;&lt/textarea&gt;
                                                        {/if}
                                                        {if $price > 0}<span class="add-on">{$option.symbol}{$option.price}</span>{/if}
                                                    {/strip}
                                                {if $price > 0}</div>{/if}												
                                            {/if}
                                        </div><!-- /.controls -->
                                    </div><!-- /.control-group -->
                                {/foreach}                        
                                </div>
                                </div>
                            </td>
                        </tr>                
                		{/if} 
                           
                     {/foreach}	
                     </tbody>  
                    </table>  
                                        
				</div>
			</div>
		</div>                            	
	</div>
{/if}	
{/literal}</textarea>			
		
		</li>
	
	</ol>
</div>