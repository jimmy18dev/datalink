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

<title>Editor : General Remark</title>

<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/service/remark.service.js"></script>
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
			<div class="icon"><i class="fa fa-commenting" aria-hidden="true"></i></div>
			<h1><?php echo (empty($remark->id)?'Create new Remark':'Remark Editing...');?></h1>
			<p>เพราะชีวิตไม่ได้มีแค่รูปถ่ายและเราชอบไอเดียนี้ ขอร่วมเล่นเกมนี้ด้วยคน เราขอท้าทายเฟซบุ๊คด้วยการทดสอบเล็กๆเพื่อดูว่าใครบ้างที่จะอ่านโพสต์ข้อความที่ไม่มีรูปภาพ</p>
		</div>
		<div class="form-input">
			<div class="input">
				<textarea class="input-text input-textarea animated" id="description" placeholder="Add a description for this remark"><?php echo $remark->description;?></textarea>

				<input type="hidden" id="category_id" value="<?php echo (empty($remark->category_id)?'1':$remark->category_id);?>">
			</div>
			<div class="control">
				<?php if(empty($remark->id)){?>
				<div class="submit-btn" onclick="javascript:create();">Create Remark</div>
				<?php }else{?>
				<div class="delete-btn" onclick="javascript:deleteRemark(<?php echo $remark->id;?>);">Delete this remark</div>
				<div class="submit-btn" onclick="javascript:edit(<?php echo $remark->id;?>);">SAVE</div>
				<?php }?>
			</div>
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