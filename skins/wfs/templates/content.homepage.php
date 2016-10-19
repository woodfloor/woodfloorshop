{*
 * CubeCart v6
 * ========================================
 * CubeCart is a registered trade mark of CubeCart Limited
 * Copyright CubeCart Limited 2015. All rights reserved.
 * UK Private Limited Company No. 5323904
 * ========================================
 * Web:   http://www.cubecart.com
 * Email:  sales@cubecart.com
 * License:  GPL-3.0 https://www.gnu.org/licenses/quick-guide-gplv3.html
 *}
{if isset($DOCUMENT)}
<div id="content_homepage">
   <h1>{$DOCUMENT.title}</h1>
   {$DOCUMENT.content}
</div>
{/if}
{if isset($LATEST_PRODUCTS)}
<div id="content_latest_products">
   <h2>{$LANG.catalogue.latest_products}</h2>
   <ul class="small-block-grid-1 medium-block-grid-3 large-block-grid-3" data-equalizer>
      {foreach from=$LATEST_PRODUCTS item=product}
      <li>
         <form action="{$VAL_SELF}" method="post" class="panel add_to_basket">
            <div data-equalizer-watch>
               <div class="text-center">
                  <a class="th" href="{$product.url}" title="{$product.name}"><img src="{$product.image}" alt="{$product.name}"></a>
               </div>
               <h3><a href="{$product.url}" title="{$product.name}">{$product.name|truncate:38:"&hellip;"}</a></h3>
               {if $product.review_score && $CTRL_REVIEW}
               <div class="rating"> {for $i = 1; $i <= 5; $i++}
                  {if $product.review_score >= $i} <img src="{$STORE_URL}/skins/{$SKIN_FOLDER}/images/star.png" alt=""> {elseif $product.review_score > ($i - 1) && $product.review_score < $i} <img src="{$STORE_URL}/skins/{$SKIN_FOLDER}/images/star_half.png" alt=""> {else} <img src="{$STORE_URL}/skins/{$SKIN_FOLDER}/images/star_off.png" alt=""> {/if}
                  {/for} 
               </div>
               {/if}
            </div>
            {if $product.ctrl_sale}
            <span class="old_price">{if $product.price_m2}{$product.price_m2}{else}{$product.price}{/if}</span> <span class="sale_price">{if $product.sale_price_m2}{$product.sale_price_m2}{else}{$product.sale_price}{/if}</span>
            {if $product.calc_status==1} per m<sup>2</sup>{/if}
            {else}
				{if $product.price_unformatted == '0.00'}
					P.O.A.
				{else}
					{if $product.price_m2}{$product.price_m2}{else}{$product.price}{/if}
               {if $product.calc_status==1} per m<sup>2</sup>{/if}
				{/if}
            {/if}

            {* Remove comment if you want info button
            <a href="{$product.url}" title="{$product.name}" class="button tiny secondary left">{$LANG.common.info}</a>
            *}
            {*
            {if $product.available <= 0}
            <div class="row collapse marg-top">
               <div class="small-12 columns">
                  <input type="submit" value="{$LANG.common.unavailable}" class="button small disabled postfix expand" disabled>
               </div>
            </div>
            {else if $product.ctrl_stock && !$CATALOGUE_MODE}HI
            <div class="row collapse marg-top">
               <div class="small-3 columns">
                  <input type="text" name="quantity" value="1" class="quantity required text-center">
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
            <input type="hidden" name="add" value="{$product.product_id}">
            *}
         </form>
      </li>
      {/foreach}
   </ul>
</div>
{/if}