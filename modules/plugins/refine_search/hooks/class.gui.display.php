<?php if(!defined('CC_DS')) die('Access Denied');
/*$p = $GLOBALS['config']->get('modsindex_refine_search');
echo "<pre>";
print_r($p);*/
if ($GLOBALS['config']->get('refine_search', 'status') && in_array($_GET['_a'],array('category')) && !$GLOBALS['config']->get('config', 'catalogue_mode')) {
		
	require_once CC_ROOT_DIR.CC_DS.'modules'.CC_DS.'plugins'.CC_DS.'refine_search'.CC_DS.'filter.class.php';
	$filter    =  new filter(); 
	$file_name = 'box.tpl';
	$form_file = str_replace('hooks/','',$GLOBALS['gui']->getCustomModuleSkin('plugins', dirname(__FILE__), $file_name));	

	if($GLOBALS['config']->get('refine_search', 'category_option')){		
		$GLOBALS['smarty']->assign('CATEGORY_SEARCH', $filter->_displayCategoryTree());		
	}
		
	if($GLOBALS['config']->get('refine_search', 'price_filters')){
		$GLOBALS['smarty']->assign('PRICE_FILTER', 1);
		$filter->_displayPriceFilter();				
	}
		
	$GLOBALS['gui']->changeTemplateDir($form_file);
	$link = $GLOBALS['smarty']->fetch($file_name);
	$GLOBALS['gui']->changeTemplateDir();
	$GLOBALS['smarty']->assign('REFINE_SEARCH', $link);	
	
}
