<?php
include'config/autoload.php';

// Permission
if(!$user_online){
	header("Location: index.php");
	die();
}

if(!empty($_GET['header'])){
	$report->getHeader($_GET['header']);
}

// current page
$current_page['1'] = 'report';
$current_page['2'] = 'new_operation';
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

<title>Editor : Operation Recipe</title>

<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/service/report.service.js"></script>

</head>
<body>
<?php include 'header.php';?>
<div class="container">
	<div class="header-report-form-container">
		<div class="heads">
			<div class="title">
				<h1>Create Daily output report</h1>
				<p>Movement assembly</p>
			</div>
			<div class="date">13/04/2016</div>
		</div>

		<div class="setting-section">
			<div class="setting-section-items">
				<div class="caption">Line</div>
				<div class="input">
					<span class="minicaption">No:</span>
					<select id="line_no" class="input-select">
						<option value="1" <?php echo ($report->line_no == 1?'selected':'');?>>1</option>
						<option value="2" <?php echo ($report->line_no == 2?'selected':'');?>>2</option>
						<option value="3" <?php echo ($report->line_no == 3?'selected':'');?>>3</option>
						<option value="4" <?php echo ($report->line_no == 4?'selected':'');?>>4</option>
						<option value="5" <?php echo ($report->line_no == 5?'selected':'');?>>5</option>
						<option value="6" <?php echo ($report->line_no == 6?'selected':'');?>>6</option>
						<option value="7" <?php echo ($report->line_no == 7?'selected':'');?>>7</option>
						<option value="8" <?php echo ($report->line_no == 8?'selected':'');?>>8</option>
						<option value="9" <?php echo ($report->line_no == 9?'selected':'');?>>9</option>
						<option value="10" <?php echo ($report->line_no == 10?'selected':'');?>>10</option>
						<option value="11" <?php echo ($report->line_no == 11?'selected':'');?>>11</option>
						<option value="12" <?php echo ($report->line_no == 12?'selected':'');?>>12</option>
						<option value="13" <?php echo ($report->line_no == 13?'selected':'');?>>13</option>
						<option value="14" <?php echo ($report->line_no == 14?'selected':'');?>>14</option>
					</select>

					<span class="minicaption">Type:</span>
					<select id="line_type" class="input-select">
						<option value="DI">DI</option>
						<option value="NDI">NDI</option>
					</select>

					<span class="minicaption">Shift:</span>
					<select id="shift" class="input-select">
						<option value="A" <?php echo ($report->shift == 'A'?'selected':'');?>>A</option>
						<option value="B" <?php echo ($report->shift == 'B'?'selected':'');?>>B</option>
					</select>
				</div>
			</div>
			<div class="setting-section-items">
				<div class="caption">Monthly</div>
				<div class="input">
					<input type="text" id="no_monthly_emplys" placeholder="Monthly Prs" value="<?php echo $report->no_monthly_emplys;?>">
					<input type="text" id="ttl_monthly_hrs" placeholder="Normal Hrs" value="<?php echo $report->ttl_monthly_hrs;?>">
				</div>
			</div>
			<div class="setting-section-items">
				<div class="caption">Daily</div>
				<div class="input">
					<input type="text" id="no_daily_emplys" placeholder="Daily Prs" value="<?php echo $report->no_daily_emplys;?>">
					<input type="text" id="ttl_daily_hrs" placeholder="Normal Hrs." value="<?php echo $report->ttl_daily_hrs;?>">
				</div>
			</div>

			<div class="setting-section-items">
				<div class="caption">Efficiency</div>
				<div class="input">
					<input type="text" id="product_eff" placeholder="Product EFF." value="<?php echo $report->product_eff;?>">
					<input type="text" id="ttl_eff" placeholder="Total EFF." value="<?php echo $report->ttl_eff;?>">
				</div>
			</div>
		</div>

		<div class="form-section">
			<h3 class="title">OT</h3>
			<div class="section-items">
				<div class="caption">1.0</div>
				<div class="input"><input type="text" class="input-text" id="ot_10" placeholder="0" value="<?php echo $report->ot_10;?>"></div>
			</div>
			<div class="section-items">
				<div class="caption">1.5</div>
				<div class="input"><input type="text" class="input-text" id="ot_15" placeholder="0" value="<?php echo $report->ot_15;?>"></div>
			</div>
			<div class="section-items">
				<div class="caption">2.0</div>
				<div class="input"><input type="text" class="input-text" id="ot_20" placeholder="0" value="<?php echo $report->ot_20;?>"></div>
			</div>
			<div class="section-items">
				<div class="caption">3.0</div>
				<div class="input"><input type="text" class="input-text" id="ot_30" placeholder="0" value="<?php echo $report->ot_30;?>"></div>
			</div>
		</div>
		<div class="form-section">
			<h3 class="title">Lost time</h3>
			<div class="section-items">
				<div class="caption">VAC</div>
				<div class="input"><input type="text" class="input-text" id="losttime_vac" placeholder="0" value="<?php echo $report->losttime_vac;?>"></div>
			</div>
			<div class="section-items">
				<div class="caption">SICK</div>
				<div class="input"><input type="text" class="input-text" id="losttime_sick" placeholder="0" value="<?php echo $report->losttime_sick;?>"></div>
			</div>
			<div class="section-items">
				<div class="caption">ABS</div>
				<div class="input"><input type="text" class="input-text" id="losttime_abs" placeholder="0" value="<?php echo $report->losttime_abs;?>"></div>
			</div>
			<div class="section-items">
				<div class="caption">MAT</div>
				<div class="input"><input type="text" class="input-text" id="losttime_mat" placeholder="0" value="<?php echo $report->losttime_mat;?>"></div>
			</div>
			<div class="section-items">
				<div class="caption">Other</div>
				<div class="input"><input type="text" class="input-text" id="losttime_other" placeholder="0" value="<?php echo $report->losttime_other;?>"></div>
			</div>
		</div>
		<div class="form-section">
			<h3 class="title">Down time</h3>
			<div class="section-items">
				<div class="caption">M/C</div>
				<div class="input"><input type="text" class="input-text" id="downtime_mc" placeholder="0" value="<?php echo $report->downtime_mc;?>"></div>
			</div>
			<div class="section-items">
				<div class="caption">MAT</div>
				<div class="input"><input type="text" class="input-text" id="downtime_mat" placeholder="0" value="<?php echo $report->downtime_mat;?>"></div>
			</div>
			<div class="section-items">
				<div class="caption">FAC</div>
				<div class="input"><input type="text" class="input-text" id="downtime_fac" placeholder="0" value="<?php echo $report->downtime_fac;?>"></div>
			</div>
			<div class="section-items">
				<div class="caption">Other</div>
				<div class="input"><input type="text" class="input-text" id="downtime_other" placeholder="0" value="<?php echo $report->downtime_other;?>"></div>
			</div>
		</div>

		<div class="form-section">
			<h3 class="title">Sort</h3>
			<div class="section-items">
				<div class="caption">Loc</div>
				<div class="input"><input type="text" class="input-text" id="sort_local" placeholder="0" value="<?php echo $report->sort_local;?>"></div>
			</div>
			<div class="section-items">
				<div class="caption">Ove</div>
				<div class="input"><input type="text" class="input-text" id="sort_oversea" placeholder="0" value="<?php echo $report->sort_oversea;?>"></div>
			</div>
		</div>

		<div class="form-section">
			<h3 class="title">Reword</h3>
			<div class="section-items">
				<div class="caption">Loc</div>
				<div class="input"><input type="text" class="input-text" id="rework_local" placeholder="0" value="<?php echo $report->rework_local;?>"></div>
			</div>
			<div class="section-items">
				<div class="caption">Ove</div>
				<div class="input"><input type="text" class="input-text" id="rework_oversea" placeholder="0" value="<?php echo $report->rework_oversea;?>"></div>
			</div>
		</div>		

		<div class="form-control">
			<div class="username">Puwadon Sricharoen</div>

			<?php if(empty($report->id)){?>
			<div class="submit-btn" onclick="javascript:createHeaderReport();">Create<i class="fa fa-angle-right"></i></div>
			<?php }else{?>
			<div class="submit-btn" onclick="javascript:editHeaderReport(<?php echo $report->id;?>);">SAVE<i class="fa fa-angle-right"></i></div>
			<?php }?>
		</div>
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