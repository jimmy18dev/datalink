<?php
include'config/autoload.php';
// Permission
$user_online = $user->sessionOnline();
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
<title>DATALINK <?php echo $meta['dev']['version'];?></title>

<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

</head>
<body class="bg">
<div class="filter"></div>
<div class="login-container">
	<div class="login-detail">
		<div class="context">
			<h1>DATALINK</h1>
			<p>Version <strong class="version"><?php echo $meta['dev']['version'];?></strong></p>
			<br>
			<p>The username and password to log into Datalink Panel can be found in your email. If you do not have the correct login credentials, please contact Administrator via phone or live chat</p>
		</div>
	</div>
	<div class="login-input">
		<form class="input-form" action="javascript:login();">
			<?php if($_GET['error'] == 'not_match'){?>
			<p class="alert">Username and password do not match!</p>
			<?php }?>

			<p>Enter your username and password.</p>
			<input type="text" class="input-text" id="username" placeholder="Username" autofocus autocomplete="off">
			<input type="password" class="input-text" placeholder="Password" id="password">

			<button type="submit" id="submit-btn" class="submit-btn"><span id="btn-caption">LOGIN</span><span id="btn-icon"><i class="fa fa-angle-right"></i></span></button>
		</form>
	</div>
</div>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/service/min/user.service.min.js"></script>
</body>
</html>