<?php
include'config/autoload.php';
include'config/authorization.php';

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
<title>USER</title>

<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>

</head>
<body>
<?php include'header.php';?>
<div class="topbar">
	<div class="title">ID: <strong><?php echo $user->code;?></strong>, Last visit at <strong><?php echo $user->visit_time;?></strong></div>
</div>
<div class="container">
	<div class="page">
		<div class="activity-items topic-fix">
			<div class="col1">Date/Time</div>
			<div class="col2">Action</div>
			<div class="col4">Description</div>
			<div class="col3">IP Address</div>
		</div>
		<div class="items-container">
			<?php $useractivity->listActivity($user->id,array('type' => 'user-activity-items'));?>
		</div>
	</div>
</div>
</body>
</html>