<?php
/**
 * CubeCart v6
 * ========================================
 * CubeCart is a registered trade mark of CubeCart Limited
 * Copyright CubeCart Limited 2014. All rights reserved.
 * UK Private Limited Company No. 5323904
 * ========================================
 * Web:   http://www.cubecart.com
 * Email:  sales@cubecart.com
 */
if(isset($_GET['search']['keywords'])) {
	$string = strtoupper($_GET['search']['keywords']);
	
	if(preg_match('/^WF[HPCDESR][0-9]+$/',$string)) {
		$type = substr($string, 2, 1);
		$item_id = (int)substr($string, 3);
		switch($type) {
			case 'R':
				httpredir(CC_ROOT_REL.'sale-items.html');
			break;
			case 'H':
				httpredir('index.php');
			break;
			case 'C':
				$type = 'cat';
			break;
			case 'P':
				$type = 'prod';
			break;
			case 'D':
				$type = 'doc';
			break;
			case 'E':
				httpredir(CC_ROOT_REL.'contact-us.html');
			break;
			case 'S':
				if($search_str = $GLOBALS['db']->select('CubeCart_search_index', 'keywords', array('id' => $item_id))) {
					httpredir(CC_ROOT_REL.'search.html?search%5Bkeywords%5D='.urlencode($search_str['0']['keywords']).'&_a=category');
				}
			break;
		}
		$path = $GLOBALS['seo']->getdbPath($type, $item_id);
		httpredir(CC_ROOT_REL.$path.'.html');
	}
}

if(isset($_GET['_a'])) {
	if(isset($_GET['search']['keywords']) && !empty($_GET['search']['keywords'])) {

		if($search_id = $GLOBALS['db']->select('CubeCart_search_index', 'id', array('hash' => md5($_GET['search']['keywords']),'keywords' => $_GET['search']['keywords']))) {
			$page_id = 'WFS'.$search_id[0]['id'];
		} else {
			$search_id = $GLOBALS['db']->insert('CubeCart_search_index', array('hash' => md5($_GET['search']['keywords']),'keywords' => $_GET['search']['keywords']));
			$page_id = 'WFS'.$search_id;
		}

	} else {
		switch($_GET['_a']) {
			case 'saleitems':
				$page_id = 'WFR1';
			break;
			case 'product':
				if(isset($_GET['product_id']) && $_GET['product_id']>0) $page_id = 'WFP'.$_GET['product_id'];
			break;
			case 'document':
				if(isset($_GET['doc_id']) && $_GET['doc_id']>0) $page_id = 'WFD'.$_GET['doc_id'];
			break;
			case 'category':
				if(isset($_GET['cat_id']) && $_GET['cat_id']>0) $page_id = 'WFC'.$_GET['cat_id'];
			break;
			case 'contact':
				$page_id = 'WFE1';
			break;

		}
	}
	if(isset($page_id)) {
		$GLOBALS['smarty']->assign('WFPID',$page_id);
	}
}