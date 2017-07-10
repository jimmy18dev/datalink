<?php
include'config/autoload.php';
include'config/authorization.php';

$date_validate 	= false;
$has_file 		= false;

$start_timestamp 	= strtotime($_GET['s']);
$end_timestamp 		= strtotime($_GET['e']);

$start 	= date('Y-m-d',$start_timestamp);
$end 	= date('Y-m-d',$end_timestamp);

$filename = str_replace('-','',$start).'-'.str_replace('-','',$end);

if($start_timestamp >= $end_timestamp){
	$date_validate = false;
}else{
	$date_validate = true;
}



if(file_exists("excel/".$filename.'.xlsx')){

	require_once 'plugin/php_excel/PHPExcel.php';
	include 'plugin/php_excel/PHPExcel/IOFactory.php';

	$inputFileName = 'excel/'.$filename.'.xlsx'; 
	$inputFileType = PHPExcel_IOFactory::identify($inputFileName); 
	$objReader = PHPExcel_IOFactory::createReader($inputFileType); 
	$objReader->setReadDataOnly(true); 
	$objPHPExcel = $objReader->load($inputFileName);

	$r = -1;
	$namedDataArray = array();

	for($row = 1; $row <= $highestRow; ++$row) {
		$dataRow = $objWorksheet->rangeToArray('A'.$row.':'.$highestColumn.$row,null, true, true, true);
		if((isset($dataRow[$row]['A'])) && ($dataRow[$row]['A'] > '')) {
			++$r;
			$namedDataArray[$r] = $dataRow[$row];
		}
	}

	$objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
	$highestRow = $objWorksheet->getHighestRow();
	$highestColumn = $objWorksheet->getHighestColumn();

	$headingsArray = $objWorksheet->rangeToArray('A1:'.$highestColumn.'1',null, true, true, true);
	$headingsArray = $headingsArray[1];

	$r = -1;

	$namedDataArray = array();
	for ($row = 2; $row <= $highestRow; ++$row) {
		$dataRow = $objWorksheet->rangeToArray('A'.$row.':'.$highestColumn.$row,null, true, true, true);
		if ((isset($dataRow[$row]['A'])) && ($dataRow[$row]['A'] > '')) {
			++$r;
			foreach($headingsArray as $columnKey => $columnHeading) {
				$namedDataArray[$r][$columnHeading] = $dataRow[$row][$columnKey];
			}
		}
	}

	$has_file = true;
}

// Get data report
if($date_validate){

	// LIST REPORTS
	$reports = $report->listEfficencyReport($start,$end);

	$sequence 		= 1;
	$ttl_std_time 	= 0;
	$ttl_qty 		= 0;
	$ttl_earned 	= 0;

	foreach ($reports as $k => $var){
		$caliber = strtolower(trim($var['caliber_name']));

		if(count($namedDataArray) > 0){
			foreach($namedDataArray as $i => $data){
				if(strtolower(trim($data['Caliber'])) == $caliber){
					$reports[$k]['caliber_qty'] = round((intval($data['Total'])/1000),3);
				}
			}
		}else{
			$reports[$k]['caliber_qty'] = 0;
		}

		$reports[$k]['caliber_earned'] = ($var['caliber_stdtime'] * $reports[$k]['caliber_qty']);
		$reports[$k]['sequence'] = $sequence;
		$sequence++;

		$ttl_std_time += $reports[$k]['caliber_stdtime'];;
		$ttl_qty += $reports[$k]['caliber_qty'];
		$ttl_earned += $reports[$k]['caliber_earned'];
	}
}

