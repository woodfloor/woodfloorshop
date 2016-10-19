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
$doc_id = $GLOBALS['config']->get('cc_sqm_calc','doc_id');
$howto = $GLOBALS['db']->select('CubeCart_documents', 'doc_name,doc_content', array('doc_id' => $doc_id));
$GLOBALS['smarty']->assign('HOW_TO', $howto[0]);

$doc_id = $GLOBALS['config']->get('cc_sqm_calc','doc_id_underlay');
$underlay = $GLOBALS['db']->select('CubeCart_documents', 'doc_name,doc_content', array('doc_id' => $doc_id));
$GLOBALS['smarty']->assign('UNDERLAY', $underlay[0]);

$GLOBALS['smarty']->assign('CC_SQM_CALC', $GLOBALS['config']->get('cc_sqm_calc'));