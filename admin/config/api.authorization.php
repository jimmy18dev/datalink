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
}
?>