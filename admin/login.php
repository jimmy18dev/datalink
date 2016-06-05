<?php include'config/autoload.php';?>
<?php
// Permission
if($user_online){
	header("Location: index.php");
	die();
}
?>
<!doctype html>
<html lang="en-US" itemscope itemtype="http://schema.org/Blog" prefix="og: http://ogp.me/ns#">
<head>

<!--[if lt IE 9]>
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
<![endif]-->

<!-- Meta Tag -->
<meta charset="utf-8">

<!-- Viewport (Responsive) -->
<meta name="viewport" content="width=device-width">
<meta name="viewport" content="user-scalable=no">
<meta name="viewport" content="initial-scale=1,maximum-scale=1">

<title>DATALINK</title>

<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/service/user.service.js"></script>

</head>
<body>
<div class="login-container">
	<div class="logo"><i class="fa fa-code-fork" aria-hidden="true"></i> DATALINK</div>
	<p>Version 1.0</p>
	<div class="input">
		<form action="javascript:login();">
			<input type="text" class="input-text" id="username" placeholder="Username" autofocus>
			<input type="password" class="input-text" placeholder="Enter your password..." id="password">
			<button type="submit" class="login-btn"><i class="fa fa-arrow-right"></i></button>
		</form>
	</div>
</div>

<div class="loading-box" id="loading-box">
	<div class="dialog">
		<div class="icon"><i class="fa fa-circle-o-notch fa-spin"></i></div>
		<p id="loading-message"></p>
	</div>
</div>

<div class="version-bar">Development by Puwadon Sricharoen | Ronda Thailand</div>
</body>
</html>