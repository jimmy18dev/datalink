<?php
include'config/autoload.php';

if(!empty($_GET['id'])){
	$remark->getRemark($_GET['id']);
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
<header class="header">
	<div class="logo">RONDA THAILAND</div>
	<div class="profile">
		<div class="name">Puwadon</div><img src="image/avatar.png" alt="">
	</div>
</header>
<div class="container">
	<div class="head">
		<div class="head-title">General Remark</div>
		<div class="tab">
			<div class="tab-items tab-items-active">Tab 1</div>
			<div class="tab-items">Tab 2</div>
			<div class="tab-items">Tab 3</div>
			<div class="tab-items">Tab 4</div>
			<div class="tab-items items-right">Register<i class="fa fa-angle-right"></i></div>
		</div>
	</div>

	<div class="form-container">
		<h3>General Remark</h3>
		<div class="form-items">
			<div class="caption">Description</div>
			<div class="input">
				<input class="input-text" type="text" id="description" value="<?php echo $remark->description;?>">
			</div>
		</div>

		<input type="hidden" id="category_id" value="<?php echo (empty($remark->category_id)?'1':$remark->category_id);?>">

		<?php if(empty($remark->id)){?>
		<div class="submit-btn" onclick="javascript:create();">Register</div>
		<?php }else{?>
		<div class="submit-btn" onclick="javascript:edit(<?php echo $remark->id;?>);">SAVE</div>
		<?php }?>
	</div>
</div>
<footer class="footer">
	<p>© Ronda (Thailand) co.,ltd 2016 | Datalink version 1.0</p>
	<p class="mini">RONDA (Thailand) Co., Ltd. We are a subsidiary of a Swiss multinational company, one of the world's leading watch movement manufacturers.</p>
</footer>
</body>
</html>