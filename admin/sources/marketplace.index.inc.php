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
Admin::getInstance()->permissions('settings', CC_PERM_FULL, true);
global $lang, $glob;
$hash = randomString();
$file = CC_ROOT_DIR.'/files/hash.'.$hash.'.php';
$fp = fopen($file, 'w'); fwrite($fp, '<?php echo "'.$hash.'"; unlink("'.$file.'"); ?>'); fclose($fp);
httpredir('https://www.cubecart.com/store/auth/?hash='.$hash.'&amp;url='.urlencode(CC_STORE_URL));