<?php
include'config/autoload.php';

if(!$user_online){
	header("Location: login.php");
	die();
}else if(empty($_GET['header'])){
	header("Location: index.php?error=header_is_empty!");
	die();
}else if(!empty($_GET['header'])){
	$report->getHeader($_GET['header']);

	if($report->status == 'deleted'){
		header("Location: error_deleted.php?");
		die();
	}else if($user->id != $report->leader_id || !$report->can_edit){
		header("Location: error_permission.php?error=you_don't_have_permission!");
		die();
	}	
}

$caliber->getCaliber($_GET['caliber']);

// current page
$current_page['1'] = 'report_detail';
$current_page['2'] = 'choose_caliber';
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
<title>Add Output...</title>

<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/lib/jquery.form.min.js"></script>
<script type="text/javascript" src="js/service/report.service.js"></script>

</head>
<body>

<div class="choose-list-container">
	<div class="choose-form-title">
		<div class="icon"><i class="fa fa-file-text-o" aria-hidden="true"></i></div>
		<div class="title">Select a Turn to 24-48 Hrs.<br>Caliber code add to <a href="report_detail.php?header=<?php echo $report->id;?>"><?php echo $report->report_date;?></a></div>
	</div>

	<div class="caliber-choose-items caliber-choose-input">
		<span class="title"><?php echo $caliber->name;?></span>
		<span class="std">Standard time <?php echo $var['caliber_stdtime'];?> Hrs/K and has <?php echo $var['total_operation'];?> operations</span>

		<div class="input">
			<input type="text" class="input-text" id="output" placeholder="0" autofocus>
			<input type="hidden" id="caliber_id" value="<?php echo $caliber->id;?>">
			<button class="submit-btn" onclick="javascript:addTurnTo(<?php echo $_GET['header'];?>);"><i class="fa fa-check" aria-hidden="true"></i></button>
		</div>
	</div>
</div>

<script type="text/javascript" src="js/report_detail.js"></script>
</body>
</html>