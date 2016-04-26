<?php include'config/autoload.php';?>
<?php
if(!$user_online){
	header("Location: login.php");
	die();
}
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

<title>DATA LINK</title>

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
			<h1>Hi, <?php echo $user->fname;?></h1>
			<p>Describes the procedure used to send Message Queuing test messages, for IT professionals.</p>
		</div>
	</div>

	<div>
		<?php
		// $header_id = $report->createHeader('5366262169','14','LINE TYPE','A','23 DEC 2016',30,7,1,2,10,15,20,111,222,333,444,555,666,777,888,999,100,200,300,400);

		// $report->createDetail(34,23,234,10,10,2333,'remark message',34,344,34.54,221,23.54);
		?>
	</div>

	<div class="menu-function">
		<div class="section">
			<h3>Report</h3>
			<div class="menu-container">
				<a href="report_header.php" class="menu-items">
					<span class="icon"><i class="fa fa-child" aria-hidden="true"></i></span>
					<span class="caption">Report<i class="fa fa-angle-right"></i></span>
				</a>
			</div>
		</div>
	</div>

	<div class="menu-function">
		<div class="section">
			<h3>Administrator</h3>
			<div class="menu-container">
				<a href="user.php" class="menu-items">
					<span class="icon"><i class="fa fa-user" aria-hidden="true"></i></span>
					<span class="caption">User management<i class="fa fa-angle-right"></i></span>
				</a>
				<a href="caliber.php" class="menu-items">
					<span class="icon"><i class="fa fa-barcode" aria-hidden="true"></i></span>
					<span class="caption">Caliber Code<i class="fa fa-angle-right"></i></span>
				</a>
				<a href="remark.php" class="menu-items">
					<span class="icon"><i class="fa fa-commenting" aria-hidden="true"></i></span>
					<span class="caption">General Remark<i class="fa fa-angle-right"></i></span>
				</a>
				<a href="section.php" class="menu-items">
					<span class="icon"><i class="fa fa-sitemap" aria-hidden="true"></i></span>
					<span class="caption">Section<i class="fa fa-angle-right"></i></span>
				</a>
			</div>
		</div>
	</div>
</div>
</body>
</html>