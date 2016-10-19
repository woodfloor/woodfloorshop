{if $TREE_CATEGORY}

	{foreach from=$RELATED_CATEGORY item=category}
        {if isset($category.children) && !empty($category.children)}
            <div id="filterBox_{$category.cat_id}" class="refineSearch panel">    
                <h3>{$category.name}</h3>                 
                <ul  class="{str_replace(" ","-",$category.name)}">      
                	{foreach from=$category.children item=children}
                    <li><span data-id="{$children.cat_id}"  style="cursor:pointer;" id="opt_{$children.cat_id}" class="subcat unchecked">{$children.name} ({$children.count})</span></li>       
                    {/foreach} 
                </ul>  
            </div>
        {/if}
 	{/foreach}  
{/if}

<input type="hidden" id="catId" value="{$CATEGORY_ID}" />
<!--onclick="ProductListLoad({$children.cat_id});"-->