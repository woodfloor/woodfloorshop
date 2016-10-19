{$CATEGORY_SEARCH}

<div id="progressbar" class="progress" style="display: none;"><img src="{$STORE_URL}/skins/{$SKIN_FOLDER}/images/loading.gif" /></div>
{$JAVASCRIPT}
{if ($PRICE_FILTER) && ($PRICE_DISPLAY)}
<div  class="refineSearch panel" >  
  <h3>{$LANG.refine_search.by_price}</h3>  
  <div  id="mcs2_container">  
    <div class="customScrollBox">
      <div class="container">
        <div class="content">
          <ul class="size">
            {for $i=0; $i < $PRICE_COUNT; $i++}
            <li><span data-id="{$PRICE_OPTIONS.{$i}.valuepass}" style="cursor:pointer;" id="price_{$PRICE_OPTIONS.{$i}.valuepass}" class="_price unchecked">{$PRICE_OPTIONS.{$i}.value}</span></li>
            {/for}
          </ul>         
          <a href="" id="id_clearOptions" style="display:none;" >{$LANG.refine_search.clear_all_filters}</a> </div>
      </div>
     
    </div>

     </div>

 </div>
 {/if}

<input type="hidden" name="storeurl" id="storeurl" value="{$STORE_URL}" />
<div class="body-content-loading-overlay" id="loader"><div class="body-content-loading-spinner"></div></div>