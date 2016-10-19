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
if(!defined('CC_INI_SET')) die('Access Denied');

if($_POST['module']['status']==1) {
	$GLOBALS['db']->misc("ALTER TABLE `".$GLOBALS['config']->get('config', 'dbprefix')."CubeCart_inventory` ADD `calc_status` ENUM('0','1') NOT NULL DEFAULT '0'");
	$GLOBALS['db']->misc("ALTER TABLE `".$GLOBALS['config']->get('config', 'dbprefix')."CubeCart_inventory` ADD `calc_packm2` DECIMAL(10,2) NULL DEFAULT NULL;");
}

$module	= new Module(__FILE__, $_GET['module'], 'admin/index.tpl', true, false);

$template_vars = [];

$module->assign_to_template($template_vars);
$module->fetch();
$page_content = $module->display();