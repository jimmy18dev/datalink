<a href="operation.php?route=<?php echo $var['id'];?>" parent="_parent">
<div class="route-items <?php echo ($var['type'] == 'primary'?'route-items-primary':'');?>">
	<div class="title"><?php echo $var['route_name'];?></div>
	<div class="description">
		This route has <?php echo ($var['total_operation'] == 0?'-':$var['total_operation'].' operations');?> and updated at <?php echo $var['update_time'];?></div>
	<div class="status"><?php echo ($var['type'] == 'primary'?'Active':'');?></div>
</div>
</a>