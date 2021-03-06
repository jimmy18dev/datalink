<?php 
include'config/autoload.php';
include'config/authorization.php';

// current page
$current_page['1'] = 'report';
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
<title>DATALINK <?php echo $meta['dev']['version'];?></title>

<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>

</head>
<body>
<?php include'header.php';?>

<div class="topbar">
	<div class="title">SELECT REPORT...</div>
</div>

<div class="container">
	<div class="main-menu">
		<a href="header_report.php">
		<div class="report-items">
			<div class="icon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
			<div class="title">Header Reports</div>
		</div>
		</a>

		<a href="yield_total_eff.php">
		<div class="report-items">
			<div class="icon"><i class="fa fa-line-chart" aria-hidden="true"></i></div>
			<div class="title">Yield & Total Efficiency</div>
		</div>
		</a>

		<a href="weekly_eff_date.php">
		<div class="report-items">
			<div class="icon"><i class="fa fa-file-text-o" aria-hidden="true"></i></div>
			<div class="title">Weekly Efficiency<span class="beta">[Beta]</span></div>
		</div>
		</a>

		<a href="pdftest.php" target="_blank">
		<div class="report-items">
			<div class="icon"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></div>
			<div class="title">PDF Export (Test)<span class="beta">[For Dev]</span></div>
		</div>
		</a>

		<a href="../movement/robot.php" target="_blank">
		<div class="report-items">
			<div class="icon"><i class="fa fa-bug" aria-hidden="true"></i></div>
			<div class="title">Update EFF & Yield (Robot)<span class="beta">[For Dev]</span></div>
		</div>
		</a>
	</div>
</div>
</body>
</html>