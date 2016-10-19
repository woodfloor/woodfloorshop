<?php
class sfws_banner_manager_custom {

	public $_module_config = array();

	public $_language_strings = array();
	
	public function __construct($module_config = null) {

		$this->_module_config = is_array($module_config) ? $module_config : $GLOBALS['config']->get('sfws_banner_manager_custom');
		
		$GLOBALS['language']->loadDefinitions('sfws_banner_manager', 'modules/plugins/SFWS_Banner_Manager_Custom/language', 'module.definitions.xml');
		$this->_language_strings = $GLOBALS['language']->getStrings('sfws_banner_manager_custom');

	}

	public function manage_banners_custom() {

		$GLOBALS['gui']->changeTemplateDir('modules/plugins/SFWS_Banner_Manager_Custom/skin/admin');
		
		$GLOBALS['smarty']->assign('MODULE_LANG',$this->_language_strings);

		if (isset($_POST['banner']) && is_array($_POST['banner']) && Admin::getInstance()->permissions('settings', CC_PERM_EDIT)) {

			$redirect		= true;
			$keys_remove	= null;
			$keys_add		= null;

			$filemanager	= new FileManager(FileManager::FM_FILETYPE_IMG);
			if (($uploaded = $filemanager->upload()) !== false) {
				foreach ($uploaded as $file_id) {
					$_POST['image'][(int)$file_id] = true;
				}
			}

			foreach ($_POST['banner'] as $key => $value) {
				if (!in_array($key, array('banner_name'))) continue;
				$_POST['banner'][$key]	= html_entity_decode($value);
			}

			if (is_numeric($_POST['banner']['banner_id'])) {
				$banner_id = $_POST['banner']['banner_id'];
				$old_image = $GLOBALS['db']->select('CubeCart_sfws_banners_custom',array('banner_image'),array('banner_id' => $_POST['banner']['banner_id']));
				$_POST['banner']['banner_image'] = $old_image[0]['banner_image'];
				
				if (isset($_POST['image']) && is_array($_POST['image'])) {
					foreach ($_POST['image'] as $image_id => $enabled) {
						if ($enabled == 0) {
							$_POST['banner']['banner_image'] = '';
							continue;
						}
						$_POST['banner']['banner_image'] = (int)$image_id;
						break;
					}
				}

				if (isset($_POST['banner_categories']) && is_array($_POST['banner_categories'])) {
					$banner_categories = '';
					foreach ($_POST['banner_categories'] as $banner_category) {
						$banner_categories .= $banner_category.',';
					}
					$banner_categories = rtrim($banner_categories, ',');
					$_POST['banner']['banner_categories'] = $banner_categories;
				} else {
					$_POST['banner']['banner_categories'] = '';
				}

				if ((!empty($_POST['banner']['banner_name']) && $GLOBALS['db']->update('CubeCart_sfws_banners_custom', $_POST['banner'], array('banner_id' => $_POST['banner']['banner_id']), true))) {
					$GLOBALS['main']->setACPNotify($this->_language_strings['admin_manage_page_notify_update']);
					$keys_remove = array('action', 'banner_id');
				} else {
					$GLOBALS['main']->setACPWarning($this->_language_strings['admin_manage_page_error_update']);
					$redirect = false;
				}

			} else {

				if (isset($_POST['image']) && is_array($_POST['image'])) {
					foreach ($_POST['image'] as $image_id => $enabled) {
						if ($enabled == 0) {
							$_POST['banner']['banner_image'] = '';
							continue;
						}
						$_POST['banner']['banner_image'] = (int)$image_id;
						break;
					}
				}

				if (isset($_POST['banner_categories']) && is_array($_POST['banner_categories'])) {
					$banner_categories = '';
					foreach ($_POST['banner_categories'] as $banner_category) {
						$banner_categories .= $banner_category.',';
					}
					$banner_categories = rtrim($banner_categories, ',');
					$_POST['banner']['banner_categories'] = $banner_categories;
				} else {
					$_POST['banner']['banner_categories'] = '';
				}

				if (!empty($_POST['banner']['banner_name']) && $GLOBALS['db']->insert('CubeCart_sfws_banners_custom', $_POST['banner'])) {
					$banner_id = $GLOBALS['db']->insertid();
					$GLOBALS['main']->setACPNotify($this->_language_strings['admin_manage_page_notify_add']);
					$keys_remove = array('action', 'banner_id');
				} else {
					$GLOBALS['main']->setACPWarning($this->_language_strings['admin_manage_page_error_add']);
					$redirect	= false;
				}
			}

			$GLOBALS['cache']->clear();
			if ($redirect) {
				httpredir(currentPage($keys_remove, $keys_add));
			}

		}

		if (isset($_GET['delete']) && is_numeric($_GET['delete']) && Admin::getInstance()->permissions('settings', CC_PERM_DELETE)) {
			if ($GLOBALS['db']->delete('CubeCart_sfws_banners_custom', array('banner_id' => $_GET['delete']))) {
				$GLOBALS['main']->setACPNotify($this->_language_strings['admin_manage_page_notify_delete']);
			} else {
				$GLOBALS['main']->setACPWarning($this->_language_strings['admin_manage_page_error_delete']);
			}
			$GLOBALS['cache']->clear();
			httpredir(currentPage(array('delete')));
		}

		$update = array();
		if (isset($_POST['banner_status']) && is_array($_POST['banner_status'])) {
			foreach ($_POST['banner_status'] as $banner_id => $banner_status) {
				$update[$banner_id]['banner_status'] = $banner_status;
			}
		}
		if (!empty($update) && is_array($update) && Admin::getInstance()->permissions('settings', CC_PERM_EDIT)) {
			$updated = false;
			foreach ($update as $banner_id => $array) {
				if ($GLOBALS['db']->update('CubeCart_sfws_banners_custom', $array, array('banner_id' => $banner_id), true)) $updated = true;
			}
			if ($updated) {
				$GLOBALS['main']->setACPNotify($this->_language_strings['admin_manage_page_notify_update_list']);
			} else {
				$GLOBALS['main']->setACPWarning($this->_language_strings['admin_manage_page_error_update_list']);
			}
			$GLOBALS['cache']->clear();
			httpredir(currentPage());
		}

		$filemanager	= new FileManager(FileManager::FM_FILETYPE_IMG);

		if (isset($_GET['action'])) {
			
			if (in_array(strtolower($_GET['action']), array('edit', 'add'))) {

				$GLOBALS['gui']->addBreadcrumb($this->_language_strings['admin_manage_breadcrumb'], 'admin.php?_g=plugin&name=manage_banners_custom');

				$GLOBALS['main']->addTabControl($this->_language_strings['admin_manage_tab_addedit_general'], 'banner_general', null, 'G');
				$GLOBALS['main']->addTabControl($this->_language_strings['admin_manage_tab_addedit_image'], 'banner_image', null, 'I');

				if (isset($_GET['banner_id']) && is_numeric($_GET['banner_id'])) {
					if (($banner = $GLOBALS['db']->select('CubeCart_sfws_banners_custom', false, array('banner_id' => (int)$_GET['banner_id']))) !== false) {
						$bannerData	= $banner[0];
						$banner_url = 'admin.php?_g=plugin&name=manage_banners_custom&action=edit&banner_id='.$_GET['banner_id'];
						$GLOBALS['gui']->addBreadcrumb($banner[0]['banner_name'], $banner_url);
					}
				} 

				if (($manufacturers = $GLOBALS['db']->select('CubeCart_manufacturers', false, false, array('name' => 'ASC'))) !== false) {
					foreach ($manufacturers as $manufacturer) {
						$manufacturer['selected'] = ($manufacturer['id'] == $banner[0]['banner_manufacturer']) ? ' selected="SELECTED"' : '';
						$smarty_data['list_manufacturers'][] = $manufacturer;
					}
					$GLOBALS['smarty']->assign('MANUFACTURERS', $smarty_data['list_manufacturers']);
				}

				if (!empty($banner[0]['banner_categories'])) {
					$banner_categories = $banner[0]['banner_categories'];
					$category_list = explode(",",$banner_categories);
					foreach ($category_list as $category) {
						$cats_selected[]  = (int)$category;
					}
				}

				$categoryArray = $GLOBALS['db']->select('CubeCart_category', array('cat_name', 'cat_parent_id', 'cat_id'));

				if ($categoryArray) {
					$cat_ist[] = '/';
					$seo = SEO::getInstance();
					foreach ($categoryArray as $category) {
						if ($category['cat_parent_id'] == $category['cat_id']) continue;
						$cat_list[$category['cat_id']] = $seo->getDirectory((int)$category['cat_id'], false, '/', false, false);
					}
					natcasesort($cat_list);
					foreach ($cat_list as $cat_id => $cat_name) {
						if (empty($cat_name)) continue;
						$data = array(
							'id'  => $cat_id,
							'name'  => $cat_name,
							'selected' => (isset($cats_selected) && in_array($cat_id, $cats_selected)) ? ' checked="checked"' : ''
						);
						$smarty_data['categories'][] = $data;
					}
					$GLOBALS['smarty']->assign('CATEGORIES', $smarty_data['categories']);
				}

				$banner_display_data = (isset($_POST['banner'])) ? $_POST['banner'] : (isset($banner[0])) ? $banner[0] : '';
				if (is_array($banner_display_data)) {
					foreach ($banner_display_data as $key => $value) {
						$banner_display_data[$key]	= htmlentities($value, ENT_COMPAT, 'UTF-8');
					}
					$GLOBALS['smarty']->assign('BANNER', $banner_display_data);
				}

				if (isset($bannerData['banner_image'])) {
					$GLOBALS['smarty']->assign('JSON_IMAGES', json_encode(array($bannerData['banner_image'])));
				}

				$GLOBALS['smarty']->assign('MODE_ADDEDIT', true);

			}

		} else {
			
			$GLOBALS['main']->addTabControl($this->_language_strings['admin_manage_tab'], 'bannerimages');
			$GLOBALS['main']->addTabControl($this->_language_strings['admin_manage_tab_add'], null, currentPage(null, array('action' => 'add')));

			$GLOBALS['gui']->addBreadcrumb($this->_language_strings['admin_manage_breadcrumb'], 'admin.php?_g=plugin&name=manage_banners_custom');
			
			if (($headerbannerimages = $GLOBALS['db']->select('CubeCart_sfws_banners_custom', false, array('banner_location' => 1), array('banner_order' => 'ASC'))) !== false) {
				$i = 1;
				foreach ($headerbannerimages as $headerbannerimage) {
					if (($image = $GLOBALS['db']->select('CubeCart_filemanager', 'file_id', array('file_id' => $headerbannerimage['banner_image'], 'disabled' => 0))) !== false) {
						$headerbannerimage['image_path'] = $GLOBALS['catalogue']->imagePath($image[0]['file_id'], 'large');
						$headerbannerimage['image_thumb'] = $GLOBALS['catalogue']->imagePath($image[0]['file_id'], 'small');
					}
					if(is_numeric($headerbannerimage['banner_manufacturer']) && $headerbannerimage['banner_manufacturer']){
						$headerbannerimage['banner_manufacturer_name'] = get_manufacturer_name($headerbannerimage['banner_manufacturer']);
					}
					$headerbannerimage['edit']		= currentPage(null, array('action' => 'edit', 'banner_id' => $headerbannerimage['banner_id']));
					$headerbannerimage['delete']	= currentPage(null, array('delete' => $headerbannerimage['banner_id']));
					$headerbannerimage_list[]		= $headerbannerimage;
					++$i;
				}
				$GLOBALS['smarty']->assign('HEADERBANNERIMAGES', $headerbannerimage_list);
			}
			$GLOBALS['smarty']->assign('LIST_HEADERBANNERIMAGES', true);

			if (($footerbannerimages = $GLOBALS['db']->select('CubeCart_sfws_banners_custom', false, array('banner_location' => 2), array('banner_order' => 'ASC'))) !== false) {
				$i = 1;
				foreach ($footerbannerimages as $footerbannerimage) {
					if (($image = $GLOBALS['db']->select('CubeCart_filemanager', 'file_id', array('file_id' => $footerbannerimage['banner_image'], 'disabled' => 0))) !== false) {
						$footerbannerimage['image_path'] = $GLOBALS['catalogue']->imagePath($image[0]['file_id'], 'large');
						$footerbannerimage['image_thumb'] = $GLOBALS['catalogue']->imagePath($image[0]['file_id'], 'small');
					}
					if(is_numeric($footerbannerimage['banner_manufacturer']) && $footerbannerimage['banner_manufacturer']){
						$footerbannerimage['banner_manufacturer_name'] = get_manufacturer_name($footerbannerimage['banner_manufacturer']);
					}
					$footerbannerimage['edit']		= currentPage(null, array('action' => 'edit', 'banner_id' => $footerbannerimage['banner_id']));
					$footerbannerimage['delete']	= currentPage(null, array('delete' => $footerbannerimage['banner_id']));
					$footerbannerimage_list[]		= $footerbannerimage;
					++$i;
				}
				$GLOBALS['smarty']->assign('FOOTERBANNERIMAGES', $footerbannerimage_list);
			}
			$GLOBALS['smarty']->assign('LIST_FOOTERBANNERIMAGES', true);

			if (($sideboxbannerimages = $GLOBALS['db']->select('CubeCart_sfws_banners_custom', false, array('banner_location' => 3), array('banner_order' => 'ASC'))) !== false) {
				$i = 1;
				foreach ($sideboxbannerimages as $sideboxbannerimage) {
					if (($image = $GLOBALS['db']->select('CubeCart_filemanager', 'file_id', array('file_id' => $sideboxbannerimage['banner_image'], 'disabled' => 0))) !== false) {
						$sideboxbannerimage['image_path'] = $GLOBALS['catalogue']->imagePath($image[0]['file_id'], 'large');
						$sideboxbannerimage['image_thumb'] = $GLOBALS['catalogue']->imagePath($image[0]['file_id'], 'small');
					}
					if(is_numeric($sideboxbannerimage['banner_manufacturer']) && $sideboxbannerimage['banner_manufacturer']){
						$sideboxbannerimage['banner_manufacturer_name'] = get_manufacturer_name($sideboxbannerimage['banner_manufacturer']);
					}
					$sideboxbannerimage['edit']		= currentPage(null, array('action' => 'edit', 'banner_id' => $sideboxbannerimage['banner_id']));
					$sideboxbannerimage['delete']	= currentPage(null, array('delete' => $sideboxbannerimage['banner_id']));
					$sideboxbannerimage_list[]		= $sideboxbannerimage;
					++$i;
				}
				$GLOBALS['smarty']->assign('SIDEBOXBANNERIMAGES', $sideboxbannerimage_list);
			}
			$GLOBALS['smarty']->assign('LIST_SIDEBOXBANNERIMAGES', true);

			if (($notassignedbannerimages = $GLOBALS['db']->select('CubeCart_sfws_banners_custom', false, array('banner_location' => 0), array('banner_order' => 'ASC'))) !== false) {
				$i = 1;
				foreach ($notassignedbannerimages as $notassignedbannerimage) {
					if (($image = $GLOBALS['db']->select('CubeCart_filemanager', 'file_id', array('file_id' => $notassignedbannerimage['banner_image'], 'disabled' => 0))) !== false) {
						$notassignedbannerimage['image_path'] = $GLOBALS['catalogue']->imagePath($image[0]['file_id'], 'large');
						$notassignedbannerimage['image_thumb'] = $GLOBALS['catalogue']->imagePath($image[0]['file_id'], 'small');
					}
					if(is_numeric($notassignedbannerimage['banner_manufacturer']) && $notassignedbannerimage['banner_manufacturer']){
						$notassignedbannerimage['banner_manufacturer_name'] = get_manufacturer_name($notassignedbannerimage['banner_manufacturer']);
					}
					$notassignedbannerimage['edit']		= currentPage(null, array('action' => 'edit', 'banner_id' => $notassignedbannerimage['banner_id']));
					$notassignedbannerimage['delete']	= currentPage(null, array('delete' => $notassignedbannerimage['banner_id']));
					$notassignedbannerimage_list[]		= $notassignedbannerimage;
					++$i;
				}
				$GLOBALS['smarty']->assign('NOTASSIGNEDBANNERIMAGES', $notassignedbannerimage_list);
			}
			$GLOBALS['smarty']->assign('LIST_NOTASSIGNEDBANNERIMAGES', true);

		}

		$html_out = $GLOBALS['smarty']->fetch('manage_banners_custom.php');
		
		$GLOBALS['gui']->changeTemplateDir();
		return $html_out;

	}

