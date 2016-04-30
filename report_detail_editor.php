<?php
include'config/autoload.php';

// Permission
if(!$user_online){
	header("Location: index.php");
	die();
}

if(!empty($_GET['caliber'])){
	$caliber->getCaliber($_GET['caliber']);
}

// current page
$current_page['1'] = 'report';
$current_page['2'] = 'new_operation';
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

<title>Editor : Operation Recipe</title>

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
	<div class="form-container">
		<h3>Operations in <?php echo $caliber->route_name;?></h3>
		<form class="form" id="ReportDetail" action="report.detail.process.php" method="post" enctype="multipart/form-data">
			<div class="operation-items">
				<div class="col1">Operation name</div>
				<div class="col2">Good</div>
				<div class="col3">Reject</div>
				<div class="col4">Product eff</div>
				<div class="col5">ttl eff</div>
				<div class="col6">Std. Time</div>
				<div class="col7">Output</div>
				<div class="col8">Required Hrs</div>
			</div>

			<?php
			if(!empty($_GET['header_id'])){
				$report->listDetailReport($_GET['header_id'],$caliber->id,array('type' => 'operation-form-items'));
			}
			else{
				$caliber->listOperationInRoute($caliber->id,array('type' => 'operation-form-items'));
			}
			?>
			<input type="hidden" id="header_id" name="header_id" value="<?php echo $_GET['header'];?>">
			<button type="submit" class="submit-btn">SAVE<i class="fa fa-angle-right"></i></button>
		</form>
	</div>
</div>

<div class="loading-box" id="loading-box">
	<div class="dialog">
		<div class="icon"><i class="fa fa-circle-o-notch fa-spin"></i></div>
		<p id="loading-message"></p>
	</div>
</div>

<script type="text/javascript" src="js/report_detail.js"></script>
</body>
</html>