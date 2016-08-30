<?php
include'config/autoload.php';
include'config/authorization.php';

// current page
$current_page['1'] = 'setting';
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

<?php include'favicon.php';?>
<title>Setting</title>

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
			<h1>Setting</h1>
			<p>Change value by setting up default programs for datalink.</p>
		</div>
	</div>

	<div class="list-container">
		<div class="items-container">
			<?php echo $setting->listSetting(array('type' => 'setting-form-items'));?>
		</div>
	</div>
</div>

<script type="text/javascript" src="js/service/min/setting.service.min.js"></script>
</body>
</html>