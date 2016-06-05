<?php include'config/autoload.php';?>
<?php
// Permission
if(!$user_online){
	header("Location: index.php");
	die();
}

// current page
$current_page['1'] = 'remark';
$total_remark = $remark->countRemark();
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

<title>General remark</title>

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
			<h1>GENERAL REMARK</h1>
		</div>

		<?php if($total_remark > 0){?>		
		<div class="head-control">
			<a href="remark_editor.php?" class="btn"><i class="fa fa-plus" aria-hidden="true"></i>NEW REMARK</a>
		</div>
		<?php }?>
	</div>

	<!-- Table -->
	<div class="list-container">
		<?php if($total_remark > 0){?>
		<div class="items remark-items topic-fix">
			<div class="col1">Total remark <strong><?php echo $total_remark;?> items.</strong> <i class="fa fa-comment-o" aria-hidden="true"></i></div>
		</div>
		<?php $remark->listAllRemark(array('type' => 'remark-items'));?>

		<?php }else{?>
		<div class="creating-container">
			<a href="remark_editor.php?" class="create-btn"><i class="fa fa-plus" aria-hidden="true"></i>NEW REMARK</a>
		</div>
		<?php }?>
	</div>
</div>
</body>
</html>