	public function display_banners_custom_header () {

		$get_module_status	= $GLOBALS['db']->select('CubeCart_modules', array('status'), array('folder' => 'SFWS_Banner_Manager_Custom'));
		$module_status = $get_module_status[0]['status'];

		$GLOBALS['gui']->changeTemplateDir('modules/plugins/SFWS_Banner_Manager_Custom/skin/');
		
		$GLOBALS['smarty']->assign('MODULE_CONFIG',$this->_module_config);
		$GLOBALS['smarty']->assign('MODULE_LANG',$this->_language_strings);

		if($module_status == 1 && $this->_module_config['sfws_header_banner_status'] == 1){

			if(isset($_GET['product_id']) && is_numeric($_GET['product_id'])){

				$get_manufacturer_id_header = get_manufacturer_id($_GET['product_id']);

				if(isset($get_manufacturer_id_header) && is_numeric($get_manufacturer_id_header)){

					$headerbannerimages = array();

					$getHeaderBannerImages = $GLOBALS['db']->select('CubeCart_sfws_banners_custom', false,  array('banner_status' => '1', 'banner_location' => '1', 'banner_manufacturer' => $get_manufacturer_id_header), array('banner_order' => 'ASC'));
					
					if($getHeaderBannerImages){

						$GLOBALS['smarty']->assign('SFWS_HEADER_BANNER_EFFECT', $this->_module_config['sfws_header_banner_effect']);
						$GLOBALS['smarty']->assign('SFWS_HEADER_BANNER_EFFECT_PAUSE', $this->_module_config['sfws_header_banner_effect_pause']);
						$GLOBALS['smarty']->assign('SFWS_HEADER_BANNER_EFFECT_SPEED', $this->_module_config['sfws_header_banner_effect_speed']);
						$GLOBALS['smarty']->assign('SFWS_HEADER_BANNER_EFFECT_TIMEOUT', $this->_module_config['sfws_header_banner_effect_timeout']);
						$GLOBALS['smarty']->assign('SFWS_HEADER_BANNER_WIDTH', $this->_module_config['sfws_header_banner_width']);
						$GLOBALS['smarty']->assign('SFWS_HEADER_BANNER_HEIGHT', $this->_module_config['sfws_header_banner_height']);
						$GLOBALS['smarty']->assign('SFWS_HEADER_BANNER_PADDING', $this->_module_config['sfws_header_banner_padding']);
						$GLOBALS['smarty']->assign('SFWS_HEADER_BANNER_BORDER_WIDTH', $this->_module_config['sfws_header_banner_border_width']);
						$GLOBALS['smarty']->assign('SFWS_HEADER_BANNER_BORDER_COLOR', $this->_module_config['sfws_header_banner_border_color']);
						$GLOBALS['smarty']->assign('SFWS_HEADER_BANNER_BACKGROUND_COLOR', $this->_module_config['sfws_header_banner_background_color']);

						foreach ($getHeaderBannerImages as $headerbannerimage) {
							$headerbannerimage['image']			= $GLOBALS['catalogue']->imagePath($headerbannerimage['banner_image'], 'sfws_banner_manager_custom_header');
							$headerbannerimage['image_width']	= $headerbannerimage['banner_image_width'];
							$headerbannerimage['image_height']	= $headerbannerimage['banner_image_height'];
							$headerbannerimage['name']			= $headerbannerimage['banner_name'];
							$headerbannerimage['url']			= $headerbannerimage['banner_url'];
							$headerbannerimage['url_target']	= $headerbannerimage['banner_url_target'];
							$headerbannerimages[] = $headerbannerimage;
						}

						$GLOBALS['smarty']->assign('HEADER_BANNER_IMAGES', $headerbannerimages);

					}

				}

			}

			if(isset($_GET['cat_id']) && is_numeric($_GET['cat_id'])){
				
				$cat_id_header = $_GET['cat_id'];
				$getHeaderBannerImagesQuery = "SELECT * FROM ".$GLOBALS['config']->get('config', 'dbprefix')."CubeCart_sfws_banners_custom WHERE FIND_IN_SET(".$cat_id_header.", banner_categories) > 0 AND banner_status = '1' AND banner_location = '1' ORDER BY banner_order ASC";
				$getHeaderBannerImages		= $GLOBALS['db']->query($getHeaderBannerImagesQuery);

				if($getHeaderBannerImages){

					$GLOBALS['smarty']->assign('SFWS_HEADER_BANNER_EFFECT', $this->_module_config['sfws_header_banner_effect']);
					$GLOBALS['smarty']->assign('SFWS_HEADER_BANNER_EFFECT_PAUSE', $this->_module_config['sfws_header_banner_effect_pause']);
					$GLOBALS['smarty']->assign('SFWS_HEADER_BANNER_EFFECT_SPEED', $this->_module_config['sfws_header_banner_effect_speed']);
					$GLOBALS['smarty']->assign('SFWS_HEADER_BANNER_EFFECT_TIMEOUT', $this->_module_config['sfws_header_banner_effect_timeout']);
					$GLOBALS['smarty']->assign('SFWS_HEADER_BANNER_WIDTH', $this->_module_config['sfws_header_banner_width']);
					$GLOBALS['smarty']->assign('SFWS_HEADER_BANNER_HEIGHT', $this->_module_config['sfws_header_banner_height']);
					$GLOBALS['smarty']->assign('SFWS_HEADER_BANNER_PADDING', $this->_module_config['sfws_header_banner_padding']);
					$GLOBALS['smarty']->assign('SFWS_HEADER_BANNER_BORDER_WIDTH', $this->_module_config['sfws_header_banner_border_width']);
					$GLOBALS['smarty']->assign('SFWS_HEADER_BANNER_BORDER_COLOR', $this->_module_config['sfws_header_banner_border_color']);
					$GLOBALS['smarty']->assign('SFWS_HEADER_BANNER_BACKGROUND_COLOR', $this->_module_config['sfws_header_banner_background_color']);

					foreach ($getHeaderBannerImages as $headerbannerimage) {
						$headerbannerimage['image']			= $GLOBALS['catalogue']->imagePath($headerbannerimage['banner_image'], 'sfws_banner_manager_custom_header');
						$headerbannerimage['image_width']	= $headerbannerimage['banner_image_width'];
						$headerbannerimage['image_height']	= $headerbannerimage['banner_image_height'];
						$headerbannerimage['name']			= $headerbannerimage['banner_name'];
						$headerbannerimage['url']			= $headerbannerimage['banner_url'];
						$headerbannerimage['url_target']	= $headerbannerimage['banner_url_target'];
						$headerbannerimages[] = $headerbannerimage;
					}

					$GLOBALS['smarty']->assign('HEADER_BANNER_IMAGES', $headerbannerimages);

				}

			}

		}

		$html_out = $GLOBALS['smarty']->fetch('display_banners_custom_header.php');
		
		$GLOBALS['gui']->changeTemplateDir();
		return $html_out;

	}

