<?php
include'config/autoload.php';

// Permission
if(!$user_online){
	header("Location: index.php");
	die();
}


if(!empty($_GET['user'])){
	$userData = $user->getData($_GET['user']);
}

// current page
$current_page['1'] = 'user';
if(empty($userData['id'])){
	$current_page['2'] = 'new_user';
}else{
	$current_page['2'] = 'edit_user';
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

<title>USER EDITOR</title>

<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/service/user.service.js"></script>

</head>
<body>
<?php include'header.php';?>
<div class="container">
	<div class="head">
		<div class="head-title">
			<h1>User management</h1>
		</div>
		<div class="tab">
			<a href="user.php" class="tab-items items-right cancel">Cancel<i class="fa fa-times"></i></a>
		</div>
	</div>

	<div class="form-container">
		<h3>USER</h3>
		<div class="form-items">
			<div class="caption">รหัสพนักงาน</div>
			<div class="input">
				<input class="input-text" type="text" id="code" value="<?php echo $userData['code'];?>" autofocus>
			</div>
		</div>
		<div class="form-items">
			<div class="caption">ชื่อจริง</div>
			<div class="input">
				<input class="input-text" type="text" id="fname" value="<?php echo $userData['fname'];?>">
			</div>
		</div>
		<div class="form-items">
			<div class="caption">นามสกุล</div>
			<div class="input">
				<input class="input-text" type="text" id="lname" value="<?php echo $userData['lname'];?>">
			</div>
		</div>
		<div class="form-items">
			<div class="caption">รหัสผ่าน</div>
			<div class="input">
				<input class="input-text" type="text" id="password" value="<?php echo $userData['password'];?>">
			</div>
		</div>

		<?php if(empty($userData['id'])){?>
		<div class="submit-btn" onclick="javascript:register();">Register</div>
		<?php }else{?>
		<div class="submit-btn" onclick="javascript:edit(<?php echo $userData['id'];?>);">SAVE</div>
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