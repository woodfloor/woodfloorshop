<ul id="element-paginate" class="pagination hide-for-small-only">
{if ($page >= $show-1)}
  {$params[$var_name] = 1}
   <li><a class="pagePaginate" data-id="{$params[$var_name]}">1</a></li><li class="unavailable">…</li>
{/if}

{if ($page > 1)}
  {$params[$var_name] = $page-1}
   <li class="arrow"><a class="pagePaginate" data-id="{$params[$var_name]}"><i class="fa fa-angle-double-left"></i></a></li>
{/if}

{for $i = 1; $i <= $total; $i++}
	{if ($i < $page - floor($show / 2))}
	{continue}
	{/if}

	{if ($i > $page + floor($show / 2))}
	{break}
	{/if}

	{$params[$var_name] = $i}
	{if ($i == $page)}
  		<li class="current"><a class="currentPage" data-id="{$params[$var_name]}">{$i}</a></li>
	{else}
  		<li><a class="pagePaginate" data-id="{$params[$var_name]}">{$i}</a></li>
  	{/if}
{/for}

{if ($page < $total)}
  {$params[$var_name] = $page + 1}
	<li class="arrow"><a class="pagePaginate" data-id="{$params[$var_name]}"><i class="fa fa-angle-double-right"></i></a></li>
{/if}

{if ($i <= $total)}
  {$params[$var_name] = $total}
<li class="unavailable">…</li><li>   <a class="pagePaginate" data-id="{$params[$var_name]}" >{$total}</a></li>
{/if}


<li>
<a class="currentPage" >
Total {$TOTAL} items 
</a>
</li>