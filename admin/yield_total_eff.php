<?php
include'config/autoload.php';
include'config/authorization.php';

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
<script type="text/javascript" src="plugin/highcharts/modules/exporting.js"></script>

</head>
<body>
<?php include'header.php';?>
<div class="topbar">
    <div class="title">YIELD & TOTAL EFFICIENCY - MOVEMENT ASSEMBLY</div>
</div>
<div class="container">
    <div class="page">

        <div class="filter-report">
                <div class="caption">MONTH :</div>
                <div class="list">
                    <?php $report->ListMonth(array('type' => 'month-items','line_current' => $_GET['line'],'year_current' => $_GET['year'],'month_current' => $_GET['month']));?>
                </div>
            </div>

            <div class="filter-report -lineno">
                <div class="caption">LINE NO :</div>
                <div class="list">
                    <?php for($i=1;$i<=14;$i++){?>
                    <a href="yield_total_eff.php?year=<?php echo $_GET['year'];?>&month=<?php echo $_GET['month'];?>&line=<?php echo $i;?>" class="filter-items <?php echo ($_GET['line'] == $i?'-active':'');?>"><?php echo $i;?></a>
                    <?php }?> 
                </div>               
            </div>
        <div class="pages">
            

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
        </div>
    </div>
</div>

<input type="hidden" id="month" value="<?php echo $_GET['month'];?>">
<input type="hidden" id="year" value="<?php echo $_GET['year'];?>">
<input type="hidden" id="line" value="<?php echo $_GET['line'];?>">

<?php if(!empty($_GET['month']) && !empty($_GET['line'])){?>
<script type="text/javascript" src="js/service/min/report.service.min.js"></script>
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