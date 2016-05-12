<?php include'config/autoload.php';?>
<?php
// Permission
if(!$user_online){
	header("Location: index.php");
	die();
}

// current page
$current_page['1'] = 'user';
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

<title>USER</title>

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
			<h1>User management</h1>
			<p>User Management is an authentication feature that provides administrators with the ability to identify and control the state of users logged into the network.</p>
		</div>
		<div class="tab">
			<!-- <div class="tab-items tab-items-active">All User</div> -->
			<a href="user_editor.php" class="btn-right create">New user <i class="fa fa-angle-right"></i></a>
		</div>
	</div>

	<!-- Table -->
	<div class="list-container">
		<div class="user-items topic-fix">
			<div class="col1">NO.</div>
			<div class="col2">Nane</div>
			<div class="col3">Username</div>
			<div class="col4">Password</div>
			<div class="col5">Section / Line No.</div>
			<div class="col6">Last visit</div>
		</div>

		<?php echo $user->listAllUser(array('type' => 'user-items'));?>
	</div>
</div>
</body>
</html>