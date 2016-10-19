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
{if $COOKIE_DIALOGUE}
<div class="row" id="eu_cookie_dialogue">
   <form action="{$VAL_SELF}" class="marg" method="POST">
      <div class="small-10 columns">
         {$LANG.notification.cookie_dialogue|replace:'%s':{$CONFIG.store_name}}
      </div>
      <div class="small-2 columns">
         <input type="submit" class="button tiny secondary right" name="accept_cookies_submit" id="eu_cookie_button" value="{$LANG.common.close}">
         <input type="hidden" name="accept_cookies" value="1">
      </div>
   </form>
</div>
{/if}