if($date_validate){
	$reportData = $report->getIdleTime($_POST['s_year'],$_POST['s_month'],$_POST['s_day'],$_POST['e_year'],$_POST['e_month'],$_POST['e_day']);
	// $toalReportData = $report->totalEfficencyReport($_POST['s_year'],$_POST['s_month'],$_POST['s_day'],$_POST['e_year'],$_POST['e_month'],$_POST['e_day']);

	// Setup all variables
	if($date_validate){
		// $ttl_std_time 		= $toalReportData['total_stdtime'];
		// $ttl_qty 			= $toalReportData['caliber_qty'];
		// $ttl_earned 		= $toalReportData['earned'];
		$normal_time 		= $reportData['normal_time'];
		$over_time 			= $reportData['over_time'];
		$holidays 			= 0;
		$leaves 			= 0;
		$ttl_wage_hrs 		= $normal_time + $over_time + $holidays + $leaves;
		$ttl_idle_time 		= $reportData['ttl_idle_time'];
		$ttl_hrs 			= $normal_time + $over_time; // (4.2)
		$ttl_product_hrs 	= $ttl_hrs - $ttl_idle_time; // (4.1)
		$productive_eff 	= ($ttl_product_hrs == 0?0:(($ttl_earned * 100) / $ttl_product_hrs)); // (4.3)
		$ttl_eff 			= ($ttl_hrs == 0?0:(($ttl_earned * 100) / $ttl_hrs)); // (4.4)

		// $ttl_std_time 		= $toalReportData['total_stdtime'];
		// $ttl_qty 			= 237.500;
		// $ttl_earned 		= 13291.71;
		// $normal_time 		= 11060.52;
		// $over_time 			= 2121.85;
		// $holidays 			= 2304.00;
		// $leaves 			= 883.08;
		// $ttl_wage_hrs 		= $normal_time + $over_time + $holidays + $leaves;
		// $ttl_idle_time 		= 226.50;
		// $ttl_hrs 			= $normal_time + $over_time; // (4.2)
		// $ttl_product_hrs 	= $ttl_hrs - $ttl_idle_time; // (4.1)
		// $productive_eff 	= ($ttl_earned * 100) / $ttl_product_hrs; // (4.3)
		// $ttl_eff 			= ($ttl_earned * 100) / $ttl_hrs; // (4.4)
	}
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
<div class="topbar">
	<div class="title">
		<?php if($date_validate){?>
			Weekly EFF Report : <strong><?php echo date("jS F, Y",$start_timestamp);?></strong> - <strong><?php echo date("jS F, Y",$end_timestamp);?></strong>
			<?php }else{?>
			Weekly efficiency report
			<?php }?>
	</div>
	
	<?php if($date_validate){?>
	<a href="weekly_eff_date.php" class="btn">Change Date<i class="fa fa-calendar" aria-hidden="true"></i></a>
	<?php }?>

	<?php if($has_file){?>
	<a class="btn -excel" href="<?php echo 'excel/'.$filename.'.xlsx';?>"><?php echo $filename.'.xlsx';?><i class="fa fa-file-excel-o" aria-hidden="true"></i></a>
	<?php }else{?>
	<div class="msg -alert"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>Excel file not found!</div>
	<?php }?>
</div>
<div class="container">
	<div class="page">
		<?php if($date_validate){?>
		<div class="report-box">
			<p>Filename: <?php echo $filename;?></p>
			<h2>1. Caliber Code</h2>
			<div class="weekly-eff-items topic-fix">
				<div class="col1">Caliber code</div>
				<div class="col2">Std. time (Hrs/K)</div>
				<div class="col3">Qty. Turn-in (K)</div>
				<div class="col4">Std. Hrs Earned (Hrs)</div>
			</div>
			<?php
			foreach ($reports as $var){ include'template/report/weekly.eff.items.php'; }
			?>

			<div class="weekly-eff-items total-fix">
				<div class="col1">Total</div>
				<div class="col2"><?php echo number_format($ttl_std_time,2);?></div>
				<div class="col3"><?php echo number_format(($ttl_qty),3);?></div>
				<div class="col4"><?php echo number_format($ttl_earned,2);?></div>
			</div>
		</div>

		<div class="report-box">
			<h2>2. Wage Hours Analysis (Hrs)</h2>
			<div class="weekly-eff-items">
				<div class="col1">Normal:</div>
				<div class="col5"><?php echo number_format($normal_time,2);?></div>
			</div>
			<div class="weekly-eff-items">
				<div class="col1">Overtime:</div>
				<div class="col5"><?php echo number_format($over_time,2);?></div>
			</div>
			<div class="weekly-eff-items">
				<div class="col1">Holiday:</div>
				<div class="col5"><?php echo number_format($holidays,2);?></div>
			</div>
			<div class="weekly-eff-items">
				<div class="col1">Leaves:</div>
				<div class="col5"><?php echo number_format($leaves,2);?></div>
			</div>
			<div class="weekly-eff-items total-fix">
				<div class="col1">Total wage hours:</div>
				<div class="col5"><?php echo number_format($ttl_wage_hrs,2);?></div>
			</div>
		</div>

		<div class="report-box">
			<h2>3. idle Time Analytics (Hrs)</h2>

			<div class="weekly-eff-items">
				<div class="col1">Machine:</div>
				<div class="col5"><?php echo number_format($reportData['downtime_mc'],2);?></div>
			</div>
			<div class="weekly-eff-items">
				<div class="col1">Facility:</div>
				<div class="col5"><?php echo number_format($reportData['downtime_fac'],2);?></div>
			</div>
			<div class="weekly-eff-items">
				<div class="col1">Material:</div>
				<div class="col5"><?php echo number_format($reportData['downtime_mat'],2);?></div>
			</div>
			<div class="weekly-eff-items">
				<div class="col1">Sort/local:</div>
				<div class="col5"><?php echo number_format($reportData['sort_local'],2);?></div>
			</div>
			<div class="weekly-eff-items">
				<div class="col1">Sort/Overseas:</div>
				<div class="col5"><?php echo number_format($reportData['sort_oversea'],2);?></div>
			</div>
			<div class="weekly-eff-items">
				<div class="col1">Rework/local:</div>
				<div class="col5"><?php echo number_format($reportData['rework_local'],2);?></div>
			</div>
			<div class="weekly-eff-items">
				<div class="col1">Rework/Overseas:</div>
				<div class="col5"><?php echo number_format($reportData['rework_local'],2);?></div>
			</div>
			<div class="weekly-eff-items">
				<div class="col1">Rework/Overseas:</div>
				<div class="col5"><?php echo number_format($reportData['rework_oversea'],2);?></div>
			</div>
			<div class="weekly-eff-items">
				<div class="col1">Other:</div>
				<div class="col5"><?php echo number_format($reportData['downtime_other'],2);?></div>
			</div>
			<div class="weekly-eff-items total-fix">
				<div class="col1">Total:</div>
				<div class="col5"><?php echo number_format($ttl_idle_time,2);?></div>
			</div>
		</div>

		<div class="report-box">
			<h2>4. Efficiency Calcalation</h2>
			<div class="eff-items">
				<div class="v"><?php echo number_format($ttl_product_hrs,2);?></div>
				<div class="k">Total productive hrs.</div>
			</div>
			<div class="eff-items">
				<div class="v"><?php echo number_format($ttl_hrs,2);?></div>
				<div class="k">Total Hours.</div>
			</div>
			<div class="eff-items">
				<div class="v"><?php echo number_format($productive_eff,2);?><span class="unit">%</span></div>
				<div class="k">Productive Efficiency</div>
			</div>
			<div class="eff-items">
				<div class="v"><?php echo number_format($ttl_eff,2);?><span class="unit">%</span></div>
				<div class="k">Total Efficiency</div>
			</div>
		</div>
		<?php }else{?>
		<?php }?>
	</div>
</div>
</body>
</html>