<?php
/**
 * CubeCart v6
 * ========================================
 * CubeCart is a registered trade mark of CubeCart Limited
 * Copyright CubeCart Limited 2015. All rights reserved.
 * UK Private Limited Company No. 5323904
 * ========================================
 * Web:   http://www.cubecart.com
 * Email:  sales@cubecart.com
 * License:  GPL-3.0 https://www.gnu.org/licenses/quick-guide-gplv3.html
 */
if (!defined('CC_INI_SET')) die('Access Denied');
// Load admin user details
if (!isset($_GET['_g']) || !in_array(strtolower($_GET['_g']), array('login', 'logout', 'password', 'recovery'))) {
	$GLOBALS['main']->setTemplate();
}

if (isset($_GET['_g']) && in_array($_GET['_g'], array('login', 'password', 'recovery'))) {
	httpredir('?');
}
// Backard compatibility for links to v5 modules
if(isset($_GET['_g']) && $_GET['_g']=='modules') {
	$_GET['_g'] = 'plugins';
	unset($_GET['type']);
}

if (isset($_GET['_g']) && !empty($_GET['_g']) && $_GET['_g'] != 'plugins') {
	$GLOBALS['gui']->addBreadcrumb(ucwords($_GET['_g']));
}

if (!empty($_GET['_g'])) {

	$module_type = (isset($_GET['type']) && preg_match("/[a-z]/i", $_GET['type'])) ? $_GET['type'] : '';

	$node = (!empty($_GET['node'])) ? strtolower($_GET['node']) : 'index';
	
	if (!isset($_GET['delete']) && strtolower($_GET['_g']) == 'plugins' && !empty($module_type)) {
		
		$module_type = preg_match("/[a-z]/i", $_GET['type']) ? $_GET['type'] : '';
		$GLOBALS['gui']->addBreadcrumb($lang['navigation']['nav_plugins'],'?_g=plugins');
		// Display Modules
		$GLOBALS['main']->wikiNamespace('Modules');
		
		if (!empty($_GET['module'])) {
			// Load Module
			$GLOBALS['main']->wikiPage($_GET['module']);
			// Load additional data from XML
			$config_xml = CC_ROOT_DIR.'/modules/'.$module_type.'/'.$_GET['module'].'/config.xml';
			
			$xml   = new SimpleXMLElement(file_get_contents($config_xml));
			$module_info = array(
				'name' => (string)$xml->info->name,
			);
			
			$module = array(
				'type' => strtolower($module_type),
				'module'=> ($module_type == 'installer') ? '' : $_GET['module'],
			);
			$GLOBALS['gui']->addBreadcrumb((isset($_GET['variant']) ? $_GET['variant'] : $module_info['name']), $_GET);

			$module_admin = CC_ROOT_DIR.'/modules/'.$module['type'].'/'.$module['module'].'/admin/'.$node.'.inc.php';
			if (file_exists($module_admin)) {
				define('MODULE_FORM_ACTION', (defined('VAL_SELF')) ? constant('VAL_SELF') : currentPage());
				include $module_admin;
			} else {
				trigger_error(sprintf("File '%s' doesn't exist", $module_admin), E_USER_WARNING);
			}
		} 
		
	} else if (strtolower($_GET['_g']) == 'plugin' && isset($_GET['name'])) {
			// Include plugins
			$GLOBALS['main']->wikiNamespace('Plugins');
			foreach ($GLOBALS['hooks']->load('admin.'.strtolower($_GET['name'])) as $hook) include $hook;
		} else if ($_GET['_g'] == '401') {
			$GLOBALS['gui']->setError($lang['navigation']['error_401']);
		} else {
		if (strtolower($_GET['_g']) == 'xml') {
			$suppress_output = true;
			// Process an XMLHTTPRequest
			$json = AJAX::load();
			@ob_end_clean();
			die($json);
		} else {
			// Everything else
			$include = $GLOBALS['main']->importNode($_GET['_g'], $node);
			if (file_exists($include)) {
				require $include;
			} else {
				trigger_error(sprintf('Unable to load content for %s:%s', $_GET['_g'], $node), E_USER_WARNING);
			}
		}
	}
} else {
	include CC_ROOT_DIR.'/'.$GLOBALS['config']->get('config', 'adminFolder').'/'.'sources/dashboard.index.inc.php';
}
$GLOBALS['main']->showHelp();

include CC_ROOT_DIR.'/'.$glob['adminFolder'].'/sources/element.navigation.inc.php';
if (is_array($nav_sections)) {
	foreach ($nav_sections as $key => $name) {
		if (isset($nav_items[$key]) && is_array($nav_items[$key])) {
			$GLOBALS['main']->addNavItem($name, $nav_items[$key]);
		}
	}
}
// Create the page tabs
$GLOBALS['main']->showTabs();
// Navigation
$GLOBALS['main']->showNavigation();
// Render main page content
if (!empty($page_content)) {
	$GLOBALS['smarty']->assign('DISPLAY_CONTENT', $page_content);
}

// jQuery UI & Themeroller styles
$styles = glob('js/{styles}/*.css', GLOB_BRACE);
if ($styles && is_array($styles)) {
	$vars = array();
	foreach ($styles as $style) {
		if (preg_match('#^ui\.#iuU', basename($style))) {
			$vars['jquery_styles'][] = str_replace('/', "/", $style);
		}
	}
	if(isset($vars['jquery_styles'])) {
		$GLOBALS['smarty']->assign('JQUERY_STYLES', $vars['jquery_styles']);
	}
}

$body_js = array();
foreach ($GLOBALS['hooks']->load('admin.body_js') as $hook) include $hook;
$GLOBALS['smarty']->assign('BODY_JS', $body_js);

$head_js = array();
foreach ($GLOBALS['hooks']->load('admin.head_js') as $hook) include $hook;
$GLOBALS['smarty']->assign('HEAD_JS', $head_js);

$head_css = array();
foreach ($GLOBALS['hooks']->load('admin.head_css') as $hook) include $hook;
$GLOBALS['smarty']->assign('HEAD_CSS', $head_css);