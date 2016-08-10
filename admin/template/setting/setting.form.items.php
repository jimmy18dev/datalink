<div class="setting-form-items">
	<div class="detail"><?php echo $var['description'];?></div>
	<div class="input">
		<input type="text" class="input-text" id="value-<?php echo $var['id'];?>" value="<?php echo $var['value'];?>">
		<button class="save-btn" onclick="javascript:updateSetting(<?php echo $var['id'];?>);">Save</button>
	</div>
</div>