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
   {if isset($LANGUAGES)}
   <div id="lang_list" class="tab_content">
      <h3>{$LANG.translate.title_languages}</h3>
      <table>
         <thead>
         <tr>
            <th>{$LANG.common.status}</th>
            <th colspan="2">{$LANG.common.language}</th>
            <th>{$LANG.form.action}</th>
         </tr>
         </thead>
         <tbody>
         <tr>
            <td></td>
            <td><img src="language/flags/globe.png" alt="{$LANG.translate.master_language}"></td>
            <td>{$LANG.translate.master_language}</td>
            <td class="actions"><a href="?_g=settings&node=language&download=definitions" title="{$LANG.common.download}"><i class="fa fa-download" title="{$LANG.common.download}"></i></a></td>
         </tr>
         {foreach from=$LANGUAGES item=language}
         <tr>
            <td align="center"><input type="hidden" name="status[{$language.code}]" id="status_{$language.code}" value="{$language.status}" class="toggle"></td>
            <td><img src="{$language.flag}" alt="{$language.title}"></td>
            <td><a href="{$language.edit}">{$language.title}</a></td>
            <td class="actions">
               <a href="{$language.download}" title="{$LANG.common.download}"><i class="fa fa-download" title="{$LANG.common.download}"></i></a>
               <a href="{$language.edit}" title="{$LANG.common.edit}"><i class="fa fa-pencil-square-o" title="{$LANG.common.edit}"></i></a>
               <a href="{$language.delete}" class="delete" title="{$LANG.notification.confirm_delete}"><i class="fa fa-trash" title="{$LANG.common.delete}"></i></a>
            </td>
         </tr>
         {/foreach}
         </tbody>
         </table>
   </div>
   <div id="lang_create" class="tab_content">
      <h3>{$LANG.translate.title_language_create}</h3>
      <p><strong>{$LANG.common.advanced}</strong>: {$LANG.common.help_required}</p>
      <fieldset>
         <div><label for="create_title">{$LANG.translate.language_name}</label><span><input id="create_title" type="text" name="create[title]" class="textbox required"></span></div>
         <div><label for="create_code">{$LANG.translate.language_code}</label><span><input id="create_code" type="text" name="create[code]" class="textbox required"></span></div>
         <div>
            <label for="create_parent">{$LANG.translate.language_parent}</label>
            <span>
               <select id="create_parent" name="create[parent]">
                  <option value="">{$LANG.form.none}</option>
                  {foreach from=$LANGUAGES item=language}
                  <option value="{$language.code}">{$language.title}</option>
                  {/foreach}
               </select>
            </span>
         </div>
      </fieldset>
   </div>
   <div id="lang_import" class="tab_content">
      <h3>{$LANG.translate.title_language_import}</h3>
      <p><strong>{$LANG.common.advanced}</strong>: {$LANG.common.help_required}</p>
      <fieldset>
         <div><label for="import_overwrite">{$LANG.filemanager.overwrite}</label><span><input id="import_overwrite" type="checkbox" name="import[overwrite]"></span></div>
         <div><label for="import_file">{$LANG.filemanager.file_upload}</label><span><input id="import_file" type="file" name="import[file]" class="textbox"> {$LANG.translate.example_upload}</span></div>
      </fieldset>
   </div>
   {include file='templates/element.hook_form_content.php'}
   <div class="form_control">
      <input type="hidden" name="previous-tab" id="previous-tab" value="">
      <input type="submit" name="save" value="{$LANG.common.save}">
   </div>
   {elseif !$DISPLAY_EDITOR}
   <div id="lang_list" class="tab_content">
   <h3>{$LANG.translate.title_languages}</h3>
   <p>{$LANG.translate.error_no_languages}</p>
   </div>
   {/if}
   {if $DISPLAY_EDITOR}
   <div class="tab_content" id="general">
      <h3>{$LANG.translate.tab_string_edit}</h3>
      {if $SECTIONS}
      <fieldset>
         <legend>{$LANG.translate.language_group_edit}</legend>
         <div>
            <select name="type" class="textbox update_form required">
               <option value="">{$LANG.form.please_select}</option>
               {foreach from=$SECTIONS item=section}
               <option value="{$section.name}" {$section.selected}>{$section.description}</option>
               {/foreach}
               <optgroup label="{$LANG.navigation.nav_modules}">
                  {foreach from=$MODULES item=module}
                  <option value="{$module.path}" {$module.selected}>{$module.name}</option>
                  {/foreach}
               </optgroup>
            </select>
         </div>
      </fieldset>
      {/if}
      {if isset($STRINGS)}
      <fieldset>
         <legend>{$STRING_TYPE}</legend>
         <table class="phrases">
            {foreach from=$STRINGS item=string}
            <tr id="row_{$string.name}">
               <td>
                  <label for="string_{$string.name}">{$string.name}</label>
                  <input type="hidden" id="defined_{$string.name}" value="{$string.defined}">
                  {if $string.multiline}
                  <textarea id="string_{$string.name}" name="string[{$string.type}][{$string.name}]" class="textbox editable_phrase" rel="{$string.name}">{$string.value}</textarea>
                  {else}
                  <input type="text" id="string_{$string.name}" name="string[{$string.type}][{$string.name}]" value="{$string.value}" class="textbox editable_phrase" rel="{$string.name}">
                  {/if}
               </td>
               <td class="actions">
                  <input type="hidden" id="default_{$string.name}" value="{$string.default}">
                  <a href="#" class="revert" id="revert_{$string.name}" rel="{$string.name}" title="{$LANG.common.revert}"><i class="fa fa-clock-o"></i></a>
               </td>
            </tr>
            {/foreach}
         </table>
      </fieldset>
      {/if}
      <div>
         <input type="hidden" name="previous-tab" id="previous-tab" value="">
         <input type="submit" name="save" value="{$LANG.common.save}">
      </div>
   </div>
   {/if}
   {if isset($DISPLAY_EXPORT)}
   <div class="tab_content" id="merge">
      <h3>{$LANG.translate.merge_db_file}</h3>
      <p><strong>{$LANG.common.advanced}</strong>: {$LANG.common.help_required}</p>
      <fieldset>
         <legend>{$LANG.catalogue.title_import_options}</legend>
         <div><input type="checkbox" name="export_opt[replace]" value="1"> {$LANG.translate.replace_original}</div>
         {if $COMPRESSION}
         <div><input type="checkbox" name="export_opt[compress]" value="1"> {$LANG.common.compress_file}</div>
         {/if}
      </fieldset>
   </div>
   {include file='templates/element.hook_form_content.php'}
   <div class="form_control">
      <input type="submit" name="export" value="{$LANG.common.export}">
   </div>
   {/if}
   <input type="hidden" name="token" value="{$SESSION_TOKEN}">
</form>