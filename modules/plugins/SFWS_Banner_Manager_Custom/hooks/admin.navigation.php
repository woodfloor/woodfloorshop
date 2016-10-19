<?php
if(!defined('CC_DS')) die('Access Denied');

require_once('modules'.CC_DS.'plugins'.CC_DS.'SFWS_Banner_Manager_Custom'.CC_DS.'class.banner_manager_custom.php');

$sfws_banner_manager_custom = new sfws_banner_manager_custom(null);

$nav_sections['sfws_banner_manager_custom'] = $sfws_banner_manager_custom->_language_strings['top_level_admin_menu'];
$nav_items['sfws_banner_manager_custom'] = array($sfws_banner_manager_custom->_language_strings['child_admin_menu'] => '?_g=plugin&amp;name=manage_banners_custom');