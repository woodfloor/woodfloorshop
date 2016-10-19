<?php
if(!defined('CC_DS')) die('Access Denied');

require_once('modules'.CC_DS.'plugins'.CC_DS.'SFWS_Banner_Manager_Custom'.CC_DS.'class.banner_manager_custom.php');

$sfws_banner_manager_custom = new sfws_banner_manager_custom(null);

$page_content = $sfws_banner_manager_custom->manage_banners_custom();