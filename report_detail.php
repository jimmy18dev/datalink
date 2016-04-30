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

</head>
<body>
<?php include'header.php';?>
<div class="container">
	<div class="head">
		<div class="head-title">
			<h1>วันที่ <?php echo $report->date;?>, NO.<?php echo $report->line_no;?>, Shift: <?php echo $report->shift;?></h1>
			<p>Leader: <?php echo $report->leader_name;?> <span title="<?php echo $report->update_time;?>">อัพเดท <?php echo $report->update;?></span> | <a href="report_header_editor.php?header=<?php echo $report->id;?>">[แก้ไข]</a></p>
		</div>

		<div class="header-report-table">
			<p><strong>Manpower:</strong> <?php echo $report->no_monthly_emplys;?> Monthly Prs (<?php echo $report->ttl_monthly_hrs;?> Hrs.), <?php echo $report->no_daily_emplys;?> Daily Prs (<?php echo $report->ttl_daily_hrs;?> Hrs)</p>

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

		<div class="tab">
			<a href="report_detail_editor_choose_caliber.php?header=<?php echo $report->id;?>" class="btn-right create">Add report<i class="fa fa-angle-right"></i></a>
		</div>
	</div>

	<div class="list-container">
		<div class="caliber-items topic-fix">
			<div class="col1">Caliber</div>
			<div class="col2">ROUTE</div>
			<div class="col3">Std.time (Hrs/K)</div>
			<div class="col4">Description</div>
		</div>

		<?php $report->listAllCalibers($report->id,array('type' => 'report-caliber-items','header_id' => $report->id));?>
	</div>
</div>
</body>
</html>