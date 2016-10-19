<?php
if(!defined('CC_DS')) die('Access Denied');



$module	= new Module(__FILE__, $_GET['module'], 'admin/index.tpl', true, false);


$module_config = $GLOBALS['config']->get('refine_search');
//echo "<pre>";print_r ($module_config);
//print_r ($module);

$module->fetch();
$page_content = $module->display();