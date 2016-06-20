<?php include'config/autoload.php';?>
<?php
// Permission
if(!$user_online){
	header("Location: index.php");
	die();
}else if($user->status == 'deactive'){
	header("Location: profile.php");
	die();
}

// current page
$current_page['1'] = 'section';
$total_section = $section->countSection();
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

<title>Section</title>

<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>

</head>
<body>
<?php include'header.php';?>
<div class="container">
	<div class="head">
		<div class="head-title">
			<h1>SECTION</h1>
		</div>

		<?php if($total_section > 0){?>
		<div class="head-control">
			<a href="section_editor.php" class="btn"><i class="fa fa-plus" aria-hidden="true"></i>NEW SECTION</a>
		</div>
		<?php }?>
	</div>

	<div class="list-container">
		<?php if($total_section > 0){?>
		<div class="items section-items topic-fix">
			<div class="col1">Total section <strong><?php echo $total_section;?> items</strong> <i class="fa fa-tag" aria-hidden="true"></i></div>
			<div class="col2">Redirect to</div>
			<div class="col3">Description</div>
		</div>
		<?php $section->listAllSection(array('type' => 'section-items'));?>
		
		<?php }else{?>
		<div class="creating-container">
			<p>You can create new <strong>section</strong> items by click a button.</p>
			<br>
			<p><i class="fa fa-angle-down" aria-hidden="true"></i></p>
			<br><br>
			<p><a href="section_editor.php" class="create-btn"><i class="fa fa-plus" aria-hidden="true"></i>NEW SECTION</a></p>
		</div>
		<?php }?>
	</div>
</div>
</body>
</html>