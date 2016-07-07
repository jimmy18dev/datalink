<a href="report_detail.php?header=<?php echo $var['id'];?>" target="_parent">
<div class="report-header-items <?php echo (!$owner?'not_owner':'');?>">
	<div class="col1">
		<span class="shift shift-<?php echo $var['shift'];?>"><?php echo $var['shift'];?></span>
		<strong><?php echo date("j F, Y", strtotime($var['report_date']));?></strong> 
		<?php echo ($new_items?'<span class="new-items">(Updated)</span>':'');?>
	</div>
	<div class="col2"><?php echo number_format($var['ttl_eff'],2);?> <span class="unit">% (Total EFF)</span></div>
	<div class="col3" title="<?php echo $var['fname'].' '.$var['lname'];?> (<?php echo $var['user_code'];?>)"><i class="fa fa-user" aria-hidden="true"></i><?php echo $var['fname'];?></div>
	<div class="col4">
		<?php if(!$owner){?>
		<i class="fa fa-lock" aria-hidden="true"></i>
		<?php }else if($lock){?>
		<i class="fa fa-check" aria-hidden="true"></i>
		<?php }else{?>
		<i class="fa fa-angle-right" aria-hidden="true"></i>
		<?php }?>
	</div>
</div>
</a>