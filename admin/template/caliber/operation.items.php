<div class="operation-items <?php echo (!empty($var['match_id'])?'operation-items-add':'');?>">
	<div class="detail">
		<div class="title"><strong><?php echo $items;?>. <?php echo $var['name'];?></strong> <a href="operation_editor.php?operation=<?php echo $var['id'];?>&route=<?php echo $route_current;?>">[edit]</a> <span class="final-btn <?php echo ($var['type'] == 'final'?'final-active-btn':'');?>" onclick="javascript:setFinal('<?php echo $var['type'];?>',<?php echo $var['id'];?>);"><i class="fa fa-star" aria-hidden="true"></i></span></div>

		<?php if(!empty($var['description'])){?>
		<div class="description"><?php echo $var['description'];?></div>
		<?php }?>
	</div>

	<?php if($route_type != 'primary'){?>
	<div class="control">
		<?php if(empty($var['match_id'])){?>
		<span class="btn" onclick="javascript:createMatching(<?php echo $var['id'];?>);"><i class="fa fa-arrow-left" aria-hidden="true"></i>Add</span>
		<?php }else{?>
		<span class="btn btn-remove" onclick="javascript:createMatching(<?php echo $var['id'];?>);">Remove</span>

		<?php if($var['sort'] != 1 && $var['sort'] != 0){?>
		<span class="btn btn-remove" onclick="javascript:swapMatch(<?php echo $var['id'];?>);"><i class="fa fa-caret-up" aria-hidden="true"></i>Up</span>
		<?php }?>
		<?php }?>
	</div>
	<?php }?>
</div>