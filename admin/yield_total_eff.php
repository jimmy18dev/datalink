<?php include'config/autoload.php';?>
<?php
if(!$user_online){
	header("Location: login.php");
	die();
}else if($user->status == 'deactive'){
    header("Location: profile.php");
    die();
}

if(!empty($_GET['month']) && !empty($_GET['line'])){
    $useractivity->saveActivity($user->id,'ViewYieldEfficiencyReport','View Yield & total efficiency report at line:'.$_GET['line'].', '.$_GET['month'].' '.$_GET['year'],'');
}

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
<title>Yield & total efficiency report</title>

<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="plugin/highcharts/highcharts.js"></script>
<script type="text/javascript" src="plugin/highcharts//modules/exporting.js"></script>

</head>
<body>
<?php include'header.php';?>
<div class="container">
    <div class="head">
        <div class="head-title">
            <h1>YIELD & TOTAL EFFICIENCY</h1>
            <p>MOVEMENT ASSEMBLY</p>
        </div>
    </div>
    <div class="graph-filter">
        <div class="month">
            <span class="caption">Month:</span>
            <?php $report->ListMonth(array('type' => 'month-items','line_current' => $_GET['line'],'year_current' => $_GET['year'],'month_current' => $_GET['month']));?>
        </div>

        <div class="line">
            <a href="yield_total_eff.php?year=<?php echo $_GET['year'];?>&month=<?php echo $_GET['month'];?>&line=14" class="filter-items <?php echo ($_GET['line'] == 14?'active':'');?>">14</a>
            <a href="yield_total_eff.php?year=<?php echo $_GET['year'];?>&month=<?php echo $_GET['month'];?>&line=13" class="filter-items <?php echo ($_GET['line'] == 13?'active':'');?>">13</a>
            <a href="yield_total_eff.php?year=<?php echo $_GET['year'];?>&month=<?php echo $_GET['month'];?>&line=12" class="filter-items <?php echo ($_GET['line'] == 12?'active':'');?>">12</a>
            <a href="yield_total_eff.php?year=<?php echo $_GET['year'];?>&month=<?php echo $_GET['month'];?>&line=11" class="filter-items <?php echo ($_GET['line'] == 11?'active':'');?>">11</a>
            <a href="yield_total_eff.php?year=<?php echo $_GET['year'];?>&month=<?php echo $_GET['month'];?>&line=10" class="filter-items <?php echo ($_GET['line'] == 10?'active':'');?>">10</a>
            <a href="yield_total_eff.php?year=<?php echo $_GET['year'];?>&month=<?php echo $_GET['month'];?>&line=9" class="filter-items <?php echo ($_GET['line'] == 9?'active':'');?>">9</a>
            <a href="yield_total_eff.php?year=<?php echo $_GET['year'];?>&month=<?php echo $_GET['month'];?>&line=8" class="filter-items <?php echo ($_GET['line'] == 8?'active':'');?>">8</a>
            <a href="yield_total_eff.php?year=<?php echo $_GET['year'];?>&month=<?php echo $_GET['month'];?>&line=7" class="filter-items <?php echo ($_GET['line'] == 7?'active':'');?>">7</a>
            <a href="yield_total_eff.php?year=<?php echo $_GET['year'];?>&month=<?php echo $_GET['month'];?>&line=6" class="filter-items <?php echo ($_GET['line'] == 6?'active':'');?>">6</a>
            <a href="yield_total_eff.php?year=<?php echo $_GET['year'];?>&month=<?php echo $_GET['month'];?>&line=5" class="filter-items <?php echo ($_GET['line'] == 5?'active':'');?>">5</a>
            <a href="yield_total_eff.php?year=<?php echo $_GET['year'];?>&month=<?php echo $_GET['month'];?>&line=4" class="filter-items <?php echo ($_GET['line'] == 4?'active':'');?>">4</a>
            <a href="yield_total_eff.php?year=<?php echo $_GET['year'];?>&month=<?php echo $_GET['month'];?>&line=3" class="filter-items <?php echo ($_GET['line'] == 3?'active':'');?>">3</a>
            <a href="yield_total_eff.php?year=<?php echo $_GET['year'];?>&month=<?php echo $_GET['month'];?>&line=2" class="filter-items <?php echo ($_GET['line'] == 2?'active':'');?>">2</a>
            <a href="yield_total_eff.php?year=<?php echo $_GET['year'];?>&month=<?php echo $_GET['month'];?>&line=1" class="filter-items <?php echo ($_GET['line'] == 1?'active':'');?>">1</a>
            <span class="caption">Line No:</span>
        </div>
    </div>

    <?php if(!empty($_GET['month']) && !empty($_GET['line'])){?>
	<div class="graph-report">
        <h2>Shift A</h2>
        <div class="graph" id="container-A"></div>
        <div class="report-yield-table">
            <div class="caption-col">
                <div class="row">Date</div>
                <div class="row">Actual yield</div>
                <div class="row">Taget output</div>
                <div class="row">Actual output</div>
                <div class="row">Product EFF</div>
                <div class="row">Total Efficiency</div>
            </div>

            <?php echo $report->getGraph($_GET['month'],$_GET['year'],'A',$_GET['line'],array('render' => 'html'));?>
        </div>

        <h2>Shift B</h2>
        <div class="graph" id="container-B"></div>
        <div class="report-yield-table">
            <div class="caption-col">
                <div class="row">Date</div>
                <div class="row">Actual yield</div>
                <div class="row">Taget output</div>
                <div class="row">Actual output</div>
                <div class="row">Product EFF</div>
                <div class="row">Total Efficiency</div>
            </div>

            <?php echo $report->getGraph($_GET['month'],$_GET['year'],'B',$_GET['line'],array('render' => 'html'));?>
        </div>   
    </div>
    <?php }else{?>
    <div class="starter-message">Select Month and Line No.</div>
    <?php }?>

    <input type="hidden" id="month" value="<?php echo $_GET['month'];?>">
    <input type="hidden" id="year" value="<?php echo $_GET['year'];?>">
    <input type="hidden" id="line" value="<?php echo $_GET['line'];?>">
</div>

<?php if(!empty($_GET['month']) && !empty($_GET['line'])){?>
<script type="text/javascript" src="js/service/report.service.js"></script>
<script type="text/javascript">
$(function(){
    // include service/analytic.service.js
    Highcharts.setOptions({
        colors:[
        '#003399',
        '#333333',
        '#AAAAAA',
        '#2196F3',
        '#F44336',
        '#8cddcd',
        '#a3e4d7',
        ]
    });

    getGraph('A');
    getGraph('B');
});
</script>
<?php }?>
</body>
</html>