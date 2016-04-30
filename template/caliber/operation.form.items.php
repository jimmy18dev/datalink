<div class="operation-items">
	<div class="col1"><?php echo $var['operation_name'];?></div>
	<div class="col2"><input type="text" class="input-text" name="total_good[]" placeholder="Total Good" value="<?php echo $var['total_good'];?>"></div>
	<div class="col3"><input type="text" name="total_reject[]" placeholder="Total Reject" value="<?php echo $var['total_reject'];?>"></div>
	<div class="col7"><input type="text" class="input-text" name="output[]" placeholder="Output" value="<?php echo $var['output'];?>"></div>
	<div class="col8"><input type="text" class="input-text" name="required_hrs[]" placeholder="Required Hrs" value="<?php echo $var['required_hrs'];?>"></div>
	<div class="col9"><input type="text" class="input-text" name="remark_message[]" placeholder="Remark messages" value="<?php echo $var['remark_message'];?>"></div>
	<div class="col10"><select name="remark_id[]" class="input-text input-select"><?php echo $remark_option;?></select></div>

	<input type="text" name="operation_id[]" placeholder="Pperation id" value="<?php echo $var['operation_id'];?>">

	<input type="text" name="caliber_id[]" placeholder="Caliber" value="<?php echo $var['caliber_id'];?>">
	<input type="text" name="route_id[]" placeholder="Route" value="<?php echo $var['route_id'];?>">
	<input type="text" name="stdtime_id[]" placeholder="Std Time ID" value="<?php echo $var['stdtime_id'];?>">

	<!-- echo detail id for edit -->
	<input type="text" name="detail_id[]" placeholder="Detail ID" value="<?php echo $var['detail_id'];?>">
</div>
<p>...</p>
<p>...</p>