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
<title><?php echo $caliber->name;?> --> <?php echo $report->report_date;?></title>

<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/lib/jquery.form.min.js"></script>

</head>
<body>

<form class="form" id="ReportDetail" action="report.detail.process.php" method="post" enctype="multipart/form-data">
<header class="header">
	<!-- <a href="report_detail.php?header=<?php echo $report->id;?>" class="header-items back-btn"><i class="fa fa-angle-left" aria-hidden="true"></i>Back</a> -->
	<a href="report_detail.php?header=<?php echo $report->id;?>">
	<div class="header-items page-title"><strong><?php echo $caliber->name;?></strong> <i class="fa fa-long-arrow-right" aria-hidden="true"></i><strong><?php echo $report->report_date;?></strong></div>
	</a>

	<?php if($_GET['action'] == 'edit'){?>
	<button type="submit" class="submit-btn"><span id="btn-icon"><i class="fa fa-check" aria-hidden="true"></i></span><span id="btn-caption">Update</span></button>
	<?php }else{?>
	<button type="submit" class="submit-btn"><span id="btn-icon"><i class="fa fa-plus" aria-hidden="true"></i></span><span id="btn-caption">Add to Report</span></button>
	<?php }?>
</header>
<div class="container">
	<div class="operation-form-container">
		<div class="operation-items topic-fix">
			<div class="col1">Operation</div>
			<div class="col4">Input</div>
			<div class="col2">Good</div>
			<div class="col3">Reject</div>
			<div class="col5">Remark</div>
		</div>

		<div class="operations">
			<?php
			if($_GET['action'] == 'edit')
				$report->listDetailReport($_GET['report'],array('type' => 'operation-form-items'));
			else
				$caliber->listOperationInRoute($caliber->id,array('type' => 'operation-form-items'));
			?>
		</div>
		<input type="hidden" id="header_id" name="header_id" value="<?php echo $_GET['header'];?>">
		<input type="hidden" id="caliber_name" value="<?php echo $caliber->code.$caliber->family?>">
		<input type="hidden" id="action" value="<?php echo $_GET['action'];?>">

		<input type="hidden" name="header_id" value="<?php echo $report->id;?>">
		<input type="hidden" name="caliber_id" value="<?php echo $caliber->id;?>">
		<input type="hidden" name="route_id" value="<?php echo $caliber->route_id;?>">
		<input type="hidden" name="std_id" value="<?php echo $caliber->std_id;?>">
		<input type="hidden" name="std_time" value="<?php echo $caliber->std_time;?>">
		<input type="hidden" name="report_id" value="<?php echo $_GET['report'];?>">
	</div>
	<div class="note">
		Note: This caliber (<?php echo $caliber->name;?>) has <strong><?php echo $caliber->route_name;?></strong> in Primary route and standard time <strong><?php echo number_format($caliber->std_time,2);?> Hrs/K.</strong>
	</div>

	<div class="control-container">
		<?php if($_GET['action'] == 'edit' && !empty($_GET['report'])){?>
		You can <span class="delete-btn" onclick="javascript:deleteHeadReport(<?php echo $report->id;?>,<?php echo $_GET['report'];?>,'<?php echo $caliber->code;?> <?php echo $caliber->family;?>');">Delete <i class="fa fa-trash" aria-hidden="true"></i></span> your caliber (<?php echo $caliber->name;?>) from daily report.
		<?php }?>
	</div>
</div>
</form>

<div class="loading-box" id="loading-box">
	<div class="dialog">Please wait a moment.</div>
</div>

<script type="text/javascript" src="js/service/report.service.js"></script>
<script type="text/javascript" src="js/report_detail.js"></script>
</body>
</html>