<div class="operation-items">
	<?php echo $var['name'];?><br>
	<input type="text" name="total_good[]" placeholder="Total Good">
	<input type="text" name="total_reject[]" placeholder="Total Reject">
	
	<input type="text" name="product_eff[]" placeholder="product eff">
	<input type="text" name="ttl_eff[]" placeholder="ttl eff">
	<input type="text" name="std_time[]" placeholder="Std. Time">
	<input type="text" name="output[]" placeholder="Output">
	<input type="text" name="required_hrs[]" placeholder="Required Hrs">

	<input type="text" name="remark_message[]" placeholder="Remark messages">
	<select name="remark_id[]">
		<?php echo $remark_option;?>
	</select>

	<input type="hidden" name="operation_id[]" value="<?php echo $var['id'];?>">

	<!-- <input type="text" name="header_id[]" placeholder="Header" value="1"> -->
	<input type="text" name="caliber_id[]" placeholder="Caliber" value="<?php echo $var['caliber_id'];?>">
	<input type="text" name="route_id[]" placeholder="Route" value="<?php echo $var['route_id'];?>">
</div>
<br>