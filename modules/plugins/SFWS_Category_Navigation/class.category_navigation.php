<?php
class sfws_category_navigation {

	public $_module_config = array();

	public $_language_strings = array();

	private $_category_translations = false;
	
	public function __construct($module_config = null) {

		$this->_module_config = is_array($module_config) ? $module_config : $GLOBALS['config']->get('sfws_category_navigation');
		
		$GLOBALS['language']->loadDefinitions('sfws_category_navigation', 'modules/plugins/SFWS_Category_Navigation/language', 'module.definitions.xml');
		$this->_language_strings = $GLOBALS['language']->getStrings('sfws_category_navigation');
	}

	public function get_sfws_category_navigation_desktop () {

		$get_module_status	= $GLOBALS['db']->select('CubeCart_modules', array('status'), array('folder' => 'SFWS_Category_Navigation'));
		$module_status = $get_module_status[0]['status'];

		$GLOBALS['gui']->changeTemplateDir('modules/plugins/SFWS_Category_Navigation/skin/');
		
		$GLOBALS['smarty']->assign('MODULE_CONFIG',$this->_module_config);
		$GLOBALS['smarty']->assign('MODULE_LANG',$this->_language_strings);

		if($module_status == 1){

			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_MASTER_STATUS', $this->_module_config['status']);
			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_DESKTOP_STATUS', $this->_module_config['cbd_status']);

			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_DESKTOP_BACKGROUND_COLOR', $this->_module_config['cbd_box_background_color']);
			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_DESKTOP_BORDER_COLOR', $this->_module_config['cbd_box_border_color']);
			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_DESKTOP_TITLE_COLOR', $this->_module_config['cbd_box_title_color']);
			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_DESKTOP_LINK_COLOR', $this->_module_config['cbd_link_color']);
			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_DESKTOP_LINK_HOVER_COLOR', $this->_module_config['cbd_link_hover_color']);
			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_DESKTOP_LINK_HOVER_BACKGROUND_COLOR', $this->_module_config['cbd_link_hover_background_color']);

			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_DESKTOP_HOME_STATUS', $this->_module_config['cbd_home_status']);

			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_DESKTOP_SALE_STATUS', $this->_module_config['cbd_sale_status']);
			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_DESKTOP_CTRL_SALE', $GLOBALS['config']->get('config', 'catalogue_sale_mode'));
			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_DESKTOP_SALE_URL', $GLOBALS['seo']->buildURL('saleitems'));

			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_DESKTOP_GC_STATUS', $this->_module_config['cbd_gc_status']);
			$gc = $GLOBALS['config']->get('gift_certs');
			if (isset($gc['status']) && $gc['status']) {
				$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_DESKTOP_CTRL_CERTIFICATES', $gc['status']);
			} else {
				$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_DESKTOP_CTRL_CERTIFICATES', false);
			}
			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_DESKTOP_GC_URL', $GLOBALS['seo']->buildURL('certificates'));

			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_DESKTOP_EXPAND_STATUS', $this->_module_config['cbd_expand_status']);
			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_DESKTOP_EXPAND_EFFECT', $this->_module_config['cbd_expand_effect']);
			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_DESKTOP_EXPAND_EFFECT_SPEED', $this->_module_config['cbd_expand_effect_speed']);

			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_DESKTOP_SC_BOX1_WIDTH', $this->_module_config['cbd_sc_box1_width']);
			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_DESKTOP_SC_BOX1_HEIGHT', $this->_module_config['cbd_sc_box1_height']);
			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_DESKTOP_SC_BOX2_WIDTH', $this->_module_config['cbd_sc_box2_width']);
			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_DESKTOP_SC_BOX2_HEIGHT', $this->_module_config['cbd_sc_box2_height']);
			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_DESKTOP_SC_BOX3_WIDTH', $this->_module_config['cbd_sc_box3_width']);
			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_DESKTOP_SC_BOX3_HEIGHT', $this->_module_config['cbd_sc_box3_height']);
			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_DESKTOP_SC_BOX4_WIDTH', $this->_module_config['cbd_sc_box4_width']);
			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_DESKTOP_SC_BOX4_HEIGHT', $this->_module_config['cbd_sc_box4_height']);
			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_DESKTOP_SC_BOX5_WIDTH', $this->_module_config['cbd_sc_box5_width']);
			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_DESKTOP_SC_BOX5_HEIGHT', $this->_module_config['cbd_sc_box5_height']);

			// Top Level Categories
			if (($top_level_categories = $GLOBALS['db']->select('CubeCart_category', array('cat_parent_id', 'cat_id', 'cat_name'), array('cat_parent_id' => 0, 'status' => 1, 'hide' => 0), 'priority, cat_name ASC')) !== false) {
				$top_level = 1;
				foreach ($top_level_categories as $top_level_category) {
					$top_level_category['url'] = $GLOBALS['seo']->buildURL('cat', $top_level_category['cat_id'], '&');
					if($this->_module_config['cbd_expand_status']){
						// Second Level Categories
						if (($second_level_categories = $GLOBALS['db']->select('CubeCart_category', array('cat_parent_id', 'cat_id', 'cat_name'), array('cat_parent_id' => $top_level_category['cat_id'], 'status' => 1, 'hide' => 0), 'priority, cat_name ASC')) !== false) {
							$top_level_category['expand'] = 1;
							$top_level_category['top_level'] = $top_level;
							foreach ($second_level_categories as $second_level_category) {
								$second_level_category['url'] = $GLOBALS['seo']->buildURL('cat', $second_level_category['cat_id'], '&');
								// Third Level Categories
								if (($third_level_categories = $GLOBALS['db']->select('CubeCart_category', array('cat_parent_id', 'cat_id', 'cat_name'), array('cat_parent_id' => $second_level_category['cat_id'], 'status' => 1, 'hide' => 0), 'priority, cat_name ASC')) !== false) {
									$second_level_category['expand'] = 1;
									foreach ($third_level_categories as $third_level_category) {
										$third_level_category['url'] = $GLOBALS['seo']->buildURL('cat', $third_level_category['cat_id'], '&');
										$second_level_category['third_level_categories'][] = $third_level_category;
									}
								} else {
									$second_level_category['expand'] = 0;
								}
								$top_level_category['second_level_categories'][] = $second_level_category;
							}
						} else {
							$top_level_category['expand'] = 0;
							$second_level_category['expand'] = 0;
						}
					} else {
						$top_level_category['expand'] = 0;
					}
					$desktop_top_level_categories[] = $top_level_category;
					++$top_level;
				}
				$GLOBALS['smarty']->assign('DISPLAY_TOP_LEVEL_CATEGORIES', true);
				$GLOBALS['smarty']->assign('TOP_LEVEL_CATEGORIES', $desktop_top_level_categories);
			}

		}

		$html_out = $GLOBALS['smarty']->fetch('box.sfws_category_navigation_desktop.php');
		
		$GLOBALS['gui']->changeTemplateDir();
		return $html_out;

	}

