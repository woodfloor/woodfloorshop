{if $CATEGORY_NAVIGATION_MASTER_STATUS && $CATEGORY_NAVIGATION_DESKTOP_STATUS}

	<style>
	#category-navigation-desktop {
		height: 39px;
		line-height: 39px;
		background-color: {$CATEGORY_NAVIGATION_DESKTOP_BACKGROUND_COLOR};
		border-style: solid;
		border-width: 0px;
		border-color: {$CATEGORY_NAVIGATION_DESKTOP_BORDER_COLOR};
		margin-top: 1.25rem; 
		/*margin-bottom: 1.25rem; */
	}
	#category-navigation-desktop-top {
		margin: 0;
		padding: 0;
		list-style-type: none;
	}
	#category-navigation-desktop-top li {
		float: left; 
		position: relative;
		display: block;
		line-height: 39px;
	}
	#category-navigation-desktop-top li a {
		text-align: center;
		padding-top: 8px;
		padding-bottom: 9px;
		padding-left: 15px;
		padding-right: 15px;
		color: {$CATEGORY_NAVIGATION_DESKTOP_LINK_COLOR};
	}
	#category-navigation-desktop-top li a:hover {
		text-align: center;
		padding-top: 8px;
		padding-bottom: 9px;
		padding-left: 15px;
		padding-right: 15px;
		color: {$CATEGORY_NAVIGATION_DESKTOP_LINK_HOVER_COLOR};
		background-color: {$CATEGORY_NAVIGATION_DESKTOP_LINK_HOVER_BACKGROUND_COLOR};
	}
	#category-navigation-desktop-top li div {
		display: none;
		position: absolute;
	}
	#category-navigation-desktop-top li:hover div { 
		float: left;
		display: block;
		position: absolute;
		width: 500%;
		background-color: {$CATEGORY_NAVIGATION_DESKTOP_LINK_HOVER_BACKGROUND_COLOR};
		z-index: 999;
	}
	div.second-level-div-1 {
		width: {$CATEGORY_NAVIGATION_DESKTOP_SC_BOX1_WIDTH} !important;
		height: {$CATEGORY_NAVIGATION_DESKTOP_SC_BOX1_HEIGHT};
	}
	div.second-level-div-2 {
		width: {$CATEGORY_NAVIGATION_DESKTOP_SC_BOX2_WIDTH} !important;
		height: {$CATEGORY_NAVIGATION_DESKTOP_SC_BOX2_HEIGHT};
	}
	div.second-level-div-3 {
		width: {$CATEGORY_NAVIGATION_DESKTOP_SC_BOX3_WIDTH} !important;
		height: {$CATEGORY_NAVIGATION_DESKTOP_SC_BOX3_HEIGHT};
	}
	div.second-level-div-4 {
		width: {$CATEGORY_NAVIGATION_DESKTOP_SC_BOX4_WIDTH} !important;
		height: {$CATEGORY_NAVIGATION_DESKTOP_SC_BOX4_HEIGHT};
	}  
	div.second-level-div-5 {
		width: {$CATEGORY_NAVIGATION_DESKTOP_SC_BOX5_WIDTH} !important;
		height: {$CATEGORY_NAVIGATION_DESKTOP_SC_BOX5_HEIGHT};
		left: -214px;
	}
	
	#category-navigation-desktop-top li:hover div.third-level-div ul li a {
		float: left;
		position: relative;
		display: inline-block;
		white-space: nowrap;
		padding: 0px !important;
		margin-left: -20px;
		list-style-type: none;
		width: auto;
		background: none !important;
		width: 185px !important;
		text-align: left;
		font-size: .85rem;
	}
	#category-navigation-desktop-top li:hover div ul li {
		width: auto;
	}

	#category-navigation-desktop-top li:hover div ul li.second-level-li {
		float: left;
		display: inline-block;
		white-space: nowrap;
		min-width: 160px;
		margin-left: -10px;
		text-indent: 5px;
	}

	#category-navigation-desktop-top li div ul li div {
		display: none;
		position: absolute;
	}

	#category-navigation-desktop-top li:hover div ul li div {
		width: 100%;
		padding-left: 0px;
		background: none !important;
	}
	#category-navigation-desktop-top li a:active {
		background: #FFCC01 !important;
	}
	.second-level-link {
		font-size: .85rem;
	}
	</style>

    <div class="row show-for-medium-up">
	<div class="medium-12 large-12 columns">
	<div id="category-navigation-desktop">

		<ul id="category-navigation-desktop-top" class="top-level-ul">

			{if $CATEGORY_NAVIGATION_DESKTOP_HOME_STATUS}
				<li class="top-level-li"><a href="{$STORE_URL}" title="{$LANG.sfws_category_navigation.store_home_link_cbd}" class="top-level-link"><i class="fa fa-home"></i> {$LANG.sfws_category_navigation.store_home_link_cbd}</a></li>
			{/if}
			
			{if $DISPLAY_TOP_LEVEL_CATEGORIES && $TOP_LEVEL_CATEGORIES}
				{foreach from=$TOP_LEVEL_CATEGORIES item=top_level_category}
					<li class="top-level-li">
						<a href="{$top_level_category.url}" title="{$top_level_category.cat_name}" class="top-level-link">{$top_level_category.cat_name}</a>
						{if $top_level_category.expand && !empty($top_level_category.second_level_categories)}
							<div class="second-level-div-{$top_level_category.top_level}">
							{foreach from=$top_level_category.second_level_categories item=second_level_category}
								{if $second_level_category.expand == 1 && $top_level_category.cat_id != '49'}
									<ul class="second-level-ul">
										<li class="second-level-li">{$second_level_category.cat_name}
											{if $second_level_category.expand}
												<div class="third-level-div">
													<ul>
														{foreach from=$second_level_category.third_level_categories item=third_level_category}
															<li><a href="{$third_level_category.url}" title="{$third_level_category.cat_name}" class="third-level-link">{$third_level_category.cat_name}</a></li>
														{/foreach}
													</ul>
												</div>
											{/if}										
										</li>
									</ul>
								{else if !empty($second_level_category.url)}
									<a href="{$second_level_category.url}" title="{$second_level_category.cat_name}" class="second-level-link">{$second_level_category.cat_name}</a><br />
								{/if}
							{/foreach}
							</div>
						{/if}
					</li>
				{/foreach}
			{/if}

			{if $CATEGORY_NAVIGATION_DESKTOP_GC_STATUS && $CATEGORY_NAVIGATION_DESKTOP_CTRL_CERTIFICATES && !$CATALOGUE_MODE}
				<li class="top-level-li"><a href="{$CATEGORY_NAVIGATION_DESKTOP_GC_URL}" title="{$LANG.sfws_category_navigation.store_gc_link_cbd}" class="top-level-link">{$LANG.sfws_category_navigation.store_gc_link_cbd}</a></li>
			{/if}

			{if $CATEGORY_NAVIGATION_DESKTOP_SALE_STATUS && $CATEGORY_NAVIGATION_DESKTOP_CTRL_SALE}
				<li class="top-level-li"><a href="{$CATEGORY_NAVIGATION_DESKTOP_SALE_URL}" title="{$LANG.sfws_category_navigation.store_sale_link_cbd}" class="top-level-link">{$LANG.sfws_category_navigation.store_sale_link_cbd}</a></li>
			{/if}

		</ul>

	</div>
	</div>
	</div>

	<script>
	$('.vnb-sub-cbd').hide();
	$('.has-sub-cbd').hover(function(){
		$(this).children('.vnb-sub-cbd').{$CATEGORY_NAVIGATION_DESKTOP_EXPAND_EFFECT}({$CATEGORY_NAVIGATION_DESKTOP_EXPAND_EFFECT_SPEED});
	}); 
	</script>


{/if}