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
<title>Weekly efficiency report</title>

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
			<strong>HEADER REPORT</strong> : 
			<?php if(!empty($_GET['date'])){?>
			<?php echo $_GET['date'];?> - <a href="header_report.php" target="_parent">BACK</a>
			<?php }?>
		</div>
	</div>

	<div class="list-container">
		<?php if(empty($_GET['date'])){?>
		<div class="page">
			<div class="report-date">
				<?php $report->groupHeaderReport(array('type' => 'header-date-items'));?>
			</div>
		</div>
		<?php }else{?>
		<div class="page">
			<div class="header-report-items -topic">
				<div class="id">LINE(Shift)</div>
				<div class="eff">Product EFF</div>
				<div class="eff">Total EFF</div>
				<div class="hrs">Monthly Hrs</div>
				<div class="hrs">Daily Hrs</div>
				<div class="ot">1.0</div>
				<div class="ot">1.5</div>
				<div class="ot">2.0</div>
				<div class="ot">3.0</div>
				<div class="update">Updated</div>
				<div class="leader">Leader</div>
			</div>
			<?php $report->listHeaderReport($_GET['date'],array('type' => 'header-items'));?>
		</div>
		<?php }?>
	</div>
</div>
</body>
</html>