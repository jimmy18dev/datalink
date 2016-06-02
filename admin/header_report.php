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

<title>Weekly efficiency report</title>

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
			<h1>HEADER REPORT</h1>
			<p><?php echo 'Today is '.date('l');?></p>
		</div>
	</div>

	<div class="list-container">
		<?php if(empty($_GET['date'])){?>
		<?php $report->groupHeaderReport(array('type' => 'header-date-items'));?>
		<?php }else{?>
		<div class="items header-report-items topic-fix">
			<div class="col1">Line No.</div>
			<div class="col2">Shift</div>
			<div class="col3">Product EFF</div>
			<div class="col4">Total EFF</div>
			<div class="col5">Monthly Hrs</div>
			<div class="col6">Daily Hrs</div>
			<div class="col7">1.0</div>
			<div class="col8">1.5</div>
			<div class="col9">2.0</div>
			<div class="col10">3.0</div>
			<div class="col12">Updated</div>
			<div class="col13">Leader</div>
		</div>
		<div class="items-container">
			<?php $report->listHeaderReport($_GET['date'],array('type' => 'header-items'));?>
		</div>
		<?php }?>
	</div>
</div>
</body>
</html>