<?php
require_once'config/autoload.php';

if(!empty($user->id)){
	$useractivity->saveActivity($user->id,'Logout','','');
}

setcookie('user_id');
session_destroy();
?>

<!DOCTYPE html>
<html lang="th" itemscope itemtype="http://schema.org/Blog" prefix="og: http://ogp.me/ns#">
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
<title>System logout...</title>

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="css/reset.css"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

</head>

<body>
<div class="dialog-box">
	<div class="icon"><i class="fa fa-circle-o-notch fa-spin"></i></div>
	<p id="dialog-message">System logout...</p>
</div>

<script type="text/javascript">
	setTimeout(function(){window.location = 'login.php';},1000);
</script>

</body>
</html>