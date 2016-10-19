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
?>
<div id="pack_calc" class="tab_content">
   <h3>Pack Calculator</h3>
   <fieldset>
   <div><label for="">Enable Calculator</label><span><input type="hidden" name="calc_status" id="calc_status" value="{$PRODUCT.calc_status}" class="toggle"></span></div>
   <div><label for="name">m<sup>2</sup> Per Pack</label><span><input name="calc_packm2" id="calc_packm2" class="textbox" type="text" value="{$PRODUCT.calc_packm2}"></span></div>
   </fieldset>
</div>