<?php
include'config/autoload.php';
for($i=0;$i < count($_POST['operation_id']);$i++){	
	$report->createDetail($_POST['header_id'][$i],$_POST['caliber_id'][$i],$_POST['route_id'][$i],$_POST['operation_id'][$i],$_POST['total_good'][$i],$_POST['total_reject'][$i],$_POST['remark_id'][$i],$_POST['remark_message'][$i],$_POST['product_eff'][$i],$_POST['ttl_eff'][$i],$_POST['std_time'][$i],$_POST['output'][$i],$_POST['required_hrs'][$i]);
}
?>