<?php
require_once'config/autoload.php';
header("Content-type: text/json");

// API Request $_POST
if($_POST['calling'] != ''){
	switch ($_POST['calling']) {
		case 'route':
			switch ($_POST['action']) {
				case 'create_route':
					if(true){
						$caliber_id 	= $_POST['caliber_id'];
						$name 			= $_POST['name'];
						$description 	= $_POST['description'];
						$return_id = $route->createRoute($caliber_id,$name,$description);
						
						if(!empty($return_id) && $return_id != 0){
							$return_message = 'register successful';
						}else{
							$return_message = 'register fail!';
						}
						$api->successMessage($return_message,$return_id,'');
					}else{
						$api->errorMessage('signature error!');
					}
					break;
				case 'edit_route':
					if(true){
						$return_id = $route->editRoute($_POST['route_id'],$_POST['code'],$_POST['name'],$_POST['description']);
						
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
		case 'Comment':
			switch ($_GET['action']) {
				case 'List':
					break;
				case 'LiveComment':
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