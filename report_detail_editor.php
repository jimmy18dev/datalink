<?php
include'config/autoload.php';

if(!$user_online){
	header("Location: login.php");
	die();
}else if($_GET['action'] != 'create' && $_GET['action'] != 'edit'){
	header("Location: index.php?error=action_is_not_validate!");
	die();
}else if(empty($_GET['caliber'])){
	header("Location: index.php?error=caliber_is_null!");
	die();
}else if(empty($_GET['header'])){
	header("Location: index.php?error=header_is_null!");
	die();
}else{
	$report->getHeader($_GET['header']);

	if($report->status == 'deleted'){
		header("Location: error_deleted.php?");
		die();
	}else if(($user->id != $report->leader_id && $_GET['action'] != 'create') || !$report->can_edit){
		// Leader authorization
		header("Location: error_permission.php?error=you_don't_have_permission!");
		die();
	}

	$caliber->getCaliber($_GET['caliber']);
	if(empty($caliber->id)){
		header("Location: index.php?error=caliber_is_null!");
		die();
	}
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

<?php include'favicon.php';?>
<title><?php echo $caliber->code;?> <?php echo $caliber->family;?></title>

<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/lib/jquery.form.min.js"></script>
<script type="text/javascript" src="js/service/report.service.js"></script>
<script type="text/javascript" src="js/report_detail.js"></script>

</head>
<body>

<form class="form" id="ReportDetail" action="report.detail.process.php" method="post" enctype="multipart/form-data">
<header class="header">
	<a href="index.php" class="header-items back-btn"><i class="fa fa-angle-left" aria-hidden="true"></i>Back</a>

	<?php if($_GET['action'] == 'edit'){?>
	<button type="submit" class="header-items submit-btn"><i class="fa fa-check" aria-hidden="true"></i>Save</button>
	<?php }else{?>
	<button type="submit" class="header-items submit-btn"><i class="fa fa-check" aria-hidden="true"></i>Add to Report</button>
	<?php }?>
</header>
<div class="container">
	<div class="head">
		<div class="head-title">
			<h1><?php echo $caliber->code;?> <?php echo $caliber->family;?></h1>
			<p>Route <strong><?php echo $caliber->route_name;?></strong> and standard time <strong><?php echo $caliber->hrs;?></strong> Hrs/K</p>
		</div>
	</div>
	<div class="operation-form-container">
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
		<div class="delete-btn" onclick="javascript:deleteCaliberReport(<?php echo $report->id;?>,<?php echo $caliber->id;?>,'<?php echo $caliber->code;?> <?php echo $caliber->family;?>');">Delete this caliber</div>
		<?php }?>
	</div>
</div>
</form>

<div class="loading-box" id="loading-box">
	<div class="dialog">
		<div class="icon"><i class="fa fa-circle-o-notch fa-spin"></i></div>
		<p id="loading-message"></p>
	</div>
</div>
</body>
</html>