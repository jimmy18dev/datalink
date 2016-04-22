<a href="caliber_code.php?caliber=<?php echo $var['id'];?>">
<div class="caliber-items">
	<div class="col1"><?php echo $var['code'].' '.$var['family'];?></div>
	<div class="col2"><?php echo (empty($var['standard_hrs'])?'-':$var['standard_hrs']);?></div>
	<div class="col3">
		<?php if($var['total_operation'] > 0){?>
		<span class="operation">(<?php echo $var['total_operation'];?> operations)</span>
		<?php }else{?>
		<a href="operation_editor.php?caliber=<?php echo $var['id'];?>">Create Operation</a>
		<?php }?>
		 <?php echo $var['description'];?>
	</div>
</div>
</a>