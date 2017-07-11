<a href="report_detail.php?header=<?php echo $var['id'];?>" target="_parent">
<div class="header-report-items <?php echo (!$owner?'-not_owner':'');?>">
	<div class="date"><?php echo date("j F Y", strtotime($var['report_date']));?><?php echo ($new_items?'<span class="new-items">Updated</span>':'');?></div>
	<div class="shift -<?php echo $var['shift'];?>"><?php echo $var['shift'];?></div>
	<div class="eff">
		<?php echo ($var['ttl_eff'] < $var['target_eff']?'<i class="fa fa-exclamation-circle" aria-hidden="true"></i>':'');?>
		<?php echo number_format($var['ttl_eff'],2);?><span class="unit">%</span>
	</div>
	<div class="eff">
		<?php echo ($var['yield'] < $var['target_yield']?'<i class="fa fa-exclamation-circle" aria-hidden="true"></i>':'');?>
		<?php echo number_format($var['yield'],2);?><span class="unit">%</span>
	</div>
	<div class="owner" title="<?php echo $var['fname'].' '.$var['lname'];?> (<?php echo $var['user_code'];?>)"><?php echo $var['fname'];?><span class="time"><?php echo $var['update_time'];?></span></div>
	<div class="status">
		<i class="fa fa-angle-right" aria-hidden="true"></i>
	</div>
</div>
</a>