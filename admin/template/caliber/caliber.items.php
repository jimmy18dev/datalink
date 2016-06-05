<a href="route.php?caliber=<?php echo $var['caliber_id'];?>" parent="_parent">
<div class="items caliber-items <?php echo ($var['caliber_status']=='deactive'?'caliber-items-deactive':'');?>">
	<div class="col1"><strong><?php echo $var['caliber_code'].' '.$var['caliber_family'];?></strong></div>
	<div class="col4"><?php echo ($var['caliber_status']=='active'?'<span class="active">Available</span>':'pending <i class="fa fa-clock-o" aria-hidden="true"></i>');?></div>
	<div class="col2"><?php echo (empty($var['route_name'])?'-':$var['route_name']);?></div>
	<div class="col3"><?php echo (empty($var['caliber_stdtime'])?'-':$var['caliber_stdtime']);?></div>
	<div class="col5" title="<?php echo $var['caliber_description'];?>"><?php echo (empty($var['caliber_description'])?'-':$var['caliber_description']);?></div>
</div>
</a>