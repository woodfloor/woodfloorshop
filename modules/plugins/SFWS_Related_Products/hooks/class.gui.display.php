<?php
if(!defined('CC_DS')) die('Access Denied');

require_once('modules'.CC_DS.'plugins'.CC_DS.'SFWS_Related_Products'.CC_DS.'class.related_products.php');

$sfws_related_products = new sfws_related_products(null);

$GLOBALS['smarty']->assign('SFWS_RELATED_PRODUCTS_CP',$sfws_related_products->display_related_products_cp());
$GLOBALS['smarty']->assign('SFWS_RELATED_PRODUCTS_PP',$sfws_related_products->display_related_products_pp());