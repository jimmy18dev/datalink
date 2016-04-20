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
<header class="header">
	<div class="logo">RONDA THAILAND</div>
	<div class="profile">
		<img src="image/avatar.png" alt="">
	</div>
</header>
<div class="container">
	<div class="head">
		<h1>Web Design Inspiration</h1>
		<p>Ideas & Inspirations for Web Designers | We find the best web designs all over the world Responsive design for largest screens</p>

		<div class="tab">
			<div class="tab-items">Tab 1</div>
			<div class="tab-items">Tab 2</div>
			<div class="tab-items">Tab 3</div>
			<div class="tab-items">Tab 4</div>
			<div class="tab-items tab-items-active">Tab 5</div>
		</div>
	</div>

	<div class="login-container">
		<p>UserOnline : <?php echo $user_online;?></p>
		<p>Cookie: <?php echo $_COOKIE['user_id'];?>, Session: <?php echo $_SESSION['user_id'];?></p>
		<p>LOGIN TO SYSTEM</p>
		<input type="text" placeholder="Password" id="password">
		<div class="login-btn" onclick="login();">LOGIN</div>
	</div>
</div>
<footer class="footer">
	<p>© Ronda (Thailand) co.,ltd 2016 | Datalink version 1.0</p>
	<p class="mini">RONDA (Thailand) Co., Ltd. We are a subsidiary of a Swiss multinational company, one of the world's leading watch movement manufacturers.</p>
</footer>
</body>
</html>