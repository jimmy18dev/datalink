<div class="operation-items <?php echo (!empty($var['match_id'])?'operation-items-add':'');?>">
	<div class="detail">
		<div class="title"><strong><?php echo $var['name'];?></strong> <a href="operation_editor.php?operation=<?php echo $var['id'];?>&route=<?php echo $route_current;?>">[edit]</a></div>

		<?php if(!empty($var['description'])){?>
		<div class="description"><?php echo $var['description'];?></div>
		<?php }?>
	</div>
	<div class="control">
		<?php if(empty($var['match_id'])){?>
		<span class="btn" onclick="javascript:createMatching(<?php echo $var['id'];?>);"><i class="fa fa-arrow-left" aria-hidden="true"></i> Add</span>
		<?php }else{?>
		<span class="btn btn-remove" onclick="javascript:createMatching(<?php echo $var['id'];?>);">Remove</span>
		<?php }?>
	</div>
</div>