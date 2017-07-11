<?php
include'config/autoload.php';
include'config/authorization.php';

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

<?php include'favicon.php';?>
<title>User management</title>

<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>

</head>
<body>
<?php include'header.php';?>

<div class="topbar">
		<div class="title">USER MANAGEMENT : <?php echo $user->countUser();?> active</div>
		<a class="btn" href="user_editor.php">NEW USER<i class="fa fa-plus" aria-hidden="true"></i></a>
	</div>
<div class="container">
	<div class="page">
		<div class="user-items -topic">
		<div class="id">NO.</div>
		<div class="name">Name</div>
		<div class="username">Username</div>
		<div class="password">Password</div>
		<div class="section">Section</div>
		<div class="visit">Last visit</div>
	</div>
	<?php echo $user->listAllUser(array('type' => 'user-items'));?>
	</div>
</div>
</body>
</html>