<?php
include'config/autoload.php';

// Create header report
if(empty($_POST['report_id'])){
	$report_id = $report->createReportHeader($_POST['header_id'],$user->id,$_POST['caliber_id'],$_POST['route_id'],$_POST['std_id'],$_POST['remark_message'],'normal','active');
}

// Add operation items to report.
for($i=0;$i < count($_POST['operation_id']);$i++){
	if(empty($_POST['report_id'])){
		
		// Create new detail
		$report->addOperationReport($report_id,$_POST['std_time'],$_POST['operation_id'][$i],$_POST['total_good'][$i],$_POST['total_reject'][$i],$_POST['remark_id'][$i],$_POST['remark_message'][$i],$_POST['output'][$i]);
	}else{
		// Update own detail
		$report->updateOerationReport($_POST['report_id'],$_POST['std_time'],$_POST['operation_id'][$i],$_POST['total_good'][$i],$_POST['total_reject'][$i],$_POST['remark_id'][$i],$_POST['remark_message'][$i],$_POST['stdtime_hrs'][$i],$_POST['output'][$i]);
	}
}
?>