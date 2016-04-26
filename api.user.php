<?php
require_once'config/autoload.php';
header("Content-type: text/json");

// API Request $_POST
if($_POST['calling'] != ''){
	switch ($_POST['calling']) {
		case 'user':
			switch ($_POST['action']) {
				case 'register':
					if(true){
						$user_id = $user->register($_POST['section_id'],$_POST['code'],$_POST['fname'],$_POST['lname'],$_POST['username'],$_POST['password']);
						
						if(!empty($user_id) && $user_id != 0){
							$return_message = 'register successful';
							$register_state = true;

							// Autologin after register successful
							// $login_state = $people->login($_POST['email'],$_POST['password'],'');
						}else{
							$return_message = 'register fail!';
							$register_state = false;
						}
						$api->successMessage($return_message.' section_id:'.$_POST['section_id'],$register_state,'');
					}else{
						$api->errorMessage('signature error!');
					}
					break;
				case 'edit':
					if(true){
						$user_id = $user->editInfo($_POST['id'],$_POST['section_id'],$_POST['code'],$_POST['fname'],$_POST['lname'],$_POST['username'],$_POST['password']);

						$api->successMessage($return_message,$register_state,'');
					}else{
						$api->errorMessage('signature error!');
					}
					break;
				case 'login':
					if(true){
						$login_state = $user->login($_POST['username'],$_POST['password']);

						if($login_state){
							$return_message = 'login successful';
						}else{
							$return_message = 'login fail!';
						}
						$api->successMessage($return_message,$login_state,'');
					}else{
						$api->errorMessage('signature error!');
					}
					break;
				
				// case 'changePassword':
				// 	if($app->verifySignature($_POST['signature'])){

				// 		// Change password process
				// 		$process_state = $people->changePassword($people->id,$_POST['password']);
						
				// 		if($process_state){
				// 			$return_message = 'password changed';
				// 			$check_state = true;

				// 			// Autologin after register successful
				// 			$login_state = $people->login($people->email,$_POST['password'],'');
				// 		}else{
				// 			$return_message = 'change password fail!';
				// 			$check_state = false;
				// 		}
				// 		$api->successMessage($return_message,$check_state,'');
				// 	}else{
				// 		$api->errorMessage('signature error!');
				// 	}
				// 	break;
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