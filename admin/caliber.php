<?php
include'config/autoload.php';
include'config/authorization.php';

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

</head>
<body>
<?php include'header.php';?>

<div class="caliber-head-fix">
	<div class="topic">
		<input type="text" class="input-text" id="caliber-search" placeholder="Enter caliber code...">
		<span class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i>Add Caliber</span>
	</div>
	<div class="topic">
		<span class="caption">ROUTE</span>
		<span class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i>Add Route</span>
	</div>
	<div class="topic">
		<span class="caption">OPERATION</span>
		<span class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i>Add Operation</span>
	</div>
</div>

<!-- Table -->
<div class="col-container">
	<div class="result" id="caliber_list"></div>
</div>

<div class="col-container">
	<div class="result" id="route_list">
		<div class="intro">ROUTE</div>
	</div>
</div>

<div class="col-container">
	<div class="result" id="operation_list">
		<div class="intro">OPERATION</div>
	</div>
</div>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/caliber.app.js"></script>
</body>
</html>