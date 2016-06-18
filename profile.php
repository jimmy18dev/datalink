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
<?php include'header.php';?>
<div class="container">
	<?php if($user->status == 'deactive'){?>
	<div class="message-control">
		<div class="user-deactive"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>This account is <strong>Deactive</strong> by administrator</div>
	</div>
	<?php }?>
	<div class="head">
		<div class="head-title">
			<h1><?php echo $user->fname.' '.$user->lname?></h1>
			<p>Account ID <strong><?php echo $user->code;?></strong> has <strong><?php echo $useractivity->countActivity($user->id);?> Activitys</strong></p>
			<p>Last visit at <strong><?php echo $user->visit_time;?></strong></p>
		</div>
		<div class="head-control">
			<a href="logout.php">
			<div class="report-btn logout-btn">
				<i class="fa fa-sign-out" aria-hidden="true"></i>
				<div class="caption">Logout</div>
			</div>
			</a>
		</div>
	</div>
	<div class="list-container">
		<div class="items user-activity-items topic-fix">
			<div class="col1">Date/Time</div>
			<div class="col2">Action</div>
			<div class="col3">IP Address <i class="fa fa-location-arrow" aria-hidden="true"></i></div>
			<div class="col4">Description</div>
		</div>
		<div class="items-container">
			<?php $useractivity->listActivity($user->id,array('type' => 'user-activity-items'));?>
		</div>
	</div>
</div>
</body>
</html>