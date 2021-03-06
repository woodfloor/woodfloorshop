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
?>
<form action="{$VAL_SELF}" method="post" enctype="multipart/form-data">
   <div id="cc_page_codes" class="tab_content">
      <h3>Quick find page codes</h3>
      <fieldset>
         <legend>{$LANG.module.config_settings}</legend>
         <div><label for="paypal_status">{$LANG.common.status}</label><span><input type="hidden" name="module[status]" id="paypal_status" class="toggle" value="{$MODULE.status}" /></span></div>
      </fieldset>
   </div>
   {$MODULE_ZONES}
   <div class="form_control">
      <input type="submit" value="{$LANG.common.save}" />
   </div>
   <input type="hidden" name="token" value="{$SESSION_TOKEN}" />
</form>