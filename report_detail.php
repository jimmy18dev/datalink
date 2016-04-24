<?php include'config/autoload.php';?>
<?php
if(!$user_online){
	header("Location: login.php");
	die();
}

if(!empty($_GET['header'])){
	$report->getHeader($_GET['header']);
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
			<h1><?php echo $report->create_time;?></h1>
			<p>Describes the procedure used to send Message Queuing test messages, for IT professionals.</p>
		</div>

		<div class="tab">
			<a href="report_header_editor.php?" class="tab-items items-right">New Report<i class="fa fa-angle-right"></i></a>
		</div>
	</div>

	<!-- Table -->
	<div class="topic-fix">
		<div class="report-header-topic-fix">
			<div class="col1">Date</div>
			<div class="col2">LINE NO.</div>
			<div class="col3">SHIFT</div>
			<div class="col4">Daily Prs (Hrs.)</div>
			<div class="col5">Month Prs (Hrs.)</div>
			<div class="col6">Update</div>
			<div class="col7">Leader</div>
		</div>
	</div>
	<div class="list">
		<?php $report->listAllCalibers($report->id,array('type' => 'report-caliber-items'));?>
	</div>

	<div>
		<?php
		// $report->createDetail(34,23,234,10,10,2333,'remark message',34,344,34.54,221,23.54);
		?>
	</div>
</div>
</body>
</html>