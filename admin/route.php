<?php include'config/autoload.php';?>
<?php
// Permission
if(!$user_online){
	header("Location: index.php");
	die();
}

if(!empty($_GET['caliber'])){
	$caliber->getCaliber($_GET['caliber']);
}

// current page
$current_page['1'] = 'caliber';
$current_page['2'] = 'caliber_code';
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

<title>Route</title>

<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/service/caliber.service.js"></script>

</head>
<body>
<?php include'header.php';?>
<div class="container">
	<div class="head">
		<div class="head-title">
			<h1><?php echo $caliber->code.' '.$caliber->family;?></h1>
			<p>Caliber is <strong>Available</strong> and <strong>5 routes</strong>, Standard time: <strong><?php echo $caliber->hrs;?> Hrs/K</strong>. Last updated: <strong><?php echo $caliber->update_time;?></strong> <?php echo $caliber->description;?>
			
			</p>
		</div>

		<div class="head-control">
			<?php if($caliber->status == 'active'){?>
			<div onclick="javascript:deactiveCaliber(<?php echo $caliber->id;?>,'<?php echo $caliber->id;?>');" class="btn">Set to panding</div>
			<?php }else if($caliber->status == 'deactive'){?>
			<div onclick="javascript:activeCaliber(<?php echo $caliber->id;?>,'<?php echo $caliber->id;?>');" class="btn"><i class="fa fa-check" aria-hidden="true"></i>Set to Available</div>
			<?php }?>

			<a href="caliber_editor.php?caliber=<?php echo $caliber->id;?>" class="btn"><i class="fa fa-cog" aria-hidden="true"></i>Edit this caliber</a>
			<a href="route_editor.php?caliber=<?php echo $caliber->id;?>" class="btn"><i class="fa fa-plus" aria-hidden="true"></i>CREATE ROUTE</a>
		</div>
	</div>
	<!-- Table -->
	<div class="list-container">
		<div class="items route-items topic-fix">
			<div class="col1">Route</div>
			<div class="col2">Description</div>
			<div class="col3">Updated</div>
		</div>

		<?php $route->listRouteInCaliber($caliber->id,array('type' => 'route-items'));?>
	</div>
</div>
</body>
</html>