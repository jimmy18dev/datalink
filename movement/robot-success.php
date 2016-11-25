<?php
include'config/autoload.php';
$report->updateNormal();
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
<title>Robot 1.0 - Successful!</title>

<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>

</head>
<body>
<div class="robot">
	<div class="head">
		<h1>Robot 1.0</h1>
		<p><a href="robot-progress.php">Start update again <i class="fa fa-angle-right" aria-hidden="true"></i></a></p>
	</div>
	<div class="start">
		<div class="success">Successful<i class="fa fa-check" aria-hidden="true"></i></div>
	</div>
</div>
</body>
</html>