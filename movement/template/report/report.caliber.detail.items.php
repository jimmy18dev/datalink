<div class="operation-items">
	<div class="col1"><?php echo $total_items+1;?>. <?php echo $var['operation_name'];?></div>
	<div class="col4"><?php echo number_format($var['total_good'] + $var['total_reject']);?></div>
	<div class="col2"><?php echo number_format($var['total_good']);?></div>
	<div class="col3"><?php echo number_format($var['total_reject']);?></div>
	<div class="col6"><?php echo $var['remark_description'];?> <?php echo (empty($var['remark_message'])?'':$var['remark_message']);?></div>
	<!-- <p><?php echo $var['remark_message'];?></p> -->
</div>