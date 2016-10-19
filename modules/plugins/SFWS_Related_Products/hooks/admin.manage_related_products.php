<?php
if(!defined('CC_DS')) die('Access Denied');

require_once('modules'.CC_DS.'plugins'.CC_DS.'SFWS_Related_Products'.CC_DS.'class.related_products.php');

$sfws_related_products = new sfws_related_products(null);

$page_content = $sfws_related_products->manage_related_products();