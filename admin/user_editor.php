<?php
include'config/autoload.php';
include'config/authorization.php';

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

<?php include'favicon.php';?>
<title>Edit : <?php echo $user->code;?></title>

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
			<div class="icon"><i class="fa fa-user" aria-hidden="true"></i></div>
			<h1><?php echo (empty($userData['id'])?'Create new User':'User Editing...');?></h1>
			<p>เพราะชีวิตไม่ได้มีแค่รูปถ่ายและเราชอบไอเดียนี้ ขอร่วมเล่นเกมนี้ด้วยคน เราขอท้าทายเฟซบุ๊คด้วยการทดสอบเล็กๆเพื่อดูว่าใครบ้างที่จะอ่านโพสต์ข้อความที่ไม่มีรูปภาพ</p>
		</div>
		<div class="form-input">

			<?php if(!empty($userData['id']) && $userData['id'] != $user->id){?>
			<div class="grant-control">
				<?php if($userData['type'] != 'Administrator'){?>
				<div class="grant-btn" onclick="javascript:addToAdmin(<?php echo $userData['id'];?>,'<?php echo $userData['fname'];?>');"><i class="fa fa-plus" aria-hidden="true"></i>Add to admin</div>
				<?php }else{?>
				<div class="grant-btn grant-remove-btn" onclick="javascript:removeAdmin(<?php echo $userData['id'];?>,'<?php echo $userData['fname'];?>');"><i class="fa fa-times" aria-hidden="true"></i>Remove admin</div>
				<?php }?>
			</div>
			<?php }?>
			
			<div class="input">
				<input class="input-text half-size font-bigsize" type="text" id="fname" value="<?php echo $userData['fname'];?>" placeholder="First Name">
				<input class="input-text half-size font-bigsize" type="text" id="lname" value="<?php echo $userData['lname'];?>" placeholder="Last Name">

				<input class="input-text" type="text" id="code" value="<?php echo $userData['code'];?>" placeholder="Employee ID">

				<p class="caption"><i class="fa fa-lock" aria-hidden="true"></i>User Login</p>
				<input class="input-text" type="text" id="username" value="<?php echo $userData['username'];?>" placeholder="Username">
				<input class="input-text" type="text" id="password" value="<?php echo $userData['password'];?>" placeholder="Password">

				<p class="caption"><i class="fa fa-file-text-o" aria-hidden="true"></i>Section</p>
				<select class="input-text" id="section_id">
						<option value="0">Section/Position</option>
						<?php $section->listAllSection(array('type' => 'section-option-select-items','current'=> $userData['section_id']));?>
					</select>

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
			<div class="control">
				<?php if(empty($userData['id'])){?>
				<div class="submit-btn" id="submit-btn" onclick="javascript:register();"><span id="btn-caption">Create User Account</span><span id="btn-icon"><i class="fa fa-check" aria-hidden="true"></i></span></div>
				<?php }else{?>
				<div class="delete-btn" onclick="javascript:deactiveUser(<?php echo $userData['id'];?>,'<?php echo $userData['fname'];?>');"><i class="fa fa-ban" aria-hidden="true"></i>Deactive this user account</div>
				<div class="submit-btn" id="submit-btn" onclick="javascript:edit(<?php echo $userData['id'];?>);"><span id="btn-caption">Update info</span><span id="btn-icon"><i class="fa fa-floppy-o" aria-hidden="true"></i></span></div>
				<?php }?>
			</div>
		</div>		
	</div>
</div>

<div class="loading-box" id="loading-box">
	<div class="dialog"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i>Please wait a moment.</div>
</div>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/service/min/user.service.min.js"></script>
</body>
</html>