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
	<div class="login-detail">
		<div class="icon"><i class="fa fa-cube" aria-hidden="true"></i></div>
		<h1>DATALINK</h1>
		<p>The username and password to log into Datalink Panel can be found in your email. If you do not have the correct login credentials, please contact Administrator via phone or live chat</p>
		<br>
		<p>Version <strong><?php echo $version;?></strong></p>
	</div>
	<div class="login-input">
		<div class="input">
		<form action="javascript:login();">
			<p class="caption">Username</p>
			<input type="text" class="input-text" id="username" placeholder="Username" autofocus>
			<p class="caption">Password</p>
			<input type="password" class="input-text" placeholder="Enter your password..." id="password">
		</div>
		<div class="control">
			<button type="submit" class="submit-btn">Sign In<i class="fa fa-arrow-right"></i></button>
		</div>
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