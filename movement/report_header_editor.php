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
if(!empty($report->report_date_ori)){
	$day 	= date('d',strtotime($report->report_date_ori));
	$mouth 	= date('m',strtotime($report->report_date_ori));
	$year 	= date('Y',strtotime($report->report_date_ori));
}else{
	$day 	= date('d');
	$mouth 	= date('m');
	$year 	= date('Y');
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
	<a href="index.php" class="items btn-discard">DISCARD</a>
	<?php if(empty($report->id)){?>
	<button class="btn" onclick="javascript:createHeaderReport();">CREATE</button>
	<?php }else{?>
	<button class="btn" onclick="javascript:editHeaderReport(<?php echo $report->id;?>);">SAVE</button>
	<?php }?>
</header>
<div class="form">

	<div class="form-items">
		<div class="caption">1. DATE: </div>
		<div class="input">
			<div class="select -day">
				<select id="r_date">
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
			</div>

			<div class="select -month">
				<select id="r_month">
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
			</div>
			<div class="select -year">
				<select id="r_year">
					<option value="2016" <?php echo ($year == '2016'?'selected':'');?>>2016</option>
					<option value="2017" <?php echo ($year == '2017'?'selected':'');?>>2017</option>
					<option value="2018" <?php echo ($year == '2018'?'selected':'');?>>2018</option>
					<option value="2019" <?php echo ($year == '2019'?'selected':'');?>>2019</option>
					<option value="2020" <?php echo ($year == '2020'?'selected':'');?>>2020</option>
				</select>
			</div>
		</div>
	</div>

	<div class="form-items">
		<div class="caption">2. SHIFT / TYPE</div>	
		<div class="input">
			<div class="select -haft">
				<select id="shift" class="input-select">
					<option value="A" <?php echo ($report->shift == 'A'?'selected':'');?>>A</option>
					<option value="B" <?php echo ($report->shift == 'B'?'selected':'');?>>B</option>
				</select>
			</div>
			<div class="select -right">
				<select id="line_type" class="input-select">
					<option value="DI" <?php echo ($report->line_type == 'DI'?'selected':'');?>>DI</option>
					<option value="NDI" <?php echo ($report->line_type == 'NDI'?'selected':'');?>>NDI</option>
				</select>
			</div>
		</div>
	</div>

	<div class="form-items">
		<div class="caption">3. Monthly</div>
		<div class="input">
			<div class="label">Monthly Prs</div>
			<input type="number" class="input-text" id="no_monthly_emplys" placeholder="0" value="<?php echo ($report->no_monthly_emplys>0?$report->no_monthly_emplys:'');?>">

			<div class="label">Normal Hrs</div>
			<input type="number" class="input-text" id="ttl_monthly_hrs" placeholder="0.00" value="<?php echo ($report->ttl_monthly_hrs>0?$report->ttl_monthly_hrs:'');?>">
		</div>
	</div>

	<div class="form-items">
		<div class="caption">4. Daily</div>
		<div class="input">
			<div class="label">Daily Prs</div>
			<input type="number" class="input-text" id="no_daily_emplys" placeholder="0" value="<?php echo ($report->no_daily_emplys>0?$report->no_daily_emplys:'');?>">

			<div class="label">Normal Hrs.</div>
			<input type="number" class="input-text"  id="ttl_daily_hrs" placeholder="0.00" value="<?php echo ($report->ttl_daily_hrs>0?$report->ttl_daily_hrs:'');?>">
		</div>
	</div>

	<div class="form-items">
		<div class="caption">5. Overtime</div>
		<div class="input">
			<div class="label">1.0</div>
				<input type="number" class="input-text" id="ot_10" placeholder="0" value="<?php echo ($report->ot_10>0?$report->ot_10:'');?>">
			<div class="label">1.5</div>
				<input type="number" class="input-text" id="ot_15" placeholder="0" value="<?php echo ($report->ot_15>0?$report->ot_15:'');?>">
			<div class="label">2.0</div>
				<input type="number" class="input-text" id="ot_20" placeholder="0" value="<?php echo ($report->ot_20>0?$report->ot_20:'');?>">
			<div class="label">3.0</div>
				<input type="number" class="input-text" id="ot_30" placeholder="0" value="<?php echo ($report->ot_30>0?$report->ot_30:'');?>">
		</div>
	</div>

	<div class="form-items">
		<div class="caption">6. Lost time</div>
		<div class="input">
			<div class="label">VAC</div>
			<input type="number" class="input-text" id="losttime_vac" placeholder="0" value="<?php echo ($report->losttime_vac>0?$report->losttime_vac:'');?>">
			<div class="label">SICK</div>
			<input type="number" class="input-text" id="losttime_sick" placeholder="0" value="<?php echo ($report->losttime_sick>0?$report->losttime_sick:'');?>">
			<div class="label">ABS</div>
			<input type="number" class="input-text" id="losttime_abs" placeholder="0" value="<?php echo ($report->losttime_abs>0?$report->losttime_abs:'');?>">
			<div class="label">MAT</div>
			<input type="number" class="input-text" id="losttime_mat" placeholder="0" value="<?php echo ($report->losttime_mat>0?$report->losttime_mat:'');?>">
			<div class="label">Other</div>
			<input type="number" class="input-text" id="losttime_other" placeholder="0" value="<?php echo ($report->losttime_other>0?$report->losttime_other:'');?>">
		</div>
	</div>
	
	<div class="form-items">
		<div class="caption">7. Down time</div>
		<div class="input">
			<div class="label">M/C</div>
			<input type="number" class="input-text" id="downtime_mc" placeholder="0" value="<?php echo ($report->downtime_mc>0?$report->downtime_mc:'');?>">
			<div class="label">MAT</div>
			<input type="number" class="input-text" id="downtime_mat" placeholder="0" value="<?php echo ($report->downtime_mat>0?$report->downtime_mat:'');?>">
			<div class="label">FAC</div>
			<input type="number" class="input-text" id="downtime_fac" placeholder="0" value="<?php echo ($report->downtime_fac>0?$report->downtime_fac:'');?>">
			<div class="label">Other</div>
			<input type="number" class="input-text" id="downtime_other" placeholder="0" value="<?php echo ($report->downtime_other>0?$report->downtime_other:'');?>">
		</div>
	</div>

	<div class="form-items">
		<div class="caption">8. Sort</div>
		<div class="input">
			<div class="label">Local</div>
			<input type="number" class="input-text" id="sort_local" placeholder="0" value="<?php echo ($report->sort_local>0?$report->sort_local:'');?>">
			<div class="label">Overseas</div>
			<input type="number" class="input-text" id="sort_oversea" placeholder="0" value="<?php echo ($report->sort_oversea>0?$report->sort_oversea:'');?>">
		</div>
	</div>

	<div class="form-items">
		<div class="caption">9. Rework</div>
		<div class="input">
			<div class="label">Local</div>
			<input type="number" class="input-text" id="rework_local" placeholder="0" value="<?php echo ($report->rework_local>0?$report->rework_local:'');?>">
			<div class="label">Overseas</div>
			<input type="number" class="input-text" id="rework_oversea" placeholder="0" value="<?php echo ($report->rework_oversea>0?$report->rework_oversea:'');?>">
		</div>
	</div>

	<div class="form-items">
		<div class="caption">10. Target</div>
		<div class="input">
			<div class="label">Target Yield</div>
			<input type="number" class="input-text" id="target_yield" placeholder="0.00" value="<?php echo (empty($report->product_eff)?$setting->target_yield:$report->target_yield);?>">
			<div class="label">Target EFF</div>
			<input type="number" class="input-text" id="target_eff" placeholder="0.00" value="<?php echo (empty($report->product_eff)?$setting->target_eff:$report->target_eff);?>">
		</div>
	</div>

	<div class="form-items">
		<div class="caption">11. Remark</div>
		<div class="input">
			<textarea id="remark" class="input-textarea" placeholder="Enter remark..."><?php echo $report->remark;?></textarea>
		</div>
	</div>	
</div>

<?php if(!empty($report->id)){?>
<div class="control-container">
	<div class="title">You are owner and can delete your report. </div>
	<div class="btn btn-delete" onclick="javascript:deleteHeaderReport(<?php echo $report->id;?>,'<?php echo $report->shift;?>','<?php echo $report->date;?>','<?php echo $report->line_no;?>');"><i class="fa fa-trash" aria-hidden="true"></i>DELETE</div>
</div>
<?php }?>

<div class="loading-box" id="loading-box">
	<div class="dialog">
		<div class="icon"><i class="fa fa-circle-o-notch fa-spin"></i></div>
		<p id="loading-message">กำลังบันทึกข้อมูล</p>
	</div>
</div>
</body>
</html>