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
<div id="box-documents">
   <h3>{$LANG.common.information}</h3>
   <nav>
      <ul class="small-block-grid-1 medium-block-grid-3 large-block-grid-3">
         {if isset($DOCUMENTS) && count($DOCUMENTS) > 0}
         {foreach from=$DOCUMENTS item=document}
         <li><a href="{$document.doc_url}" title="{$document.doc_name}" {if $document.doc_url_openin}target="_blank"{/if}>{$document.doc_name}</a></li>
         {/foreach}
         {/if}
         {if isset($CONTACT_URL)}
         <li><a href="{$CONTACT_URL}" title="{$LANG.documents.document_contact}">{$LANG.documents.document_contact}</a></li>
         {/if}
      </ul>
   </nav>
</div>