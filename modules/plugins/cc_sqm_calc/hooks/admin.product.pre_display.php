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
if($_GET['action']=='edit') {
	$GLOBALS['main']->addTabControl('Pack Calculator', 'pack_calc');
	$GLOBALS['hook_tab_content'][] = 'modules/plugins/cc_sqm_calc/skin/admin/product.form.tpl';
}