<div class="operation-items">
	<div class="col1"><strong><?php echo $total_items+1;?>. <?php echo $var['operation_name'];?></strong></div>
	<div class="col2"><?php echo number_format($var['total_good'],2);?></div>
	<div class="col3"><?php echo number_format($var['total_reject'],2);?></div>
	<div class="col4"><?php echo number_format($var['output'],2);?></div>
	<div class="col5"><?php echo number_format($var['required_hrs'],2);?></div>
	<div class="col6"><?php echo $var['remark_description'];?> <?php echo (empty($var['remark_message'])?'':$var['remark_message']);?></div>
</div>