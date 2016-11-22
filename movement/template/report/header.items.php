<a href="report_detail.php?header=<?php echo $var['id'];?>" target="_parent">
<div class="header-report-items <?php echo (!$owner?'-not_owner':'');?>">
	<div class="shift -<?php echo $var['shift'];?>"><?php echo $var['shift'];?></div>
	<div class="date"><?php echo date("j F, Y", strtotime($var['report_date']));?><?php echo ($new_items?'<span class="new-items">Updated</span>':'');?></div>
	<div class="eff">
		<span class="<?php echo ($var['ttl_eff'] < $var['target_eff']?'-warning':'');?>"><?php echo number_format($var['ttl_eff'],2);?> %</span>
	</div>
	<div class="eff">
		<span class="<?php echo ($var['yield'] < $var['target_yield']?'-warning':'');?>"><?php echo number_format($var['yield'],2);?> %</span>
	</div>
	<div class="owner" title="<?php echo $var['fname'].' '.$var['lname'];?> (<?php echo $var['user_code'];?>)"><i class="fa fa-user-o" aria-hidden="true"></i><?php echo $var['fname'];?></div>
	<div class="status">
		<?php if($lock){?>
		<i class="fa fa-lock" aria-hidden="true"></i>
		<?php }else{?>
		<i class="fa fa-angle-right" aria-hidden="true"></i>
		<?php }?>
	</div>
</div>
</a>