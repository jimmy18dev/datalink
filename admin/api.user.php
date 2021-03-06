<?php
require_once'config/autoload.php';
header("Content-type: text/json");

// API Request $_POST
if($_POST['calling'] != ''){
	switch ($_POST['calling']) {
		case 'user':
			switch ($_POST['action']){
				case 'login': // Admin login
					if(true){
						$user_id = $user->login($_POST['username'],$_POST['password']);
						if(!empty($user_id) && $user_id != 0){	
							$useractivity->saveActivity($user_id,'Login','','');
							$api->successMessage('Successful',true,'');
						}else{
							$api->successMessage('Fail',false,'');
						}
					}else{
						$api->errorMessage('Signature Error!');
					}
					break;
				case 'register': // Register new user
					if($user->online){
						$user_id = $user->register($_POST['section_id'],$_POST['code'],$_POST['fname'],$_POST['lname'],$_POST['username'],$_POST['password'],$_POST['line_default']);
						if(!empty($user_id) && $user_id != 0){
							$api->successMessage('Successful',true,'');
						}else{
							$api->successMessage('Fail',false,'');
						}
					}else{
						$api->errorMessage('User authentication failed!');
					}
					break;

				case 'edit':
					if($user->online){
						$user_id = $user->editInfo($_POST['id'],$_POST['section_id'],$_POST['code'],$_POST['fname'],$_POST['lname'],$_POST['username'],$_POST['password'],$_POST['line_default']);

						$api->successMessage($return_message,$register_state,'');
					}else{
						$api->errorMessage('User authentication failed!');
					}
					break;
				case 'deactive':
					if($user->online){
						$user_id = $user->deactiveUser($_POST['user_id']);
						$api->successMessage($return_message,$register_state,'');
					}else{
						$api->errorMessage('User authentication failed!');
					}
					break;
				case 'add_to_admin':
					if($user->online){
						$user_id = $user->grantAdmin($_POST['user_id']);
						$api->successMessage($return_message,$register_state,'');
					}else{
						$api->errorMessage('User authentication failed!');
					}
					break;
				case 'remove_admin':
					if($user->online){
						$user_id = $user->removeAdmin($_POST['user_id']);
						$api->successMessage($return_message,$register_state,'');
					}else{
						$api->errorMessage('User authentication failed!');
					}
					break;
				default:
					break;
			}
			break;
		default:
			$api->errorMessage('API ERROR!');
			break;
	}
}else{
	if(!$user->online)
		$api->errorMessage('User authentication failed!');
	else
		$api->errorMessage('API NOT FOUND');
}

exit();
?>