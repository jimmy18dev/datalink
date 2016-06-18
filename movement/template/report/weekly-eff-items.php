<div class="weekly-eff-items">
	<div class="col1"><span class="count"><?php echo $total_items+1;?>.</span> <?php echo $var['caliber_code'].' '.$var['caliber_family'];?></div>
	<div class="col2"><?php echo (empty($stdtime)?'-':$stdtime);?></div>
	<div class="col3" title="<?php echo $var['caliber_qty'];?>"><?php echo (empty($qty)?'0':$qty);?></div>
	<div class="col4"><?php echo (empty($earned)?'-':number_format($earned,2));?></div>
</div>