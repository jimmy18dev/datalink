<?php include'config/autoload.php';?>
<?php
if(!$user_online){
	header("Location: login.php");
	die();
}else if($user->status == 'deactive'){
	header("Location: profile.php");
	die();
}

if(!empty($_GET['header'])){
	$report->getHeader($_GET['header']);

	if($report->status == 'deleted'){
		header("Location: error_deleted.php?");
		die();
	}

	$useractivity->saveActivity($user->id,'ViewHeaderReport','View header report at '.$report->report_date,$report->id);
}else{
	header("Location: index.php?error=header_is_empty!");
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

<?php include'favicon.php';?>
<title><?php echo $report->date;?></title>

<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

</head>
<body>
<?php include'header.php';?>
<div class="container">
	<div class="head">
		<div class="head-title">
			<h1><?php echo $report->date;?></h1>
			<p>Leader: <strong><?php echo $report->leader_name;?></strong></p>
		</div>
	</div>

	<div class="list-container">
		<p class="topic">1. Manpower:</p>
		<div class="report-stat">
			<div class="stat-items">
				<div class="v">LINE <?php echo $report->line_no;?></div>
				<div class="k"><strong>Shift <?php echo $report->shift;?></strong>, Updated <?php echo $report->update;?></div>
			</div>
			<div class="stat-items">
				<div class="v"><?php echo $report->ttl_monthly_hrs;?></div>
				<div class="k"><?php echo $report->no_monthly_emplys;?> Monthly Prs<i class="fa fa-user" aria-hidden="true"></i></div>
			</div>
			<div class="stat-items">
				<div class="v"><?php echo $report->ttl_daily_hrs;?></div>
				<div class="k"><?php echo $report->no_daily_emplys;?> Daily Prs<i class="fa fa-user" aria-hidden="true"></i></div>
			</div>

			<div class="stat-items">
				<div class="v"><?php echo number_format($report->yield,2);?> %</div>
				<div class="k">Yield</div>
			</div>

			<div class="stat-items">
				<div class="v"><?php echo number_format($report->product_eff,2);?> %</div>
				<div class="k">Product EFF<i class="fa fa-bolt" aria-hidden="true"></i></div>
			</div>
			<div class="stat-items">
				<div class="v"><?php echo number_format($report->ttl_eff,2);?> %</div>
				<div class="k">Total EFF<i class="fa fa-bolt" aria-hidden="true"></i></div>
			</div>

			<div class="stat-items">
				<div class="v"><?php echo number_format($report->target_yield,2);?> %</div>
				<div class="k">Target Yield<i class="fa fa-crosshairs" aria-hidden="true"></i></div>
			</div>

			<div class="stat-items">
				<div class="v"><?php echo number_format($report->target_eff,2);?> %</div>
				<div class="k">Target EFF<i class="fa fa-crosshairs" aria-hidden="true"></i></div>
			</div>
		</div>

		<div class="header-report-table">
			<div class="box box1">
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

			<div class="box box2">
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

			<div class="box box3">
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

			<div class="box box4">
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

			<div class="box box5">
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
		</div>

		<p class="topic">2. Output:</p>
		<div class="container-box">
			<?php $report->listAllCalibers($report->id,array('type' => 'report-caliber-items','header_id' => $report->id));?>
		</div>
	</div>
</div>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/service/min/report.service.min.js"></script>

</body>
</html>