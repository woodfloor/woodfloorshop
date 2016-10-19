{*
 * CubeCart v6
 * ========================================
 * CubeCart is a registered trade mark of CubeCart Limited
 * Copyright CubeCart Limited 2015. All rights reserved.
 * UK Private Limited Company No. 5323904
 * ========================================
 * Web:   http://www.cubecart.com
 * Email:  sales@cubecart.com
 * License:  GPL-3.0 https://www.gnu.org/licenses/quick-guide-gplv3.html
 *}
<form action="{$VAL_SELF}" method="post">
   <h2>{$LANG.account.recover_password}</h2>
   <p>{$LANG.account.enter_validation_key}</p>
   <fieldset>
      <div><label for="recover-email">{$LANG.common.email}</label><span><input type="text" name="email" id="recover-email" value="{$DATA.email}" class="required"> *</span></div>
      <div><label for="recover-validate">{$LANG.account.validation_key}</label><span><input type="text" name="validate" id="recover-validate" value="{$DATA.validate}" class="required"> *</span></div>
      <div><label for="recover-password">{$LANG.account.new_password}</label><span><input type="password" autocomplete="off" name="password[password]" id="recover-password" class="required"> *</span></div>
      <div><label for="recover-passconf">{$LANG.account.new_password_confirm}</label><span><input type="password" autocomplete="off" name="password[passconf]" id="recover-passconf" class="required"> *</span></div>
   </fieldset>
   <div><input type="submit" value="{$LANG.form.submit}" class="button_submit"></div>
</form>