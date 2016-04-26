<div class="operation-items">
	<div class="col1"><?php echo $var['name'];?></div>
	<div class="col2"><a href="operation_editor.php?operation=<?php echo $var['id'];?>">[edit]</a> <?php echo (empty($var['description'])?'-':$var['description']);?></div>
	<div class="col3"><?php echo $var['update_time'];?></div>
	<div class="col4">
		<?php if(empty($var['match_id'])){?>
		<span onclick="javascript:createMatching(<?php echo $var['id'];?>);">Add</span>
		<?php }else{?>
		<span onclick="javascript:createMatching(<?php echo $var['id'];?>);">Remove</span>
		<?php }?>
	</div>
</div>