<?php
require_once'config/autoload.php';
header("Content-type: text/json");

// API Request $_POST
if($_POST['calling'] != ''){
	switch ($_POST['calling']) {
		case 'remark':
			switch ($_POST['action']) {
				case 'create':
					if(true){
						$return_id = $remark->create($_POST['category_id'],$_POST['description']);
						
						if(!empty($return_id) && $return_id != 0){
							$message = 'register successful';
							$state = true;
						}else{
							$message = 'register fail!';
							$state = false;
						}
						$api->successMessage($message,$state,'');
					}else{
						$api->errorMessage('signature error!');
					}
					break;
				case 'edit':
					if(true){
						$return_id = $remark->edit($_POST['id'],$_POST['category_id'],$_POST['description']);
						
						// if(!empty($user_id) && $user_id != 0){
						// 	$return_message = 'register successful';
						// 	$register_state = true;

						// 	// Autologin after register successful
						// 	// $login_state = $people->login($_POST['email'],$_POST['password'],'');
						// }else{
						// 	$return_message = 'register fail!';
						// 	$register_state = false;
						// }
						$api->successMessage($return_message,$register_state,'');
					}else{
						$api->errorMessage('signature error!');
					}
					break;
				case 'delete':
					if(true){
						$return_id = $remark->deleteRamark($_POST['remark_id']);
						
						if(!empty($return_id) && $return_id != 0){
							$message = 'register successful';
							$state = true;
						}else{
							$message = 'register fail!';
							$state = false;
						}
						$api->successMessage($message,$state,'');
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