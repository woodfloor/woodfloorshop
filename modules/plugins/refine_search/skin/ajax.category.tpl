

{if isset($PRODUCTS)}
<form action="{$VAL_SELF}" method="post">
<div class="control">
<!--<span class="pagination">{$PAGING_TOP}</span>-->
 <div class="left txt-brown">
	<span class="capital">{$LANG.form.sort_by}</span>
{$SORT_ORDER_TOP}
</div>
</div>
</form>

	<ul class="small-block-grid-1 product_list" data-equalizer>
      {foreach from=$PRODUCTS item=product}
      <li>
         <form action="{$VAL_SELF}" method="post" class="panel add_to_basket">
            <div class="row product_list_view">
               <div class="small-3 columns">
                  <a href="{$product.url}" title="{$product.name}">
                  <img class="th" src="{$product.thumbnail}" alt="{$product.name}">
                  </a>
               </div>
               <div class="small-6 columns">
                  <h3>
                     <a href="{$product.url}" title="{$product.name}">{$product.name}</a> 
                  </h3>
                  {if $product.review_score}
                  <div>
                     {for $i = 1; $i <= 5; $i++}
                     {if $product.review_score >= $i}
                     <img src="{$STORE_URL}/skins/{$SKIN_FOLDER}/images/star.png" alt="">
                     {elseif $product.review_score > ($i - 1) && $product.review_score < $i}
                     <img src="{$STORE_URL}/skins/{$SKIN_FOLDER}/images/star_half.png" alt="">
                     {else}
                     <img src="{$STORE_URL}/skins/{$SKIN_FOLDER}/images/star_off.png" alt="">
                     {/if}
                     {/for}
                  </div>
                  {*
                  <p class="rating-info">{$product.review_info}</p>
                  *}
                  {/if}
                  {$product.description_short|strip_tags:true}
               </div>
              <div class="small-3 columns">
                  <h3>
                     {if $product.ctrl_sale}<span class="old_price">{$product.price}</span> <span class="sale_price">{$product.sale_price}</span>
                     {else}
						{if $product.price_unformatted == '0.00'}
							P.O.A.
						{else}
							{$product.price}
						{/if}
                     {/if}
                  </h3>
                  {if $product.available <= 0}
                  <div class="row collapse">
                     <div class="small-12 columns">
                        <input type="submit" value="{$LANG.common.unavailable}" class="button small disabled expand marg-top" disabled>
                     </div>
                  </div>
                  {elseif $product.ctrl_stock && !$CATALOGUE_MODE}
                  <!--
				  <div class="row collapse">
                     <div class="small-4 columns">
                        <input type="text" name="quantity" value="1" class="quantity text-center">
                     </div>
                     <div class="small-8 columns">
                        <button type="submit" value="{$LANG.catalogue.add_to_basket}" class="button small postfix">{$LANG.catalogue.add_to_basket}</button>
                     </div>
                  </div>
				  -->
                  {elseif !$CATALOGUE_MODE}
                  <div class="row collapse">
                     <div class="small-12 columns">
                        <input type="submit" value="{$LANG.catalogue.out_of_stock_short}" disabled class="button disabled expand small">
                     </div>
                  </div>
                  {/if}
               </div>
            </div>
            <div class="product_grid_view hide">
               <form action="{$VAL_SELF}" method="post" class="panel add_to_basket">
               <div data-equalizer-watch>
                  <div class="text-center">
                     <a href="{$product.url}" title="{$product.name}"><img class="th" src="{$product.thumbnail}" alt="{$product.name}"></a>
                  </div>
                  <h3><a href="{$product.url}" title="{$product.name}">{$product.name|truncate:38:"&hellip;"}</a></h3>
                  {if $product.review_score}
                  <div class="rating">
                     <div>
                        {for $i = 1; $i <= 5; $i++}
                        {if $product.review_score >= $i}
                        <img src="{$STORE_URL}/skins/{$SKIN_FOLDER}/images/star.png" alt="">
                        {elseif $product.review_score > ($i - 1) && $product.review_score < $i}
                        <img src="{$STORE_URL}/skins/{$SKIN_FOLDER}/images/star_half.png" alt="">
                        {else}
                        <img src="{$STORE_URL}/skins/{$SKIN_FOLDER}/images/star_off.png" alt="">
                        {/if}
                        {/for}
                     </div>
                     {*
                     <p class="rating-info">{$product.review_info}</p>
                     *}
                  </div>
                  {/if}
               </div>
               <h3>
                  {if $product.ctrl_sale}<span class="old_price">{$product.price}</span> <span class="sale_price">{$product.sale_price}</span>
                  {else}
						{if $product.price_unformatted == '0.00'}
							P.O.A.
						{else}
							{$product.price}
						{/if}
                  {/if}
               </h3>
               {* Uncomment this if you want to show a more info link
               <a href="{$product.url}" title="{$product.name}" class="button tiny secondary left">{$LANG.common.info}</a>
               *}
               {if $product.available <= 0}
               <div class="row collapse marg-top">
                  <div class="small-12 columns">
                     <input type="submit" value="{$LANG.common.unavailable}" class="button small postfix disabled expand" disabled>
                  </div>
               </div>
               {elseif $product.ctrl_stock && !$CATALOGUE_MODE}
               <div class="row collapse marg-top">
                  <div class="small-3 columns">
                     <input type="text" name="quantity" value="1" class="quantity text-center" disabled>
                  </div>
                  <div class="small-9 columns ">
                     <button type="submit" value="{$LANG.catalogue.add_to_basket}" class="button small postfix">{$LANG.catalogue.add_to_basket}</button>
                     <input type="hidden" name="add" value="{$product.product_id}">
                  </div>
               </div>
                {elseif !$CATALOGUE_MODE}
               <div class="row collapse marg-top">
                  <div class="small-12 columns">
                     <input type="submit" value="{$LANG.catalogue.out_of_stock_short}" class="button small postfix disabled expand marg-top" disabled>
                  </div>
               </div>
               {/if}
            </div>
         </form>
      </li>
      {foreachelse}
      {if !isset($SUBCATS) || !$SUBCATS}
      <li>{$LANG.category.no_products}</li>
      {/if}
      {/foreach}
   </ul>

{$PAGING_TOP}
{else}
<div class="maindiv">
<p style="padding:10px" >{$LANG.category.no_products}</p>
</div>
{/if}



