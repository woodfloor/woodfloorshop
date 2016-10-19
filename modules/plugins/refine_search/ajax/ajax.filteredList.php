<?php
require '../../../../ini.inc.php';
require CC_ROOT_DIR.CC_DS.'includes/global.inc.php';
define('ADMIN_CP', false);
$_storeURL = explode("/modules/",$GLOBALS['storeURL']);
$GLOBALS['storeURL'] =  $_storeURL[0];
//global $config_default;
$global_template_file = 'main.php';
// Include core functions
require CC_INCLUDES_DIR.'functions.inc.php';
// Initialize Cache
$GLOBALS['cache'] = Cache::getInstance();
// Initialise Database class, and fetch default configuration
$GLOBALS['db'] = Database::getInstance($glob);
// Initialise Config class
$GLOBALS['config'] = Config::getInstance($glob);
//We will not need this anymore
unset($glob);
$GLOBALS['config']->merge('config', '', $config_default);
//Setup the cache more correctly
//$GLOBALS['cache']->setup();
// Initialize debug
//$GLOBALS['debug'] = Debug::getInstance();
//Initialize sessions
$GLOBALS['session'] = Session::getInstance();
//Initialize Smarty
$GLOBALS['smarty'] = new Smarty();
$GLOBALS['smarty']->compile_dir  = CC_SKIN_CACHE_DIR;
$GLOBALS['smarty']->config_dir   = CC_SKIN_CACHE_DIR;
$GLOBALS['smarty']->cache_dir    = CC_SKIN_CACHE_DIR;
$GLOBALS['smarty']->error_reporting = E_ALL & ~E_NOTICE;
//Initialize language
$GLOBALS['language'] = Language::getInstance();
//Initialize hooks
$GLOBALS['hooks'] = HookLoader::getInstance();
//Initialize SEO
$GLOBALS['seo'] = SEO::getInstance();
//Initialize SSL
//$GLOBALS['ssl'] = SSL::getInstance();
//Initialize GUI
$GLOBALS['gui'] = GUI::getInstance();
//Initialize Taxes
$GLOBALS['tax'] = Tax::getInstance();
//Initialize catalogue
$GLOBALS['catalogue'] = Catalogue::getInstance();
//Initialize cubecart
$GLOBALS['cubecart'] = Cubecart::getInstance();
//Initialize user
$GLOBALS['user'] = User::getInstance();
//Initialize cart
//$GLOBALS['cart'] = Cart::getInstance();
global $config_default;
require CC_ROOT_DIR.CC_DS.'modules'.CC_DS.'plugins'.CC_DS.'refine_search'.CC_DS.'filter.class.php';
$filter    			=  new filter(); 
$catId 				= $_POST['pagecat_id'];
$categories			= isset($_POST['category']) && !empty($_POST['category'])?$_POST['category']:"";
$getsortby 	 		= (isset($_POST['sortby']) && $_POST['sortby']!="" && $_POST['sortby']!="undefined")?$_POST['sortby']:'name|ASC'; 
$sortby 	 		= (isset($_POST['sortby']) && $_POST['sortby']!="")?$_POST['sortby']:''; 
$sortval 	 		= explode('|', $getsortby);
$SortOrder 			= " Order By  ".$sortval[0]." ". $sortval[1];
$pageno      		= (isset($_POST['pageno']) && $_POST['pageno']>0)? $_POST['pageno']:1 ;

if(isset($_POST['prices']) && !empty($_POST['prices'])){
	$prices = $_POST['prices'];
	$priceOptions = explode(',',$prices);
	foreach($priceOptions as $options){
		$priceOpt = explode("-", $options);
		if($priceOpt[0] == "Under"){
			$minPrice =  0;
			$maxPrice = $priceOpt[1];
		}else{
			$minPrice = $priceOpt[0];
			$maxPrice = $priceOpt[1];	
		}
		$PriceCondition[]= " (I.price >= ".$minPrice." AND I.price <=".$maxPrice .")" ;
	}
}
	
if(!is_numeric($GLOBALS['config']->get('config', 'catalogue_products_per_page'))) {
	$catalogue_products_per_page = 10;
} else {
	$catalogue_products_per_page = $GLOBALS['config']->get('config', 'catalogue_products_per_page');
}

$whereCategory = (isset($categories)&& !empty($categories))? " AND idx.cat_id IN (".$categories.")":" AND idx.cat_id=".$catId;
$wherePrice    = (isset($PriceCondition)&& !empty($PriceCondition))? " AND (".	implode(" OR ",$PriceCondition).")":"";
 $queryCat = "Select GROUP_CONCAT(idx.cat_name SEPARATOR ',') as name FROM ".$GLOBALS['config']->get('config', 'dbprefix')."CubeCart_category as idx WHERE idx.status=1 ".$whereCategory." group by idx.status";
$dataCat = $GLOBALS['db']->query($queryCat); 

