<?php include'config/autoload.php';?>
<?php
// Permission
if(!$user_online){
	header("Location: index.php");
	die();
}

if(!empty($_GET['route'])){
	$caliber->getRoute($_GET['route']);
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
			<h1>OPERATIONS IN <?php echo $caliber->route_name;?></h1>
			<p>| <a href="route_editor.php?route=<?php echo $caliber->route_id;?>">edit</a></p>
		</div>

		<div class="head-control">
			<a href="operation_editor.php" class="create-btn"><i class="fa fa-plus" aria-hidden="true"></i>CREATE OPEARATION</a>
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
			<?php $caliber->listAllOperations($caliber->route_id,array('type' => 'operation-items','status' => 'active','route_current' => $_GET['route']));?>
		</div>
		<h3>Disable</h3>
		<div class="items-container">
			<?php $caliber->listAllOperations($caliber->route_id,array('type' => 'operation-items','status' => 'disable','route_current' => $_GET['route']));?>
		</div>
	</div>

	<input type="hidden" id="route_id" value="<?php echo $caliber->route_id;?>">
</div>
</body>
</html>