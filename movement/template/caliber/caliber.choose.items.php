<a href="report_detail_editor.php?caliber=<?php echo $var['caliber_id'];?>&header=<?php echo $header_id;?>&action=create" class="caliber-choose-items">
	<span class="title"><?php echo $var['caliber_code'].' '.$var['caliber_family'];?></span>
	<span class="std">Standard time <?php echo $var['caliber_stdtime'];?> Hrs/K and has <?php echo $var['total_operation'];?> operations</span>

	<?php if($var['total_caliber'] > 0){?>
	<span class="icon"><?php echo ($var['total_caliber'] > 1?$var['total_caliber'].' Reports':'1 Report');?> <i class="fa fa-check" aria-hidden="true"></i></span>
	<?php }else{?>
	<span class="icon"><i class="fa fa-plus" aria-hidden="true"></i></span>
	<?php }?>
</a>