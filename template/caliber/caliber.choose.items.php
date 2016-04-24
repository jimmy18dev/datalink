<a href="report_detail_editor.php?caliber=<?php echo $var['caliber_id'];?>">
<div class="caliber-items">
	<div class="col1"><?php echo $var['caliber_code'].' '.$var['caliber_family'];?></div>
	<div class="col2"><?php echo (empty($var['route_name'])?'-':$var['route_name']);?></div>
	<div class="col3"><?php echo (empty($var['caliber_stdtime'])?'-':$var['caliber_stdtime']);?></div>
	<div class="col4"><?php if($var['total_operation'] > 0){?>
		<span class="operation">(<?php echo $var['total_operation'];?> operations)</span>
		<?php }else{?>
		<a href="operation_editor.php?caliber=<?php echo $var['id'];?>">Create Operation</a>
		<?php }?>
		 <?php echo $var['description'];?></div>
</div>
</a>