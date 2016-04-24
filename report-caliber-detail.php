<?php include'config/autoload.php';?>
<?php
if(!$user_online){
	header("Location: login.php");
	die();
}

if(!empty($_GET['header'])){
	$report->getHeader($_GET['header']);
}

// current page
$current_page['1'] = 'report';
$current_page['2'] = 'report_detail';
$current_page['3'] = 'report_caliber_detail';
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
			<h1>Report Detail in Caliber ID: <?php echo $_GET['caliber'];?></h1>
			<p>Describes the procedure used to send Message Queuing test messages, for IT professionals.</p>
		</div>

		<div class="tab">
			<a href="report_header_editor.php?" class="tab-items items-right">New Report<i class="fa fa-angle-right"></i></a>
		</div>
	</div>
	
	<div class="list-container">
		<div class="report-caliber-detail-items topic-fix">
			<div class="col1">Name</div>
			<div class="col2">Good</div>
			<div class="col3">Reject</div>
			<div class="col4">Product eff</div>
			<div class="col5">ttl eff</div>
			<div class="col6">Std time</div>
			<div class="col7">Output</div>
			<div class="col8">Required hrs</div>
			<div class="col9">Remark</div>
		</div>

		<?php $report->listAllOperations(1,1,array('type' => 'report-caliber-detail-items'));?>
	</div>
</div>
</body>
</html>