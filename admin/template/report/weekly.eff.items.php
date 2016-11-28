<div class="weekly-eff-items weekly-eff-items-<?php echo $var['caliber_status'];?>">
	<div class="col1"><span class="count"><?php echo $var['sequence'];?>.</span><span class="caliber"><?php echo $var['caliber_name'];?></span></div>
	<div class="col2"><?php echo (empty($var['caliber_stdtime'])?'-':$var['caliber_stdtime']);?></div>
	<div class="col3" title="<?php echo number_format($var['caliber_qty']);?>"><?php echo (empty($var['caliber_qty'])?'0':number_format($var['caliber_qty'],3));?></div>
	<div class="col4"><?php echo (empty($var['caliber_earned'])?'-':number_format($var['caliber_earned'],2));?></div>
</div>