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

/**
 * Santize class
 *
 * @author Technocrat
 * @author Al Brookbanks
 * @since 5.0.0
 */
class Sanitize {

	/**
	 * Checks POSTs for valid security token
	 */
	static public function checkToken() {
		if (!empty($_POST)) {
			//Validate the POST token
			if (!isset($_POST['token']) || !$GLOBALS['session']->checkToken($_POST['token'])) {
				//Make a new token just to insure that it doesn't get used again
				$GLOBALS['session']->getToken(true);
				self::_stopToken();
			}
			//Make a new token
			$GLOBALS['session']->getToken(true);
		}
	}

	/**
	 * Clean all the global varaibles
	 */
	static public function cleanGlobals() {
		
		$GLOBALS['RAW'] = array(
			'GET' 		=> $_GET,
			'POST' 		=> $_POST,
			'COOKIE' 	=> $_COOKIE,
			'REQUEST' 	=> $_REQUEST
		);
		
		self::_clean($_GET);
		self::_clean($_POST);
		self::_clean($_COOKIE);
		self::_clean($_REQUEST);
	}

	//=====[ Private ]=======================================

	/**
	 * Clean a variable
	 *
	 * @param array $data
	 */
	private static function _clean(&$data) {
		if (empty($data)) {
			return;
		}
		if (is_array($data)) {
			foreach ($data as $key => $value) {
				//Make sure the variable's key name is a valid one
				if (preg_match('#([^a-z0-9\-\_\:\@\|])#i', urldecode($key))) {
					trigger_error('Security Warning: Illegal array key "'.htmlentities($key).'" was detected and was removed.', E_USER_WARNING);
					unset($data[$key]);
					continue;
				} else {
					if (is_array($value)) {
						self::_clean($data[$key]);
					} else {
						// If your HTML content isn't in a field with one of the following names, it's going!
						// We shold probably standardise the field names in the future
						if (!empty($value)) {
							$data[$key] = self::_safety($value);
						}
					}
				}
			}
		} else {
			$data = self::_safety($data);
		}
	}

	/**
	 * Sanitize a string for HTML
	 *
	 * @param string $value
	 * @return string
	 */
	private static function _safety($value) {
		return filter_var($value, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	}

	/**
	 * Clears POST and triggers error
	 * Used when the POST token is not valid
	 */
	static private function _stopToken() {
		if(CC_IN_ADMIN && Admin::getInstance()->is()) {
			unset($_POST, $_GET);
			$message = 'Security Alert: Possible Cross-Site Request Forgery (CSRF) or browser back button used.';
			$gui_message['error'][md5($message)] = $message;
			$GLOBALS['session']->set('GUI_MESSAGE', $gui_message);
			trigger_error('Invalid Security Token', E_USER_WARNING);
		}
	}
}