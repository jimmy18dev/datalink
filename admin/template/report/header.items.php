<a href="header_report_detail.php?header=<?php echo $var['id'];?>" target="_parent">
<div class="header-report-items">
	<div class="col1"><?php echo $var['line_no'];?></div>
	<div class="col2"><?php echo $var['shift'];?></div>
	<div class="col3"><?php echo number_format($var['product_eff'],2);?> %</div>
	<div class="col4"><?php echo number_format($var['ttl_eff'],2);?> %</div>
	<div class="col5"><?php echo number_format($var['ttl_monthly_hrs'],2);?></div>
	<div class="col6"><?php echo number_format($var['ttl_daily_hrs'],2);?></div>
	<div class="col7"><?php echo $var['ot_10'];?></div>
	<div class="col8"><?php echo $var['ot_15'];?></div>
	<div class="col9"><?php echo $var['ot_20'];?></div>
	<div class="col10"><?php echo $var['ot_30'];?></div>
	<div class="col12"><?php echo $var['update_time'];?></div>
	<div class="col13"><?php echo $var['leader_name'];?></div>
</div>
</a>