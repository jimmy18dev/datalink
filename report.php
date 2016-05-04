<?php include'config/autoload.php';?>
<?php
if(!$user_online){
	header("Location: login.php");
	die();
}

// current page
$current_page['1'] = 'report';
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
			<h1>Weekly efficiency report</h1>
			<p>Ronda Thailand: Movement Assembly</p>
		</div>

		<div class="tab">
			<a href="report_header_editor.php?" class="btn-right create">New report<i class="fa fa-angle-right"></i></a>
		</div>
	</div>

	<div class="list-container">
		<div class="weekly-eff-items topic-fix">
			<div class="col1">Caliber</div>
			<div class="col2">Std. time (Hrs/K)</div>
			<div class="col3">Qty. Turn-in (K)</div>
			<div class="col4">Std. Hrs Earned (Hrs)</div>
		</div>

		<?php $report->listEfficencyReport(array('type' => 'weekly-eff-items'));?>
	</div>
</div>
</body>
</html>