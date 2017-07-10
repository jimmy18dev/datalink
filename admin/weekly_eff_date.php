<?php
include'config/autoload.php';
include'config/authorization.php';

// current page
$current_page['1'] = 'report';

// Get current day mouth year
$day 	= date('d');
$mouth 	= date('m');
$last_month = date('m',strtotime("-1 month"));
$year 	= date('Y');
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
<title>Weekly efficiency report</title>

<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/lib/jquery.form.min.js"></script>

</head>
<body>
<?php include'header.php';?>

<div id="loading-bar"></div>

<div class="topbar">
	<div class="title">MOVEMENT ASSEMBLY</div>
</div>

<div class="container">
	<div class="page">
		<form id="weeklyeff_form" class="datepicker" action="excel.uploader.php" method="POST" enctype="multipart/form-data">
			<div class="picker-items">
				<div class="caption">START</div>
				<div class="picker">
					<select id="sd" name="s_day" class="input-select input-select-day">
						<option value="1" <?php echo ($day == '01'?'selected':'');?>>1</option>
						<option value="2" <?php echo ($day == '02'?'selected':'');?>>2</option>
						<option value="3" <?php echo ($day == '03'?'selected':'');?>>3</option>
						<option value="4" <?php echo ($day == '04'?'selected':'');?>>4</option>
						<option value="5" <?php echo ($day == '05'?'selected':'');?>>5</option>
						<option value="6" <?php echo ($day == '06'?'selected':'');?>>6</option>
						<option value="7" <?php echo ($day == '07'?'selected':'');?>>7</option>
						<option value="8" <?php echo ($day == '08'?'selected':'');?>>8</option>
						<option value="9" <?php echo ($day == '09'?'selected':'');?>>9</option>
						<option value="10" <?php echo ($day == '10'?'selected':'');?>>10</option>
						<option value="11" <?php echo ($day == '11'?'selected':'');?>>11</option>
						<option value="12" <?php echo ($day == '12'?'selected':'');?>>12</option>
						<option value="13" <?php echo ($day == '13'?'selected':'');?>>13</option>
						<option value="14" <?php echo ($day == '14'?'selected':'');?>>14</option>
						<option value="15" <?php echo ($day == '15'?'selected':'');?>>15</option>
						<option value="16" <?php echo ($day == '16'?'selected':'');?>>16</option>
						<option value="17" <?php echo ($day == '17'?'selected':'');?>>17</option>
						<option value="18" <?php echo ($day == '18'?'selected':'');?>>18</option>
						<option value="19" <?php echo ($day == '19'?'selected':'');?>>19</option>
						<option value="20" <?php echo ($day == '20'?'selected':'');?>>20</option>
						<option value="21" <?php echo ($day == '21'?'selected':'');?>>21</option>
						<option value="22" <?php echo ($day == '22'?'selected':'');?>>22</option>
						<option value="23" <?php echo ($day == '23'?'selected':'');?>>23</option>
						<option value="24" <?php echo ($day == '24'?'selected':'');?>>24</option>
						<option value="25" <?php echo ($day == '25'?'selected':'');?>>25</option>
						<option value="26" <?php echo ($day == '26'?'selected':'');?>>26</option>
						<option value="27" <?php echo ($day == '27'?'selected':'');?>>27</option>
						<option value="28" <?php echo ($day == '28'?'selected':'');?>>28</option>
						<option value="29" <?php echo ($day == '29'?'selected':'');?>>29</option>
						<option value="30" <?php echo ($day == '30'?'selected':'');?>>30</option>
						<option value="31" <?php echo ($day == '31'?'selected':'');?>>31</option>
					</select>
					
					<select id="sm" name="s_month" class="input-select input-select-month">
								<option value="1" <?php echo ($last_mouth == '01'?'selected':'');?>>January</option>
								<option value="2" <?php echo ($last_mouth == '02'?'selected':'');?>>February</option>
								<option value="3" <?php echo ($last_mouth == '03'?'selected':'');?>>March</option>
								<option value="4" <?php echo ($last_mouth == '04'?'selected':'');?>>April</option>
								<option value="5" <?php echo ($last_month == '05'?'selected':'');?>>May</option>
								<option value="6" <?php echo ($last_month == '06'?'selected':'');?>>June</option>
								<option value="7" <?php echo ($last_mouth == '07'?'selected':'');?>>July</option>
								<option value="8" <?php echo ($last_mouth == '08'?'selected':'');?>>August</option>
								<option value="9" <?php echo ($last_mouth == '09'?'selected':'');?>>September</option>
								<option value="10" <?php echo ($last_mouth == '10'?'selected':'');?>>October</option>
								<option value="11" <?php echo ($last_mouth == '11'?'selected':'');?>>November</option>
								<option value="12" <?php echo ($last_mouth == '12'?'selected':'');?>>December</option>
							</select>
					<select id="sy" name="s_year" class="input-select input-select-year">
								<option value="2016" <?php echo ($year == '2016'?'selected':'');?>>2016</option>
								<option value="2017" <?php echo ($year == '2017'?'selected':'');?>>2017</option>
								<option value="2018" <?php echo ($year == '2018'?'selected':'');?>>2018</option>
								<option value="2019" <?php echo ($year == '2019'?'selected':'');?>>2019</option>
								<option value="2020" <?php echo ($year == '2020'?'selected':'');?>>2020</option>
							</select>
						</div>
					</div>
				<div class="picker-items">
					<div class="caption">END</div>
					<div class="picker">
					<select id="ed" name="e_day" class="input-select input-select-day">
						<option value="1" <?php echo ($day == '01'?'selected':'');?>>1</option>
						<option value="2" <?php echo ($day == '02'?'selected':'');?>>2</option>
						<option value="3" <?php echo ($day == '03'?'selected':'');?>>3</option>
						<option value="4" <?php echo ($day == '04'?'selected':'');?>>4</option>
						<option value="5" <?php echo ($day == '05'?'selected':'');?>>5</option>
								<option value="6" <?php echo ($day == '06'?'selected':'');?>>6</option>
								<option value="7" <?php echo ($day == '07'?'selected':'');?>>7</option>
								<option value="8" <?php echo ($day == '08'?'selected':'');?>>8</option>
								<option value="9" <?php echo ($day == '09'?'selected':'');?>>9</option>
								<option value="10" <?php echo ($day == '10'?'selected':'');?>>10</option>
								<option value="11" <?php echo ($day == '11'?'selected':'');?>>11</option>
								<option value="12" <?php echo ($day == '12'?'selected':'');?>>12</option>
								<option value="13" <?php echo ($day == '13'?'selected':'');?>>13</option>
								<option value="14" <?php echo ($day == '14'?'selected':'');?>>14</option>
								<option value="15" <?php echo ($day == '15'?'selected':'');?>>15</option>
								<option value="16" <?php echo ($day == '16'?'selected':'');?>>16</option>
								<option value="17" <?php echo ($day == '17'?'selected':'');?>>17</option>
								<option value="18" <?php echo ($day == '18'?'selected':'');?>>18</option>
								<option value="19" <?php echo ($day == '19'?'selected':'');?>>19</option>
								<option value="20" <?php echo ($day == '20'?'selected':'');?>>20</option>
								<option value="21" <?php echo ($day == '21'?'selected':'');?>>21</option>
								<option value="22" <?php echo ($day == '22'?'selected':'');?>>22</option>
								<option value="23" <?php echo ($day == '23'?'selected':'');?>>23</option>
								<option value="24" <?php echo ($day == '24'?'selected':'');?>>24</option>
								<option value="25" <?php echo ($day == '25'?'selected':'');?>>25</option>
								<option value="26" <?php echo ($day == '26'?'selected':'');?>>26</option>
								<option value="27" <?php echo ($day == '27'?'selected':'');?>>27</option>
								<option value="28" <?php echo ($day == '28'?'selected':'');?>>28</option>
								<option value="29" <?php echo ($day == '29'?'selected':'');?>>29</option>
								<option value="30" <?php echo ($day == '30'?'selected':'');?>>30</option>
								<option value="31" <?php echo ($day == '31'?'selected':'');?>>31</option>
							</select>
					<select id="em" name="e_month" class="input-select input-select-month">
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
					<select  id="ey" name="e_year" class="input-select input-select-year">
						<option value="2016" <?php echo ($year == '2016'?'selected':'');?>>2016</option>
						<option value="2017" <?php echo ($year == '2017'?'selected':'');?>>2017</option>
						<option value="2018" <?php echo ($year == '2018'?'selected':'');?>>2018</option>
						<option value="2019" <?php echo ($year == '2019'?'selected':'');?>>2019</option>
						<option value="2020" <?php echo ($year == '2020'?'selected':'');?>>2020</option>
					</select>
				</div>
			</div>
			<div class="control">
				<div class="fileupload">แนบไฟล์ Excel : <input type="file" name="fileupload"></div>
				<button type="submit" class="submit-btn">GET REPORT</button>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript" src="js/excel.form.js"></script>
</body>
</html>