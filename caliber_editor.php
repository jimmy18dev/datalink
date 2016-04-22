<?php
include'config/autoload.php';

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
if(empty($caliber->id)){
	$current_page['2'] = 'new_caliber';
}else{
	$current_page['2'] = 'edit_caliber';
}
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

<title>Editor : Caliber Code</title>

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
			<h1>Caliber Code</h1>
			<p>a system of words, letters, figures, or other symbols substituted for other words, letters, etc., especially for the purposes of secrecy.</p>
		</div>
		<div class="tab">
			<a href="caliber.php" class="tab-items items-right cancel">Cancel<i class="fa fa-times"></i></a>
		</div>
	</div>

	<div class="form-container">
		<h3>Create caliber code</h3>
		<div class="form-items">
			<div class="caption">Code</div>
			<div class="input">
				<input class="input-text" type="text" id="code" value="<?php echo $caliber->code;?>" autofocus>
			</div>
		</div>
		<div class="form-items">
			<div class="caption">Family</div>
			<div class="input">
				<input class="input-text" type="text" id="family" value="<?php echo $caliber->family;?>">
			</div>
		</div>
		<div class="form-items">
			<div class="caption">Description</div>
			<div class="input">
				<input class="input-text" type="text" id="description" value="<?php echo $caliber->description;?>">
			</div>
		</div>
		<div class="form-items">
			<div class="caption">Name</div>
			<div class="input">
				<input class="input-text" type="text" id="name" value="<?php echo $caliber->name;?>">
			</div>
		</div>
		<div class="form-items">
			<div class="caption">Std.time (Hrs/K)</div>
			<div class="input">
				<input class="input-text" type="text" id="hrs" value="<?php echo $caliber->hrs;?>">
			</div>
		</div>
		<div class="form-items">
			<div class="caption">Remark</div>
			<div class="input">
				<input class="input-text" type="text" id="remark" value="<?php echo $caliber->remark;?>">
			</div>
		</div>

		<?php if(empty($caliber->id)){?>
		<div class="submit-btn" onclick="javascript:create();">Create</div>
		<?php }else{?>
		<div class="submit-btn" onclick="javascript:edit(<?php echo $caliber->id;?>);">SAVE</div>
		<?php }?>
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