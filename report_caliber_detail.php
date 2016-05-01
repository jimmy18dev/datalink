<?php include'config/autoload.php';?>
<?php
if(!$user_online){
	header("Location: login.php");
	die();
}

if(!empty($_GET['header'])){
	$report->getHeader($_GET['header']);
}

// current page
$current_page['1'] = 'report';
$current_page['2'] = 'report_detail';
$current_page['3'] = 'report_caliber_detail';
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
			<h1>Report Detail in Caliber ID: <?php echo $_GET['caliber'];?></h1>
			<p>Describes the procedure used to send Message Queuing test messages, for IT professionals.</p>
		</div>
	</div>
	
	<div class="list-container">
		<div class="report-caliber-detail-items topic-fix">
			<div class="col1"><i class="fa fa-file-text-o" aria-hidden="true"></i> Operation</div>
			<div class="col2">Good <i class="fa fa-thumbs-up" aria-hidden="true"></i></div>
			<div class="col3">Reject <i class="fa fa-times" aria-hidden="true"></i></div>
			<div class="col4">Output</div>
			<div class="col5"><i class="fa fa-hourglass-half" aria-hidden="true"></i> Required hrs</div>
			<div class="col6">Remark <i class="fa fa-comment" aria-hidden="true"></i></div>
		</div>

		<?php $report->listAllOperations($report->id,$_GET['caliber'],array('type' => 'report-caliber-detail-items'));?>

		<div class="option-control">
			<div class="btn btn-delete"><i class="fa fa-trash" aria-hidden="true"></i></div>
			<a href="report_detail_editor.php?header_id=<?php echo $report->id;?>&caliber=<?php echo $_GET['caliber'];?>" class="btn">Edit report</a>
			<div class="update-time">Updated 27 เม.ย. 2559</div>
		</div>
	</div>
</div>
</body>
</html>