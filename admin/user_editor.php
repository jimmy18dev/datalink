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
<div class="topbar">
	<div class="title">Create new user account.</div>
</div>
<div class="container">
	<div class="form">
		<?php if(!empty($userData['id']) && $userData['id'] != $user->id){?>
		<div class="grant-control">
			<?php if($userData['type'] != 'Administrator'){?>
			<div class="grant-btn" onclick="javascript:addToAdmin(<?php echo $userData['id'];?>,'<?php echo $userData['fname'];?>');"><i class="fa fa-plus" aria-hidden="true"></i>Add to admin</div>
			<?php }else{?>
			<div class="grant-btn grant-remove-btn" onclick="javascript:removeAdmin(<?php echo $userData['id'];?>,'<?php echo $userData['fname'];?>');"><i class="fa fa-times" aria-hidden="true"></i>Remove admin</div>
			<?php }?>
		</div>
		<?php }?>
		
		<div class="form-items">
			<div class="caption">INFOMATION</div>
			<div class="input">
				<input class="input-text" type="text" id="fname" value="<?php echo $userData['fname'];?>" placeholder="First Name">
				<input class="input-text" type="text" id="lname" value="<?php echo $userData['lname'];?>" placeholder="Last Name">

				<input class="input-text" type="text" id="code" value="<?php echo $userData['code'];?>" placeholder="Employee ID">
			</div>
		</div>

		<div class="form-items">
			<div class="caption">LOGIN</div>
			<div class="input">
				<input class="input-text" type="text" id="username" value="<?php echo $userData['username'];?>" placeholder="Username">
				<input class="input-text" type="text" id="password" value="<?php echo $userData['password'];?>" placeholder="Password">
			</div>
		</div>

		<div class="form-items">
			<div class="caption">SECTION</div>
			<div class="input">
				<div class="select">
					<select id="section_id">
						<option value="0">Section/Position</option>
						<?php $section->listAllSection(array('type' => 'section-option-select-items','current'=> $userData['section_id']));?>
					</select>
				</div>
				<div class="select">
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
		</div>

		<div class="form-items">
			<div class="caption"></div>
			<div class="input -control">
				<?php if(empty($userData['id'])){?>
				<div class="btn" id="submit-btn" onclick="javascript:register();"><span id="btn-caption">CREATE</span><span id="btn-icon"><i class="fa fa-check" aria-hidden="true"></i></span></div>
				<?php }else{?>
				<div class="delete-btn" onclick="javascript:deactiveUser(<?php echo $userData['id'];?>,'<?php echo $userData['fname'];?>');"><i class="fa fa-ban" aria-hidden="true"></i>Deactive this user account</div>
				<div class="btn" id="submit-btn" onclick="javascript:edit(<?php echo $userData['id'];?>);"><span id="btn-caption">SAVE</span><span id="btn-icon"><i class="fa fa-floppy-o" aria-hidden="true"></i></span></div>
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