<?php include'config/autoload.php';?>
<?php
// Permission
if(!$user_online){
	header("Location: index.php");
	die();
}

// current page
$current_page['1'] = 'caliber';
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
<meta http-equiv="refresh" content="60">

<title>Caliber Code</title>

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
			<h1>Caliber Code</h1>
			<p>a system of words, letters, figures, or other symbols substituted for other words, letters, etc., especially for the purposes of secrecy.</p>
		</div>

		<div class="tab">
			<div class="tab-items tab-items-active">All</div>
			<a href="caliber_editor.php" class="tab-items items-right">New <i class="fa fa-angle-right"></i></a>
		</div>
	</div>
	<!-- Table -->
	<div class="topic-fix">
		<div class="caliber-topic-fix">
			<div class="col1">Caliber</div>
			<div class="col2">Std.time (Hrs/K)</div>
			<div class="col3">Description</div>
		</div>
	</div>
	<div class="list">
		<?php $caliber->listAllCaliber(array('type' => 'caliber-items'));?>
	</div>
</div>
</body>
</html>