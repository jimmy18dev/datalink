<a href="operation.php?route=<?php echo $var['id'];?>" parent="_parent">
<div class="route-items <?php echo ($var['type'] == 'primary'?'route-items-primary':'');?>">
	<div class="col1"><strong><?php echo $var['route_name'];?></strong></div>
	<div class="col2"><?php echo ($var['type'] == 'primary'?'<i class="fa fa-check-circle" aria-hidden="true"></i> Primary':'Secondary');?></div>
	<div class="col3"><?php echo $var['update_time'];?></div>
	<div class="col4"><?php echo ($var['total_operation'] == 0?'-':$var['total_operation'].' operations');?> <?php echo $var['name'];?></div>
	<div class="col5"><a href="route_editor.php?route=<?php echo $var['id'];?>">Edit</a></div>
</div>
</a>