	public function display_banners_custom_side () {

		$get_module_status	= $GLOBALS['db']->select('CubeCart_modules', array('status'), array('folder' => 'SFWS_Banner_Manager_Custom'));
		$module_status = $get_module_status[0]['status'];

		$GLOBALS['gui']->changeTemplateDir('modules/plugins/SFWS_Banner_Manager_Custom/skin/');
		
		$GLOBALS['smarty']->assign('MODULE_CONFIG',$this->_module_config);
		$GLOBALS['smarty']->assign('MODULE_LANG',$this->_language_strings);

		if($module_status == 1 && $this->_module_config['sfws_side_banner_status'] == 1){

			if(isset($_GET['product_id']) && is_numeric($_GET['product_id'])){

				$get_manufacturer_id_side = get_manufacturer_id($_GET['product_id']);

				if(isset($get_manufacturer_id_side) && is_numeric($get_manufacturer_id_side)){

					$sidebannerimages = array();

					$getSideBannerImages = $GLOBALS['db']->select('CubeCart_sfws_banners_custom', false,  array('banner_status' => '1', 'banner_location' => '3', 'banner_manufacturer' => $get_manufacturer_id_side), array('banner_order' => 'ASC'));
					
					if($getSideBannerImages){

						$GLOBALS['smarty']->assign('SFWS_SIDE_BANNER_EFFECT', $this->_module_config['sfws_side_banner_effect']);
						$GLOBALS['smarty']->assign('SFWS_SIDE_BANNER_EFFECT_PAUSE', $this->_module_config['sfws_side_banner_effect_pause']);
						$GLOBALS['smarty']->assign('SFWS_SIDE_BANNER_EFFECT_SPEED', $this->_module_config['sfws_side_banner_effect_speed']);
						$GLOBALS['smarty']->assign('SFWS_SIDE_BANNER_EFFECT_TIMEOUT', $this->_module_config['sfws_side_banner_effect_timeout']);
						$GLOBALS['smarty']->assign('SFWS_SIDE_BANNER_WIDTH', $this->_module_config['sfws_side_banner_width']);
						$GLOBALS['smarty']->assign('SFWS_SIDE_BANNER_HEIGHT', $this->_module_config['sfws_side_banner_height']);
						$GLOBALS['smarty']->assign('SFWS_SIDE_BANNER_PADDING', $this->_module_config['sfws_side_banner_padding']);
						$GLOBALS['smarty']->assign('SFWS_SIDE_BANNER_BORDER_WIDTH', $this->_module_config['sfws_side_banner_border_width']);
						$GLOBALS['smarty']->assign('SFWS_SIDE_BANNER_BORDER_COLOR', $this->_module_config['sfws_side_banner_border_color']);
						$GLOBALS['smarty']->assign('SFWS_SIDE_BANNER_BACKGROUND_COLOR', $this->_module_config['sfws_side_banner_background_color']);

						foreach ($getSideBannerImages as $sidebannerimage) {
							$sidebannerimage['image']			= $GLOBALS['catalogue']->imagePath($sidebannerimage['banner_image'], 'sfws_banner_manager_custom_side');
							$sidebannerimage['image_width']		= $sidebannerimage['banner_image_width'];
							$sidebannerimage['image_height']	= $sidebannerimage['banner_image_height'];
							$sidebannerimage['name']			= $sidebannerimage['banner_name'];
							$sidebannerimage['url']				= $sidebannerimage['banner_url'];
							$sidebannerimage['url_target']		= $sidebannerimage['banner_url_target'];
							$sidebannerimages[] = $sidebannerimage;
						}

						$GLOBALS['smarty']->assign('SIDE_BANNER_IMAGES', $sidebannerimages);

					}

				}

			}

			if(isset($_GET['cat_id']) && is_numeric($_GET['cat_id'])){
				
				$cat_id_side = $_GET['cat_id'];
				$getSideBannerImagesQuery = "SELECT * FROM ".$GLOBALS['config']->get('config', 'dbprefix')."CubeCart_sfws_banners_custom WHERE FIND_IN_SET(".$cat_id_side.", banner_categories) > 0 AND banner_status = '1' AND banner_location = '3' ORDER BY banner_order ASC";
				$getSideBannerImages	  = $GLOBALS['db']->query($getSideBannerImagesQuery);

				if($getSideBannerImages){

					$GLOBALS['smarty']->assign('SFWS_SIDE_BANNER_EFFECT', $this->_module_config['sfws_side_banner_effect']);
					$GLOBALS['smarty']->assign('SFWS_SIDE_BANNER_EFFECT_PAUSE', $this->_module_config['sfws_side_banner_effect_pause']);
					$GLOBALS['smarty']->assign('SFWS_SIDE_BANNER_EFFECT_SPEED', $this->_module_config['sfws_side_banner_effect_speed']);
					$GLOBALS['smarty']->assign('SFWS_SIDE_BANNER_EFFECT_TIMEOUT', $this->_module_config['sfws_side_banner_effect_timeout']);
					$GLOBALS['smarty']->assign('SFWS_SIDE_BANNER_WIDTH', $this->_module_config['sfws_side_banner_width']);
					$GLOBALS['smarty']->assign('SFWS_SIDE_BANNER_HEIGHT', $this->_module_config['sfws_side_banner_height']);
					$GLOBALS['smarty']->assign('SFWS_SIDE_BANNER_PADDING', $this->_module_config['sfws_side_banner_padding']);
					$GLOBALS['smarty']->assign('SFWS_SIDE_BANNER_BORDER_WIDTH', $this->_module_config['sfws_side_banner_border_width']);
					$GLOBALS['smarty']->assign('SFWS_SIDE_BANNER_BORDER_COLOR', $this->_module_config['sfws_side_banner_border_color']);
					$GLOBALS['smarty']->assign('SFWS_SIDE_BANNER_BACKGROUND_COLOR', $this->_module_config['sfws_side_banner_background_color']);

					foreach ($getSideBannerImages as $sidebannerimage) {
						$sidebannerimage['image']			= $GLOBALS['catalogue']->imagePath($sidebannerimage['banner_image'], 'sfws_banner_manager_custom_side');
						$sidebannerimage['image_width']		= $sidebannerimage['banner_image_width'];
						$sidebannerimage['image_height']	= $sidebannerimage['banner_image_height'];
						$sidebannerimage['name']			= $sidebannerimage['banner_name'];
						$sidebannerimage['url']				= $sidebannerimage['banner_url'];
						$sidebannerimage['url_target']		= $sidebannerimage['banner_url_target'];
						$sidebannerimages[] = $sidebannerimage;
					}

					$GLOBALS['smarty']->assign('SIDE_BANNER_IMAGES', $sidebannerimages);

				}

			}

		}

		$html_out = $GLOBALS['smarty']->fetch('display_banners_custom_side.php');
		
		$GLOBALS['gui']->changeTemplateDir();
		return $html_out;

	}

