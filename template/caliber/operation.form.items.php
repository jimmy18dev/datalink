<div class="operation-items">
	<div class="col1"><?php echo $total_items+1;?>. <?php echo $var['operation_name'];?></div>
	<div class="col2"><input type="number" class="input-text" name="total_good[]" placeholder="0" value="<?php echo $var['total_good'];?>"></div>
	<div class="col3"><input type="number" class="input-text" name="total_reject[]" placeholder="0" value="<?php echo $var['total_reject'];?>"></div>
	<div class="col4"><input type="number" class="input-text" class="input-text" name="output[]" placeholder="0" value="<?php echo $var['output'];?>"></div>

	<div class="col5"><select name="remark_id[]" class="input-text input-select"><?php echo $remark_option;?></select></div>

	<input type="hidden" name="operation_id[]" placeholder="operation id" value="<?php echo $var['operation_id'];?>">
	<input type="hidden" name="caliber_id[]" placeholder="Caliber" value="<?php echo $var['caliber_id'];?>">
	<input type="hidden" name="route_id[]" placeholder="Route" value="<?php echo $var['route_id'];?>">
	<input type="hidden" name="stdtime_id[]" placeholder="Std Time ID" value="<?php echo $var['stdtime_id'];?>">
	<input type="hidden" name="stdtime_hrs[]" placeholder="std.time" value="<?php echo $var['stdtime_hrs'];?>">
	<!-- echo detail id for edit -->
	<input type="hidden" name="detail_id[]" placeholder="Detail ID" value="<?php echo $var['detail_id'];?>">
</div>