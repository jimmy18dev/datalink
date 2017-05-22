<div class="operation-items">
	<div class="op"><?php echo $total_items+1;?>. <?php echo $var['operation_name'];?></div>
	<div class="val <?php echo ($var['total_good']+$var['total_reject'] > 0?'-black':'');?>"><?php echo number_format($var['total_good'] + $var['total_reject']);?></div>
	<div class="val <?php echo ($var['total_good'] > 0?'-green':'');?>"><?php echo number_format($var['total_good']);?></div>
	<div class="val <?php echo ($var['total_reject'] > 0?'-red':'');?>"><?php echo number_format($var['total_reject']);?></div>
</div>