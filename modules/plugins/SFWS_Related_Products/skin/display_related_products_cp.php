{if $RELATED_PRODUCTS}
<div id="content_related_products">
	<h2>{$LANG.sfws_related_products.store_product_pages_title}</h2>
	<ul class="small-block-grid-1 medium-block-grid-4 large-block-grid-4" data-equalizer>
	{foreach from=$RELATED_PRODUCTS item=related_product}
		<li>
			<form action="{$VAL_SELF}" method="post" class="panel add_to_basket">
				<div data-equalizer-watch>
					<div class="text-center">
						<a class="th" href="{$related_product.url}" title="{$related_product.name}"><img src="{$related_product.image}" alt="{$related_product.name}" /></a>
					</div>
					<h3><a href="{$related_product.url}" title="{$related_product.name}">{$related_product.name|truncate:38:"&hellip;"}</a></h3>
				</div>
				{if $related_product.ctrl_sale}
	            <span class="old_price">{if $related_product.price_m2}{$related_product.price_m2}{else}{$related_product.price}{/if}</span> <span class="sale_price">{if $related_product.sale_price_m2}{$related_product.sale_price_m2}{else}{$related_product.sale_price}{/if}</span>
	            {if $related_product.calc_status==1} per m<sup>2</sup>{/if}
	            {else}
	            {if $related_product.price_unformatted == '0.00'}
	               P.O.A.
	            {else}
	               {if $related_product.price_m2}{$related_product.price_m2}{else}{$related_product.price}{/if}
	               {if $related_product.calc_status==1} per m<sup>2</sup>{/if}
	            {/if}
	            {/if}
				{if $related_product.available == '0'}
					<div class="row collapse marg-top">
						<div class="small-12 columns">
							<input type="submit" value="{$LANG.common.unavailable}" class="button small disabled postfix expand" disabled>
						</div>
					</div>
				{elseif $related_product.ctrl_stock && !$CATALOGUE_MODE}
					<div class="row collapse marg-top">
						<div class="small-3 columns">
							<input type="text" name="quantity" value="1" class="quantity required text-center">
							<input type="hidden" name="basket_add" value="1" />
						</div>
						<div class="small-9 columns ">
							<button type="submit" value="{$LANG.catalogue.add_to_basket}" class="button small postfix">{$LANG.catalogue.add_to_basket}</button>
						</div>
					</div>
				{elseif !$CATALOGUE_MODE}
					<div class="row collapse marg-top">
						<div class="small-12 columns">
							<input type="submit" value="{$LANG.catalogue.out_of_stock_short}" class="button small postfix disabled expand marg-top" disabled>
						</div>
					</div>
				{/if}
				<input type="hidden" name="add" value="{$related_product.product_id}">
	  		</form>
		</li>
	{/foreach}
	</ul>
</div>
{/if}