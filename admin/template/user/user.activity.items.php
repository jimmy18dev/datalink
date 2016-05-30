<div class="user-activity-items">
	<div class="col1"><?php echo $var['create_time'];?></div>
	<div class="col2"><?php echo $var['action'];?></div>
	<div class="col3"><?php echo (empty($var['description'])?'-':$var['description']);?></div>
	<div class="col4"><?php echo $var['ip'];?></div>
</div>