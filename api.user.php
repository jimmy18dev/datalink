<?php
require_once'config/autoload.php';
header("Content-type: text/json");

// API Request $_POST
if($_POST['calling'] != ''){
	switch ($_POST['calling']) {
		case 'user':
			switch ($_POST['action']) {
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
				default:
					break;
			}
			break;
		default:
			$api->errorMessage('COMMENT POST API ERROR!');
			break;
	}
}

// API Request is Fail or Null calling
else{
	$api->errorMessage('API NOT FOUND!');
}

exit();
?>