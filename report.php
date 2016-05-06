<?php include'config/autoload.php';?>
<?php
if(!$user_online){
	header("Location: login.php");
	die();
}

// current page
$current_page['1'] = 'report';

// Get current day mouth year
$day 	= date('d');
$mouth 	= date('m');
$year 	= date('Y');

$reportData = $report->getIdleTime($_POST['s_year'],$_POST['s_month'],$_POST['s_day'],$_POST['e_year'],$_POST['e_month'],$_POST['e_day']);
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
			<h1>Weekly efficiency report</h1>
			<p>From <?php echo $_POST['s_day'].'/'.$_POST['s_month'].'/'.$_POST['s_year'];?> to <?php echo $_POST['e_day'].'/'.$_POST['e_month'].'/'.$_POST['e_year'];?></p>
		</div>

		<form action="report.php" method="post">
			<select name="s_day">
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
			<select name="s_month">
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
			<select name="s_year">
				<option value="2016" <?php echo ($year == '2016'?'selected':'');?>>2016</option>
			</select>

			 To 

			 <select name="e_day">
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
			<select name="e_month">
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
			<select name="e_year">
				<option value="2016" <?php echo ($year == '2016'?'selected':'');?>>2016</option>
			</select>

			<button>SEND</button>
	</div>

	<div class="list-container">
		<div class="weekly-eff-items topic-fix">
			<div class="col1">Caliber</div>
			<div class="col2">Std. time (Hrs/K)</div>
			<div class="col3">Qty. Turn-in (K)</div>
			<div class="col4">Std. Hrs Earned (Hrs)</div>
		</div>
		<?php $report->listEfficencyReport($_POST['s_year'],$_POST['s_month'],$_POST['s_day'],$_POST['e_year'],$_POST['e_month'],$_POST['e_day'],array('type' => 'weekly-eff-items'));?>

		<p>2. Wage Hours Analysis</p>
		<div>
			<p>Normal: <?php echo $reportData['normal_time'];?></p>
			<p>Overtime: <?php echo $reportData['over_time'];?></p>
			<p>Holiday:</p>
			<p>Leaves:</p>
			<p>Total wage hours:</p>
		</div><br>
		<p>3. idle Time Analytics</p>
		<div>
			<div>
				<pre>
				<?php print_r($reportData);?>
				</pre>
			</div>
			<p>Machine: <?php echo $reportData['downtime_mc'];?></p>
			<p>Facility: <?php echo $reportData['downtime_fac'];?></p>
			<p>Material: <?php echo $reportData['downtime_mat'];?></p>
			<p>Sort/local: <?php echo $reportData['sort_local'];?></p>
			<p>Sort/Overseas: <?php echo $reportData['sort_oversea'];?></p>
			<p>Rework/local: <?php echo $reportData['rework_local'];?></p>
			<p>Rework/Overseas: <?php echo $reportData['rework_oversea'];?></p>
			<p>Other: <?php echo $reportData['downtime_other'];?></p>
			<p><strong>total: <?php echo $reportData['ttl_idle_time'];?></strong></p>
		</div><br>
		<p>4. Efficiency Calcalation</p>
		<div>
			<p>Total productive hrs. : <?php echo ($reportData['normal_time'] + $reportData['over_time']) - $reportData['ttl_idle_time'];?> Hours (4.1)</p>
			<p>Total Hours. : <?php echo $reportData['normal_time'] + $reportData['over_time'];?> Hours (4.2)</p>
			<p>Productive Efficiency: 35% (4.3)</p>
			<p>Total Efficiency: 342% (4.4)</p>
		</div>
	</div>
</div>
</body>
</html>