<div class="items user-activity-items">
	<div class="col1"><?php echo $var['create_time'];?></div>
	<div class="col2"><strong><?php echo $var['action'];?></strong></div>
	<div class="col3"><?php echo $var['ip'];?></div>
	<div class="col4"><?php echo (empty($var['description'])?'-':$var['description']);?></div>
</div>