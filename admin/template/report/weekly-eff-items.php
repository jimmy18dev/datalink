<div class="weekly-eff-items weekly-eff-items-<?php echo $var['caliber_status'];?>">
	<div class="col1"><span class="count"><?php echo $total_items+1;?>.</span><span class="caliber"><?php echo $var['caliber_code'].' '.$var['caliber_family'];?></span></div>
	<div class="col2"><?php echo (empty($stdtime)?'-':$stdtime);?></div>
	<div class="col3" title="<?php echo number_format($var['caliber_qty'],3);?>"><?php echo (empty($qty)?'0':$qty);?></div>
	<div class="col4"><?php echo (empty($earned)?'-':number_format($earned,2));?></div>
</div>