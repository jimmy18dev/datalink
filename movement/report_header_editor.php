<?php
include'config/autoload.php';

if(!$user_online){
	header("Location: login.php");
	die();
}else if(empty($_GET['header']) && $_GET['action'] == 'edit'){
	header("Location: index.php?error=action_is_not_validate!");
	die();
}else if(!empty($_GET['header']) && $_GET['action'] == 'edit'){
	$report->getHeader($_GET['header']);

	if($report->status == 'deleted'){
		header("Location: error_deleted.php?");
		die();
	}else if(($user->id != $report->leader_id && $_GET['action'] != 'create') || !$report->can_edit){
		header("Location: error_permission.php?error=you_don't_have_permission!");
		die();
	}	
}else if($_GET['action'] != 'create'){
	header("Location: index.php?error=action_is_not_validate!");
	die();
}

// Current page
$current_page['1'] = 'report_create';

// Get target setting
$setting->getSetting();

// Get current day mouth year
$day 	= date('d');
$mouth 	= date('m');
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
<title>Report Editor</title>

<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/service/report.service.js"></script>

</head>
<body>
<header class="header">
	<a href="index.php" class="header-items discard-btn">Discard</a>

	<?php if(empty($report->id)){?>
	<button class="submit-btn" onclick="javascript:createHeaderReport();"><i class="fa fa-plus" aria-hidden="true"></i>CREATE</button>
	<?php }else{?>
	<button class="submit-btn" onclick="javascript:editHeaderReport(<?php echo $report->id;?>);"><i class="fa fa-check" aria-hidden="true"></i>Update</button>
	<?php }?>
