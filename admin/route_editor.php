<?php
include'config/autoload.php';

// Permission
if(!$user_online){
	header("Location: index.php");
	die();
}

if(!empty($_GET['caliber'])){
	$caliber->getCaliber($_GET['caliber']);
}

if(!empty($_GET['route'])){
	$caliber->getRoute($_GET['route']);
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

<title>Editor : General Remark</title>

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
	<div class="form-container">

		<div class="input">
			<input class="input-text font-bigsize" type="text" id="route_code" value="<?php echo $caliber->route_code;?>" autofocus>
			<input class="input-text" type="text" id="route_name" value="<?php echo $caliber->route_name;?>">

			<textarea class="input-text input-textarea" id="name" placeholder="Add a description for this route"><?php echo $caliber->route_description;?></textarea>

			<input type="hidden" id="route_id" value="<?php echo $caliber->route_id;?>">
			<!-- You can't update caliner code! -->
			<input type="hidden" id="caliber_id" value="<?php echo $caliber->id;?>">
		</div>
		<div class="control">
			<?php if(empty($caliber->route_id)){?>
			<div class="submit-btn" onclick="javascript:createRoute();">CREATE<i class="fa fa-angle-right"></i></div>
			<?php }else{?>
			<div class="submit-btn" onclick="javascript:editRoute(<?php echo $caliber->route_id;?>);">SAVE<i class="fa fa-angle-right"></i></div>
			<?php }?>
		</div>
	</div>
</div>

<div class="loading-box" id="loading-box">
	<div class="dialog">
		<div class="icon"><i class="fa fa-circle-o-notch fa-spin"></i></div>
		<p id="loading-message"></p>
	</div>
</div>
</body>
</html>