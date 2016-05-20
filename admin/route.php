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

</head>
<body>
<?php include'header.php';?>
<div class="container">
	<div class="head">
		<div class="head-title">
			<h1>Route of <?php echo $caliber->code.' '.$caliber->family;?></h1>
			<p>Standard time: <strong><?php echo $caliber->hrs;?></strong> Hrs/K | Updated: <?php echo $caliber->update_time;?> | <?php echo $caliber->description;?> | <a href="caliber_editor.php?caliber=<?php echo $caliber->id?>">[Edit]</a></p>
		</div>

		<div class="head-control">
			<a href="route_editor.php?caliber=<?php echo $caliber->id;?>" class="create-btn"><i class="fa fa-plus" aria-hidden="true"></i>CREATE ROUTE</a>
		</div>
	</div>
	<!-- Table -->
	<div class="list-container">
		<div class="route-items topic-fix">
			<div class="col1">Route Name</div>
			<div class="col2">Type</div>
			<div class="col3">Updated</div>
			<div class="col4">Description</div>
			<div class="col5">Edit</div>
		</div>

		<?php $caliber->listAllRoutes($caliber->id,array('type' => 'route-items'));?>
	</div>
</div>
</body>
</html>