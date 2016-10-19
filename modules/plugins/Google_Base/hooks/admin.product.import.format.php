<?php
/**
 * CubeCart v6
 * ========================================
 * CubeCart is a registered trade mark of CubeCart Limited
 * Copyright CubeCart Limited 2014. All rights reserved.
 * UK Private Limited Company No. 5323904
 * ========================================
 * Web:   http://www.cubecart.com
 * Email:  sales@devellion.com
 * License:  GPL-2.0 http://opensource.org/licenses/GPL-2.0
 */
if($_GET['format'] == 'googlebase') {
	$header_fields = array('id', 'product_type', 'google_product_category', 'link', 'title', 'description', 'image_link', 'price', 'condition', 'shipping_weight', 'upc', 'ean', 'jan', 'isbn', 'availability', 'brand', 'gtin', 'mpn', 'identifier_exists');
	$fields  = array('product_id', 'store_category', 'google_category', 'url', 'name', 'description', 'image', 'price', 'condition', 'product_weight', 'upc', 'ean', 'jan', 'isbn', 'availability', 'manufacturer', 'gtin', 'mpn', 'identifier_exists');
	$delimiter = "\t";
	$extension = 'txt';
	$glue  = "\r\n";
	$field_wrapper = '"';
	$field_keys_to_wrap = array('description');
	$image_path = 'url';
	$image_mode = 'medium';
}
?>