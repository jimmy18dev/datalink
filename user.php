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

<title>USER</title>

<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>

</head>
<body>
<header class="header">
	<div class="logo">RONDA THAILAND</div>
	<div class="profile">
		<div class="name">Puwadon</div><img src="image/avatar.png" alt="">
	</div>
</header>
<div class="container">
	<div class="head">
		<div class="head-title">User management</div>
		<div class="tab">
			<div class="tab-items tab-items-active">Tab 1</div>
			<div class="tab-items">Tab 2</div>
			<div class="tab-items">Tab 3</div>
			<div class="tab-items">Tab 4</div>
			<div class="tab-items items-right">Register<i class="fa fa-angle-right"></i></div>
		</div>
	</div>

	<!-- Table -->
	<div class="topic-fix">
		<div class="user-topic-fix">
			<div class="info">NAME/POSITION</div>
			<div class="online">ONLINE</div>
			<div class="time">LAST LOGIN</div>
			<div class="status">STATUS</div>
		</div>
	</div>
	
	<div class="list">
		
		<?php for($i=0;$i<20;$i++){?>
		<div class="user-items">
			<div class="avatar"><img src="image/avatar.png" alt=""></div>
			<div class="info">
				<div class="name">Puwadon Sricharoen</div>
				<div class="position">Programmer</div>
			</div>
			<div class="online">Online<i class="fa fa-circle" aria-hidden="true"></i></div>
			<div class="time">54 นาทีที่แล้ว</div>
			<div class="status">Active<i class="fa fa-angle-right"></i></div>
		</div>
		<?php }?>
	</div>
</div>
<footer class="footer">
	<p>© Ronda (Thailand) co.,ltd 2016 | Datalink version 1.0</p>
	<p class="mini">RONDA (Thailand) Co., Ltd. We are a subsidiary of a Swiss multinational company, one of the world's leading watch movement manufacturers.</p>
</footer>
</body>
</html>