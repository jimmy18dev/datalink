<a href="operation.php?route=<?php echo $var['id'];?>" parent="_parent">
<div class="items route-items">
	<div class="col1"><?php echo $var['name'];?> <?php echo ($var['type'] == 'primary'?'available':'');?></div>
	<div class="col2"><?php echo ($var['total_operation'] == 0?'-':'This route has '.$var['total_operation'].' operations');?></div>
	<div class="col3"><?php echo $var['update_time'];?></div>
</div>
</a>