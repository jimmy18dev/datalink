<?php
require_once'config/autoload.php';
include'config/authorization.php';
header("Content-type: text/json");

// API Request $_POST
if($_POST['calling'] != ''){
	switch ($_POST['calling']) {
		case 'setting':
			switch ($_POST['action']) {
				case 'update_setting':
					if(true){
						$setting->updateSetting($_POST['id'],$_POST['value']);
						
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