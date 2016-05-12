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
		<div class="form-items">
			<div class="caption">Line No.</div>
			<div class="input">
				<select class="input-text" id="line_default">
					<option value="0">Line No.</option>
					<option value="1" <?php echo ($userData['line_default'] == 1?'selected':'');?>>1</option>
					<option value="2" <?php echo ($userData['line_default'] == 2?'selected':'');?>>2</option>
					<option value="3" <?php echo ($userData['line_default'] == 3?'selected':'');?>>3</option>
					<option value="4" <?php echo ($userData['line_default'] == 4?'selected':'');?>>4</option>
					<option value="5" <?php echo ($userData['line_default'] == 5?'selected':'');?>>5</option>
					<option value="6" <?php echo ($userData['line_default'] == 6?'selected':'');?>>6</option>
					<option value="7" <?php echo ($userData['line_default'] == 7?'selected':'');?>>7</option>
					<option value="8" <?php echo ($userData['line_default'] == 8?'selected':'');?>>8</option>
					<option value="9" <?php echo ($userData['line_default'] == 9?'selected':'');?>>9</option>
					<option value="10" <?php echo ($userData['line_default'] == 10?'selected':'');?>>10</option>
					<option value="11" <?php echo ($userData['line_default'] == 11?'selected':'');?>>11</option>
					<option value="12" <?php echo ($userData['line_default'] == 12?'selected':'');?>>12</option>
					<option value="13" <?php echo ($userData['line_default'] == 13?'selected':'');?>>13</option>
					<option value="14" <?php echo ($userData['line_default'] == 14?'selected':'');?>>14</option>
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