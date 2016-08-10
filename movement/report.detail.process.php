<?php
include'config/autoload.php';

// $report->getHeader($_POST['header_id']);

// Create header report
if(empty($_POST['report_id'])){
	$report_id = $report->createReportHeader($_POST['header_id'],$user->id,$_POST['caliber_id'],$_POST['route_id'],$_POST['std_id'],$_POST['remark_message'],'normal','active');
}

// Add operation items to report.
for($i=0;$i < count($_POST['operation_id']);$i++){

	$operation_id 	= $_POST['operation_id'][$i];
	$input 			= $_POST['input'][$i];
	$good 			= $_POST['total_good'][$i];
	$reject 		= $input - $good;

	$std_time 		= $_POST['std_time'];
	$remark_id 		= $_POST['remark_id'][$i];
	$remark_message = $_POST['remark_message'][$i];

	if(empty($input)){
		$input 		= 0;
		$good 		= 0;
		$reject 	= 0;
	}else{
		if($good > $input){
			$good 	= 0;
			$reject = 0;
		}
	}

	if(empty($_POST['report_id'])){ // Create new detail
		$report->addOperationReport($report_id,$operation_id,$good,$reject,$remark_id,$remark_message);
	}else{ // Update own detail
		$report->updateOerationReport($_POST['report_id'],$operation_id,$good,$reject,$remark_id,$remark_message);
	}
}

// Update Product EFF, Total EFF and Yield
$report->updateEFFandYield($_POST['header_id']);
?>