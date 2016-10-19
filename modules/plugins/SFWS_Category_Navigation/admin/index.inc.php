<?php
if(!defined('CC_DS')) die('Access Denied');

if(!$module_config = $GLOBALS['config']->get('sfws_category_navigation')) {
	$module_config = array (
		// Categories Box (Desktop)
		'cbd_box_background_color'			=> '#484848',
		'cbd_box_border_color'				=> '#484848',
		'cbd_link_color'					=> '#FFFFFF',
		'cbd_link_hover_color'				=> '#484848',
		'cbd_link_hover_background_color'	=> '#FFCC01',
		'cbd_expand_direction'				=> 'down',
		'cbd_expand_effect'					=> 'fadeToggle',
		'cbd_expand_effect_speed'			=> '200',
		'cbd_sc_box1_width'		=> '625px',
		'cbd_sc_box1_height'	=> '355px',
		'cbd_sc_box2_width'		=> '320px',
		'cbd_sc_box2_height'	=> '237px',
		'cbd_sc_box3_width'		=> '320px',
		'cbd_sc_box3_height'	=> '235px',
		'cbd_sc_box4_width'		=> '320px',
		'cbd_sc_box4_height'	=> '39px',
		'cbd_sc_box5_width'		=> '332px',
		'cbd_sc_box5_height'	=> '390px',
		'cbd_home_status'		=> true,
		'cbd_sale_status'		=> true,
		'cbd_gc_status'			=> true,
		'cbd_expand_status'		=> true,
		'cbd_status'			=> false,
		// Categories Box (Mobile)
		'cbm_box_title_color'							=> '#999999',
		'cbm_box_title_background_color'				=> '#444444',
		'cbm_box_title_border_top_color'				=> '#5E5E5E',
		'cbm_category_link_color'						=> '#C2C2C2',
		'cbm_category_link_background_color'			=> '#333333',
		'cbm_category_link_border_bottom_color'			=> '#262626',
		'cbm_category_link_hover_color'					=> '#C2C2C2',
		'cbm_category_link_hover_background_color'		=> '#242424',
		'cbm_category_link_hover_border_bottom_color'	=> '#262626',
		'cbm_back_link_color'							=> '#C2C2C2',
		'cbm_back_link_background_color'				=> '#333333',
		'cbm_back_link_border_bottom_color'				=> '#262626',
		'cbm_back_link_hover_color'						=> '#C2C2C2',
		'cbm_back_link_hover_background_color'			=> '#242424',
		'cbm_back_link_hover_border_bottom_color'		=> '#262626',
		'cbm_title_status'			=> true,
		'cbm_home_status'			=> true,
		'cbm_sale_status'			=> true,
		'cbm_gc_status'				=> true,
		'cbm_expand_status'			=> true,
		'cbm_contact_status'		=> true,
		'cbm_status'				=> false,
		// Master Status
		'status'			=> false
	);
	$GLOBALS['config']->set('sfws_category_navigation','', $module_config);
	$record = array (
		'module'	=> 'plugins',
		'folder'	=> 'SFWS_Category_Navigation',
		'status'	=> '0',
	);
	$GLOBALS['db']->insert('CubeCart_modules', $record);
	httpredir(currentPage());
}

$plugin_config_file = "modules/plugins/SFWS_Category_Navigation/config.xml";
$plugin_xml = new SimpleXMLElement(file_get_contents($plugin_config_file));
$plugin_version = (string)$xml->info->version;
$GLOBALS['smarty']->assign('PLUGIN_VERSION',$plugin_version);

$module	= new Module(__FILE__, $_GET['module'], 'admin/index.php', true);
$page_content = $module->display();