	public function display_banners_custom_footer () {

		$get_module_status	= $GLOBALS['db']->select('CubeCart_modules', array('status'), array('folder' => 'SFWS_Banner_Manager_Custom'));
		$module_status = $get_module_status[0]['status'];

		$GLOBALS['gui']->changeTemplateDir('modules/plugins/SFWS_Banner_Manager_Custom/skin/');
		
		$GLOBALS['smarty']->assign('MODULE_CONFIG',$this->_module_config);
		$GLOBALS['smarty']->assign('MODULE_LANG',$this->_language_strings);

		if($module_status == 1 && $this->_module_config['sfws_footer_banner_status'] == 1){

			$footerbannerimages = array();

			$getFooterBannerImages = $GLOBALS['db']->select('CubeCart_sfws_banners_custom', false,  array('banner_status' => '1', 'banner_location' => '2'), array('banner_order' => 'ASC'));
			
			if($getFooterBannerImages){

				$GLOBALS['smarty']->assign('SFWS_FOOTER_BANNER_EFFECT', $this->_module_config['sfws_footer_banner_effect']);
				$GLOBALS['smarty']->assign('SFWS_FOOTER_BANNER_EFFECT_PAUSE', $this->_module_config['sfws_footer_banner_effect_pause']);
				$GLOBALS['smarty']->assign('SFWS_FOOTER_BANNER_EFFECT_SPEED', $this->_module_config['sfws_footer_banner_effect_speed']);
				$GLOBALS['smarty']->assign('SFWS_FOOTER_BANNER_EFFECT_TIMEOUT', $this->_module_config['sfws_footer_banner_effect_timeout']);
				$GLOBALS['smarty']->assign('SFWS_FOOTER_BANNER_WIDTH', $this->_module_config['sfws_footer_banner_width']);
				$GLOBALS['smarty']->assign('SFWS_FOOTER_BANNER_HEIGHT', $this->_module_config['sfws_footer_banner_height']);
				$GLOBALS['smarty']->assign('SFWS_FOOTER_BANNER_PADDING', $this->_module_config['sfws_footer_banner_padding']);
				$GLOBALS['smarty']->assign('SFWS_FOOTER_BANNER_BORDER_WIDTH', $this->_module_config['sfws_footer_banner_border_width']);
				$GLOBALS['smarty']->assign('SFWS_FOOTER_BANNER_BORDER_COLOR', $this->_module_config['sfws_footer_banner_border_color']);
				$GLOBALS['smarty']->assign('SFWS_FOOTER_BANNER_BACKGROUND_COLOR', $this->_module_config['sfws_footer_banner_background_color']);

				foreach ($getFooterBannerImages as $footerbannerimage) {
					$footerbannerimage['image']			= $GLOBALS['catalogue']->imagePath($footerbannerimage['banner_image'], 'sfws_banner_manager_custom_footer');
					$footerbannerimage['image_width']	= $footerbannerimage['banner_image_width'];
					$footerbannerimage['image_height']	= $footerbannerimage['banner_image_height'];
					$footerbannerimage['name']			= $footerbannerimage['banner_name'];
					$footerbannerimage['url']			= $footerbannerimage['banner_url'];
					$footerbannerimage['url_target']	= $footerbannerimage['banner_url_target'];
					$footerbannerimages[] = $footerbannerimage;
				}

				$GLOBALS['smarty']->assign('FOOTER_BANNER_IMAGES', $footerbannerimages);

			}

		}

		$html_out = $GLOBALS['smarty']->fetch('display_banners_custom_footer.php');
		
		$GLOBALS['gui']->changeTemplateDir();
		return $html_out;

	}

}

function get_manufacturer_name($manufacturer) {
	if(is_numeric($manufacturer) && $manufacturer > 0){
		if (($get_manufacturer_name = $GLOBALS['db']->select('CubeCart_manufacturers', array('name'), array('id' => $manufacturer))) !== false) {
			return $get_manufacturer_name[0]['name'];
		}
	}
}

function get_manufacturer_id($product_id) {
	if(is_numeric($product_id) && $product_id > 0){
		$get_manufacturer_id_query = 'SELECT M.id FROM `'.$GLOBALS['config']->get('config', 'dbprefix').'CubeCart_inventory` AS I INNER JOIN `'.$GLOBALS['config']->get('config', 'dbprefix').'CubeCart_manufacturers` AS M ON M.id = I.manufacturer WHERE I.product_id = '.$product_id.' AND I.manufacturer IS NOT NULL AND I.manufacturer > 0';
		$get_manufacturer_id = $GLOBALS['db']->query($get_manufacturer_id_query);
		$manufacturer_id = $get_manufacturer_id[0]['id'];
		if(is_numeric($manufacturer_id) && $manufacturer_id > 0){
			return $manufacturer_id;
		}
	}
}
?>