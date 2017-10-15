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

<!-- Table -->
<div class="col-container">
	<div class="head">
		<input type="text" class="inputtext" id="caliber-search" placeholder="Search Caliber">
		<span class="btn" id="btnCreateCaliber">Add Caliber</span>
	</div>
	<div class="result" id="caliber_list"></div>
</div>

<div class="col-container">
	<div class="head">
		<span class="btn" id="btnCreateRoute">Add Route</span>
	</div>
	<div class="result" id="route_list">
		<div class="intro">ROUTE</div>
	</div>
</div>

<div class="col-container">
	<div class="head">
		<span class="btn" id="btnCreateOperation">Add Operation</span>
	</div>
	<div class="result" id="operation_list">
		<div class="intro">OPERATION</div>
	</div>
</div>

<div class="dialog" id="dialogCaliber">
	<div class="control">
		<div class="title">Caliber Code</div>
		<div class="btn" id="btnCloseCaliber"><i class="fa fa-times" aria-hidden="true"></i></div>
	</div>
	<div class="input">
		<label for="caliber_code">Caliber Code</label>
		<input type="text" class="inputtext" id="caliber_code">
		<label for="caliber_family">Family</label>
		<input type="text" class="inputtext" id="caliber_family">
		<label for="caliber_description">Description</label>
		<input type="text" class="inputtext" id="caliber_description">
		<label for="caliber_stdtime">Std.time (Hrs/K)</label>
		<input type="text" class="inputtext" id="caliber_stdtime">
		<input type="hidden" class="inputtext" id="caliber_id">

		<button class="btn-submit" id="btnSubmitCaliber">Create</button>
	</div>
</div>
<div class="dialog-filter" id="filterCaliber"></div>

<div class="dialog" id="dialogRoute">
	<div class="control">
		<div class="title">Route</div>
		<div class="btn" id="btnCloseRoute"><i class="fa fa-times" aria-hidden="true"></i></div>
	</div>
	<div class="input">
		<label for="route_name">Route Name</label>
		<input type="text" class="inputtext" id="route_name">
		<label for="route_description">Description</label>
		<input type="text" class="inputtext" id="route_description">

		<button class="btn-submit" id="btnSubmitRoute">Create</button>
	</div>
</div>
<div class="dialog-filter" id="filterRoute"></div>

<div class="dialog" id="dialogOperation">
	<div class="control">
		<div class="title">Operation</div>
		<div class="btn" id="btnCloseOperation"><i class="fa fa-times" aria-hidden="true"></i></div>
	</div>
	<div class="input">
		<label for="operation_name">Operation Name</label>
		<input type="text" class="inputtext" id="operation_name">
		<label for="operation_description">Description</label>
		<input type="text" class="inputtext" id="operation_description">

		<button class="btn-submit" id="btnSubmitOperation">Create</button>
	</div>
</div>
<div class="dialog-filter" id="filterOperation"></div>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/caliber.app.js"></script>
</body>
</html>