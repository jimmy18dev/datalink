<?php
require_once'config/autoload.php';
header("Content-type: text/json");

// API Request $_POST
if($_POST['calling'] != ''){
	switch ($_POST['calling']) {
		case 'message':
			switch ($_POST['action']) {
				case 'save_message':
					if(true){
						$return_id = $message->saveMessage($user->id,$_POST['id'],$_POST['topic'],$_POST['message']);
						
						if(!empty($return_id) && $return_id != 0){
							$message = 'register successful';
							$state = true;
						}else{
							$message = 'register fail!';
							$state = false;
						}

						$api->successMessage($message.$user->id.','.$_POST['id'].','.$_POST['topic'].','.$_POST['message'],$state,'');
					}else{
						$api->errorMessage('signature error!');
					}
					break;
				case 'delete_message':
					if(true){
						$message->delete($_POST['id']);
						
						// if(!empty($return_id) && $return_id != 0){
						// 	$message = 'register successful';
						// 	$state = true;
						// }else{
						// 	$message = 'register fail!';
						// 	$state = false;
						// }

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
			$api->errorMessage('SETTING POST API ERROR!');
			break;
	}
}

// API Request is Fail or Null calling
else{
	$api->errorMessage('API NOT FOUND!');
}

exit();
?>