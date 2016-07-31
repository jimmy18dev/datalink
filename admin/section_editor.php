<?php
include'config/autoload.php';
include'config/authorization.php';

if(!empty($_GET['section'])){
	$section->getSection($_GET['section']);
}

// current page
$current_page['1'] = 'section';
if(empty($section->id)){
	$current_page['2'] = 'new_section';
}else{
	$current_page['2'] = 'edit_section';
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

<?php include'favicon.php';?>
<title>Editor : Section</title>

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
			<div class="icon"><i class="fa fa-tags" aria-hidden="true"></i></div>
			<h1><?php echo (empty($section->id)?'Create new Section':'Section Editing...');?></h1>
			<p>เพราะชีวิตไม่ได้มีแค่รูปถ่ายและเราชอบไอเดียนี้ ขอร่วมเล่นเกมนี้ด้วยคน เราขอท้าทายเฟซบุ๊คด้วยการทดสอบเล็กๆเพื่อดูว่าใครบ้างที่จะอ่านโพสต์ข้อความที่ไม่มีรูปภาพ</p>
		</div>
		<div class="form-input">
			<div class="input">
				<input class="input-text font-bigsize" type="text" id="name" value="<?php echo $section->name;?>" placeholder="Section Name" autofocus>
				<input class="input-text font-bigsize" type="text" id="redirect" value="<?php echo $section->redirect;?>" placeholder="Redirect to ...">
				<textarea class="input-text input-textarea animated" id="description" placeholder="Add a description for this section"><?php echo $section->description;?></textarea>
			</div>
			<div class="control">
				<?php if(empty($section->id)){?>
				<div class="submit-btn" id="submit-btn" onclick="javascript:createSection();"><span id="btn-caption">Create Section</span><span id="btn-icon"><i class="fa fa-check" aria-hidden="true"></i></span></div>
				<?php }else{?>
				<div class="delete-btn" onclick="javascript:deleteSection(<?php echo $section->id;?>);"><i class="fa fa-trash" aria-hidden="true"></i>Delete this section</div>
				<div class="submit-btn" id="submit-btn" onclick="javascript:editSection(<?php echo $section->id;?>);"><span id="btn-caption">Update</span><span id="btn-icon"><i class="fa fa-floppy-o" aria-hidden="true"></i></span></div>
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
<script type="text/javascript" src="js/service/min/section.service.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.animated').autosize({append: "\n"});
});
</script>
</body>
</html>