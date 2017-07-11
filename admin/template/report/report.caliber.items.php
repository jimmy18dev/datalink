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
		<div class="operation-items -caption">
			<div class="op">Operation</div>
			<div class="val">Input</div>
			<div class="val">Good</div>
			<div class="val">Reject</div>
		</div>
		<?php $this->listAllOperations($var['report_id'],array('type' => 'report-caliber-detail-items'));?>
	</div>
</div>