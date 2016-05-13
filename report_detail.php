<?php include'config/autoload.php';?>
<?php
if(!$user_online){
	header("Location: login.php");
	die();
}

if(!empty($_GET['header'])){
	$report->getHeader($_GET['header']);
}

// current page
$current_page['1'] = 'report';
$current_page['2'] = 'report_detail';
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

<title>DATA LINK</title>

<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/service/report.service.js"></script>

</head>
<body>
<?php include'header.php';?>
<div class="container">
	<div class="head">
		<div class="head-title">
			<h2>Daily output report of Line no.<strong><?php echo $report->line_no;?></strong> (Shift: <?php echo $report->shift;?>)</h2>
			<h1><?php echo $report->date;?></h1>
			<p>Leader: <strong><?php echo $report->leader_name;?></strong> · <span title="<?php echo $report->update_time;?>"><i class="fa fa-clock-o" aria-hidden="true"></i> updated <?php echo $report->update;?></span><?php if($user->id == $report->leader_id){?> · <a href="report_header_editor.php?header=<?php echo $report->id;?>">Edit Report<i class="fa fa-angle-right"></i></a><?php }?></p>

			<div class="btn">
				<a href="report_detail_editor_choose_caliber.php?header=<?php echo $report->id;?>" class="btn-create">Add caliber code<i class="fa fa-plus"></i></a>
			</div>
		</div>
	</div>

	<div class="list-container">
		<p class="topic"><strong>1. Manpower:</strong></p>
		<p><?php echo $report->no_monthly_emplys;?> Monthly Prs (<?php echo $report->ttl_monthly_hrs;?> Hrs.), <?php echo $report->no_daily_emplys;?> Daily Prs (<?php echo $report->ttl_daily_hrs;?> Hrs) Product EFF: <?php echo $report->product_eff;?>% Total EFF: <?php echo $report->ttl_eff;?>%</p>
		<div class="header-report-table">
			<div class="box1">
				<div class="box-topic">OT</div>
				<div class="col">
					<div class="col-caption">1.0</div>
					<div class="col-val"><?php echo $report->ot_10;?></div>
				</div>
				<div class="col">
					<div class="col-caption">1.5</div>
					<div class="col-val"><?php echo $report->ot_15;?></div>
				</div>
				<div class="col">
					<div class="col-caption">2.0</div>
					<div class="col-val"><?php echo $report->ot_20;?></div>
				</div>
				<div class="col">
					<div class="col-caption">3.0</div>
					<div class="col-val"><?php echo $report->ot_30;?></div>
				</div>
			</div>

			<div class="box2">
				<div class="box-topic">Lost time</div>
				<div class="col">
					<div class="col-caption">Vac</div>
					<div class="col-val"><?php echo $report->losttime_vac;?></div>
				</div>
				<div class="col">
					<div class="col-caption">Sick</div>
					<div class="col-val"><?php echo $report->losttime_sick;?></div>
				</div>
				<div class="col">
					<div class="col-caption">Abs</div>
					<div class="col-val"><?php echo $report->losttime_abs;?></div>
				</div>
				<div class="col">
					<div class="col-caption">Mat</div>
					<div class="col-val"><?php echo $report->losttime_mat;?></div>
				</div>
				<div class="col">
					<div class="col-caption">Oth</div>
					<div class="col-val"><?php echo $report->losttime_other;?></div>
				</div>
			</div>

			<div class="box3">
				<div class="box-topic">Down time</div>
				<div class="col">
					<div class="col-caption">M/C</div>
					<div class="col-val"><?php echo $report->downtime_mc;?></div>
				</div>
				<div class="col">
					<div class="col-caption">Mat</div>
					<div class="col-val"><?php echo $report->downtime_mat;?></div>
				</div>
				<div class="col">
					<div class="col-caption">Fac</div>
					<div class="col-val"><?php echo $report->downtime_fac;?></div>
				</div>
				<div class="col">
					<div class="col-caption">Other</div>
					<div class="col-val"><?php echo $report->downtime_other;?></div>
				</div>
			</div>

			<div class="box4">
				<div class="box-topic">Sort</div>
				<div class="col">
					<div class="col-caption">Loc</div>
					<div class="col-val"><?php echo $report->sort_local;?></div>
				</div>
				<div class="col">
					<div class="col-caption">Ove</div>
					<div class="col-val"><?php echo $report->sort_oversea;?></div>
				</div>
			</div>

			<div class="box5">
				<div class="box-topic">Rework</div>
				<div class="col">
					<div class="col-caption">Loc</div>
					<div class="col-val"><?php echo $report->rework_local;?></div>
				</div>
				<div class="col">
					<div class="col-caption">Ove</div>
					<div class="col-val"><?php echo $report->rework_oversea;?></div>
				</div>
			</div>
		</div>

		<p class="topic"><strong>2. Output</strong></p>
		<div class="container-box">
			<?php $report->listAllCalibers($report->id,array('type' => 'report-caliber-items','header_id' => $report->id));?>
		</div>
	</div>
</div>
</body>
</html>