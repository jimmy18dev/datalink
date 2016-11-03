<div class="operation-items">
	<div class="col1"><strong><?php echo $total_items+1;?>. <?php echo $var['operation_name'];?></strong></div>

	<div class="col4">
		<input type="number" id="input-<?php echo $var['operation_id'];?>" onblur="javascript:calOperation(<?php echo $var['operation_id'];?>);" class="input-text" name="input[]" placeholder="0" value="<?php echo ($var['total_good']+$var['total_reject'] > 0?$var['total_good']+$var['total_reject']:'');?>" autocomplete="off">
	</div>
	<div class="col2">
		<input type="number" id="good-<?php echo $var['operation_id'];?>" onblur="javascript:calOperation(<?php echo $var['operation_id'];?>);" class="input-text" name="total_good[]" placeholder="0" value="<?php echo ($var['total_good']> 0?$var['total_good']:'');?>" autocomplete="off">
	</div>
	<div class="col3">
		<input type="number" id="reject-<?php echo $var['operation_id'];?>" disabled class="input-text <?php echo ($var['total_reject']>0?'-red':'');?>" name="total_reject[]" placeholder="0" value="<?php echo ($var['total_reject']>0?$var['total_reject']:'');?>" autocomplete="off">
	</div>

	<div class="col5" title="One-Touch for select a remark..."><select name="remark_id[]" class="input-text input-select"><?php echo $remark_option;?></select></div>
	<input type="hidden" name="operation_id[]" placeholder="operation id" value="<?php echo $var['operation_id'];?>">
</div>