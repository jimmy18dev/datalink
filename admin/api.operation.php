<?php
require_once'config/autoload.php';
header("Content-type: text/json");

// API Request $_POST
if($_POST['calling'] != ''){
	switch ($_POST['calling']) {
		case 'operation':
			switch ($_POST['action']) {
				case 'submit':
					if(true){
						$operation_id 	= $_POST['id'];
						$name 			= $_POST['name'];
						$description 	= $_POST['description'];

						if(!empty($operation_id) && isset($operation_id)){
							$operation->editOperation($operation_id,$name,$description);
							$return_message = 'operation edited';
						}else{
							$return_id = $operation->createOperation($name,$description);
							$return_message = 'operation created';
						}

						$api->successMessage('Return:'.$return_message.':'.$_POST['id'],$register_state,'');
						
					}else{
						$api->errorMessage('signature error!');
					}
					break;
				case 'delete_operation':
					if(true){
						$return_id = $operation->deleteOperation($_POST['operation_id']);
						$api->successMessage('Return:'.$return_message.':'.$_POST['id'],$register_state,'');
					}else{
						$api->errorMessage('signature error!');
					}
					break;
				case 'create_macthing':
					if(true){
						$return_id = $operation->connectOperationAndRoute($_POST['route_id'],$_POST['operation_id']);
						$api->successMessage('Return:'.$return_message.':'.$_POST['id'],$register_state,'');
					}else{
						$api->errorMessage('signature error!');
					}
					break;
				case 'remove_macthing':
					if(true){
						$return_id = $operation->removeOperationOnRoute($_POST['route_id'],$_POST['operation_id']);
						$api->successMessage('Return:'.$return_message.':'.$_POST['id'],$register_state,'');
					}else{
						$api->errorMessage('signature error!');
					}
					break;
				case 'set_final':
					if(true){
						$return_id = $operation->setFinal($_POST['type'],$_POST['operation_id']);
						$api->successMessage('Return:'.$return_message.':'.$_POST['id'],$register_state,'');
					}else{
						$api->errorMessage('signature error!');
					}
					break;
				case 'swap_macth':
					if(true){
						$return_id = $operation->swapMatch($_POST['route_id'],$_POST['operation_id']);
						
						// if(!empty($user_id) && $user_id != 0){
						// 	$return_message = 'register successful';
						// 	$register_state = true;

						// 	// Autologin after register successful
						// 	// $login_state = $people->login($_POST['email'],$_POST['password'],'');
						// }else{
						// 	$return_message = 'register fail!';
						// 	$register_state = false;
						// }
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
		case 'operation':
			switch ($_GET['action']) {
				case 'get':
					$operation_id = $_GET['operation_id'];
					$dataset = $operation->getOperation($operation_id);
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