	public function get_sfws_category_navigation_mobile () {

		$get_module_status	= $GLOBALS['db']->select('CubeCart_modules', array('status'), array('folder' => 'SFWS_Category_Navigation'));
		$module_status = $get_module_status[0]['status'];

		$GLOBALS['gui']->changeTemplateDir('modules/plugins/SFWS_Category_Navigation/skin/');
		
		$GLOBALS['smarty']->assign('MODULE_CONFIG',$this->_module_config);
		$GLOBALS['smarty']->assign('MODULE_LANG',$this->_language_strings);

		if($module_status == 1){

			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_MASTER_STATUS', $this->_module_config['status']);
			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_MOBILE_STATUS', $this->_module_config['cbm_status']);

			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_MOBILE_TITLE_STATUS', $this->_module_config['cbm_title_status']);
			
			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_MOBILE_HOME_STATUS', $this->_module_config['cbm_home_status']);

			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_MOBILE_SALE_STATUS', $this->_module_config['cbm_sale_status']);
			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_MOBILE_CTRL_SALE', $GLOBALS['config']->get('config', 'catalogue_sale_mode'));
			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_MOBILE_SALE_URL', $GLOBALS['seo']->buildURL('saleitems'));

			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_MOBILE_GC_STATUS', $this->_module_config['cbm_gc_status']);
			$gc = $GLOBALS['config']->get('gift_certs');
			if (isset($gc['status']) && $gc['status']) {
				$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_MOBILE_CTRL_CERTIFICATES', $gc['status']);
			} else {
				$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_MOBILE_CTRL_CERTIFICATES', false);
			}
			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_MOBILE_GC_URL', $GLOBALS['seo']->buildURL('certificates'));

			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_MOBILE_EXPAND_STATUS', $this->_module_config['cbd_expand_status']);
			$tree_data = $this->getCategoryTreeCNCBM();
			$navigation_tree = $this->_makeTreeCNCBM($tree_data);
			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_MOBILE_NAVIGATION_TREE', $navigation_tree);

			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_MOBILE_BOX_TITLE_COLOR', $this->_module_config['cbm_box_title_color']);
			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_MOBILE_BOX_TITLE_BACKGROUND_COLOR', $this->_module_config['cbm_box_title_background_color']);
			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_MOBILE_BOX_TITLE_BORDER_TOP_COLOR', $this->_module_config['cbm_box_title_border_top_color']);

			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_MOBILE_CATEGORY_LINK_COLOR', $this->_module_config['cbm_category_link_color']);
			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_MOBILE_CATEGORY_LINK_BACKGROUND_COLOR', $this->_module_config['cbm_category_link_background_color']);
			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_MOBILE_CATEGORY_LINK_BORDER_BOTTOM_COLOR', $this->_module_config['cbm_category_link_border_bottom_color']);

			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_MOBILE_CATEGORY_LINK_HOVER_COLOR', $this->_module_config['cbm_category_link_hover_color']);
			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_MOBILE_CATEGORY_LINK_HOVER_BACKGROUND_COLOR', $this->_module_config['cbm_category_link_hover_background_color']);
			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_MOBILE_CATEGORY_LINK_HOVER_BORDER_BOTTOM_COLOR', $this->_module_config['cbm_category_link_hover_border_bottom_color']);

			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_MOBILE_BACK_LINK_COLOR', $this->_module_config['cbm_back_link_color']);
			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_MOBILE_BACK_LINK_BACKGROUND_COLOR', $this->_module_config['cbm_back_link_background_color']);
			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_MOBILE_BACK_LINK_BORDER_BOTTOM_COLOR', $this->_module_config['cbm_back_link_border_bottom_color']);

			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_MOBILE_BACK_LINK_HOVER_COLOR', $this->_module_config['cbm_back_link_hover_color']);
			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_MOBILE_BACK_LINK_HOVER_BACKGROUND_COLOR', $this->_module_config['cbm_back_link_hover_background_color']);
			$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_MOBILE_BACK_LINK_HOVER_BORDER_BOTTOM_COLOR', $this->_module_config['cbm_back_link_hover_border_bottom_color']);

		}

		$html_out = $GLOBALS['smarty']->fetch('box.sfws_category_navigation_mobile.php');
		
		$GLOBALS['gui']->changeTemplateDir();
		return $html_out;

	}

