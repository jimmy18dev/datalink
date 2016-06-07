<?php include'config/autoload.php';?>
<?php
if(!$user_online){
	header("Location: login.php");
	die();
}else if($user->status == 'deactive'){
	header("Location: profile.php");
	die();
}

// current page
$current_page['1'] = 'report';

// Get current day mouth year
$day 	= date('d');
$mouth 	= date('m');
$year 	= date('Y');

if(empty($_POST['s_year']) || empty($_POST['s_month']) || empty($_POST['s_day']) || empty($_POST['e_year']) || empty($_POST['e_month']) || empty($_POST['e_day'])){
	$date_validate = false;
}else{
	$s_timestamp = strtotime($_POST['s_year'].'-'.$_POST['s_month'].'-'.$_POST['s_day']);
	$e_timestamp = strtotime($_POST['e_year'].'-'.$_POST['e_month'].'-'.$_POST['e_day']);

	if($s_timestamp >= $e_timestamp){
		$date_validate = false;
	}else{
		$date_validate = true;
	}
}

$reportData = $report->getIdleTime($_POST['s_year'],$_POST['s_month'],$_POST['s_day'],$_POST['e_year'],$_POST['e_month'],$_POST['e_day']);
$toalReportData = $report->totalEfficencyReport($_POST['s_year'],$_POST['s_month'],$_POST['s_day'],$_POST['e_year'],$_POST['e_month'],$_POST['e_day']);

// Setup all variables
if($date_validate){
	$ttl_std_time 		= $toalReportData['total_stdtime'];
	$ttl_qty 			= $toalReportData['caliber_qty'];
	$ttl_earned 		= $toalReportData['earned'];
	$normal_time 		= $reportData['normal_time'];
	$over_time 			= $reportData['over_time'];
	$holidays 			= 0;
	$leaves 			= 0;
	$ttl_wage_hrs 		= $normal_time + $over_time + $holidays + $leaves;
	$ttl_idle_time 		= $reportData['ttl_idle_time'];
	$ttl_hrs 			= $normal_time + $over_time; // (4.2)
	$ttl_product_hrs 	= $ttl_hrs - $ttl_idle_time; // (4.1)
	$productive_eff 	= ($ttl_earned * 100) / $ttl_product_hrs; // (4.3)
	$ttl_eff 			= ($ttl_earned * 100) / $ttl_hrs; // (4.4)

	// $ttl_std_time 		= $toalReportData['total_stdtime'];
	// $ttl_qty 			= 237.500;
	// $ttl_earned 		= 13291.71;
	// $normal_time 		= 11060.52;
	// $over_time 			= 2121.85;
	// $holidays 			= 2304.00;
	// $leaves 			= 883.08;
	// $ttl_wage_hrs 		= $normal_time + $over_time + $holidays + $leaves;
	// $ttl_idle_time 		= 226.50;
	// $ttl_hrs 			= $normal_time + $over_time; // (4.2)
	// $ttl_product_hrs 	= $ttl_hrs - $ttl_idle_time; // (4.1)
	// $productive_eff 	= ($ttl_earned * 100) / $ttl_product_hrs; // (4.3)
	// $ttl_eff 			= ($ttl_earned * 100) / $ttl_hrs; // (4.4)
}
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

