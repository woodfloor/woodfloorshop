<div id="refine_search"  class="tab_content">
  <form action="{$VAL_SELF}" method="post" enctype="multipart/form-data">
    <h3>{$LANG.refine_search.module_title}</h3>
    <fieldset>
      <legend>{$LANG.module.config_settings}</legend>
      <div>
        <label for="status">{$LANG.common.status}</label>
        <span>
        <select name="module[status]" id="status" class="textbox">
          <option value="0" {$SELECT_status_0}>{$LANG.common.disabled}</option>
          <option value="1" {$SELECT_status_1}>{$LANG.common.enabled}</option>
        </select>
        </span>
      </div>
      <div>
        <label for="price_filters">{$LANG.refine_search.show_price_filters}</label>
        <span>
        <select name="module[price_filters]" id="price_filters" class="textbox">
          <option value="0" {if $MODULE.price_filters == 0} selected="selected"{/if}>{$LANG.common.disabled}</option>
          <option value="1" {if $MODULE.price_filters == 1} selected="selected"{/if}>{$LANG.common.enabled}</option>
        </select>
        </span> 
      </div>
      <div>
        <label for="options_filters">{$LANG.refine_search.category_filters}</label>
        <span>
        <select name="module[category_option]" id="category_option" class="textbox">
          <option value="0" {if $MODULE.category_option == 0} selected="selected"{/if}>{$LANG.common.disabled}</option>
          <option value="1" {if $MODULE.category_option == 1} selected="selected"{/if}>{$LANG.common.enabled}</option>
        </select>
        </span> 
      </div>
      <div>
        <label for="price_inetrval">{$LANG.refine_search.price_inetrval}</label>
        <span>
        <input name="module[price_inetrval]" id="price_inetrval" type="text" class="textbox" value="{$MODULE.price_inetrval}" />
        </span> 
      </div>
    </fieldset>
    {$MODULE_ZONES}
    <div class="form_control">
      <input type="submit" value="{$LANG.common.save}" />
    </div>
    <input type="hidden" name="token" value="{$SESSION_TOKEN}" />
  </form>
  {if $MODULE.status}
  <h3>{$LANG.refine_search.module_guide}</h3>
  <p> {$LANG.refine_search.txt_display_Link}</p>
  <p> {$LANG.refine_search.txt_display_info}</p>
  <p><img src="modules/plugins/refine_search/images/code.jpg" alt="" /></p>
  {/if} 
</div>
