<?php
if(!defined('CC_DS')) die('Access Denied');

if(!$GLOBALS['db']->misc("show tables like '".$GLOBALS['config']->get('config', 'dbprefix')."CubeCart_sfws_banners_custom';")) {
	$install_table = "CREATE TABLE IF NOT EXISTS `".$GLOBALS['config']->get('config', 'dbprefix')."CubeCart_sfws_banners_custom` (
	  `banner_id` int(11) NOT NULL auto_increment,
	  `banner_location` tinyint(4) NOT NULL default '0',
	  `banner_order` int(16) NOT NULL default '0',
	  `banner_name` varchar(255) NOT NULL default '',
	  `banner_url` text NOT NULL,
	  `banner_url_target` VARCHAR( 100 ) NOT NULL DEFAULT '_self', 
	  `banner_image` varbinary(250) NOT NULL default '',
	  `banner_image_width` varchar(255) NOT NULL default '',
	  `banner_image_height` varchar(255) NOT NULL default '',
	  `banner_manufacturer` int(11) NOT NULL default '0',
	  `banner_categories` VARCHAR(255) NULL DEFAULT NULL,
	  `banner_status` tinyint(4) NOT NULL default '0',
	  PRIMARY KEY  (`banner_id`)
	) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;";
	$GLOBALS['db']->misc($install_table);
}

if(!$module_config = $GLOBALS['config']->get('sfws_banner_manager_custom')) {
	$module_config = array (
		'sfws_header_banner_status'				=> false,
		'sfws_header_banner_effect'				=> 'fade',
		'sfws_header_banner_effect_pause'		=> true,
		'sfws_header_banner_effect_speed'		=> '500',
		'sfws_header_banner_effect_timeout'		=> '2000',
		'sfws_header_banner_width'				=> '',
		'sfws_header_banner_height'				=> '',
		'sfws_header_banner_padding'			=> '0',
		'sfws_header_banner_border_width'		=> '0',
		'sfws_header_banner_border_color'		=> '#000000',
		'sfws_header_banner_background_color'	=> '#FFFFFF',
		'sfws_footer_banner_status'				=> false,
		'sfws_footer_banner_effect'				=> 'fade',
		'sfws_footer_banner_effect_pause'		=> true,
		'sfws_footer_banner_effect_speed'		=> '500',
		'sfws_footer_banner_effect_timeout'		=> '2000',
		'sfws_footer_banner_width'				=> '',
		'sfws_footer_banner_height'				=> '',
		'sfws_footer_banner_padding'			=> '0',
		'sfws_footer_banner_border_width'		=> '0',
		'sfws_footer_banner_border_color'		=> '#000000',
		'sfws_footer_banner_background_color'	=> '#FFFFFF',
		'sfws_side_banner_status'				=> false,
		'sfws_side_banner_effect'				=> 'fade',
		'sfws_side_banner_effect_pause'			=> true,
		'sfws_side_banner_effect_speed'			=> '500',
		'sfws_side_banner_effect_timeout'		=> '2000',
		'sfws_side_banner_width'				=> '',
		'sfws_side_banner_height'				=> '',
		'sfws_side_banner_padding'				=> '0',
		'sfws_side_banner_border_width'			=> '0',
		'sfws_side_banner_border_color'			=> '#000000',
		'sfws_side_banner_background_color'		=> '#FFFFFF',
		'status' => false
	);
	$GLOBALS['config']->set('sfws_banner_manager_custom','', $module_config);
	$record = array (
		'module'	=> 'plugins',
		'folder'	=> 'SFWS_Banner_Manager_Custom',
		'status'	=> '0',
	);
	$GLOBALS['db']->insert('CubeCart_modules', $record);
	httpredir(currentPage());
}

$plugin_config_file = "modules/plugins/SFWS_Banner_Manager_Custom/config.xml";
$plugin_xml = new SimpleXMLElement(file_get_contents($plugin_config_file));
$plugin_version = (string)$xml->info->version;
$GLOBALS['smarty']->assign('PLUGIN_VERSION',$plugin_version);

$module	= new Module(__FILE__, $_GET['module'], 'admin/index.php', true);
$page_content = $module->display();