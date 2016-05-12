<div class="operation-items <?php echo (!empty($var['match_id'])?'operation-items-add':'');?>">
	<div class="col1"><strong><?php echo $var['name'];?></strong></div>
	<div class="col2"><?php echo (empty($var['description'])?'-':$var['description']);?> <a href="operation_editor.php?operation=<?php echo $var['id'];?>">[แก้ไข]</a></div>
	<div class="col3"><?php echo $var['update_time'];?></div>
	<div class="col4">
		<?php if(empty($var['match_id'])){?>
		<span class="btn" onclick="javascript:createMatching(<?php echo $var['id'];?>);">disable</span>
		<?php }else{?>
		<span class="btn btn-active" onclick="javascript:createMatching(<?php echo $var['id'];?>);">Active</span>
		<?php }?>
	</div>
</div>