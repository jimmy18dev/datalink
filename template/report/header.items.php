<a href="report_detail.php?header=<?php echo $var['id'];?>">
<div class="report-header-items">
	<div class="col1"><?php echo $var['report_date'];?></div>
	<div class="col2"><?php echo $var['line_no'];?> (<?php echo $var['line_type'];?>)</div>
	<div class="col3"><?php echo $var['shift'];?></div>
	<div class="col4"><?php echo $var['no_daily_emplys'];?> (<?php echo $var['ttl_daily_hrs'];?> Hrs.)</div>
	<div class="col5"><?php echo $var['no_monthly_emplys'];?> (<?php echo $var['ttl_monthly_hrs'];?> Hrs.)</div>
	<div class="col6"><?php echo $var['ot_10'];?></div>
	<div class="col7"><?php echo $var['ot_15'];?></div>
	<div class="col8"><?php echo $var['ot_20'];?></div>
	<div class="col9"><?php echo $var['ot_30'];?></div>
	<div class="col10"><?php echo $var['update_time'];?></div>
	<div class="col11"><?php echo $var['user_id'];?></div>
</div>
</a>