<?php
include'config/autoload.php';
include'config/authorization.php';

if(!empty($_GET['route'])){
	$route->getRoute($_GET['route']);
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

<?php include'favicon.php';?>
<title>Editor : General Remark</title>

<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

</head>
<body>
<?php include'header.php';?>
<div class="container">
	<div class="form-container">
		<div class="form-detail">
			<div class="icon"><i class="fa fa-code-fork" aria-hidden="true"></i></div>
			<h1>
				<?php if(empty($route->id)){?>
				Create new route to <a href="route.php?caliber=<?php echo $caliber->id;?>"><?php echo $caliber->code.''.$caliber->family;?></a>
				<?php }else{?>
				<?php echo $route->name;?> editing...
				<?php }?>
			</h1>
		</div>
		<div class="form-input">
			<div class="input">
				<input class="input-text font-bigsize" type="text" id="name" value="<?php echo $route->name;?>" placeholder="Route name">
				<input class="input-text font-bigsize" type="hidden" id="code" value="<?php echo $route->code;?>">

				<textarea class="input-text input-textarea animated" id="description" placeholder="Add a description for this route"><?php echo $route->description;?></textarea>

				<input type="text" id="route_id" value="<?php echo $route->id;?>">
				<!-- You can't update caliner code! -->
				<input type="text" id="caliber_id" value="<?php echo (empty($route->caliber_id)?$_GET['caliber']:$route->caliber_id);?>">
			</div>
			<div class="control">
				<?php if(empty($route->id)){?>
				<div class="submit-btn" id="submit-btn" onclick="javascript:createRoute();"><span id="btn-caption">Create Route</span><span id="btn-icon"><i class="fa fa-check" aria-hidden="true"></i></span></div>
				<?php }else{?>
				<div class="delete-btn" onclick="javascript:deleteRoute(<?php echo $route->id;?>);"><i class="fa fa-trash" aria-hidden="true"></i>Delete this route</div>
				<div class="submit-btn" id="submit-btn" onclick="javascript:editRoute(<?php echo $route->id;?>);"><span id="btn-caption">Update</span><span id="btn-icon"><i class="fa fa-floppy-o" aria-hidden="true"></i></span></div>
				<?php }?>
			</div>
		</div>
	</div>
</div>

<div class="loading-box" id="loading-box">
	<div class="dialog"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i>Please wait a moment.</div>
</div>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/lib/jquery.autosize.min.js"></script>
<script type="text/javascript" src="js/service/min/route.service.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.animated').autosize({append: "\n"});
});
</script>
</body>
</html>