<?php include'config/autoload.php';?>
<?php
if(!$user_online){
	header("Location: login.php");
	die();
}

if(!empty($_GET['header'])){
	$report->getHeader($_GET['header']);

	if($report->status == 'deleted'){
		header("Location: error_deleted.php?");
		die();
	}
}else{
	header("Location: index.php?error=header_is_empty!");
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
<title><?php echo $report->report_date;?> : [ <?php echo $report->line_no;?> ] [ <?php echo $report->shift;?> ]</title>

<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/service/report.service.js"></script>

</head>
<body>
<header class="header">
	<div class="header-items">
		<div class="topic"><?php echo $report->report_full_date;?></div>
		<div class="caption">Line No.<strong><?php echo $report->line_no;?></strong> · Shift <strong><?php echo $report->shift;?></strong> · Updated <strong><?php echo $report->update_facebook_format;?></strong> Leader <strong><?php echo $report->leader_name;?></strong></div>
	</div>
	<a class="btn" href="report_header_editor.php?action=create"><i class="fa fa-plus" aria-hidden="true"></i>New report</a>
</header>
<?php include'navigator.php';?>
<div class="report-detail-container">

	<!-- Report control (Edit or Lock) -->
	<div class="report-control">
		<?php if($user->id == $report->leader_id && $report->can_edit){?>
		<a href="report_header_editor.php?header=<?php echo $report->id;?>&action=edit" class="report-btn"><i class="fa fa-file-text-o" aria-hidden="true"></i>Edit this Report</a>
		<?php }else{?>
		<div class="report-btn -lock"><i class="fa fa-lock" aria-hidden="true"></i>Lock!</div>
		<?php }?>
	</div>

	<!-- 1. Manpower -->
	<div class="topic-container">
		<div class="title">1. Manpower: <span class="target">Target EFF = <strong><?php echo number_format($report->target_eff,2);?>%</strong> , Target Yield = <strong><?php echo number_format($report->target_yield,2);?>%</strong></span></div>
	</div>
	
	<div class="report-stat">
		<div class="stat-items stat-items-highlight">
			<div class="v">Shift <?php echo $report->shift;?></div>
			<div class="k">LINE <?php echo $report->line_no;?> (<?php echo $report->line_type;?>)</div>
		</div>

		<div class="stat-items">
			<div class="v"><?php echo number_format($report->product_eff,2);?>%</div>
			<div class="k">Product EFF</div>
		</div>
		<div class="stat-items">
			<div class="v"><?php echo number_format($report->ttl_eff,2);?>%</div>
			<div class="k">Total EFF</div>
		</div>

		<div class="stat-items">
			<div class="v"><?php echo number_format($report->yield,2);?>%</div>
			<div class="k">Yield</div>
		</div>

		<div class="stat-items">
			<div class="v"><?php echo $report->ttl_monthly_hrs;?></div>
			<div class="k"><strong>Monthly</strong> Normal Hour</div>
		</div>
		<div class="stat-items">
			<div class="v"><?php echo $report->no_monthly_emplys;?></div>
			<div class="k"><strong>Monthly</strong> Prs</div>
		</div>
		<div class="stat-items">
			<div class="v"><?php echo $report->no_daily_emplys;?></div>
			<div class="k"><strong>Daily</strong> Prs</div>
		</div>
		<div class="stat-items">
			<div class="v"><?php echo $report->ttl_daily_hrs;?></div>
			<div class="k"><strong>Daily</strong> Normal Hour</div>
		</div>
	</div>

	<div class="header-report-table">
		<div class="box">
			<div class="box-topic">Lost time<i class="fa fa-plug" aria-hidden="true"></i></div>
			<div class="col">
				<div class="col-val"><?php echo number_format($report->losttime_vac,2);?></div>
				<div class="col-caption">Vac</div>
			</div>
			<div class="col">
				<div class="col-val"><?php echo number_format($report->losttime_sick,2);?></div>
				<div class="col-caption">Sick</div>
			</div>
			<div class="col">
				<div class="col-val"><?php echo number_format($report->losttime_abs,2);?></div>
				<div class="col-caption">Abs</div>
			</div>
			<div class="col">
				<div class="col-val"><?php echo number_format($report->losttime_mat,2);?></div>
				<div class="col-caption">Mat</div>
			</div>
			<div class="col">
				<div class="col-val"><?php echo number_format($report->losttime_other,2);?></div>
				<div class="col-caption">Other</div>
			</div>
		</div>
			
		<div class="box">
			<div class="box-topic">Over time<i class="fa fa-history" aria-hidden="true"></i></div>
			<div class="col">
				<div class="col-val"><?php echo number_format($report->ot_10,2);?></div>
				<div class="col-caption">1.0</div>
			</div>
			<div class="col">
				<div class="col-val"><?php echo number_format($report->ot_15,2);?></div>
				<div class="col-caption">1.5</div>
			</div>
			<div class="col">
				<div class="col-val"><?php echo number_format($report->ot_20,2);?></div>
				<div class="col-caption">2.0</div>
			</div>
			<div class="col">
				<div class="col-val"><?php echo number_format($report->ot_30,2);?></div>
				<div class="col-caption">3.0</div>
			</div>
		</div>

		<div class="box">
			<div class="box-topic">Down time<i class="fa fa-exclamation-triangle" aria-hidden="true"></i></div>
			<div class="col">
				<div class="col-val"><?php echo number_format($report->downtime_mc,2);?></div>
				<div class="col-caption">M/C</div>
			</div>
			<div class="col">
				<div class="col-val"><?php echo number_format($report->downtime_mat,2);?></div>
				<div class="col-caption">Mat</div>
			</div>
			<div class="col">
				<div class="col-val"><?php echo number_format($report->downtime_fac,2);?></div>
				<div class="col-caption">Fac</div>
			</div>
			<div class="col">
				<div class="col-val"><?php echo number_format($report->downtime_other,2);?></div>
				<div class="col-caption">Other</div>
			</div>
		</div>

		<div class="box">
			<div class="box-topic">Sort<i class="fa fa-sort-amount-asc" aria-hidden="true"></i></div>
			<div class="col">
				<div class="col-val"><?php echo number_format($report->sort_local,2);?></div>
				<div class="col-caption">Loc</div>
			</div>
			<div class="col">
				<div class="col-val"><?php echo number_format($report->sort_oversea,2);?></div>
				<div class="col-caption">Ove</div>
			</div>
		</div>

		<div class="box">
			<div class="box-topic">Rework<i class="fa fa-recycle" aria-hidden="true"></i></div>
			<div class="col">
				<div class="col-val"><?php echo number_format($report->rework_local,2);?></div>
				<div class="col-caption">Loc</div>
			</div>
			<div class="col">
				<div class="col-val"><?php echo number_format($report->rework_oversea,2);?></div>
				<div class="col-caption">Ove</div>
			</div>
		</div>

		<?php if(!empty($report->remark)){?>
		<div class="remark">
			<div class="caption">Remark</div>
			<div class="message"><?php echo $report->remark;?></div>
		</div>
		<?php }?>
	</div>

	<!-- 2. Output -->
	<div class="topic-container">
		<div class="title">2. Output: <?php echo $report->total_caliber;?> Calibers <?php if($user->id == $report->leader_id && $report->can_edit){?><a href="report_detail_editor_choose_caliber.php?header=<?php echo $report->id;?>" class="create-btn"><i class="fa fa-plus" aria-hidden="true"></i>ADD CALIBER CODE</a><?php }?></div>
	</div>	
	<div class="container-box">
		<?php $report->listCaliberInReport($report->id,array('type' => 'report-caliber-items','header_id' => $report->id,'can_edit' => $report->can_edit));?>
	</div>

	<!-- 3. Turn to 24-48 Hrs. -->
	<div class="topic-container">
		<div class="title">3. Turn to 24-48 Hrs. <?php if($user->id == $report->leader_id && $report->can_edit){?>
			<a href="report_detail_turn_to_choose_caliber.php?header=<?php echo $report->id;?>" class="create-btn"><i class="fa fa-plus" aria-hidden="true"></i>Add Turn To</a><?php }?></div>
		</div>
	
	<div class="turn-to-list">
		<?php $report->listAllTurnTo($report->id,array('type' => 'turn-to-items'));?>
	</div>
</div>

<script type="text/javascript" src="js/min/auto_hidden.min.js"></script>
</body>
</html>