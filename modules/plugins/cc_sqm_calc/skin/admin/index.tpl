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
   <div id="cc_sqm_calc" class="tab_content">
      <h3>Pack Calculator</h3>
      <fieldset>
         <legend>{$LANG.module.config_settings}</legend>
         <div><label for="cc_sqm_calc_status">{$LANG.common.status}</label><span><input type="hidden" name="module[status]" id="cc_sqm_calc_status" class="toggle" value="{$MODULE.status}" /></span></div>
         <div><label for="cc_sqm_calc_doc_id">How to measure (Document ID)</label><span><input type="text" name="module[doc_id]" id="cc_sqm_calc_doc_id" value="{$MODULE.doc_id}" /></span></div>
         <div><label for="cc_sqm_calc_doc_id_underlay">Free Underlay (Document ID)</label><span><input type="text" name="module[doc_id_underlay]" id="cc_sqm_calc_doc_id_underlay" value="{$MODULE.doc_id_underlay}" /></span></div>
         <div><label for="free_underlay_area">Threshold for free underlay (m<sup>2</sup>)</label><span><input type="text" name="module[free_underlay_area]" id="free_underlay_area" value="{$MODULE.free_underlay_area}" /></span></div>
         <div><label for="free_underlay_group">Free Underlay Option Group ID</label><span><input type="text" name="module[free_underlay_group]" id="free_underlay_group" value="{$MODULE.free_underlay_group}" /></span></div>
      </fieldset>
   </div>
   {$MODULE_ZONES}
   <div class="form_control">
      <input type="submit" value="{$LANG.common.save}" />
   </div>
   <input type="hidden" name="token" value="{$SESSION_TOKEN}" />
</form>