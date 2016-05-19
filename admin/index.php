<?php include'config/autoload.php';?>
<?php
if(!$user_online){
	header("Location: login.php");
	die();
}


$current_page['1'] = 'home';
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

<title>DATA LINK</title>

<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>

</head>
<body>
<?php include'header.php';?>
<div class="container">
	<div class="head">
		<div class="head-title">
			<h1>Hi, <?php echo $user->fname;?></h1>
			<p>Describes the procedure used to send Message Queuing test messages, for IT professionals.</p>
		</div>
	</div>
</div>
</body>
</html>