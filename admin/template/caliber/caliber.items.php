<div class="caliber-items -status-<?php echo $var['caliber_status'];?>" data-id="<?php echo $var['caliber_id'];?>">
	<div class="detail">
		<div class="name"><?php echo $var['caliber_code'].' '.$var['caliber_family'];?><?php echo ($var['caliber_status']!='active'?'<i class="fa fa-lock" aria-hidden="true"></i>':'')?></div>
		<div class="info">Stdtime: <?php echo (empty($var['caliber_stdtime'])?'-':$var['caliber_stdtime']);?> Hrs/K - Route: <?php echo (empty($var['route_name'])?'-':$var['route_name']);?> <?php echo (empty($var['caliber_description'])?'':$var['caliber_description']);?></div>
	</div>
	<div class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
</div>