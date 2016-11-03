<div class="caliber-in-report-items">
	<div class="info">
	<div class="name">
		<?php echo $var['caliber_code'].' '.$var['caliber_family'];?>
	</div>
	<div class="description">
		<p>Route: <strong><?php echo $var['route_name'];?></strong> Std.time <strong><?php echo $var['std_time'];?></strong> Hrs/K</p>
	</div>
	</div>
	<div class="operations">
		<!-- <div class="operations-items topic-fix">
			<div class="col1">Operation</div>
			<div class="col2">Good</div>
			<div class="col3">Reject</div>
			<div class="col4">Output</div>
			<div class="col5">Required hrs</div>
		</div> -->

		<div class="operation-items caption">
			<div class="col1">Operation</div>
			<div class="col2">Input</div>
			<div class="col3">Good</div>
			<div class="col4">Reject</div>
		</div>
		<?php $this->listAllOperations($var['report_id'],array('type' => 'report-caliber-detail-items'));?>
	</div>
</div>