<?php if(empty($var['detail_id'])){?>
<a href="report_detail_editor.php?caliber=<?php echo $var['caliber_id'];?>&header=<?php echo $header_id;?>&action=create" class="caliber-choose-items">
	<span class="title"><?php echo $var['caliber_code'].' '.$var['caliber_family'];?></span>
	<span class="std"><?php echo $var['caliber_stdtime'];?> Hrs/K</span>
	<span class="ttl"><?php echo $var['total_operation'];?> operations</span>
	<span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
</a>
<?php }else{?>
<div class="caliber-choose-items unlink-items">
	<span class="title"><?php echo $var['caliber_code'].' '.$var['caliber_family'];?></span>
	<span class="std"><?php echo $var['caliber_stdtime'];?> Hrs/K</span>
	<span class="ttl"><?php echo $var['total_operation'];?> operations</span>
	<span class="icon"><i class="fa fa-check" aria-hidden="true"></i></span>
</div>
<?php }?>