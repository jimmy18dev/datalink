<div class="caliber-in-report-items" id="<?php echo $var['caliber_code'].$var['caliber_family'];?>">
	<div class="info">
	<div class="name">
		<?php echo $var['caliber_code'].' '.$var['caliber_family'];?>

		<?php if($can_edit){?>
		<a href="report_detail_editor.php?caliber=<?php echo $var['caliber_id'];?>&header=<?php echo $header_id;?>&report=<?php echo $var['report_id'];?>&action=edit" class="btn">Edit caliber</a>
		<?php }?>
	</div>
	<div class="description">
		<p>Route: <strong><?php echo $var['route_name'];?></strong> · Std.time <strong><?php echo $var['std_time'];?> Hrs/K</strong> · Updated <strong><?php echo $var['update_facebook_format'];?></strong></p>
	</div>
	</div>
	<div class="operations">
		<div class="operation-items topic-fix">
			<div class="col1">Operation</div>
			<div class="col2">Good</div>
			<div class="col3">Reject</div>
			<div class="col4">Output</div>
			<div class="col5">Required</div>
		</div>
		<?php $this->listOperationInCaliber($var['report_id'],array('type' => 'report-caliber-detail-items','std_time' => $var['std_time']));?>
	</div>
</div>