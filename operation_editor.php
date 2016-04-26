<?php
include'config/autoload.php';

// Permission
if(!$user_online){
	header("Location: index.php");
	die();
}

if(!empty($_GET['operation'])){
	$caliber->getOperation($_GET['operation']);
}

// current page
$current_page['1'] = 'caliber';
$current_page['2'] = 'new_operation';
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

<title>CREATE OPERATIONS</title>

<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/service/caliber.service.js"></script>

</head>
<body>
<?php include 'header.php';?>
<div class="container">
	<div class="head">
		<div class="head-title">
			<h1>OPERATIONS</h1>
		</div>
		<div class="tab">
			<a href="caliber_code.php?caliber=<?php echo $caliber->id;?>" class="tab-items items-right cancel"><i class="fa fa-times"></i>Cancel</a>
		</div>
	</div>

	<div class="form-container">
		<h3>Create Operation</h3>
		<div class="form-items">
			<div class="caption">Name</div>
			<div class="input">
				<input class="input-text" type="text" id="name" value="<?php echo $caliber->operation_name;?>">
			</div>
		</div>
		<div class="form-items">
			<div class="caption">Description</div>
			<div class="input">
				<input class="input-text" type="text" id="description" value="<?php echo $caliber->operation_description;?>" autofocus>
			</div>
		</div>

		<input class="input-text" type="hidden" id="operation_id" value="<?php echo (empty($caliber->opt_caliber_id)?$caliber->id:$caliber->opt_caliber_id);?>">

		<?php if(empty($caliber->operation_id)){?>
		<div class="submit-btn" onclick="javascript:createOperation();">CREATE</div>
		<?php }else{?>
		<div class="submit-btn" onclick="javascript:editOperation(<?php echo $caliber->operation_id;?>);">SAVE</div>
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