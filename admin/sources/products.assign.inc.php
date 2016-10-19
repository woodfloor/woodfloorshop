<?php
/**
 * CubeCart v6
 * ========================================
 * CubeCart is a registered trade mark of CubeCart Limited
 * Copyright CubeCart Limited 2015. All rights reserved.
 * UK Private Limited Company No. 5323904
 * ========================================
 * Web:   http://www.cubecart.com
 * Email:  sales@cubecart.com
 * License:  GPL-3.0 https://www.gnu.org/licenses/quick-guide-gplv3.html
 */
if (!defined('CC_INI_SET')) die('Access Denied');
Admin::getInstance()->permissions('products', CC_PERM_READ, true);

### handle post and save
if (isset($_POST['price'])) {

	## Assign products to categories
	if (is_array($_POST['category']) && is_array($_POST['product'])) {
		foreach ($_POST['product'] as $product_id) {
			if (!is_numeric($product_id) || !is_array($_POST['category'])) continue;
			//Delete all the category related to comming product id  to fix bug 2840
			$GLOBALS['db']->delete('CubeCart_category_index', array('product_id' => (int)$product_id));
			foreach ($_POST['category'] as $category_id) {
				if (!is_numeric($category_id)) continue;
				$GLOBALS['db']->insert('CubeCart_category_index', array('cat_id' => (int)$category_id, 'product_id' => (int)$product_id));
			}
		}
	}

	if ($_POST['price']['what']=='products') {
		$product_ids = $_POST['product'];
	} else {
		if ($category_products = $GLOBALS['db']->select('CubeCart_category_index', array('DISTINCT' => 'product_id'), array('cat_id' => $_POST['category']))) {
			foreach ($category_products as $category_product) {
				$product_ids[] = $category_product['product_id'];
			}
		}
	}

	if (is_array($product_ids) && isset($_POST['price']) && is_array($_POST['price']) && Admin::getInstance()->permissions('products', CC_PERM_EDIT)) {
		if (!empty($_POST['price']['value']) && is_numeric($_POST['price']['value'])) {
			## Update prices by x amount/percent
			$field = $_POST['price']['field'];
			foreach ($product_ids as $product_id) {
				if (!is_numeric($product_id)) continue;

				$fields = ($field == 'all') ? array('price', 'sale_price', 'cost_price') : array($field);

				foreach($fields as $field) {
					if (($product = $GLOBALS['db']->select('CubeCart_inventory', array($field), array('product_id' => (int)$product_id))) !== false) {
						$action	= $_POST['price']['action'];
						$price	= $product[0][$field];
						$value	= $_POST['price']['value'];
						switch (strtolower($_POST['price']['method'])) {
							case 'percent':
								$shift	= ($action) ? 1 : 0;
								$price	= $product[0][$field] * (($value/100)+(int)$shift);
								break;
							default:
								$price	+= ($action) ? $value : $value-($value*2);
						}
						$record	= array($field	=> $price);
						$GLOBALS['db']->update('CubeCart_inventory', $record, array('product_id' => (int)$product_id));
					}
				}
			}
		}
	}
	$GLOBALS['main']->setACPNotify($lang['catalogue']['notify_assign_update']);
	httpredir(currentPage());
} elseif (isset($_POST['price'])) {
	$GLOBALS['main']->setACPWarning($lang['common']['error_no_change']);
}

$GLOBALS['main']->addTabControl($lang['catalogue']['title_product_list'], null, currentPage(array('node')));
$GLOBALS['main']->addTabControl($lang['catalogue']['product_add'], null, currentPage(array('node'), array('action' => 'add')));
$GLOBALS['main']->addTabControl($lang['catalogue']['title_category_assign_to'], 'assign');
$GLOBALS['main']->addTabControl($lang['catalogue']['title_option_set_assign'], null, currentPage(null, array('node' => 'optionsets')));
$GLOBALS['gui']->addBreadcrumb($lang['catalogue']['title_category_assigned'], currentPage());

## Product list
if (($products = $GLOBALS['db']->select('CubeCart_inventory', array('product_id', 'name', 'product_code'), false, array('name' => 'ASC'))) !== false) {
	$GLOBALS['smarty']->assign('PRODUCTS', $products);
}
## Category list
if (($category_array = $GLOBALS['db']->select('CubeCart_category', array('cat_name', 'cat_parent_id', 'cat_id'))) !== false) {
	$cat_list[] = '/';
	$seo  = SEO::getInstance();
	foreach ($category_array as $category) {
		if ($category['cat_id'] == $category['cat_parent_id']) continue;
		$cat_list[$category['cat_id']] = '/'.$seo->getDirectory($category['cat_id'], false, '/', false, false);
	}
	natcasesort($cat_list);
	foreach ($cat_list as $cat_id => $cat_name) {
		if (empty($cat_name)) continue;
		$data = array(
			'id'  => $cat_id,
			'name'  => $cat_name,
			'selected' => (isset($cats_selected) && in_array($cat_id, $cats_selected)) ? ' checked="checked"' : '',
		);
		$smarty_data['categories'][] = $data;
	}
	$GLOBALS['smarty']->assign('CATEGORIES', $smarty_data['categories']);
}

$page_content = $GLOBALS['smarty']->fetch('templates/products.assign.php');