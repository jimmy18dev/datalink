<?php
require_once'config/autoload.php';
include'config/authorization.php';
header("Content-type: text/json");

// API Request $_POST
if($_POST['calling'] != ''){
	switch ($_POST['calling']) {
		case 'caliber':
			switch ($_POST['action']) {
				case 'create':
					if(true){
						$return_id = $caliber->createCaliber($_POST['code'],$_POST['name'],$_POST['description'],$_POST['family'],$_POST['hrs'],$_POST['remark']);
						
						if(!empty($return_id) && $return_id != 0){
							$message = 'register successful';
						}else{
							$message = 'register fail!';
						}
						$api->successMessage($message,$return_id,'');
					}else{
						$api->errorMessage('signature error!');
					}
					break;
				case 'edit':
					if(true){
						$return_id = $caliber->editCaliber($_POST['id'],$_POST['code'],$_POST['name'],$_POST['description'],$_POST['family'],$_POST['hrs'],$_POST['remark']);
						
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
				case 'delete_caliber':
					if(true){
						$return_id = $caliber->deleteCaliber($_POST['caliber_id']);
						$api->successMessage('Return:'.$return_message.':'.$_POST['id'],$register_state,'');
					}else{
						$api->errorMessage('signature error!');
					}
					break;
				case 'setActive':
					if(true){
						$return_id = $caliber->setToActive($_POST['caliber_id']);
						$api->successMessage($return_message,$register_state,'');
					}else{
						$api->errorMessage('signature error!');
					}
					break;
				case 'setDeactive':
					if(true){
						$return_id = $caliber->setToDeactive($_POST['caliber_id']);
						$api->successMessage($return_message,$register_state,'');
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