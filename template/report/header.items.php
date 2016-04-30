<a href="report_detail.php?header=<?php echo $var['id'];?>" target="_parent">
<div class="report-header-items">
	<div class="col1"><strong><?php echo $var['date'];?></strong></div>
	<div class="col2"><?php echo $var['line_no'];?> <span class="mini"><?php echo $var['line_type'];?></span></div>
	<div class="col3"><?php echo $var['shift'];?></div>
	<div class="col4"><?php echo $var['no_daily_emplys'];?> <span class="mini">(<?php echo number_format($var['ttl_daily_hrs'],2);?> Hrs.)</span></div>
	<div class="col5"><?php echo $var['no_monthly_emplys'];?> <span class="mini">(<?php echo number_format($var['ttl_monthly_hrs'],2);?> Hrs.)</span></div>
	<div class="col6"><?php echo $var['ot_10'];?></div>
	<div class="col7"><?php echo $var['ot_15'];?></div>
	<div class="col8"><?php echo $var['ot_20'];?></div>
	<div class="col9"><?php echo $var['ot_30'];?></div>
	<div class="col10" title="<?php echo $var['update_time'];?>"><?php echo $var['update'];?></div>
	<div class="col11" title="<?php echo $var['fname'].' '.$var['lname'];?> (<?php echo $var['user_code'];?>)"><?php echo $var['fname'];?></div>
</div>
</a>