<?php
if(!defined('CC_DS')) die('Access Denied');

require_once('modules'.CC_DS.'plugins'.CC_DS.'SFWS_Related_Products'.CC_DS.'class.related_products.php');

$sfws_related_products = new sfws_related_products(null);

$nav_sections['sfws_related_products'] = $sfws_related_products->_language_strings['top_level_admin_menu'];
$nav_items['sfws_related_products'] = array($sfws_related_products->_language_strings['child_admin_menu'] => '?_g=plugin&amp;name=manage_related_products');