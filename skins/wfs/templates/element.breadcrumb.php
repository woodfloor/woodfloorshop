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
<div id="element-breadcrumbs">
   {if $CRUMBS}
   <ul class="breadcrumbs">
      <li><a href="{$STORE_URL}"><span class="show-for-small-only"><i class="fa fa-home"></i></span><span class="show-for-medium-up">{$LANG.common.home}</a></span></li>
      {foreach from=$CRUMBS item=crumb}
      <li><a href="{$crumb.url}">{$crumb.title}</a></li>
      {/foreach}
      {if $WFPID}
      <li class="right"><span>{$WFPID}</span></li>
      {/if}
   </ul>
   {else}
   <ul class="breadcrumbs">
      <li><a href="{$STORE_URL}"><span class="show-for-small-only"><i class="fa fa-home"></i></span><span class="show-for-medium-up">{$LANG.common.home}</a></span></li>
      <li class="right"><span>WFH1</span></li>
   </ul>
   {/if}
</div>