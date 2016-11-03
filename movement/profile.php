<?php include'config/autoload.php';?>
<?php
// Permission
if(!$user_online){
	header("Location: index.php");
	die();
}

// current page
$current_page['1'] = 'profile';

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
<title>My profile</title>

<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>

</head>
<body>
<header class="header">
	<div class="header-items">
		<div class="topic"><?php echo $user->fname.' '.$user->lname?></div>
		<div class="caption">Account ID <strong><?php echo $user->code;?></strong>, Section <strong><?php echo $user->section_name;?></strong> Last visit at <strong><?php echo $user->visit_time;?></strong></div>
	</div>
	<a class="btn" href="report_header_editor.php?action=create">New report</a>
</header>
<?php include'navigator.php';?>
<?php if($user->status == 'deactive'){?>
<div class="user-deactive"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>This account is <strong>Deactive</strong> by administrator</div>
<?php }?>
<div class="activity-list-container">
	<?php $useractivity->listActivity($user->id,array('type' => 'user-activity-items'));?>
</div>

<script type="text/javascript" src="js/min/auto_hidden.min.js"></script>
</body>
</html>