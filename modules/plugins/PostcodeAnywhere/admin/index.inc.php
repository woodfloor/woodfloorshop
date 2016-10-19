<?php
/**
 * CubeCart v6
 * ========================================
 * CubeCart is a registered trade mark of CubeCart Limited
 * Copyright CubeCart Limited 2014. All rights reserved.
 * UK Private Limited Company No. 5323904
 * ========================================
 * Web:   http://www.cubecart.com
 * Email:  sales@devellion.com
 * License:  GPL-2.0 http://opensource.org/licenses/GPL-2.0
 */
if(isset($_GET['module']['capture_key'])) {
	$_GET['module']['capture_key'] = trim($_GET['module']['capture_key']);
}
if(!defined('CC_INI_SET')) die('Access Denied');
$module	= new Module(__FILE__, $_GET['module'], 'admin/index.tpl', true, false);
$module->assign_to_template($template_vars);
$module->fetch();
$page_content = $module->display();