<div class="operation-items">
	<div class="col1"><?php echo $total_items+1;?>. <?php echo $var['operation_name'];?></div>
	<div class="col2 <?php echo ($var['total_good']+$var['total_reject'] > 0?'-black':'');?>"><?php echo number_format($var['total_good'] + $var['total_reject']);?></div>
	<div class="col3 <?php echo ($var['total_good'] > 0?'-green':'');?>"><?php echo number_format($var['total_good']);?></div>
	<div class="col4 <?php echo ($var['total_reject'] > 0?'-red':'');?>"><?php echo number_format($var['total_reject']);?></div>
	<div class="col5"><?php echo $var['remark_description'];?> <?php echo (empty($var['remark_message'])?'':$var['remark_message']);?></div>
	<!-- <p><?php echo $var['remark_message'];?></p> -->
</div>