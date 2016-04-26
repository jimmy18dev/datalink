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

<title>Edit : <?php echo $user->code;?></title>

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
			<p>User Management is an authentication feature that provides administrators with the ability to identify and control the state of users logged into the network.</p>
		</div>
	</div>

	<div class="form-container">
		<div class="form-items">
			<div class="caption">รหัสพนักงาน</div>
			<div class="input">
				<input class="input-text" type="text" id="code" value="<?php echo $userData['code'];?>" autofocus placeholder="ตัวเลขหรือตัวอักษรเท่านั้น">
			</div>
		</div>
		<div class="form-items">
			<div class="caption">ชื่อ-นามสกุล</div>
			<div class="input">
				<input class="input-text half-size" type="text" id="fname" value="<?php echo $userData['fname'];?>" placeholder="ชื่อจริง">
				<input class="input-text half-size" type="text" id="lname" value="<?php echo $userData['lname'];?>" placeholder="นามสกุล">
			</div>
		</div>
		<div class="form-items">
			<div class="caption">Username</div>
			<div class="input">
				<input class="input-text" type="text" id="username" value="<?php echo $userData['username'];?>" placeholder="ไม่น้อยกว่า 6 ตัวอีกษร">
			</div>
		</div>
		<div class="form-items">
			<div class="caption">รหัสผ่าน</div>
			<div class="input">
				<input class="input-text" type="text" id="password" value="<?php echo $userData['password'];?>" placeholder="ไม่น้อยกว่า 6 ตัวอีกษร">
			</div>
		</div>
		<div class="form-items">
			<div class="caption">Section</div>
			<div class="input">
				<select class="input-text" id="section_id">
					<option value="0">Section/Position</option>
					<?php $section->listAllSection(array('type' => 'section-option-select-items','current'=> $userData['section_id']));?>
				</select>
			</div>
		</div>

		<a href="user.php" class="cancel-btn"><i class="fa fa-angle-left"></i>Cancel</a>

		<?php if(empty($userData['id'])){?>
		<div class="submit-btn" onclick="javascript:register();">Register<i class="fa fa-angle-right"></i></div>
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