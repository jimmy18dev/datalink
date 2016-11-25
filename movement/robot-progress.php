<?php
include'config/autoload.php';

$total_items = $report->countNormalType();
$progress = round(($total_items['update'] * 100) / $total_items['total'],1);
$header_id = $report->randomHeadder();

if(!empty($header_id)){
	$report->updateEFFandYield($header_id);
	$report->updateType($header_id);
}

if($total_items['total'] == $total_items['update']){
	header("Location: robot-success.php");
    die();
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
<meta http-equiv="refresh" content="2">

<?php include'favicon.php';?>
<title>Robot <?php echo $progress;?>%</title>

<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>

</head>
<body>
<div class="robot">
	<div class="head">
		<h1>Please wait...</h1>
		<p><i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i> Header ID : <?php echo $header_id;?></p>
	</div>
	<div class="start">
		<?php if($total_items['update'] == $total_items['total']){?>
		<div class="success">Successful<i class="fa fa-check" aria-hidden="true"></i></div>
		<?php }?>
	</div>

	<?php if($total_items['update'] != $total_items['total']){?>
	<div class="progress">
		<div class="bar" style="width:<?php echo $progress;?>%;"></div>
	</div>
	<?php }?>

	<p class="caption"><?php echo $total_items['update'];?> / <?php echo $total_items['total'];?></p>

	<div class="cal-box"><?php $report->calculationEFFandYield($header_id);?></div>
</div>
</body>
</html>