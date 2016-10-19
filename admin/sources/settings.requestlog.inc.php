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

global $lang;

$GLOBALS['main']->addTabControl($lang['navigation']['nav_request_log'], 'request_log');
$GLOBALS['gui']->addBreadcrumb($lang['navigation']['nav_request_log'], currentPage());

if (Admin::getInstance()->superUser()) {
	//System errors
	$per_page = 25;
	$page = (isset($_GET['page'])) ? $_GET['page'] : 1;
	$request_log = $GLOBALS['db']->select('CubeCart_request_log', '*', false, array('time' => 'DESC'), $per_page, $page, false);
	if (is_array($request_log)) {
		foreach ($request_log as $log) {
			$smarty_data['request_log'][] = array(
				'time'    => formatTime(strtotime($log['time'])),
				'request'   => htmlspecialchars($log['request']),
				'result'   => htmlspecialchars($log['result']),
				'request_url' => $log['request_url'],
				'error' => empty($log['error']) ? false : htmlspecialchars($log['error'])
			);
		}
	}

	$GLOBALS['smarty']->assign('REQUEST_LOG', $smarty_data['request_log']);
	$count = $GLOBALS['db']->count('CubeCart_request_log', 'request_id');
	$GLOBALS['smarty']->assign('PAGINATION_REQUEST_LOG', $GLOBALS['db']->pagination($count, $per_page, $page, 5, 'page'));
}
$page_content = $GLOBALS['smarty']->fetch('templates/settings.requestlog.php');