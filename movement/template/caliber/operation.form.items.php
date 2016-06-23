<div class="operation-items">
	<div class="col1"><strong><?php echo $total_items+1;?>. <?php echo $var['operation_name'];?></strong></div>
	<div class="col2"><input type="number" class="input-text" name="total_good[]" placeholder="0" value="<?php echo $var['total_good'];?>" autocomplete="off"></div>
	<div class="col3"><input type="number" class="input-text" name="total_reject[]" placeholder="0" value="<?php echo $var['total_reject'];?>" autocomplete="off"></div>
	<div class="col4"><input type="number" class="input-text" class="input-text" name="output[]" placeholder="0" value="<?php echo $var['output'];?>" autocomplete="off"></div>

	<div class="col5" title="One-Touch for select a remark..."><select name="remark_id[]" class="input-text input-select"><?php echo $remark_option;?></select></div>
	<input type="hidden" name="operation_id[]" placeholder="operation id" value="<?php echo $var['operation_id'];?>">
</div>