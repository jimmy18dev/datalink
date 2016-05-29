<?php
include'config/autoload.php';

// Permission
if(!$user_online){
	header("Location: index.php");
	die();
}

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

<title>Editor : Section</title>

<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/service/section.service.js"></script>

</head>
<body>
<?php include'header.php';?>
<div class="container">
	<div class="form-container">
		<div class="input">
			<input class="input-text font-bigsize" type="text" id="name" value="<?php echo $section->name;?>" placeholder="Section Name" autofocus>
			<textarea class="input-text input-textarea" id="description" placeholder="Add a description for this section"><?php echo $section->description;?></textarea>
		</div>
		<div class="control">
			<?php if(empty($section->id)){?>
			<div class="submit-btn" onclick="javascript:createSection();">Create Section</div>
			<?php }else{?>
			<div class="submit-btn" onclick="javascript:editSection(<?php echo $section->id;?>);">SAVE</div>
			<?php }?>
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