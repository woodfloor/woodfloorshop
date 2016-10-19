<?php
/**
 * CubeCart v5
 * ========================================
 * CubeCart is a registered trade mark of Devellion Limited
 * Copyright Devellion Limited 2010. All rights reserved.
 * UK Private Limited Company No. 5323904
 * ========================================
 * Web:			http://www.webcreation.us
 * Email:		sales@webcreation.us
 * License:		http://www.cubecart.com/v5-software-license
 * ========================================
 * this Module is NOT Open Source.
 * Unauthorized reproduction is not allowed.
 */
/**
 * Refine Search controller
 *
 * @author AH
 * @version 1.0.0
 * @since 5.0.0
 */
 $GLOBALS['language']->loadDefinitions('refine_search', CC_ROOT_DIR.CC_DS.'modules'.CC_DS.'plugins'.CC_DS.'refine_search'.CC_DS.'language', 'module.definitions.xml');
 
 class filter{
	public $_filter;
	private $price_filter  = false;
	private $option_filter = false;
	public function __construct() {
		$this->_filter	= $filter;
		$this->_language_strings = $GLOBALS['language']->getStrings('refine_search');	
	}	
	//=====[ Public ]====================================================================================================

	
	/**isset
	 * Display Category Filter
	 */
	public function _displayCategoryTree(){
		if(isset($_GET['cat_id']) && (int)$_GET['cat_id']>0){
			$GLOBALS['smarty']->assign('CATEGORY_ID',$_GET['cat_id']);
			$category = $GLOBALS['catalogue']->getCategoryData($_GET['cat_id']);
			if($category['cat_parent_id']>0){
				$parent = $GLOBALS['catalogue']->getCategoryData($category['cat_parent_id']);
				if($parent['cat_parent_id']>0){
					$father = $GLOBALS['catalogue']->getCategoryData($parent['cat_parent_id']);
				}else{
					$father = $parent;
				}
			}else{
				$father = $category;
			}
			$tree_data = $GLOBALS['catalogue']->getCategoryTree($father['cat_id']);
			if(isset($tree_data) && $tree_data!==false){

				$form_file = str_replace('hooks/','',$GLOBALS['gui']->getCustomModuleSkin('plugins', dirname(__FILE__), $file_name));
				$file_name = 'categorybox.tpl';
				$GLOBALS['smarty']->assign('TREE_CATEGORY',true);
				$GLOBALS['smarty']->assign('RELATED_CATEGORY',$tree_data);
				$GLOBALS['gui']->changeTemplateDir($form_file);
				$link = $GLOBALS['smarty']->fetch($file_name);
				$GLOBALS['gui']->changeTemplateDir();
				return $link; 	
			}
		}
	}
	
	/**
	* Display Price Filter box
	*/
	public function _displayPriceFilter() {		
		 if($_GET['cat_id'] == 'sale'){
			 $query			= "SELECT max(price) as maxval from `".$GLOBALS['config']->get('config','dbprefix')."CubeCart_inventory`  WHERE sale_price > 0 AND status=1  ";
		 }else{
			$query			= "SELECT max(I.price) as maxval from `".$GLOBALS['config']->get('config','dbprefix')."CubeCart_inventory` as I INNER JOIN `".$GLOBALS['config']->get('config','dbprefix')."CubeCart_category_index` as CI ON I.product_id = CI.product_id WHERE I.status=1  AND CI.cat_id = ".$_GET['cat_id'];
		 }
		
		$maxprice		= $GLOBALS['db']->query($query);
		$price_interval	= $GLOBALS['config']->get('refine_search', 'price_inetrval');
		$min			= ($price_interval!="" && $price_interval>0)? $price_interval: 10;
		$max 			= $maxprice[0]['maxval'];
		if(!empty($max) && $max>0){
			$minRange 		= $min;
			$maxRange 		= $min;
			$inertval_count = ceil($max/$min);
			
			for($i=0;$i< $inertval_count; $i++){
				if($i == 0){
					$inetrval[$i]['value']		= "Under ".$GLOBALS['tax']->priceFormat($min);
					$inetrval[$i]['valuepass'] 	= "Under-".$min;			
				}else{
					$maxRange  = $minRange  + $min ;
					$inetrval[$i]['value'] 		= $GLOBALS['tax']->priceFormat($minRange)." - ".$GLOBALS['tax']->priceFormat($maxRange);
					$inetrval[$i]['valuepass'] 	= $minRange."-".$maxRange;
				}
				$minRange = $maxRange;
			}
		$GLOBALS['smarty']->assign('PRICE_DISPLAY',true);
		}
	
		$GLOBALS['smarty']->assign('PRICE_COUNT', $inertval_count);
		$GLOBALS['smarty']->assign('PRICE_OPTIONS', $inetrval);
	    $GLOBALS['smarty']->assign('OPTION_CAT_ID', $_GET['cat_id']);
		$javaScript = $this->supportJava();	
		$GLOBALS['smarty']->assign('JAVASCRIPT', $javaScript);
		
	}	
	private function supportJava(){
		$path 		= $GLOBALS['storeURL'].'/modules/plugins/refine_search/js/options-filter.js';
		$javaScript = '<script type="text/javascript" src="'.$path.'"></script>'; 
		return $javaScript;
	}
	
	/**
	 * Create a Ajaxpagination
	 *
	 * @param int $total_results
	 * @param int $per_page
	 * @param int $page
	 * @param int $show
	 * @param string $var_name
	 * @param string $anchor
	 * @param string $glue
	 * @param bool $view_all
	 * @return string/false
	 */
	public function ajaxpagination($catId, $total_results = false, $per_page = 10, $page = 1, $show = 5, $var_name = 'page', $anchor = false, $glue = ' ', $view_all = true) {
		$glue = (!$glue) ? ' ' : $glue;
		// Lets do some maths...
		$total_pages	= ceil($total_results/$per_page);
		if ($total_pages > 1) {
			// Get the current query string variables
			$url_elements = parse_url(html_entity_decode($_SERVER['REQUEST_URI']));
			$params = false;
			if (isset($url_elements['query']) && !empty($url_elements['query'])) {
				parse_str($url_elements['query'], $params);
				unset($params[$var_name], $params['print_hash']);
			}
			$anchor = ($anchor) ? "#$anchor" : '';
			
			if ($page >= $show - 1) {
				$params[$var_name] = 1;
			}
			if ($page > 1) {
				$params[$var_name] = $page - 1;
			}
			if ($page < (int)$total_pages) {
				$params[$var_name] = $page + 1;
			}
			$data = array(
				'anchor'		=> $anchor,
				'current'		=> "{$url_elements['path']}?",
				'page'			=> $page,
				'params'		=> $params,
				'http_params'	=> http_build_query($params),
				'show'			=> (int)$show,
				'total'			=> (int)$total_pages,
				'var_name'		=> $var_name,
				'view_all'		=> (bool)$view_all,
				'catId'			=> $catId
			);
			$GLOBALS['smarty']->assign('TOTAL', $total_results);
			$GLOBALS['smarty']->assign($data);
			$file_name = 'ajax.paginate.tpl';
			$form_file = str_replace('hooks/','',$GLOBALS['gui']->getCustomModuleSkin('plugins', dirname(__FILE__), $file_name));
			$GLOBALS['gui']->changeTemplateDir($form_file);		
			$paging_tpl = $GLOBALS['smarty']->fetch($file_name);		
			$GLOBALS['gui']->changeTemplateDir();
			return $paging_tpl;
		}else{
			return false;
		}
	}
	
 }