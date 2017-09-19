<div class="caliber-in-report-items" id="<?php echo $var['caliber_code'].$var['caliber_family'];?>">
	<div class="info">
		<div class="name"><?php echo $var['caliber_code'].' '.$var['caliber_family'];?></div>
		<div class="description">
			<p>Route: <strong><?php echo $var['route_name'];?></strong> · Std.time <strong><?php echo $var['std_time'];?> Hrs/K</strong><?php if($can_edit){?> <a href="report_detail_editor.php?caliber=<?php echo $var['caliber_id'];?>&header=<?php echo $header_id;?>&report=<?php echo $var['report_id'];?>&action=edit" class="btn">Edit<i class="fa fa-angle-right" aria-hidden="true"></i></a><?php }?></p>
		</div>
	</div>
	<div class="operations">
		<div class="operation-items -topic">
			<div class="col1">OPERATION</div>
			<div class="col2">INPUT</div>
			<div class="col3">GOOD</div>
			<div class="col4">REJECT</div>
		</div>
		<?php $this->listOperationInCaliber($var['report_id'],array('type' => 'report-caliber-detail-items','std_time' => $var['std_time']));?>
	</div>
</div>