</header>
<div class="container">
	<div class="header-report-form-container">

		<?php if(!empty($report->id)){?>
		<div class="form-title"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editing report for <strong><?php echo $report->report_full_date;?></strong></div>
		<div class="form-title">Shift <strong><?php echo $report->line_no;?></strong> and Line type <strong><?php echo $report->line_type;?></strong></div>
		<?php }else{?>
		<div class="form-title">
			Creating a report for
			<select id="r_date" class="input-select">
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

			<select id="r_month" class="input-select">
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

			<select id="r_year" class="input-select">
				<option value="2016" <?php echo ($year == '2016'?'selected':'');?>>2016</option>
			</select>
		</div>

		<div class="form-title">
			Shift
			<select id="shift" class="input-select">
				<option value="A" <?php echo ($report->shift == 'A'?'selected':'');?>>A</option>
				<option value="B" <?php echo ($report->shift == 'B'?'selected':'');?>>B</option>
			</select>
			Line type
			<select id="line_type" class="input-select">
				<option value="DI">DI</option>
				<option value="NDI">NDI</option>
			</select>
		</div>
		<?php }?>

		<div class="form-section">
			<div class="title">1. Monthly</div>
			<div class="inputs">
				<div class="section-items">
					<div class="input"><input type="number" class="input-text" id="no_monthly_emplys" placeholder="0" value="<?php echo $report->no_monthly_emplys;?>"></div>
					<div class="caption">Monthly Prs</div>
				</div>
				<div class="section-items">
					<div class="input"><input type="number" class="input-text" id="ttl_monthly_hrs" placeholder="0.00" value="<?php echo $report->ttl_monthly_hrs;?>"></div>
					<div class="caption">Normal Hrs</div>
				</div>
			</div>
		</div>

		<div class="form-section">
			<div class="title">2. Daily</div>
			<div class="inputs">
				<div class="section-items">
					<div class="input"><input type="number" class="input-text" id="no_daily_emplys" placeholder="0" value="<?php echo $report->no_daily_emplys;?>"></div>
					<div class="caption">Daily Prs</div>
				</div>
				<div class="section-items">
					<div class="input"><input type="number" class="input-text"  id="ttl_daily_hrs" placeholder="0.00" value="<?php echo $report->ttl_daily_hrs;?>"></div>
					<div class="caption">Normal Hrs.</div>
				</div>
			</div>
		</div>

		<div class="form-section">
			<div class="title">3. Efficiency</div>
			<div class="inputs">
				<div class="section-items">
					<div class="input"><input type="number" class="input-text" id="product_eff" placeholder="0.00" value="<?php echo $report->product_eff;?>"></div>
					<div class="caption">Product EFF</div>
				</div>
				<div class="section-items">
					<div class="input"><input type="number" class="input-text" id="ttl_eff" placeholder="0.00" value="<?php echo $report->ttl_eff;?>"></div>
					<div class="caption">Total EFF</div>
				</div>
			</div>
		</div>

		<div class="form-section">
			<div class="title">4. Overtime</div>
			<div class="inputs">
				<div class="section-items">
					
					<div class="input"><input type="number" class="input-text" id="ot_10" placeholder="0.00" value="<?php echo $report->ot_10;?>"></div>
					<div class="caption">1.0</div>
				</div>
				<div class="section-items">
					
					<div class="input"><input type="number" class="input-text" id="ot_15" placeholder="0.00" value="<?php echo $report->ot_15;?>"></div>
					<div class="caption">1.5</div>
				</div>
				<div class="section-items">
					
					<div class="input"><input type="number" class="input-text" id="ot_20" placeholder="0.00" value="<?php echo $report->ot_20;?>"></div>
					<div class="caption">2.0</div>
				</div>
				<div class="section-items">
					
					<div class="input"><input type="number" class="input-text" id="ot_30" placeholder="0.00" value="<?php echo $report->ot_30;?>"></div>
					<div class="caption">3.0</div>
				</div>
			</div>
		</div>

		<div class="form-section">
			<div class="title">5. Lost time</div>
			<div class="inputs">
				<div class="section-items">
					<div class="input"><input type="number" class="input-text" id="losttime_vac" placeholder="0.00" value="<?php echo $report->losttime_vac;?>"></div>
					<div class="caption">VAC</div>
				</div>
				<div class="section-items">
					<div class="input"><input type="number" class="input-text" id="losttime_sick" placeholder="0.00" value="<?php echo $report->losttime_sick;?>"></div>
					<div class="caption">SICK</div>
				</div>
				<div class="section-items">
					
					<div class="input"><input type="number" class="input-text" id="losttime_abs" placeholder="0.00" value="<?php echo $report->losttime_abs;?>"></div>
					<div class="caption">ABS</div>
				</div>
				<div class="section-items">
					
					<div class="input"><input type="number" class="input-text" id="losttime_mat" placeholder="0.00" value="<?php echo $report->losttime_mat;?>"></div>
					<div class="caption">MAT</div>
				</div>
				<div class="section-items">
					
					<div class="input"><input type="number" class="input-text" id="losttime_other" placeholder="0.00" value="<?php echo $report->losttime_other;?>"></div>
					<div class="caption">Other</div>
				</div>
			</div>
		</div>
		<div class="form-section">
			<div class="title">6. Down time</div>
			<div class="inputs">
				<div class="section-items">
					
					<div class="input"><input type="number" class="input-text" id="downtime_mc" placeholder="0.00" value="<?php echo $report->downtime_mc;?>"></div>
					<div class="caption">M/C</div>
				</div>
				<div class="section-items">
					
					<div class="input"><input type="number" class="input-text" id="downtime_mat" placeholder="0.00" value="<?php echo $report->downtime_mat;?>"></div>
					<div class="caption">MAT</div>
				</div>
				<div class="section-items">
					
					<div class="input"><input type="number" class="input-text" id="downtime_fac" placeholder="0.00" value="<?php echo $report->downtime_fac;?>"></div>
					<div class="caption">FAC</div>
				</div>
				<div class="section-items">
					
					<div class="input"><input type="number" class="input-text" id="downtime_other" placeholder="0.00" value="<?php echo $report->downtime_other;?>"></div>
					<div class="caption">Other</div>
				</div>
			</div>
		</div>

		<div class="form-section">
			<div class="title">7. Sort</div>
			<div class="inputs">
				<div class="section-items">
					
					<div class="input"><input type="number" class="input-text" id="sort_local" placeholder="0.00" value="<?php echo $report->sort_local;?>"></div>
					<div class="caption">Local</div>
				</div>
				<div class="section-items">
					
					<div class="input"><input type="number" class="input-text" id="sort_oversea" placeholder="0.00" value="<?php echo $report->sort_oversea;?>"></div>
					<div class="caption">Overseas</div>
				</div>
			</div>
		</div>

		<div class="form-section">
			<div class="title">8. Rework</div>
			<div class="inputs">
				<div class="section-items">
					
					<div class="input"><input type="number" class="input-text" id="rework_local" placeholder="0.00" value="<?php echo $report->rework_local;?>"></div>
					<div class="caption">Local</div>
				</div>
				<div class="section-items">
					<div class="input"><input type="number" class="input-text" id="rework_oversea" placeholder="0.00" value="<?php echo $report->rework_oversea;?>"></div>
					<div class="caption">Overseas</div>
				</div>
			</div>
		</div>

		<div class="form-section">
			<div class="title">9. Yield</div>
			<div class="inputs">
				<div class="section-items">
					<div class="input"><input type="number" class="input-text" id="yield" placeholder="0.00" value="<?php echo $report->yield;?>"></div>
					<div class="caption">Yield</div>
				</div>
			</div>
		</div>

		<div class="form-section">
			<div class="title">10. Target</div>
			<div class="inputs">
				<div class="section-items">
					<div class="input"><input type="number" class="input-text" id="target_yield" placeholder="0.00" value="<?php echo (empty($report->product_eff)?$setting->target_yield:$report->target_yield);?>"></div>
					<div class="caption">Target Yield</div>
				</div>
				<div class="section-items">
					<div class="input"><input type="number" class="input-text" id="target_eff" placeholder="0.00" value="<?php echo (empty($report->product_eff)?$setting->target_eff:$report->target_eff);?>"></div>
					<div class="caption">Target EFF</div>
				</div>
			</div>
		</div>

		<div class="form-section">
			<div class="title">11. Remark</div>
			<textarea id="remark" class="input-remark" placeholder="Enter remark..."><?php echo $report->remark;?></textarea>
		</div>	
	</div>

	<div class="control-container">
		<?php if(!empty($report->id)){?>
		You are owner and can <span class="delete-btn" onclick="javascript:deleteHeaderReport(<?php echo $report->id;?>,'<?php echo $report->shift;?>','<?php echo $report->date;?>','<?php echo $report->line_no;?>');">Delete <i class="fa fa-trash" aria-hidden="true"></i></span> your report. 
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