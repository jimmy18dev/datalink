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

<?php include'favicon.php';?>
<title>Datalink login</title>

<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/service/min/user.service.min.js"></script>

</head>
<body>
<div class="login-container">
	<div class="logo">
		<h1>DATALINK</h1>
		<p class="version">Version <strong>1.01</strong></p>
	</div>
	<div class="input">
		<form action="javascript:login();">
			<input type="text" class="input-text" id="username" placeholder="Username" autofocus autocomplete="off">
			<input type="password" class="input-text" placeholder="Enter your password..." id="password">
			<button type="submit" class="login-btn">Login<i class="fa fa-angle-right"></i></button>
		</form>
	</div>
</div>

<div class="loading-box" id="loading-box">
	<div class="dialog">
		<div class="icon"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></div>
		<p id="login-message"></p>
	</div>
</div>
</body>
</html>