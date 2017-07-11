<?php
include'config/autoload.php';
include'config/authorization.php';

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
<div class="topbar">
	<a class="title" href="header_report.php"><i class="fa fa-file-text-o" aria-hidden="true"></i>Header Reports</a>

	<?php if(!empty($_GET['date'])){?>
	<div class="title"><?php echo $_GET['date'];?></div>
	<?php }?>
	<div class="title"><?php echo $report->date;?></div>
	<a class="btn -download-pdf" id="btn-pdf-export" href="pdf/daily-<?php echo $report->report_filename.'-'.$report->line_no.''.$report->shift;?>.pdf" target="_blank">Download PDF<i class="fa fa-arrow-circle-down" aria-hidden="true"></i></a>
</div>

<div class="container">
	<div class="list-container">
		<div class="page">
			<h2>1. Manpower: <span class="date">Updated <?php echo $report->update;?> By <strong><?php echo $report->leader_name;?></strong></span></h2>
			<div class="report-stat">
				<div class="stat-items">
					<div class="v">LINE <?php echo $report->line_no;?></div>
					<div class="k"><strong>Shift <?php echo $report->shift;?></strong></div>
				</div>
				<div class="stat-items">
					<div class="v"><?php echo $report->ttl_monthly_hrs;?></div>
					<div class="k"><strong><?php echo $report->no_monthly_emplys;?></strong> Monthly Prs</div>
				</div>
				<div class="stat-items">
					<div class="v"><?php echo $report->ttl_daily_hrs;?></div>
					<div class="k"><strong><?php echo $report->no_daily_emplys;?></strong> Daily Prs</i></div>
				</div>

				<div class="stat-items">
					<div class="v"><?php echo number_format($report->yield,2);?><span class="unit">%</span></div>
					<div class="k">Yield</div>
				</div>

				<div class="stat-items">
					<div class="v"><?php echo number_format($report->product_eff,2);?><span class="unit">%</span></div>
					<div class="k">Product EFF</div>
				</div>
				<div class="stat-items">
					<div class="v"><?php echo number_format($report->ttl_eff,2);?><span class="unit">%</span></div>
					<div class="k">Total EFF</div>
				</div>

				<div class="stat-items">
					<div class="v"><?php echo number_format($report->target_yield,2);?><span class="unit">%</span></div>
					<div class="k">Target Yield</div>
				</div>

				<div class="stat-items">
					<div class="v"><?php echo number_format($report->target_eff,2);?><span class="unit">%</span></div>
					<div class="k">Target EFF</div>
				</div>
			</div>

			<div class="header-report-table">
				<div class="box box1">
					<div class="box-topic">Over time</div>
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
					<div class="box-topic">Lost time</div>
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
					<div class="box-topic">Down time</div>
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
					<div class="box-topic">Sort</div>
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
					<div class="box-topic">Rework</div>
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

			<h2>2. Output:</h2>
			<div class="caliber-container">
				<?php $report->listAllCalibers($report->id,array('type' => 'report-caliber-items','header_id' => $report->id));?>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/service/min/report.service.min.js"></script>
<script>
$(document).ready(function(){
	dailyreport_to_pdf(<?php echo $report->id;?>);
});
</script>

</body>
</html>