<?php
if(!defined('CC_DS')) die('Access Denied');

require_once('modules'.CC_DS.'plugins'.CC_DS.'SFWS_Category_Navigation'.CC_DS.'class.category_navigation.php');

$sfws_category_navigation = new sfws_category_navigation(null);

$GLOBALS['smarty']->assign('SFWS_CATEGORY_NAVIGATION_DESKTOP',$sfws_category_navigation->get_sfws_category_navigation_desktop());
$GLOBALS['smarty']->assign('SFWS_CATEGORY_NAVIGATION_MOBILE',$sfws_category_navigation->get_sfws_category_navigation_mobile());