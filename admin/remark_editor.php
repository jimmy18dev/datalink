<?php
include'config/autoload.php';

// Permission
if(!$user_online){
	header("Location: index.php");
	die();
}

if(!empty($_GET['id'])){
	$remark->getRemark($_GET['id']);
}

// current page
$current_page['1'] = 'remark';
if(empty($remark->id)){
	$current_page['2'] = 'new_remark';
}else{
	$current_page['2'] = 'edit_remark';
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

<title>Editor : General Remark</title>

<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/service/remark.service.js"></script>

</head>
<body>
<?php include'header.php';?>
<div class="container">
	<div class="head">
		<div class="head-title">
			<h1>General Remark</h1>
			<p>General remarks. The first part of the text is to familiarize the reader with the main types of existing irrigation organizations.</p>
		</div>
	</div>

	<div class="form-container">
		<div class="form-items">
			<div class="caption">Description</div>
			<div class="input">
				<input class="input-text" type="text" id="description" value="<?php echo $remark->description;?>" autofocus>
			</div>
		</div>

		<input type="hidden" id="category_id" value="<?php echo (empty($remark->category_id)?'1':$remark->category_id);?>">

		<a href="remark.php?" class="cancel-btn"><i class="fa fa-angle-left"></i>Cancel</a>

		<?php if(empty($remark->id)){?>
		<div class="submit-btn" onclick="javascript:create();">CREATE<i class="fa fa-angle-right"></i></div>
		<?php }else{?>
		<div class="submit-btn" onclick="javascript:edit(<?php echo $remark->id;?>);">SAVE<i class="fa fa-angle-right"></i></div>
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