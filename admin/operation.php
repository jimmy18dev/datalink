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
<script type="text/javascript" src="js/service/operation.service.js"></script>

</head>
<body>
<?php include'header.php';?>
<div class="container">
	<div class="head">
		<div class="head-title">
			<h1><strong><?php echo $route->name;?></strong> in <a href="route.php?caliber=<?php echo $route->caliber_id;?>"><strong><?php echo $route->caliber_name;?></strong></a></h1>
			<p>This route has <?php echo $route->total_operation;?> items and updated at <?php echo $route->update_time;?> <a href="route_editor.php?route=<?php echo $route->id;?>"><i class="fa fa-cog" aria-hidden="true"></i>Edit Route</a></p>
		</div>

		<div class="head-control">
			<a href="operation_editor.php" class="create-btn">CREATE OPEARATION</a>
		</div>
	</div>
	<!-- Table -->
	<div class="list-container">
		<h3>Active</h3>
		<div class="operation-items topic-fix">
			<div class="col1">Name</div>
			<div class="col2">Descriptions</div>
			<div class="col3">Updated</div>
			<div class="col4">Status</div>
			<div class="col5"><i class="fa fa-angle-down" aria-hidden="true"></i></div>
		</div>
		<div class="items-container">
			<?php $operation->listAllOperations($route->id,array('type' => 'operation-items','status' => 'active','route_current' => $_GET['route']));?>
		</div>
		<h3>Disable</h3>
		<div class="items-container">
			<?php $operation->listAllOperations($route->id,array('type' => 'operation-items','status' => 'disable','route_current' => $_GET['route']));?>
		</div>
	</div>

	<input type="hidden" id="route_id" value="<?php echo $route->id;?>">
</div>
</body>
</html>