<?php
include'config/autoload.php';

// Permission
if(!$user_online){
	header("Location: index.php");
	die();
}

// if(!empty($_GET['caliber'])){
// 	$caliber->getcaliber($_GET['caliber']);
// }

// if(!empty($_GET['operation_id'])){
// 	$caliber->getOperationRecipe($_GET['operation_id']);
// }

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
<script type="text/javascript" src="js/service/report.service.js"></script>

</head>
<body>
<?php include 'header.php';?>
<div class="container">
	<div class="head">
		<div class="head-title">
			<h1>HEADER REPORT</h1>
		</div>
		<div class="tab">
			<a href="caliber_code.php?caliber=<?php echo $caliber->id;?>" class="tab-items items-right cancel">Cancel<i class="fa fa-times"></i></a>
		</div>
	</div>

	<div class="form-container">
		<h3>CREATE HEADER REPORT</h3>
		<input type="text" id="line_no" placeholder="line_no" value="14">
		<input type="text" id="line_type" placeholder="line_type" value="AD">
		<input type="text" id="shift" placeholder="shift" value="A">
		<input type="text" id="no_monthly_emplys" placeholder="no_monthly_emplys" value="30">
		<input type="text" id="no_daily_emplys" placeholder="no_daily_emplys" value="7">
		<input type="text" id="ttl_monthly_hrs" placeholder="ttl_monthly_hrs" value="4.6">
		<input type="text" id="ttl_daily_hrs" placeholder="ttl_daily_hrs" value="7.9">
		<input type="text" id="ot_10" placeholder="OT 10" value="10">
		<input type="text" id="ot_15" placeholder="OT 15" value="15">
		<input type="text" id="ot_20" placeholder="OT 20" value="20">
		<input type="text" id="ot_30" placeholder="OT 30" value="30">
		<input type="text" id="losttime_vac" placeholder="losttime_vac" value="1">
		<input type="text" id="losttime_sick" placeholder="losttime_sick" value="2">
		<input type="text" id="losttime_abs" placeholder="losttime_abs" value="33">
		<input type="text" id="losttime_mat" placeholder="losttime_mat" value="3">
		<input type="text" id="losttime_other" placeholder="losttime_other" value="4">
		<input type="text" id="downtime_mc" placeholder="downtime_mc" value="5">
		<input type="text" id="downtime_mat" placeholder="downtime_mat" value="6">
		<input type="text" id="downtime_fac" placeholder="downtime_fac" value="7">
		<input type="text" id="sort_local" placeholder="sort_local" value="8">
		<input type="text" id="sort_oversea" placeholder="sort_oversea" value="9">
		<input type="text" id="rework_local" placeholder="rework_local" value="10">
		<input type="text" id="rework_oversea" placeholder="rework_oversea" value="11">

		<?php if(empty($caliber->opt_id)){?>
		<div class="submit-btn" onclick="javascript:createHeaderReport();">Create</div>
		<?php }else{?>
		<div class="submit-btn" onclick="javascript:editHeaderReport(<?php echo $caliber->opt_id;?>);">SAVE</div>
		<?php }?>
	</div>
</div>

<div class="loading-box" id="loading-box">
	<div class="dialog">
		<div class="icon"><i class="fa fa-circle-o-notch fa-spin"></i></div>
		<p id="loading-message"></p>
	</div>
</div>
</body>
</html>