<?php include'config/autoload.php';?>
<?php
// Permission
if(!$user_online){
	header("Location: index.php");
	die();
}

if(!empty($_GET['route'])){
	$route->getRoute($_GET['route']);
}

// current page
$current_page['1'] = 'caliber';
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

<title><?php echo $route->name;?> in <?php echo $route->caliber_name;?></title>

<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>
<?php if($route->type != "primary"){?>
<script type="text/javascript" src="js/service/operation.service.js"></script>
<?php }?>
<?php if($route->type!='primary'){?><script type="text/javascript" src="js/service/route.service.js"></script><?php }?>

</head>
<body>
<?php include'header.php';?>
<div class="container">
	<?php if($route->type != "primary"){?>
	<div class="available-control">
		<p>You can <span onclick="javascript:setPrimary(<?php echo $route->id;?>,<?php echo $route->caliber_id;?>);" class="btn activate-btn">Activate<i class="fa fa-check" aria-hidden="true"></i></span> a route of <strong><?php echo $route->caliber_name;?></strong> by click to activate button.</p>
		<p>Note. You can't add or remove a operation from control center in route's activated!</p>
	</div>
	<?php }?>
	<div class="head">
		<div class="head-title">
			<h1><strong><?php echo $route->name;?></strong> in <a href="route.php?caliber=<?php echo $route->caliber_id;?>"><strong><?php echo $route->caliber_name;?></strong></a></h1>
			<p>This route has operations <strong><?php echo $route->total_operation;?> items</strong> and last updated at <strong><?php echo $route->update_time;?></strong></p>
		</div>

		<div class="head-control">
			<a href="operation_editor.php" class="btn"><i class="fa fa-plus" aria-hidden="true"></i>CREATE OPEARATION</a>
			<a href="route_editor.php?route=<?php echo $route->id;?>" class="btn edit-btn"><i class="fa fa-cog" aria-hidden="true"></i>Edit Route</a>
		</div>
	</div>
	<!-- Table -->
	<div class="list-container">
		<div class="operation-container">
			<h3><i class="fa fa-thumb-tack" aria-hidden="true"></i> Operation in <?php echo $route->name;?></h3>
			<?php $operation->listAllOperations($route->id,array('type' => 'operation-items','status' => 'active','route_current' => $_GET['route'],'route_type' => $route->type));?>
		</div>
		<div class="operation-container">
			<h3><i class="fa fa-list" aria-hidden="true"></i> Disable operation</h3>
			<?php $operation->listAllOperations($route->id,array('type' => 'operation-items','status' => 'disable','route_current' => $_GET['route'],'route_type' => $route->type));?>
		</div>
	</div>

	<input type="hidden" id="route_id" value="<?php echo $route->id;?>">
</div>
</body>
</html>