<?php
require_once'config/autoload.php';
header("Content-type: text/json");

// API Request $_POST
if($_POST['calling'] != ''){
	switch ($_POST['calling']) {
		case 'route':
			switch ($_POST['action']) {
				case 'submit':
					if(true){
						$route_id 		= $_POST['id'];
						$name 			= $_POST['name'];
						$description 	= $_POST['description'];
						$caliber_id 	= $_POST['caliber_id'];

						if(!empty($route_id) && isset($route_id)){
							$return_id = $route->editRoute($route_id,$name,$description);
							$return_message = 'route eidt';
						}else{
							$return_id = $route->createRoute($caliber_id,$name,$description);
							$return_message = 'route created';
						}
						$api->successMessage($return_message,$return_id,'');
					}else{
						$api->errorMessage('signature error!');
					}
					break;
				case 'delete_route':
					if(true){
						$return_id = $route->deleteRoute($_POST['route_id']);
						$api->successMessage('Return:'.$return_message.':'.$_POST['id'],$register_state,'');
					}else{
						$api->errorMessage('signature error!');
					}
					break;
				case 'set_primary':
					if(true){
						$return_id = $route->setPrimary($_POST['route_id'],$_POST['caliber_id']);
						$api->successMessage('Return:'.$return_message.':'.$_POST['id'],$register_state,'');
					}else{
						$api->errorMessage('signature error!');
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
		case 'route':
			switch ($_GET['action']) {
				case 'get':
					$route_id = $_GET['route_id'];
					$dataset = $route->getRoute($route_id);
					// Export data to json format
					$data = array(
						"apiVersion" => "1.0",
						"data" => array(
							"update" => time(),
							"execute" => round(microtime(true)-StTime,4)."s",
							"dataset" => $dataset,
						),
					);
					echo json_encode($data);
					break;
				default:
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