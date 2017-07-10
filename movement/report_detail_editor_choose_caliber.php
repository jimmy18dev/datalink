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
<title>ADD CALIBER TO <?php echo $report->report_date;?></title>

<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/lib/jquery.form.min.js"></script>
<script type="text/javascript" src="js/service/caliber.service.js"></script>

</head>
<body>
<header class="header">
	<a class="items -active" href="report_detail.php?header=<?php echo $report->id;?>"><i class="fa fa-arrow-left" aria-hidden="true"></i>ADD CALIBER TO <strong><?php echo $report->report_date;?></strong></a>
</header>
<div class="page">
	<div class="search-caliber">
		<input type="text" onkeyup="javascript:listAllCaliber('daily_report');" class="input-search" id="keyword" autofocus placeholder="Enter caliber code..." autocomplete="off">
		<input type="hidden" id="header" value="<?php echo $_GET['header'];?>">
	</div>
	<div id="caliber-container"></div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	listAllCaliber('daily_report');
});
</script>
</body>
</html>