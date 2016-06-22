<a href="report_detail_editor.php?caliber=<?php echo $var['caliber_id'];?>&header=<?php echo $header_id;?>&action=create" class="caliber-choose-items">
	<span class="title"><?php echo $var['caliber_code'].' '.$var['caliber_family'];?></span>
	<span class="std">Standard time <?php echo $var['caliber_stdtime'];?> Hrs/K and has <?php echo $var['total_operation'];?> operations</span>

	<?php if(empty($var['detail_id'])){?>
	<span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
	<?php }else{?>
	<span class="icon"><i class="fa fa-check" aria-hidden="true"></i></span>
	<?php }?>
</a>