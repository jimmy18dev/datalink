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
<title>Login to Datalink</title>

<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>

</head>
<body class="login-bg">
<div class="login-container">
	<div class="logo">
		<h1>DATALINK</h1>
		<p class="version">Version <strong>1.01</strong></p>
	</div>
	
	<form action="javascript:login();">
	<div class="input">
		<input type="text" class="input-text" id="username" placeholder="Username" autofocus autocomplete="off">
		<input type="password" class="input-text" placeholder="Enter your password..." id="password">
	</div>
	<div class="submit">
		<button type="submit" id="login-btn" class="login-btn"><span id="btn-caption">Login</span><span id="btn-icon"><i class="fa fa-angle-right"></i></span></button>
	</div>
	</form>
</div>
<script type="text/javascript" src="js/service/min/user.service.min.js"></script>
</body>
</html>