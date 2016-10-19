<form action="{$VAL_SELF}" method="post" enctype="multipart/form-data">
  <div id="e_Payments_Interac" class="tab_content">
	<h3>{$TITLE}</h3>
	<fieldset><legend>{$LANG.module.config_settings}</legend>
	  <div><label for="status">{$LANG.common.status}</label><span><input type="hidden" name="module[status]" id="status" class="toggle" value="{$MODULE.status}" /></span></div>
	  <div><label for="position">{$LANG.module.position}</label><span><input type="text" name="module[position]" id="position" class="textbox number" value="{$MODULE.position}" /></span></div>
	  <div>
				<label for="scope">{$LANG.module.scope}</label>
				<span>
					<select name="module[scope]">
      						<option value="both" {$SELECT_scope_both}>{$LANG.module.both}</option>
      						<option value="main" {$SELECT_scope_main}>{$LANG.module.main}</option>
      						<option value="mobile" {$SELECT_scope_mobile}>{$LANG.module.mobile}</option>
    					</select>
				</span>
			</div>
	  <div><label for="default">{$LANG.common.default}</label><span><input type="hidden" name="module[default]" id="default" class="toggle" value="{$MODULE.default}" /></span></div>
	  <div><label for="description">{$LANG.common.description} *</label><span><input name="module[desc]" id="description" class="textbox" type="text" value="{$MODULE.desc}" /></span></div>
    </fieldset>

	<fieldset><legend>{$LANG.e_Payments_Interac.title_bank_transfer}</legend>
	  <div><label for="bank">{$LANG.e_Payments_Interac.bank_allow}</label><span><input type="hidden" name="module[bank]" id="bank" class="toggle" value="{$MODULE.bank}" /></span></div>
	  <div><label for="bankName">{$LANG.e_Payments_Interac.bank_name}</label><span><input name="module[bankName]" id="bankName" class="textbox" type="text" value="{$MODULE.bankName}" /></span></div>
	  <div><label for="accName">{$LANG.e_Payments_Interac.bank_account_name}</label><span><input type="text" name="module[accName]" value="{$MODULE.accName}" class="textbox" size="30" /></span></div>
	  <div><label for="address">{$LANG.e_Payments_Interac.address}</label><span><input type="text" name="module[addressCode]" value="{$MODULE.addressCode}" class="textbox" size="30" /></span></div>	  
      <div><label for="secretCode">{$LANG.e_Payments_Interac.bank_secret}</label><span><input type="text" name="module[secretCode]" value="{$MODULE.secretCode}" class="textbox" size="30" /></span></div>
	  <div><label for="answerCode">{$LANG.e_Payments_Interac.bank_answer}</label><span><input type="text" name="module[answerCode]" value="{$MODULE.answerCode}" class="textbox" size="30" /></span></div>
	</fieldset>

  <div class="form_control"><input type="submit" name="save" value="{$LANG.common.save}" /></div>
  <input type="hidden" name="token" value="{$SESSION_TOKEN}" />
</form>