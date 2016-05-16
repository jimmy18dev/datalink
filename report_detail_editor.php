<?php
include'config/autoload.php';

// Permission
if(!$user_online){
	header("Location: index.php");
	die();
}

if(!empty($_GET['header'])){
	$report->getHeader($_GET['header']);
}

if(!empty($_GET['caliber'])){
	$caliber->getCaliber($_GET['caliber']);
}

// current page
$current_page['1'] = 'report_detail';
$current_page['2'] = 'choose_caliber';
$current_page['3'] = 'add_caliber';
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

<title><?php echo $caliber->code;?> <?php echo $caliber->family;?></title>

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

	<form class="form" id="ReportDetail" action="report.detail.process.php" method="post" enctype="multipart/form-data">
	<div class="operation-form-container">
		<div class="heads">
			<h3><?php echo $caliber->code;?> <?php echo $caliber->family;?></h3>
			<p>Route: <strong><?php echo $caliber->route_name;?></strong> · Std.Time: <strong><?php echo $caliber->hrs;?></strong> Hrs/K · <strong><?php echo $caliber->total_operation;?> Operations</strong></p>
		</div>
		<div class="operation-items topic-fix">
			<div class="col1">Operation</div>
			<div class="col2">Good</div>
			<div class="col3">Reject</div>
			<div class="col4">Output</div>
			<div class="col5">Remark</div>
		</div>

		<div class="operations">
			<?php
			if($_GET['action'] == 'edit'){
				$report->listDetailReport($_GET['header'],$caliber->id,array('type' => 'operation-form-items'));
			}else{
				$caliber->listOperationInRoute($caliber->id,array('type' => 'operation-form-items'));
			}
			?>
		</div>
		<input type="hidden" id="header_id" name="header_id" value="<?php echo $_GET['header'];?>">
	</div>
	<div class="control-container">
		<?php if($_GET['action'] == 'edit'){?>
		<div class="delete-btn" onclick="javascript:deleteCaliberReport(<?php echo $report->id;?>,<?php echo $caliber->id;?>,'<?php echo $caliber->code;?> <?php echo $caliber->family;?>');">
			Delete this Caliber</div>
			<button type="submit" class="btn submit-btn">Save</button>
		<?php }else{?>
		<button type="submit" class="btn submit-btn">Add to Report</button>
		<?php }?>
	</div>
	</form>
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