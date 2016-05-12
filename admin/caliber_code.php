<?php include'config/autoload.php';?>
<?php

// Permission
if(!$user_online){
	header("Location: index.php");
	die();
}

if(!empty($_GET['caliber'])){
	$caliber->getcaliber($_GET['caliber']);
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
<meta http-equiv="refresh" content="60">

<title>Operation Recipe</title>

<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>

</head>
<body>
<?php include 'header.php';?>
<div class="container">
	<div class="head">
		<div class="head-title">
			<h1><?php echo $caliber->code.' '.$caliber->family;?></h1>
			<p>Std.time <?php echo $caliber->hrs;?> Hrs/K | <?php echo $caliber->description;?> | <a href="caliber_editor.php?caliber=<?php echo $caliber->id;?>" class="tab-items items-right">Edit</a></p>
		</div>

		<div class="tab">
			<div class="tab-items tab-items-active">All Operation</div>
			<a href="operation_editor.php?caliber=<?php echo $caliber->id;?>" class="tab-items items-right">New operation<i class="fa fa-angle-right"></i></a>
		</div>
	</div>
	<!-- Table -->
	<div class="topic-fix">
		<div class="operation-topic-fix">
			<div class="col1">Route ID</div>
			<div class="col2">Route Name</div>
			<div class="col3">Name</div>
		</div>
	</div>
	<div class="list">
		<?php $caliber->listAllOperationRecipe($caliber->id,array('type' => 'operation-items'));?>
	</div>
</div>
</body>
</html>