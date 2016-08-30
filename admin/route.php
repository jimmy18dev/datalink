<?php
include'config/autoload.php';
include'config/authorization.php';

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

<?php include'favicon.php';?>
<title>Route in <?php echo $caliber->code.' '.$caliber->family;?></title>

<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

</head>
<body>
<?php include'header.php';?>
<div class="container">
	<?php if($caliber->status == 'pending'){?>
	<div class="available-control">
		<?php if($caliber->has_primary_route){?>
			<p>You can set this caliber to<span onclick="javascript:activeCaliber(<?php echo $caliber->id;?>,'<?php echo $caliber->id;?>');" class="activate-btn">Actived<i class="fa fa-check" aria-hidden="true"></i></span> state by click to actived button, Leader can see caliber's actived only!</p>
		<?php }else{?>
			<p class="note">This caliber's <strong>pending</strong> state because this caliber without <strong>activated route!</strong></p>
		<?php }?>
	</div>
	<?php }?>

	<div class="head">
		<div class="head-title">
			<h1><?php echo $caliber->code.' '.$caliber->family;?></h1>
			<p>Caliber is <strong><?php echo $caliber->status;?></strong> and <strong><?php echo $caliber->total_route;?> routes</strong>, Standard time: <?php echo ($caliber->hrs == 0?'<a href="caliber_editor.php?caliber='.$caliber->id.'" class="add-btn">Add standard time</a>':'<strong>'.$caliber->hrs.' Hrs/K.</strong>');?> Last updated: <strong><?php echo $caliber->update_time;?></strong>, <?php echo (empty($caliber->description)?'<a href="caliber_editor.php?caliber='.$caliber->id.'" class="add-btn">Add description</a>':$caliber->description);?> <a href="caliber_editor.php?caliber=<?php echo $caliber->id;?>" class="control-btn">Edit this Caliber<i class="fa fa-cog" aria-hidden="true"></i></a>
				<?php if($caliber->status == 'active'){?><span onclick="javascript:deactiveCaliber(<?php echo $caliber->id;?>,'<?php echo $caliber->id;?>');" class="control-btn">Set to pending<i class="fa fa-angle-right" aria-hidden="true"></i></span><?php }?></p>
		</div>

		<div class="head-control">
			<?php if($caliber->total_route > 0){?>
			<a href="route_editor.php?caliber=<?php echo $caliber->id;?>" class="btn create-btn"><i class="fa fa-code-fork" aria-hidden="true"></i>CREATE ROUTE</a>
			<?php }?>
		</div>
	</div>
	<!-- Table -->
	<div class="list-container">
		<?php if($caliber->total_route > 0){?>
		<div class="items route-items topic-fix">
			<div class="col1">Route</div>
			<div class="col2">Status</div>
			<div class="col3">Description</div>
			<div class="col4">Updated</div>
		</div>
		<div class="items-container">
			<?php $route->listRouteInCaliber($caliber->id,array('type' => 'route-items'));?>
		</div>
		<?php }else{?>
		<div class="creating-container">
			<p>You can create new <strong>route</strong> items by click a button.</p>
			<br>
			<p><i class="fa fa-angle-down" aria-hidden="true"></i></p>
			<br><br>
			<p><a href="route_editor.php?caliber=<?php echo $caliber->id;?>" class="create-btn"><i class="fa fa-plus" aria-hidden="true"></i>CREATE ROUTE</a></p>
		</div>
		<?php }?>
	</div>
</div>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/service/min/caliber.service.min.js"></script>
</body>
</html>