<title>Weekly efficiency report</title>

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
			<h1>MOVEMENT ASSEMBLY</h1>
			<?php if($date_validate){?>
			Weekly efficiency report from <strong><?php echo date("jS F, Y", strtotime($_POST['s_year'].'-'.$_POST['s_month'].'-'.$_POST['s_day']));?></strong> <i class="fa fa-long-arrow-right" aria-hidden="true"></i> <strong><?php echo date("jS F, Y", strtotime($_POST['e_year'].'-'.$_POST['e_month'].'-'.$_POST['e_day']));?></strong>
			<?php }else{?>
			Weekly efficiency report
			<?php }?>
		</div>

		<?php if($date_validate){?>
		<div class="head-control">
			<a href="weekly_eff_report.php" class="btn"><i class="fa fa-calendar" aria-hidden="true"></i>Change Date</a>
		</div>
		<?php }?>
	</div>

	<div class="report-container">

		<?php if(!$date_validate){?>
		<div class="datepicker">
			<form action="weekly_eff_report.php" method="post">
				<div class="picker-items">
					<div class="caption">Start date</div>
					<div class="picker">
						<select name="s_day" class="input-select input-select-day">
							<option value="1" <?php echo ($day == '01'?'selected':'');?>>1</option>
							<option value="2" <?php echo ($day == '02'?'selected':'');?>>2</option>
							<option value="3" <?php echo ($day == '03'?'selected':'');?>>3</option>
							<option value="4" <?php echo ($day == '04'?'selected':'');?>>4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
							<option value="16">16</option>
							<option value="17">17</option>
							<option value="18">18</option>
							<option value="19">19</option>
							<option value="20">20</option>
							<option value="21">21</option>
							<option value="22">22</option>
							<option value="23">23</option>
							<option value="24">24</option>
							<option value="25">25</option>
							<option value="26">26</option>
							<option value="27">27</option>
							<option value="28">28</option>
							<option value="29">29</option>
							<option value="30">30</option>
							<option value="31">31</option>
						</select>
						<select name="s_month" class="input-select input-select-month">
							<option value="1" <?php echo ($mouth == '01'?'selected':'');?>>January</option>
							<option value="2" <?php echo ($mouth == '02'?'selected':'');?>>February</option>
							<option value="3" <?php echo ($mouth == '03'?'selected':'');?>>March</option>
							<option value="4" <?php echo ($mouth == '04'?'selected':'');?>>April</option>
							<option value="5" <?php echo ($mouth == '05'?'selected':'');?>>May</option>
							<option value="6" <?php echo ($mouth == '06'?'selected':'');?>>June</option>
							<option value="7" <?php echo ($mouth == '07'?'selected':'');?>>July</option>
							<option value="8" <?php echo ($mouth == '08'?'selected':'');?>>August</option>
							<option value="9" <?php echo ($mouth == '09'?'selected':'');?>>September</option>
							<option value="10" <?php echo ($mouth == '10'?'selected':'');?>>October</option>
							<option value="11" <?php echo ($mouth == '11'?'selected':'');?>>November</option>
							<option value="12" <?php echo ($mouth == '12'?'selected':'');?>>December</option>
						</select>
						<select name="s_year" class="input-select input-select-year">
							<option value="2016" <?php echo ($year == '2016'?'selected':'');?>>2016</option>
						</select>
					</div>
				</div>
				<div class="icon"><i class="fa fa-angle-down" aria-hidden="true"></i></div>
				<div class="picker-items">
					<div class="caption">End date</div>
					<div class="picker">
						<select name="e_day" class="input-select">
							<option value="1" <?php echo ($day == '01'?'selected':'');?>>1</option>
							<option value="2" <?php echo ($day == '02'?'selected':'');?>>2</option>
							<option value="3" <?php echo ($day == '03'?'selected':'');?>>3</option>
							<option value="4" <?php echo ($day == '04'?'selected':'');?>>4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
							<option value="16">16</option>
							<option value="17">17</option>
							<option value="18">18</option>
							<option value="19">19</option>
							<option value="20">20</option>
							<option value="21">21</option>
							<option value="22">22</option>
							<option value="23">23</option>
							<option value="24">24</option>
							<option value="25">25</option>
							<option value="26">26</option>
							<option value="27">27</option>
							<option value="28">28</option>
							<option value="29">29</option>
							<option value="30">30</option>
							<option value="31">31</option>
						</select>
						<select name="e_month" class="input-select">
							<option value="1" <?php echo ($mouth == '01'?'selected':'');?>>January</option>
							<option value="2" <?php echo ($mouth == '02'?'selected':'');?>>February</option>
							<option value="3" <?php echo ($mouth == '03'?'selected':'');?>>March</option>
							<option value="4" <?php echo ($mouth == '04'?'selected':'');?>>April</option>
							<option value="5" <?php echo ($mouth == '05'?'selected':'');?>>May</option>
							<option value="6" <?php echo ($mouth == '06'?'selected':'');?>>June</option>
							<option value="7" <?php echo ($mouth == '07'?'selected':'');?>>July</option>
							<option value="8" <?php echo ($mouth == '08'?'selected':'');?>>August</option>
							<option value="9" <?php echo ($mouth == '09'?'selected':'');?>>September</option>
							<option value="10" <?php echo ($mouth == '10'?'selected':'');?>>October</option>
							<option value="11" <?php echo ($mouth == '11'?'selected':'');?>>November</option>
							<option value="12" <?php echo ($mouth == '12'?'selected':'');?>>December</option>
						</select>
						<select name="e_year" class="input-select">
							<option value="2016" <?php echo ($year == '2016'?'selected':'');?>>2016</option>
						</select>
					</div>
				</div>
				<div class="picker-control">
					<button type="submit" class="submit-btn">Get Report<i class="fa fa-angle-right" aria-hidden="true"></i></button>
				</div>
			</form>
		</div>
		<?php }?>

		<?php if($date_validate){?>
		<div class="report-box">
			<div class="topic">1. Caliber Code</div>
			<div class="weekly-eff-items topic-fix">
				<div class="col1">Caliber code</div>
				<div class="col2">Std. time (Hrs/K)</div>
				<div class="col3">Qty. Turn-in (K)</div>
				<div class="col4">Std. Hrs Earned (Hrs)</div>
			</div>
			<?php $report->listEfficencyReport($_POST['s_year'],$_POST['s_month'],$_POST['s_day'],$_POST['e_year'],$_POST['e_month'],$_POST['e_day'],array('type' => 'weekly-eff-items'));?>

			<div class="weekly-eff-items total-fix">
				<div class="col1">Total</div>
				<div class="col2"><?php echo number_format($ttl_std_time,2);?></div>
				<div class="col3"><?php echo number_format(($ttl_qty/1000),3);?></div>
				<div class="col4"><?php echo number_format($ttl_earned,2);?></div>
			</div>
		</div>

		<div class="report-box">
			<div class="topic">2. Wage Hours Analysis (Hrs)</div>
			<div class="weekly-eff-items">
				<div class="col1">Normal:</div>
				<div class="col5"><?php echo number_format($normal_time,2);?></div>
			</div>
			<div class="weekly-eff-items">
				<div class="col1">Overtime:</div>
				<div class="col5"><?php echo number_format($over_time,2);?></div>
			</div>
			<div class="weekly-eff-items">
				<div class="col1">Holiday:</div>
				<div class="col5"><?php echo number_format($holidays,2);?></div>
			</div>
			<div class="weekly-eff-items">
				<div class="col1">Leaves:</div>
				<div class="col5"><?php echo number_format($leaves,2);?></div>
			</div>
			<div class="weekly-eff-items total-fix">
				<div class="col1">Total wage hours:</div>
				<div class="col5"><?php echo number_format($ttl_wage_hrs,2);?></div>
			</div>
		</div>

		<div class="report-box">
			<div class="topic">3. idle Time Analytics (Hrs)</div>

			<div class="weekly-eff-items">
				<div class="col1">Machine:</div>
				<div class="col5"><?php echo number_format($reportData['downtime_mc'],2);?></div>
			</div>
			<div class="weekly-eff-items">
				<div class="col1">Facility:</div>
				<div class="col5"><?php echo number_format($reportData['downtime_fac'],2);?></div>
			</div>
			<div class="weekly-eff-items">
				<div class="col1">Material:</div>
				<div class="col5"><?php echo number_format($reportData['downtime_mat'],2);?></div>
			</div>
			<div class="weekly-eff-items">
				<div class="col1">Sort/local:</div>
				<div class="col5"><?php echo number_format($reportData['sort_local'],2);?></div>
			</div>
			<div class="weekly-eff-items">
				<div class="col1">Sort/Overseas:</div>
				<div class="col5"><?php echo number_format($reportData['sort_oversea'],2);?></div>
			</div>
			<div class="weekly-eff-items">
				<div class="col1">Rework/local:</div>
				<div class="col5"><?php echo number_format($reportData['rework_local'],2);?></div>
			</div>
			<div class="weekly-eff-items">
				<div class="col1">Rework/Overseas:</div>
				<div class="col5"><?php echo number_format($reportData['rework_local'],2);?></div>
			</div>
			<div class="weekly-eff-items">
				<div class="col1">Rework/Overseas:</div>
				<div class="col5"><?php echo number_format($reportData['rework_oversea'],2);?></div>
			</div>
			<div class="weekly-eff-items">
				<div class="col1">Other:</div>
				<div class="col5"><?php echo number_format($reportData['downtime_other'],2);?></div>
			</div>
			<div class="weekly-eff-items total-fix">
				<div class="col1">Total:</div>
				<div class="col5"><?php echo number_format($ttl_idle_time,2);?></div>
			</div>
		</div>

		<div class="report-box">
			<div class="topic">4. Efficiency Calcalation</div>
			<div class="eff-items">
				<div class="v"><?php echo number_format($ttl_product_hrs,2);?></div>
				<div class="k">Total productive hrs.</div>
			</div>
			<div class="eff-items">
				<div class="v"><?php echo number_format($ttl_hrs,2);?></div>
				<div class="k">Total Hours.</div>
			</div>
			<div class="eff-items">
				<div class="v"><?php echo number_format($productive_eff,2);?><span class="unit">%</span></div>
				<div class="k">Productive Efficiency</div>
			</div>
			<div class="eff-items">
				<div class="v"><?php echo number_format($ttl_eff,2);?><span class="unit">%</span></div>
				<div class="k">Total Efficiency</div>
			</div>
		</div>
		<?php }else{?>
		<?php }?>
	</div>
</div>
</body>
</html>