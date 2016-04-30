<?php
include'config/autoload.php';
$header_id = $_POST['header_id'];
for($i=0;$i < count($_POST['operation_id']);$i++){
	if(empty($_POST['detail_id'][$i])){
		// Create new detail
		$report->createDetail($header_id,$_POST['caliber_id'][$i],$_POST['route_id'][$i],$_POST['stdtime_id'][$i],$_POST['operation_id'][$i],$_POST['total_good'][$i],$_POST['total_reject'][$i],$_POST['remark_id'][$i],$_POST['remark_message'][$i],$_POST['output'][$i],$_POST['required_hrs'][$i]);
	}else{
		// Update own detail
		$report->editDetail($_POST['detail_id'][$i],$_POST['total_good'][$i],$_POST['total_reject'][$i],$_POST['remark_id'][$i],$_POST['remark_message'][$i],$_POST['output'][$i],$_POST['required_hrs'][$i]);
	}
}
?>