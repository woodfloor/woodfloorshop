<?php
if(!defined('CC_DS')) die('Access Denied');

require_once('modules'.CC_DS.'plugins'.CC_DS.'SFWS_Banner_Manager_Custom'.CC_DS.'class.banner_manager_custom.php');

$sfws_banner_manager_custom = new sfws_banner_manager_custom(null);

$GLOBALS['smarty']->assign('SFWS_BANNER_MANAGER_CUSTOM_HEADER',$sfws_banner_manager_custom->display_banners_custom_header());
$GLOBALS['smarty']->assign('SFWS_BANNER_MANAGER_CUSTOM_SIDE',$sfws_banner_manager_custom->display_banners_custom_side());
$GLOBALS['smarty']->assign('SFWS_BANNER_MANAGER_CUSTOM_FOOTER',$sfws_banner_manager_custom->display_banners_custom_footer());