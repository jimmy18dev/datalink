<a href="report_detail.php?header=<?php echo $var['id'];?>" target="_parent">
<div class="report-header-items <?php echo ($new_items?'last-items':'');?> <?php echo (!$owner?'not_owner':'');?>">
	<div class="col1"><?php echo $var['date'];?></div>
	<div class="col2"><?php echo $var['shift'];?></div>
	<div class="col3"><?php echo $var['no_daily_emplys'];?></div>
	<div class="col4"><?php echo $var['no_monthly_emplys'];?></div>
	<div class="col5"><?php echo number_format($var['ttl_eff'],2);?> <span class="mini">%</span></div>
	<div class="col6" title="<?php echo $var['fname'].' '.$var['lname'];?> (<?php echo $var['user_code'];?>)"><?php echo $var['fname'];?><?php echo (!$owner?'':'<i class="fa fa-angle-right"></i>');?></div>
</div>
</a>