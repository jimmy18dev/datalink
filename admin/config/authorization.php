<?php
// Cookie Checking
if($user->cookieChecking()){
	$_SESSION['user_id'] = $_COOKIE['user_id'];
}	

// Member online checking
$user_online = $user->sessionOnline();

// Get member info
if($user_online){
	$user->getUser($_SESSION['user_id']);

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