<?php
include'config/autoload.php';

if(!$user_online){
	header("Location: login.php");
	die();
}else if(empty($_GET['header'])){
	header("Location: index.php?error=header_is_empty!");
	die();
}else if(!empty($_GET['header'])){
	$report->getHeader($_GET['header']);

	if($report->status == 'deleted'){
		header("Location: error_deleted.php?");
		die();
	}else if($user->id != $report->leader_id || !$report->can_edit){
		header("Location: error_permission.php?error=you_don't_have_permission!");
		die();
	}	
}

// current page
$current_page['1'] = 'report_detail';
$current_page['2'] = 'choose_caliber';
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

<title>Choose Caliber Code...</title>

<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/lib/jquery.form.min.js"></script>
<script type="text/javascript" src="js/service/report.service.js"></script>

</head>
<body>
<?php include 'header.php';?>
<div class="container">
	<div class="head">
		<div class="head-title">
			<h1>Choose Caliber Code...</h1>
			<p><i class="fa fa-angle-double-down" aria-hidden="true"></i></p>
		</div>
	</div>

	<!-- Table -->
	<div class="list-container">
		<?php $caliber->listAllCalibers(array('type' => 'caliber-choose-items','header_id' => $_GET['header']));?>
	</div>
</div>

<script type="text/javascript" src="js/report_detail.js"></script>
</body>
</html>