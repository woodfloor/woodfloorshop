<?php
if(!defined('CC_DS')) die('Access Denied');

if(!$GLOBALS['db']->misc("show tables like '".$GLOBALS['config']->get('config', 'dbprefix')."CubeCart_sfws_related_products';")) {
	$install_table = "CREATE TABLE IF NOT EXISTS `".$GLOBALS['config']->get('config', 'dbprefix')."CubeCart_sfws_related_products` (
	`id` int(10) unsigned NOT NULL auto_increment,
	`main_product_id` int(10) unsigned NOT NULL default '0',
	`related_product_id` int(10) unsigned NOT NULL default '0',
	PRIMARY KEY  (`id`),
	KEY `main_product_id` (`main_product_id`),
	KEY `related_product_id` (`related_product_id`)
	) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;";
	$GLOBALS['db']->misc($install_table);
}

if(!$module_config = $GLOBALS['config']->get('sfws_related_products')) {
	$module_config = array (
		'sfws_related_products_checkout_pages_amount'			=> '3',
		'sfws_related_products_product_pages_amount'			=> '3',
		'sfws_related_products_checkout_pages_status' 			=> true,
		'sfws_related_products_checkout_pages_random_status'	=> true,
		'sfws_related_products_product_pages_status' 			=> true,
		'sfws_related_products_product_pages_random_status'		=> true,
		'status' => false
	);
	$GLOBALS['config']->set('sfws_related_products','', $module_config);
	$record = array (
		'module'	=> 'plugins',
		'folder'	=> 'SFWS_Related_Products',
		'status'	=> '0',
	);
	$GLOBALS['db']->insert('CubeCart_modules', $record);
	httpredir(currentPage());
}

$plugin_config_file = "modules/plugins/SFWS_Related_Products/config.xml";
$plugin_xml = new SimpleXMLElement(file_get_contents($plugin_config_file));
$plugin_version = (string)$xml->info->version;
$plugin_folder = (string)$xml->info->folder;
$GLOBALS['smarty']->assign('PLUGIN_VERSION',$plugin_version);

$store_url = (CC_SSL) ? $GLOBALS['config']->get('config', 'ssl_url') : $GLOBALS['config']->get('config', 'standard_url');
$fields = array(
    'plugin_folder' => $plugin_folder,
    'plugin_version' => $plugin_version,
    'store_url' => $store_url
);
$fields_string = http_build_query($fields);
if ($request = new Request('www.semperfiwebservices.com', '/version-check/cc6-plugins/version-check.php')) {
	$request->skiplog(true);
	$request->setMethod('post');
	$request->cache(true);
	$request->setSSL(true);
	$request->setUserAgent('SFWS-Version-Check');
	$request->setData($fields_string);
	if (($response = $request->send()) !== false) {
		if (version_compare(trim($response), $plugin_version, '>')) {
			$GLOBALS['smarty']->assign('LATEST_VERSION', $response);
			$GLOBALS['smarty']->assign('NEW_VERSION_AVAILABLE', true);
		}
	}
}

$module	= new Module(__FILE__, $_GET['module'], 'admin/index.php', true);
$page_content = $module->display();