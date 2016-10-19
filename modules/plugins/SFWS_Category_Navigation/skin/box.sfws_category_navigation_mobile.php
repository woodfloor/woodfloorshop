{if $CATEGORY_NAVIGATION_MASTER_STATUS && $CATEGORY_NAVIGATION_MOBILE_STATUS}

	<style>
	ul.category-navigation-cbm {
		list-style-type: none;
		margin: 0;
		padding: 0; 
	}
	ul.category-navigation-cbm li label {
		background: {$CATEGORY_NAVIGATION_MOBILE_BOX_TITLE_BACKGROUND_COLOR};
		border-bottom: none;
		border-top: 1px solid {$CATEGORY_NAVIGATION_MOBILE_BOX_TITLE_BORDER_TOP_COLOR};
		color: {$CATEGORY_NAVIGATION_MOBILE_BOX_TITLE_COLOR};
		display: block;
		font-size: 0.75rem;
		font-weight: bold;
		margin: 0;
		padding: 0.3rem 0.9375rem;
		text-transform: uppercase; 
	}
	ul.category-navigation-cbm li a {
		border-bottom: 1px solid {$CATEGORY_NAVIGATION_MOBILE_CATEGORY_LINK_BORDER_BOTTOM_COLOR};
		background: {$CATEGORY_NAVIGATION_MOBILE_CATEGORY_LINK_BACKGROUND_COLOR};
		color: {$CATEGORY_NAVIGATION_MOBILE_CATEGORY_LINK_COLOR};
		display: block;
		padding: 0.66667rem;
		transition: background 300ms ease; 
	}
    ul.category-navigation-cbm li a:hover {
		border-bottom: 1px solid {$CATEGORY_NAVIGATION_MOBILE_CATEGORY_LINK_HOVER_BORDER_BOTTOM_COLOR};
		background: {$CATEGORY_NAVIGATION_MOBILE_CATEGORY_LINK_HOVER_BACKGROUND_COLOR};
		color: {$CATEGORY_NAVIGATION_MOBILE_CATEGORY_LINK_HOVER_COLOR};
	}
    ul.category-navigation-dbm li a:active {
		border-bottom: 1px solid {$CATEGORY_NAVIGATION_MOBILE_CATEGORY_LINK_HOVER_BORDER_BOTTOM_COLOR};
		background: {$CATEGORY_NAVIGATION_MOBILE_CATEGORY_LINK_HOVER_BACKGROUND_COLOR};
		color: {$CATEGORY_NAVIGATION_MOBILE_CATEGORY_LINK_HOVER_COLOR};
	}
	.category-navigation-cbm .left-submenu .back > a {
		border-bottom: 1px solid {$CATEGORY_NAVIGATION_MOBILE_BACK_LINK_BORDER_BOTTOM_COLOR};
		background: {$CATEGORY_NAVIGATION_MOBILE_BACK_LINK_BACKGROUND_COLOR};
		color: {$CATEGORY_NAVIGATION_MOBILE_BACK_LINK_COLOR};
		display: block;
		padding: 0.66667rem;
		transition: background 300ms ease; 
	}
	.category-navigation-cbm .left-submenu .back > a:hover {
		border-bottom: 1px solid {$CATEGORY_NAVIGATION_MOBILE_BACK_LINK_HOVER_BORDER_BOTTOM_COLOR};
		background: {$CATEGORY_NAVIGATION_MOBILE_BACK_LINK_HOVER_BACKGROUND_COLOR};
		color: {$CATEGORY_NAVIGATION_MOBILE_BACK_LINK_HOVER_COLOR};
	}
	.category-navigation-cbm .left-submenu .back > a:before {
		content: '';
	}
	.has-sub-arrow-cbm {
		float: right;
		display: block; 
		position: relative; 
		padding-top: 0.4375rem;
		padding-right: 0.4375rem;
		color: {$CATEGORY_NAVIGATION_MOBILE_CATEGORY_LINK_COLOR};
	}
	.has-sub-arrow-cbm:hover {
		color: {$CATEGORY_NAVIGATION_MOBILE_CATEGORY_LINK_HOVER_COLOR};
	}
	.has-back-arrow-cbm {
		padding-top: 0.4375rem;
		padding-right: 0.4375rem;
		color: {$CATEGORY_NAVIGATION_MOBILE_BACK_LINK_COLOR};
	}
	.has-back-arrow-cbm:hover {
		color: {$CATEGORY_NAVIGATION_MOBILE_BACK_LINK_HOVER_COLOR};
	}
	</style>
		
	<ul class="category-navigation-cbm">

		{if $CATEGORY_NAVIGATION_MOBILE_TITLE_STATUS}
			<li><label>{$LANG.sfws_category_navigation.store_box_title_cbm}</label></li>
		{/if}

		{if $CATEGORY_NAVIGATION_MOBILE_HOME_STATUS}
			<li><a href="{$STORE_URL}" title="{$LANG.sfws_category_navigation.store_home_link_cbm}"><i class="fa fa-home"></i> {$LANG.sfws_category_navigation.store_home_link_cbm}</a></li>
		{/if}

		{$CATEGORY_NAVIGATION_MOBILE_NAVIGATION_TREE}

		{if $CATEGORY_NAVIGATION_MOBILE_GC_STATUS && $CATEGORY_NAVIGATION_MOBILE_CTRL_CERTIFICATES && !$CATALOGUE_MODE}
			<li><a href="{$CATEGORY_NAVIGATION_MOBILE_GC_URL}" title="{$LANG.sfws_category_navigation.store_gc_link_cbm}">{$LANG.sfws_category_navigation.store_gc_link_cbm}</a></li>
		{/if}

		{if $CATEGORY_NAVIGATION_MOBILE_SALE_STATUS && $CATEGORY_NAVIGATION_MOBILE_CTRL_SALE}
			<li><a href="{$CATEGORY_NAVIGATION_MOBILE_SALE_URL}" title="{$LANG.sfws_category_navigation.store_sale_link_cbm}">{$LANG.sfws_category_navigation.store_sale_link_cbm}</a></li>
		{/if}

	</ul>

{/if}