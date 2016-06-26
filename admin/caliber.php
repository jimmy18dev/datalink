<?php include'config/autoload.php';?>
<?php
// Permission
if(!$user_online){
	header("Location: login.php");
	die();
}else if($user->status == 'deactive'){
	header("Location: profile.php");
	die();
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

<?php include'favicon.php';?>
<title>Caliber code</title>

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
			<h1>CALIBER CODE</h1>
			<p>Total caliber code <strong><?php echo $caliber->countCaliber('all');?> items</strong> (<?php echo $caliber->countCaliber('active');?> active and <?php echo $caliber->countCaliber('pending');?> pending), a system of words, letters, figures, or other symbols substituted for other words, letters, etc., especially for the purposes of secrecy.</p>
		</div>

		<div class="head-control">
			<a href="caliber_editor.php" class="btn"><i class="fa fa-plus" aria-hidden="true"></i>NEW CALIBER</a>
		</div>
	</div>
	<!-- Table -->
	<div class="list-container">
		<div class="items caliber-items topic-fix">
			<div class="col1">Caliber Code</div>
			<div class="col4">Status</div>
			<div class="col2">Route</div>
			<div class="col3">Std.time (Hrs/K)</div>
			<div class="col5">Description</div>
		</div>
		<?php $caliber->listAllCalibers(array('type' => 'caliber-items'));?>
	</div>
</div>
</body>
</html>