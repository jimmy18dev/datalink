<?php
include'config/autoload.php';

// Permission
if(!$user_online){
	header("Location: index.php");
	die();
}else if($user->status == 'deactive'){
	header("Location: profile.php");
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

<title>Editor : Caliber Code</title>

<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/service/caliber.service.js"></script>
<script type="text/javascript" src="js/lib/jquery.autosize.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.animated').autosize({append: "\n"});
});
</script>

</head>
<body>
<?php include'header.php';?>
<div class="container">
	<div class="form-container">
		<div class="form-detail">
			<div class="icon"><i class="fa fa-database" aria-hidden="true"></i></div>
			<h1>
				<?php if(empty($caliber->id)){?>
				Create new Caliber code
				<?php }else{?>
				Caliber <?php echo $caliber->code.' '.$caliber->family;?> editing...
				<?php }?>
			</h1>
			<p>เพราะชีวิตไม่ได้มีแค่รูปถ่ายและเราชอบไอเดียนี้ ขอร่วมเล่นเกมนี้ด้วยคน เราขอท้าทายเฟซบุ๊คด้วยการทดสอบเล็กๆเพื่อดูว่าใครบ้างที่จะอ่านโพสต์ข้อความที่ไม่มีรูปภาพ</p>
		</div>
		<div class="form-input">
			<div class="input">
				<p class="caption">Cliber Code</p>
				<input class="input-text half-size font-bigsize" type="text" id="code" value="<?php echo $caliber->code;?>" autofocus placeholder="Code">
				<input class="input-text half-size font-bigsize" type="text" id="family" value="<?php echo $caliber->family;?>" placeholder="Family">

				<textarea class="input-text input-textarea animated" id="description" placeholder="Add a description for this caliber code"><?php echo $caliber->description;?></textarea>

				<p class="caption">Std.time (Hrs/K)</p>
				<input class="input-text" type="text" id="hrs" value="<?php echo $caliber->hrs;?>" placeholder="0.00">
			</div>
			<div class="control">
				<?php if(empty($caliber->id)){?>
				<div class="submit-btn" onclick="javascript:create();">Create Caliber</div>
				<?php }else{?>
				<div class="delete-btn" onclick="javascript:deleteCaliber(<?php echo $caliber->id;?>);">Delete this caliber code</div>
				<div class="submit-btn" onclick="javascript:edit(<?php echo $caliber->id;?>);">SAVE</div>
				<?php }?>
			</div>
			
			<input class="input-text" type="hidden" id="remark" value="<?php echo $caliber->remark;?>">
			<input class="input-text" type="hidden" id="name" value="<?php echo $caliber->name;?>">
		</div>
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