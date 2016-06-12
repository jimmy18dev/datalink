<a href="report_detail.php?header=<?php echo $var['id'];?>" target="_parent">
<div class="report-header-items <?php echo (!$owner?'not_owner':'');?>">
	<div class="col1"><strong><?php echo date("j F, Y", strtotime($var['report_date']));?></strong> <?php echo ($new_items?'<span class="new-items">(Updated)</span>':'');?></div>
	<div class="col2"><?php echo $var['shift'];?></div>
	<div class="col3"><?php echo number_format($var['product_eff'],2);?> <span class="unit">%</span></div>
	<div class="col4"><?php echo number_format($var['ttl_eff'],2);?> <span class="unit">%</span></div>
	<div class="col5" title="<?php echo $var['fname'].' '.$var['lname'];?> (<?php echo $var['user_code'];?>)"><?php echo $var['fname'];?><?php echo (!$owner?'':'<i class="fa fa-angle-right"></i>');?></div>
</div>
</a>