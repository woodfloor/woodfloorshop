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
require dirname(__FILE__).DIRECTORY_SEPARATOR.'ini.inc.php';
define('CC_IN_ADMIN', false);

header('X-Frame-Options: SAME-ORIGIN'); // do not allow iframes

global $config_default;

include CC_ROOT_DIR.CC_DS.'controllers'.CC_DS.'controller.index.inc.php';

$GLOBALS['smarty']->display('templates/'.$global_template_file);