<div class="caliber-in-report-items">
	<div class="info">
	<div class="name"><?php echo $var['caliber_code'].' '.$var['caliber_family'];?></div>
	<div class="control">
		<a href="report_detail_editor.php?caliber=<?php echo $var['caliber_id'];?>&header_id=<?php echo $header_id;?>" class="btn">Edit</a>
		<a href="#" class="btn" onclick="javascript:deleteReport(<?php echo $header_id;?>,<?php echo $var['caliber_id'];?>);">Delete</a>
	</div>
	<div class="description">
		<p>Route: <strong><?php echo $var['route_name'];?></strong> Std.time <strong><?php echo $var['stdtime'];?></strong> Hrs/K, (<?php echo $var['total_operation'];?> operations)</p>
		<p><?php echo $var['caliber_description'];?></p>
	</div>
	</div>
	<div class="operations">
		<div class="operation-items topic-fix">
			<div class="col1">Operation</div>
			<div class="col2">Good</div>
			<div class="col3">Reject</div>
			<div class="col4">Output</div>
			<div class="col5">Required hrs</div>
		</div>
		<?php $this->listAllOperations($header_id,$var['caliber_id'],array('type' => 'report-caliber-detail-items'));?>
	</div>
</div>