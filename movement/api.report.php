<?php
require_once'config/autoload.php';
header("Content-type: text/json");

// API Request $_POST
if($_POST['calling'] != ''){
	switch ($_POST['calling']) {
		case 'report':
			switch ($_POST['action']) {
				case 'create_header':
					if(true){
						$return_id = $report->newHeaderReport($user->id,$user->line_default,$_POST['line_type'],$_POST['shift'],$_POST['report_date'],$_POST['no_monthly_emplys'],$_POST['no_daily_emplys'],$_POST['ttl_monthly_hrs'],$_POST['ttl_daily_hrs'],$_POST['ot_10'],$_POST['ot_15'],$_POST['ot_20'],$_POST['ot_30'],$_POST['losttime_vac'],$_POST['losttime_sick'],$_POST['losttime_abs'],$_POST['losttime_mat'],$_POST['losttime_other'],$_POST['downtime_mc'],$_POST['downtime_mat'],$_POST['downtime_fac'],$_POST['downtime_other'],$_POST['sort_local'],$_POST['sort_oversea'],$_POST['rework_local'],$_POST['rework_oversea'],$_POST['product_eff'],$_POST['ttl_eff'],$_POST['yield'],$_POST['target_yield'],$_POST['target_eff'],$_POST['remark']);

						if(!empty($return_id) && $return_id != 0){
							$message = 'Create report successful';
						}else{
							$message = 'Fail!';
						}
						$api->successMessage($message,$return_id,'');
					}else{
						$api->errorMessage('signature error!');
					}
					break;
				case 'edit_header':
					if(true){
						$return_id = $report->updateHeaderReport($_POST['header_id'],$user->id,$_POST['line_type'],$_POST['shift'],$_POST['no_monthly_emplys'],$_POST['no_daily_emplys'],$_POST['ttl_monthly_hrs'],$_POST['ttl_daily_hrs'],$_POST['ot_10'],$_POST['ot_15'],$_POST['ot_20'],$_POST['ot_30'],$_POST['losttime_vac'],$_POST['losttime_sick'],$_POST['losttime_abs'],$_POST['losttime_mat'],$_POST['losttime_other'],$_POST['downtime_mc'],$_POST['downtime_mat'],$_POST['downtime_fac'],$_POST['downtime_other'],$_POST['sort_local'],$_POST['sort_oversea'],$_POST['rework_local'],$_POST['rework_oversea'],$_POST['product_eff'],$_POST['ttl_eff'],$_POST['yield'],$_POST['target_yield'],$_POST['target_eff'],$_POST['remark']);

						if(!empty($return_id) && $return_id != 0){
							$message = 'create report successful';
							$state = true;
						}else{
							$message = 'FALI!';
							$state = false;
						}
						$api->successMessage($message.' ('.$user->id.')',$state,'');
					}else{
						$api->errorMessage('signature error!');
					}
					break;
				case 'delete_header_report':
					$report->getHeader($_POST['header_id']);

					// Leader authorization
					if($report->leader_id == $user->id){
						$report->deleteHeaderReport($_POST['header_id'],$_POST['shift'],$user->id);

						if(!empty($return_id) && $return_id != 0){
							$message = 'Create report successful';
						}else{
							$message = 'Fail!';
						}
						$api->successMessage($message,$return_id,'');

					}else{
						$api->errorMessage('Autorite error!');
					}
					break;
				case 'delete_report_detail':
					$report->getHeader($_POST['header_id']);

					// Leader authorization
					if($report->leader_id == $user->id){
						$report->deleteReportDetail($_POST['report_id'],$user->id);
						
						if(!empty($return_id) && $return_id != 0){
							$message = 'Create report successful';
						}else{
							$message = 'Fail!';
						}
						$api->successMessage($message,$return_id,'');

					}else{
						$api->errorMessage('Autorite error!');
					}
					break;
				default:
					break;
			}
			break;
		default:
			$api->errorMessage('COMMENT POST API ERROR!');
			break;
	}
}

// API Request $_GET
else if($_GET['calling'] != ''){
	switch ($_GET['calling']) {
		case 'report':
			switch ($_GET['action']) {
				case 'getGraph':
					$report->getGraph($_GET['month'],$_GET['year'],$_GET['shift'],$_GET['line'],array('render' => 'json'));
					break;
			}
			break;
		default:
			$api->errorMessage('COMMENT GET API ERROR!');
			break;
	}
}

// API Request is Fail or Null calling
else{
	$api->errorMessage('API NOT FOUND!');
}

exit();
?>