<?php include'config/autoload.php';?>
<?php
if(!$user_online){
	header("Location: login.php");
	die();
}

if(!empty($_GET['header'])){
	$report->getHeader($_GET['header']);

	if($report->status == 'deleted'){
		header("Location: error_deleted.php?");
		die();
	}
}else{
	header("Location: index.php?error=header_is_empty!");
	die();
}

// current page
$current_page['1'] = 'index';
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
<title><?php echo $report->line_no;?><?php echo $report->shift;?> - <?php echo $report->report_date;?></title>

<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/service/report.service.js"></script>

</head>
<body>
<header class="header">
	<a class="items -active" href="index.php"><i class="fa fa-arrow-left" aria-hidden="true"></i><?php echo $report->report_full_date;?></a>
</header>
<div class="page">
	<!-- 1. Manpower -->
	<div class="topic-container">
		<h2>1. Manpower: </h2>
		<?php if($user->id == $report->leader_id && $report->can_edit){?>
			<a class="btn" href="report_header_editor.php?header=<?php echo $report->id;?>&action=edit">EDIT REPORT</a>
		<?php }?>
		<div class="info">
			<p>Line No.<strong><?php echo $report->line_no;?></strong> · Shift <strong><?php echo $report->shift;?></strong> · Updated <strong><?php echo $report->update_facebook_format;?></strong> Leader <strong><?php echo $report->leader_name;?></strong></p>
			<p>Target Yield = <strong><?php echo number_format($report->target_yield,2);?>%</strong> Target EFF = <strong><?php echo number_format($report->target_eff,2);?>%</strong></p>
		</div>
	</div>
	
	<div class="report-stat">
		<div class="stat-items stat-items-highlight">
			<div class="v">NO.<?php echo $report->line_no;?> (<?php echo $report->line_type;?>)</div>
			<div class="k">Shift <?php echo $report->shift;?></div>
		</div>

		<div class="stat-items <?php echo ($report->product_eff < $report->target_eff?'-warning':'');?>">
			<div class="v"><?php echo number_format($report->product_eff,2);?>%</div>
			<div class="k">Product EFF</div>
		</div>
		<div class="stat-items <?php echo ($report->ttl_eff < $report->target_eff?'-warning':'');?>">
			<div class="v"><?php echo number_format($report->ttl_eff,2);?>%</div>
			<div class="k">Total EFF</div>
		</div>

		<div class="stat-items <?php echo ($report->yield < $report->target_yield?'-warning':'');?>">
			<div class="v"><?php echo number_format($report->yield,2);?>%</div>
			<div class="k">Yield</div>
		</div>

		<div class="stat-items">
			<div class="v"><?php echo $report->no_monthly_emplys;?></div>
			<div class="k"><strong>Monthly</strong> Prs</div>
		</div>
		<div class="stat-items">
			<div class="v"><?php echo $report->no_daily_emplys;?></div>
			<div class="k"><strong>Daily</strong> Prs</div>
		</div>
		<div class="stat-items">
			<div class="v"><?php echo $report->ttl_monthly_hrs;?></div>
			<div class="k"><strong>Monthly</strong> Normal Hour</div>
		</div>
		<div class="stat-items">
			<div class="v"><?php echo $report->ttl_daily_hrs;?></div>
			<div class="k"><strong>Daily</strong> Normal Hour</div>
		</div>
	</div>

	<div class="header-report-table">	
		<div class="box">
			<div class="box-topic">Over time</div>
			<div class="col <?php echo ($report->ot_10 == 0?'-empty':'');?>">
				<div class="col-val"><?php echo number_format($report->ot_10);?></div>
				<div class="col-caption">1.0</div>
			</div>
			<div class="col <?php echo ($report->ot_15 == 0?'-empty':'');?>">
				<div class="col-val"><?php echo number_format($report->ot_15);?></div>
				<div class="col-caption">1.5</div>
			</div>
			<div class="col <?php echo ($report->ot_20 == 0?'-empty':'');?>">
				<div class="col-val"><?php echo number_format($report->ot_20);?></div>
				<div class="col-caption">2.0</div>
			</div>
			<div class="col <?php echo ($report->ot_30 == 0?'-empty':'');?>">
				<div class="col-val"><?php echo number_format($report->ot_30);?></div>
				<div class="col-caption">3.0</div>
			</div>
		</div>

		<div class="box">
			<div class="box-topic">Lost time</div>
			<div class="col <?php echo ($report->losttime_vac == 0?'-empty':'');?>">
				<div class="col-val"><?php echo number_format($report->losttime_vac);?></div>
				<div class="col-caption">Vac</div>
			</div>
			<div class="col <?php echo ($report->losttime_sick == 0?'-empty':'');?>">
				<div class="col-val"><?php echo number_format($report->losttime_sick);?></div>
				<div class="col-caption">Sick</div>
			</div>
			<div class="col <?php echo ($report->losttime_abs == 0?'-empty':'');?>">
				<div class="col-val"><?php echo number_format($report->losttime_abs);?></div>
				<div class="col-caption">Abs</div>
			</div>
			<div class="col <?php echo ($report->losttime_mat == 0?'-empty':'');?>">
				<div class="col-val"><?php echo number_format($report->losttime_mat);?></div>
				<div class="col-caption">Mat</div>
			</div>
			<div class="col <?php echo ($report->losttime_other == 0?'-empty':'');?>">
				<div class="col-val"><?php echo number_format($report->losttime_other);?></div>
				<div class="col-caption">Other</div>
			</div>
		</div>

		<div class="box">
			<div class="box-topic">Down time</div>
			<div class="col <?php echo ($report->downtime_mc == 0?'-empty':'');?>">
				<div class="col-val"><?php echo number_format($report->downtime_mc);?></div>
				<div class="col-caption">M/C</div>
			</div>
			<div class="col <?php echo ($report->downtime_mat == 0?'-empty':'');?>">
				<div class="col-val"><?php echo number_format($report->downtime_mat);?></div>
				<div class="col-caption">Mat</div>
			</div>
			<div class="col <?php echo ($report->downtime_fac == 0?'-empty':'');?>">
				<div class="col-val"><?php echo number_format($report->downtime_fac);?></div>
				<div class="col-caption">Fac</div>
			</div>
			<div class="col <?php echo ($report->downtime_other == 0?'-empty':'');?>">
				<div class="col-val"><?php echo number_format($report->downtime_other);?></div>
				<div class="col-caption">Other</div>
			</div>
		</div>

		<div class="box">
			<div class="box-topic">Sort</div>
			<div class="col <?php echo ($report->sort_local == 0?'-empty':'');?>">
				<div class="col-val"><?php echo number_format($report->sort_local);?></div>
				<div class="col-caption">Loc</div>
			</div>
			<div class="col <?php echo ($report->sort_oversea == 0?'-empty':'');?>">
				<div class="col-val"><?php echo number_format($report->sort_oversea);?></div>
				<div class="col-caption">Ove</div>
			</div>
		</div>

		<div class="box">
			<div class="box-topic">Rework</div>
			<div class="col <?php echo ($report->rework_local == 0?'-empty':'');?>">
				<div class="col-val"><?php echo number_format($report->rework_local);?></div>
				<div class="col-caption">Loc</div>
			</div>
			<div class="col <?php echo ($report->rework_oversea == 0?'-empty':'');?>">
				<div class="col-val"><?php echo number_format($report->rework_oversea);?></div>
				<div class="col-caption">Ove</div>
			</div>
		</div>

		<?php if(!empty($report->remark)){?>
		<div class="remark-msg"><strong>Remark</strong> <?php echo $report->remark;?></div>
		<?php }?>
	</div>

	<!-- 2. Output -->
	<div class="topic-container">
		<h2>2. Output: <?php echo $report->total_caliber;?> Calibers</h2>
		<?php if($user->id == $report->leader_id && $report->can_edit){?>
		<a class="btn" href="report_detail_editor_choose_caliber.php?header=<?php echo $report->id;?>">ADD CALIBER CODE</a>
		<?php }?>
	</div>	
	<div class="container-box">
		<?php
		$report->listCaliberInReport($report->id,array(
			'type' 		=> 'report-caliber-items',
			'header_id' => $report->id,
			'can_edit' 	=> $report->can_edit
		));
		?>
	</div>

	<!-- 3. Turn to 24-48 Hrs. -->
	<div class="topic-container">
		<h2>3. Turn to 24-48 Hrs.</h2>
		<?php if($user->id == $report->leader_id && $report->can_edit){?>
		<a class="btn" href="report_detail_turn_to_choose_caliber.php?header=<?php echo $report->id;?>">ADD TURE TO</a>
		<?php }?>
		</div>
	
	<div class="turn-to-list">
		<?php $report->listAllTurnTo($report->id,array('type' => 'turn-to-items'));?>
	</div>

	<div class="cal-box"><?php $report->calculationEFFandYield($report->id);?></div>
</div>

<script type="text/javascript" src="js/min/auto_hidden.min.js"></script>
</body>
</html>