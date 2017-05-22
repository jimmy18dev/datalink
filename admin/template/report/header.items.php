<a href="header_report_detail.php?header=<?php echo $var['id'];?>" target="_parent">
<div class="header-report-items">
	<div class="id"><?php echo $var['line_no'];?>-<?php echo $var['shift'];?></div>
	<div class="eff"><?php echo number_format($var['product_eff'],2);?> %</div>
	<div class="eff"><?php echo number_format($var['ttl_eff'],2);?> %</div>
	<div class="hrs"><?php echo number_format($var['ttl_monthly_hrs'],2);?></div>
	<div class="hrs"><?php echo number_format($var['ttl_daily_hrs'],2);?></div>
	<div class="ot"><?php echo $var['ot_10'];?></div>
	<div class="ot"><?php echo $var['ot_15'];?></div>
	<div class="ot"><?php echo $var['ot_20'];?></div>
	<div class="ot"><?php echo $var['ot_30'];?></div>
	<div class="update"><?php echo $var['update_time'];?></div>
	<div class="leader"><?php echo $var['leader_name'];?></div>
</div>
</a>