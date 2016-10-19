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
<form action="{$VAL_SELF}" method="post" enctype="multipart/form-data">
   <div id="general" class="tab_content">
      <h3>{$LANG.navigation.nav_subscribers}</h3>
      <fieldset>
         <legend>{$LANG.common.filter}</legend>
         <label class="narrow">{$LANG.statistics.search_term}</label>
         <input type="text" name="email_filter" value="{$EMAIL_FILTER}">
         <input type="submit" name="submit" class="tiny" value="{$LANG.common.go}">
      </fieldset>
      {if $SUBSCRIBERS}
      <table>
         <thead>
            <th></th>
            <th>{$LANG.common.email}</th>
            <th></th>
         </thead>
         <tbody>
            {foreach from=$SUBSCRIBERS item=subscriber}
            <tr>
               <td><input type="checkbox" name="rem_subscriber[{$subscriber.subscriber_id}]" value="1" class="subscribers"></td>
               <td>{$subscriber.email}</td>
               <td align="center"><a href="?_g=customers&node=subscribers&delete={$subscriber.subscriber_id}" class="delete" title="{$LANG.notification.confirm_delete}"><i class="fa fa-trash" title="{$LANG.common.delete}"></i></a></td>
            </tr>
            {/foreach}
         </tbody>
         <tfooter>
            <tr>
               <td><img src="{$SKIN_VARS.admin_folder}/skins/{$SKIN_VARS.skin_folder}/images/select_all.gif" alt=""></td>
               <td>
                  <a href="#" class="check-all" rel="subscribers">{$LANG.form.check_uncheck}</a>
                  <select name="multi_subscriber_action">
                     <option value="">{$LANG.form.with_selected}</option>
                     <option value="delete">{$LANG.common.remove}</option>
                  </select>
                  <input type="submit" value="{$LANG.common.go}" name="go" class="tiny">
               </td>
            </tr>
         </tfooter>
      </table>
      <p>{$PAGINATION}</p>
      {else}
      <div>{$LANG.form.none}</div>
      {/if}
      
   </div>
   <div id="import" class="tab_content">
   <h3>{$LANG.newsletter.import_subscribers}</h3>
   <fieldset>
         <legend>{$LANG.newsletter.import_subscribers}</legend>
         <div><label for="emails">{$LANG.newsletter.email_list}</label><br><textarea name="subscribers" class="textbox" placeholder="{$LANG.newsletter.email_list_placeholder}"></textarea></div>
      </fieldset>
   </div>
   <div class="form_control">
      <input type="hidden" name="newsletter[newsletter_id]" value="{$NEWSLETTER.newsletter_id}">
      <input type="hidden" name="previous-tab" id="previous-tab" value="">
      <input type="submit" value="{$LANG.common.save}">
   </div>
   <input type="hidden" name="token" value="{$SESSION_TOKEN}">
</form>