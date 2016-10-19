{if isset($CATEGORY_NAVIGATION_MOBILE_BRANCH.children)}
	<li class="has-submenu">
		<a href="{$CATEGORY_NAVIGATION_MOBILE_BRANCH.url}" title="{$CATEGORY_NAVIGATION_MOBILE_BRANCH.name}">{$CATEGORY_NAVIGATION_MOBILE_BRANCH.name}<i class="fa fa-caret-right has-sub-arrow-cbm"></i></a>
		<ul class="left-submenu">
			<li class="back"><a href="#" title="{$LANG.sfws_category_navigation.store_back_link_cbm}"><i class="fa fa-caret-left has-back-arrow-cbm"></i>{$LANG.sfws_category_navigation.store_back_link_cbm}</a></li>
			<li><a href="{$CATEGORY_NAVIGATION_MOBILE_BRANCH.url}" title="{$CATEGORY_NAVIGATION_MOBILE_BRANCH.name}">{$CATEGORY_NAVIGATION_MOBILE_BRANCH.name}</a></li>	
			{$CATEGORY_NAVIGATION_MOBILE_BRANCH.children}
		</ul>
	</li>
{else}
	<li><a href="{$CATEGORY_NAVIGATION_MOBILE_BRANCH.url}" title="{$CATEGORY_NAVIGATION_MOBILE_BRANCH.name}">{$CATEGORY_NAVIGATION_MOBILE_BRANCH.name}</a></li>
{/if}