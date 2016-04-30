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
			<h1>Daily output report</h1>
			<p>Describes the procedure used to send Message Queuing test messages, for IT professionals.</p>
		</div>

		<div class="tab">
			<a href="report_header_editor.php?" class="btn-right create">New report<i class="fa fa-angle-right"></i></a>
		</div>
	</div>

	<div class="list-container">
		<div class="report-header-items topic-fix">
			<div class="col1"><i class="fa fa-calendar" aria-hidden="true"></i> Date</div>
			<div class="col2">LINE</div>
			<div class="col3">SHIFT</div>
			<div class="col4">Daily Prs (Hrs.)</div>
			<div class="col5">Month Prs (Hrs.)</div>
			<div class="col6">OT 1.0</div>
			<div class="col7">OT 1.5</div>
			<div class="col8">OT 2.0</div>
			<div class="col9">OT 3.0</div>
			<div class="col10"><i class="fa fa-clock-o"></i> Updated</div>
			<div class="col11"><i class="fa fa-user" aria-hidden="true"></i> Leader</div>
		</div>

		<?php $report->listAllHeaders(array('type' => 'report-header-items'));?>
	</div>
</div>
</body>
</html>