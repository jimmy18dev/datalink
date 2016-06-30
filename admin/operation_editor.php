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

if(!empty($_GET['operation'])){
	$operation->getOperation($_GET['operation']);
}

// current page
$current_page['1'] = 'caliber';
$current_page['2'] = 'new_operation';
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
<title>CREATE OPERATIONS</title>

<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

</head>
<body>
<?php include 'header.php';?>
<div class="container">
	<div class="form-container">
		<div class="form-detail">
			<div class="icon"><i class="fa fa-bolt" aria-hidden="true"></i></div>
			<h1><?php echo (empty($operation->id)?'Create new Operation':'Operation Editing...');?></h1>
			<p>เพราะชีวิตไม่ได้มีแค่รูปถ่ายและเราชอบไอเดียนี้ ขอร่วมเล่นเกมนี้ด้วยคน เราขอท้าทายเฟซบุ๊คด้วยการทดสอบเล็กๆเพื่อดูว่าใครบ้างที่จะอ่านโพสต์ข้อความที่ไม่มีรูปภาพ</p>
		</div>
		<div class="form-input">
			<div class="input">
				<input class="input-text font-bigsize" type="text" id="name" placeholder="Operation Name" value="<?php echo $operation->name;?>">
				<textarea class="input-text input-textarea animated" id="description" placeholder="Add a description for this operation"><?php echo $operation->description;?></textarea>

				<input class="input-text" type="hidden" id="operation_id" value="<?php echo (empty($caliber->opt_caliber_id)?$caliber->id:$caliber->opt_caliber_id);?>">

				<input type="hidden" id="route_id" value="<?php echo $_GET['route'];?>">
			</div>
			<div class="control">
				<?php if(empty($operation->id)){?>
				<div class="submit-btn" id="submit-btn" onclick="javascript:createOperation();"><span id="btn-caption">Create Operation</span><span id="btn-icon"><i class="fa fa-check" aria-hidden="true"></i></span></div>
				<?php }else{?>
				<div class="delete-btn" onclick="javascript:deleteOperation(<?php echo $operation->id;?>);"><i class="fa fa-trash" aria-hidden="true"></i>Delete this operation</div>
				<div class="submit-btn" id="submit-btn" onclick="javascript:editOperation(<?php echo $operation->id;?>);"><span id="btn-caption">Update</span><span id="btn-icon"><i class="fa fa-floppy-o" aria-hidden="true"></i></span></div>
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
<script type="text/javascript" src="js/service/min/operation.service.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.animated').autosize({append: "\n"});
});
</script>

</body>
</html>