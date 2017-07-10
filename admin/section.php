<?php
include'config/autoload.php';
include'config/authorization.php';

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

<?php include'favicon.php';?>
<title>Section</title>

<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>

</head>
<body>
<?php include'header.php';?>
<div class="topbar">
	<div class="title"><strong>SECTION :</strong> Default folder for sub-program in datalink.</div>
	<?php if($total_section > 0){?>
	<a href="section_editor.php" class="btn">NEW SECTION<i class="fa fa-plus-circle" aria-hidden="true"></i></a>
	<?php }?>
</div>
<div class="container">
	<div class="page">
		<div class="section-items topic-fix">
			<div class="col1">Name</div>
			<div class="col2">Redirect to</div>
			<div class="col3">Description</div>
		</div>
		<?php $section->listAllSection(array('type' => 'section-items'));?>
	</div>
</div>
</body>
</html>