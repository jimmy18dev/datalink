<?php
//Start Session and Cookie.
session_start();
// session_regenerate_id(true); // regenerated the session, delete the old one.
ob_start();

// Starttime /////////////////////
define('StTime', microtime(true));

// Cookie Time (1 year)
define('COOKIE_TIME', time() + 3600 * 24 * 12);

// Time Zone ////////////////////////////
date_default_timezone_set('Asia/Bangkok');

error_reporting(E_ALL ^ E_NOTICE);

include'config.php';
include'config/meta.data.php';

// Database (PDO class) ///////////////
include_once'model/database.class.php';

// Site Setting include /////////////
// Model ////////////////////////////
include_once'model/user.model.php';
include_once'model/user.activity.model.php';

// Controller ///////////////////////
include_once'controller/api.controller.php';
include_once'controller/user.controller.php';
include_once'controller/user.activity.controller.php';

// Object of Controller
$api = new ApiController;
$user = new UserController;
$useractivity 	= new UserActivityController;

// Cookie Checking
if($user->cookieChecking()){ $_SESSION['user_id'] = $_COOKIE['user_id']; }	

// Member online checking
$user_online = $user->sessionOnline();

// Get member info
if($user_online){
	$user->getUser($_SESSION['user_id']);
}

$version = '1.0.2';
?>