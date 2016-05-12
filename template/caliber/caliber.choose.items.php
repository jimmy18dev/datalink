<?php if(empty($var['detail_id'])){?>
<a href="report_detail_editor.php?caliber=<?php echo $var['caliber_id'];?>&header=<?php echo $header_id;?>" class="caliber-choose-items"><strong><?php echo $var['caliber_code'].' '.$var['caliber_family'];?></strong> : Std.time <?php echo $var['caliber_stdtime'];?> <span class="ttl_operation">(<?php echo $var['total_operation'];?> operations)</span><i class="fa fa-angle-right" aria-hidden="true"></i>
</a>
<?php }else{?>
<div class="caliber-choose-items unlink-items"><strong><?php echo $var['caliber_code'].' '.$var['caliber_family'];?></strong> : Std.time <?php echo $var['caliber_stdtime'];?> <span class="ttl_operation">(<?php echo $var['total_operation'];?> operations)</span><i class="fa fa-angle-right" aria-hidden="true"></i>
</div>
<?php }?>