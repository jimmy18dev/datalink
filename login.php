<?php include'config/autoload.php';?>
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
<meta http-equiv="refresh" content="60">

<title>LOGIN</title>

<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/service/user.service.js"></script>

</head>
<body>
<div class="login-container">
	<div class="logo">DATALINK</div>
	<p>Version 1.0</p>
	<div class="input">
		<input type="password" class="input-text" placeholder="Enter your password..." id="password">
		<div class="login-btn" onclick="login();"><i class="fa fa-arrow-right"></i></div>
	</div>

	<p>UserOnline : <?php echo $user_online;?></p>
	<p>Cookie: <?php echo $_COOKIE['user_id'];?>, Session: <?php echo $_SESSION['user_id'];?></p>
</div>

<div class="version-bar">Development by Puwadon Sricharoen | Ronda Thailand</div>
</body>
</html>