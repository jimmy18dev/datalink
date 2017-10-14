<a href="report_detail.php?header=<?php echo $var['id'];?>" target="_parent">
<div class="header-report-items <?php echo (!$owner?'-not_owner':'');?>">
	<div class="shift">
		<span class="<?php echo $var['shift'];?>"><?php echo $var['shift'];?></span>
	</div>
	<div class="detail">
		<div class="date">
			<?php echo date("j F Y", strtotime($var['report_date']));?>

			<span class="owner" title="<?php echo $var['fname'].' '.$var['lname'];?> (<?php echo $var['user_code'];?>)"><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $var['update_time'];?> by <?php echo $var['fname'];?></psna>
		</div>
		<div class="info">
			<span><strong>Total Eff</strong> <?php echo number_format($var['ttl_eff'],2);?>%</span>
			<span><strong>Yield</strong> <?php echo number_format($var['yield'],2);?>%</span>
			<?php if($new_items){?>
			<span class="newitem">New</span>
			<?php }?>
		</div>
		<!-- <div class="eff">
			<?php echo ($var['ttl_eff'] < $var['target_eff']?'<i class="fa fa-exclamation-circle" aria-hidden="true"></i>':'');?>
			ttl_eff<?php echo number_format($var['ttl_eff'],2);?><span class="unit">%</span>
		</div>
		<div class="eff">
			<?php echo ($var['yield'] < $var['target_yield']?'<i class="fa fa-exclamation-circle" aria-hidden="true"></i>':'');?>
			
		</div> -->
	</div>
</div>
</a>