<?php
// Get member info
if($user_online){
	if(empty($user->id) || $user->type != 'Administrator'){
		header("Location: logout.php");
		die();
	}else if($user->status == 'deactive'){
		// header("Location: profile.php");
		// die();
	}
}else{
	header("Location: logout.php");
	die();
}
?>