	private function _makeTreeCNCBM($tree_data) {
		$out = '';
		if (is_array($tree_data)) {
			foreach ($tree_data as $branch) {
				if (isset($branch['children'])) {
					$branch['children'] = $this->_makeTreeCNCBM($branch['children']);
				}
				$branch['url'] = $GLOBALS['seo']->buildURL('cat', $branch['cat_id'], '&');
				$GLOBALS['smarty']->assign('CATEGORY_NAVIGATION_MOBILE_BRANCH', $branch);
				$out .= $GLOBALS['smarty']->fetch('element.sfws_navigation_tree_mobile.php');
			}
		}
		return $out;
	}

	private function getCategoryTreeCNCBM($parent_id = 0) {
		if (($categories = $GLOBALS['db']->select('CubeCart_category', array('cat_parent_id', 'cat_id', 'cat_name'), array('cat_parent_id' => $parent_id, 'status' => 1, 'hide' => 0), 'priority, cat_name ASC')) !== false) {
			if (!$this->_category_translations && ($translations = $GLOBALS['db']->select('CubeCart_category_language', array('cat_id', 'cat_name'), array('language' => $GLOBALS['language']->current()))) !== false) {
				foreach ($translations as $translation) {
					$this->_category_translations[$translation['cat_id']] = $translation['cat_name'];
				}
			}
			foreach ($categories as $category) {
				$sql = 'SELECT C.`product_id`, I.`use_stock_level` FROM `'.$GLOBALS['config']->get('config', 'dbprefix').'CubeCart_category_index` AS C INNER JOIN `'.$GLOBALS['config']->get('config', 'dbprefix').'CubeCart_inventory` AS I ON I.`product_id` = C.`product_id` WHERE C.cat_id = '.$category['cat_id'].' AND I.status = 1';
				$available_products = $GLOBALS['db']->misc($sql);
				if ($available_products && $GLOBALS['config']->get('config', 'hide_out_of_stock')) {
					$in_stock = array();
					foreach($available_products as $key => $product) {
						if($product['use_stock_level']=='1') {
							if($options = $GLOBALS['db']->select('CubeCart_option_matrix', array('stock_level', 'use_stock'), array('product_id' => $product['product_id'], 'status' => 1))) {
								$oos_combos = array();
								foreach($options as $option) {
									if($option['use_stock']==1 && $option['stock_level']<=0) {
										$oos_combos[] = true;
									}
								}
								if(count($options)==count($oos_combos)) {
									unset($available_products[$key]);
								} else {
									$in_stock[] = $product['product_id'];
								}
							}
						}
					}
					$product_dataset = $GLOBALS['db']->misc($sql.' AND I.use_stock_level = 1 AND I.stock_level <= 0');
					if($product_dataset) {
						foreach($product_dataset as $key => $product) {
							if(!in_array($product['product_id'], $in_stock)) {
								foreach($available_products as $master_key => $master_product) {
									if($master_product['product_id']==$product['product_id']) {
										unset($available_products[$master_key]);
									}
								}
							}
						}
					}
				}
				$products = $available_products ? count($available_products) : 0;
				$children = $GLOBALS['db']->count('CubeCart_category', 'cat_id', array('cat_parent_id' => $category['cat_id'], 'status' => '1'));
				if (($products> 0 || $GLOBALS['config']->get('config', 'catalogue_show_empty')) || $children) {
					$result = array(
						'name'  => (isset($this->_category_translations[$category['cat_id']]) && !empty($this->_category_translations[$category['cat_id']])) ? $this->_category_translations[$category['cat_id']] : $category['cat_name'],
						'cat_id' => $category['cat_id'],
					);
					if ($this->_module_config['cbm_expand_status'] && $children = $this->getCategoryTreeCNCBM($category['cat_id'])) {
						$result['children'] = $children;
					}
					$tree_data[] = $result;
				}
			}
		}
		return (isset($tree_data)) ? $tree_data : false;
	}

}
?>