$urlOpt[] = str_replace(" ", "-","category=".$dataCat[0]['name']);
$urlOpt[] = isset($_POST['prices']) && !empty($_POST['prices'])?"pricerange=".$_POST['prices']:"";
$query = "Select I.* FROM ".$GLOBALS['config']->get('config', 'dbprefix')."CubeCart_category_index as idx INNER JOIN ".$GLOBALS['config']->get('config', 'dbprefix')."CubeCart_inventory AS I ON I.product_id = idx.product_id where I.status = 1 ".$whereCategory.$wherePrice." group by I.product_id ".$SortOrder;

 if(isset($_POST['pageno']) &&  $_POST['pageno']=="all" ){
  $Product_data = $GLOBALS['db']->query($query); 
  $pages.='<input type="hidden" name="pageid" id="pageid" value="all" />';
 }else{	
  $Product_data = $GLOBALS['db']->query($query, $catalogue_products_per_page, $pageno);
  $_count 	    = $GLOBALS['db']->numrows($query);
  $pages 	    = $filter->ajaxpagination("'".$categoryId."'", $_count, $catalogue_products_per_page, $pageno);
  $pages1 	    = $filter->ajaxpagination("'".$categoryId."'", $_count, $catalogue_products_per_page, $pageno);
  $pages.='<input type="hidden" name="pageid" id="pageid" value="'.$pageno.'" />';
 }

$GLOBALS['smarty']->assign('PAGING_TOP', $pages);
 $GLOBALS['smarty']->assign('PAGING_BOTTOM', $pages1);

if ($Product_data!== false) {	
	$sorting = $GLOBALS['catalogue']->displaySort(true);

	$select_sort='<select name="sort" id="product_sort" class="sortedProd">
	  <option value="">'. $GLOBALS['language']->form['please_select'].'</option>';
	  $select_sort1='<select name="sort" id="sortid1" class="sortedProd">
	  <option value="">'. $GLOBALS['language']->form['please_select'].'</option>';
	  foreach ($sorting as $keySort){
		  if($keySort['name']!=="Relevance"){
			  $_valselected = $keySort['field'].'|'.$keySort['order'];
			  if($_valselected == $sortby){
				   $select_sort.=' <option value="'.$keySort['field'].'|'.$keySort['order'].'" selected="selected">'.$keySort['name']. '('.$keySort['direction'].')</option>';
				   $select_sort1.=' <option value="'.$keySort['field'].'|'.$keySort['order'].'" selected="selected">'.$keySort['name']. '('.$keySort['direction'].')</option>';
			  }else{
				   $select_sort.=' <option value="'.$keySort['field'].'|'.$keySort['order'].'">'.$keySort['name']. '('.$keySort['direction'].')</option>';
				   $select_sort1.=' <option value="'.$keySort['field'].'|'.$keySort['order'].'">'.$keySort['name']. '('.$keySort['direction'].')</option>';
			  }
		  }
	  }
	$select_sort.='</select>';
	$select_sort1.='</select>';
	$GLOBALS['smarty']->assign('SORT_ORDER_TOP', $select_sort);
	$GLOBALS['smarty']->assign('SORT_ORDER_BOTTOM', $select_sort1);
	}

foreach($Product_data as $products){

	$productId = $products['product_id'];	
	$products['price_unformatted']		= $products['price'];
	$products['sale_price_unformatted']	= $products['sale_price'];
	$product   = $GLOBALS['catalogue']->productAssign($products, false);
	$products['url'] = $GLOBALS['seo']->buildURL('prod', $products['product_id'], '&amp;');
	$ProductImage    = $GLOBALS['gui']->getProductImage($productId,"thumbnail");
	$_ProductImage  = substr($ProductImage, 0, strlen($ProductImage)-1);
	if($_ProductImage == $GLOBALS['storeURL'] || $_ProductImage == "" ){
		$ProductImage =  $GLOBALS['storeURL']."/skins/".$GLOBALS['gui']->getSkin()."/images/common/noimage_thumbnail.png";
		$products['thumbnail']= $ProductImage;
	 }
	if($products['sale_price_unformatted']>0){		
		$products['save']	= ($products['price_unformatted'] - $products['sale_price_unformatted']);
		$products['save_percentage']	=  round($products['save']*100/$products['price_unformatted'],2) ;         $products['save_price']	= round($products['save'], 2);
	 }
	 $products['ctrl_stock'] = (!$product['use_stock_level'] || $GLOBALS['config']->get('config', 'basket_out_of_stock_purchase') || ($product['use_stock_level'] && $GLOBALS['catalogue']->getProductStock($product['product_id'], null, true))) ? true : false;
	$vars['products'][] = $products;
	}
	$GLOBALS['smarty']->assign('VAL_SELF', $PageUrl	);
	$GLOBALS['smarty']->assign('PRODUCTS', $vars['products']);
	$file_name = 'ajax.category.tpl';
	$form_file = str_replace('hooks/','',$GLOBALS['gui']->getCustomModuleSkin('plugins', dirname(__FILE__), $file_name));
	$form_file = str_replace('ajax/','',$GLOBALS['gui']->getCustomModuleSkin('plugins', dirname(__FILE__), $file_name));
	
	$GLOBALS['gui']->changeTemplateDir($form_file);
	$content = $GLOBALS['smarty']->fetch($file_name);
	$GLOBALS['gui']->changeTemplateDir();
	
	$return["hashurl"] = "".implode("&",$urlOpt);
	$return["html"] = $content;
	
	echo json_encode($return); 

?>