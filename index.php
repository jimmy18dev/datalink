<?php include'config/autoload.php';?>
<?php
if(!$user_online){
	header("Location: login.php");
	die();
}else if($user->status == 'deactive'){
    header("Location: profile.php");
    die();
}

// current page
$current_page['1'] = 'index';
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
<title>DATALINK</title>

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
	</div>

	<div class="list-container">
		<div class="report-header-items header-topic-fix">
			<div class="col1"><i class="fa fa-calendar" aria-hidden="true"></i> Date</div>
			<div class="col2">SHIFT</div>
			<div class="col3">Product EFF</div>
			<div class="col4">Total EFF</div>
			<div class="col5">Leader</div>
		</div>

		<?php $report->listAllHeader($user->line_default,array('type' => 'report-header-items','user_id' => $user->id));?>
	</div>
</div>
</body>
</html>