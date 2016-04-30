<div class="report-caliber-detail-items">
	<div class="col1"><strong><?php echo $var['operation_name'];?></strong></div>
	<div class="col2"><?php echo $var['total_good'];?></div>
	<div class="col3"><?php echo $var['total_reject'];?></div>
	<div class="col4"><?php echo $var['product_eff'];?></div>
	<div class="col5"><?php echo $var['ttl_eff'];?></div>
	<div class="col6"><?php echo number_format($var['std_time'],2);?></div>
	<div class="col7"><?php echo $var['output'];?></div>
	<div class="col8"><?php echo $var['required_hrs'];?></div>
	<div class="col9"><span class="mini"><?php echo $var['remark_description'];?> <?php echo (empty($var['remark_message'])?'':$var['remark_message']);?></span></div>
</div>