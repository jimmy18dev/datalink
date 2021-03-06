<?php
class ReportController extends ReportModel{
	public $id;
	public $line_no;
	public $line_type;
	public $shift;
	public $no_monthly_emplys;
	public $no_daily_emplys;
	public $ttl_monthly_hrs;
	public $ttl_daily_hrs;
	public $ot_10;
	public $ot_15;
	public $ot_20;
	public $ot_30;
	public $losttime_vac;
	public $losttime_sick;
	public $losttime_abs;
	public $losttime_mat;
	public $losttime_other;
	public $downtime_mc;
	public $downtime_mat;
	public $downtime_fac;
	public $downtime_other;
	public $sort_local;
	public $sort_oversea;
	public $rework_local;
	public $rework_oversea;
	public $product_eff;
	public $ttl_eff;
	public $yield;
	public $target_yield;
	public $target_eff;
	public $remark;
	public $type;
	public $status;

	// Datetime
	public $report_full_date;
	public $report_date;
	public $update_time;
	public $update_facebook_format;
	public $create_timestamp;
	public $update_timestamp;
	public $report_date_ori;

	// Leader
	public $leader_name;
	public $leader_id;

	public $total_caliber;

	// Permission access
	public $can_edit;

	public function getHeader($id){
		$data = parent::getData($id);

		$this->id 				= $data['id'];
		$this->leader_id 		= $data['leader_id'];
		$this->leader_name 		= $data['leader_name'];
		$this->line_no 			= $data['line_no'];
		$this->line_type 		= $data['line_type'];
		$this->shift 			= $data['shift'];
		$this->no_monthly_emplys = $data['no_monthly_emplys'];
		$this->no_daily_emplys 	= $data['no_daily_emplys'];
		$this->ttl_monthly_hrs 	= $data['ttl_monthly_hrs'];
		$this->ttl_daily_hrs 	= $data['ttl_daily_hrs'];
		$this->ot_10 			= $data['ot_10'];
		$this->ot_15 			= $data['ot_15'];
		$this->ot_20 			= $data['ot_20'];
		$this->ot_30 			= $data['ot_30'];
		$this->losttime_vac 	= $data['losttime_vac'];
		$this->losttime_sick 	= $data['losttime_sick'];
		$this->losttime_abs 	= $data['losttime_abs'];
		$this->losttime_mat 	= $data['losttime_mat'];
		$this->losttime_other 	= $data['losttime_other'];
		$this->downtime_mc 		= $data['downtime_mc'];
		$this->downtime_mat 	= $data['downtime_mat'];
		$this->downtime_fac 	= $data['downtime_fac'];
		$this->downtime_other 	= $data['downtime_other'];
		$this->sort_local 		= $data['sort_local'];
		$this->sort_oversea 	= $data['sort_oversea'];
		$this->rework_local 	= $data['rework_local'];
		$this->rework_oversea 	= $data['rework_oversea'];

		$this->product_eff 		= $data['product_eff'];
		$this->ttl_eff 			= $data['ttl_eff'];

		$this->yield 			= $data['yield'];
		$this->target_yield 	= $data['target_yield'];
		$this->target_eff 		= $data['target_eff'];
		$this->remark 			= $data['remark'];

		// Datetime
		$this->report_date_ori 	= $data['report_date'];
		$this->report_full_date = date('l jS F Y', strtotime($data['report_date']));
		$this->report_date 		= date('j F Y', strtotime($data['report_date']));
		$this->update_time 		= $data['update_time'];
		$this->update_facebook_format = $data['update_facebook_format'];
		$this->create_timestamp = strtotime($data['create_time']);
		$this->update_timestamp = strtotime($data['update_time']);

		// Leader can't update header report after 7 days
		// if((time()-$this->create_timestamp) < (60*60*24*30)){
		// 	$this->can_edit = true;
		// }else{
		// 	$this->can_edit = false;
		// }

		$this->can_edit = true;

		$this->leader_name 		= $data['fname'].' '.$data['lname'];
		
		$this->type  			= $data['type'];
		$this->status  			= $data['status'];

		$this->total_caliber  	= parent::countCaliberInHeaderReport($this->id);
	}

	public function calculationEFFandYield($header_id){
		$this->getHeader($header_id);
		$dataset 		= parent::listOpearationInHeaderData($header_id);
		$list_operation = parent::listOpearationOnly($header_id);
		$operations = $list_operation;

		$normal_time 	= $this->ttl_daily_hrs + $this->ot_10 + $this->ot_15 + $this->ot_20 + $this->ot_30;
		$total_time 	= $normal_time + $this->downtime_mc + $this->downtime_mat + $this->downtime_fac + $this->downtime_other + $this->sort_local + $this->sort_oversea + $this->rework_local + $this->rework_oversea;

		$product_eff 	= 0;
		$total_eff 		= 0;
		$yield 			= 0;
		$required_hrs 	= 0;
		$total_good 	= 0;

		echo'<div class="box"><h3>Required hrs calculation</h3>';
		foreach ($dataset as $var){
			if($var['type'] == 'final'){
				$required 	= round($var['hrs'],2);
				$input 		= round((($var['total_good']+$list['reject'])/1000),2);

				echo'<p>'.$input.' x '.$required.' = '.round($required * $input,2).'<p>';
				$required_hrs += round($required * $input,2);
			}

			foreach ($list_operation as $key => $list){
				if($list['operation_id'] == $var['operation_id']){
					$list_operation[$key]['good'] 	= $list['good'] + $var['total_good'];
					$list_operation[$key]['reject'] = $list['reject'] + $var['total_reject'];
				}
			}
		}
		echo'<br>';

		// foreach ($operations as $key => $list){
		// 	echo'<p>'.$list['name'].'<p>';
		// 	foreach ($dataset as $var){
		// 		if($list['operation_id'] == $var['operation_id']){
		// 			$operations[$key]['good'][$var['caliber_id']] = array('name' => $var['code'].' '.$var['family'],'value'=> $var['total_good']);
		// 			$operations[$key]['reject'][$var['caliber_id']] = array('name' => $var['code'].' '.$var['family'],'value'=> $var['total_reject']);	
					
		// 			// operations[$key]['input'][] = ($var['total_good']+$var['total_reject']);
		// 		}
		// 	}
		// }

		// echo'<pre>';
		// print_r($operations);
		// echo'</pre>';

		// foreach ($operations as $value) {
		// 	echo'<p>'.$value['name'];
		// 	foreach ($value['good'] as $key){
		// 		echo ' : '.$key['value'];
		// 	}
		// 	echo'</p>';
		// }

		// echo'<br>';

		$before_yield = 0;

		echo'<h3>Yield calculation</h3>';
		foreach ($list_operation as $key => $list){
			$input = $list['reject'] + $list['good'];
			if($list['reject'] != 0 && $list['good'] != 0){
				$list_operation[$key]['remark'] = round((($list['reject'] / $input) * 100),2);
				echo '<p>'.$list['reject'].' / '.$input.' x 100 = '.round((($list['reject'] / $input) * 100),2).'</p>';
			}else{
				$list_operation[$key]['remark'] = 0;
			}

			$before_yield += $list_operation[$key]['remark'];
		}

		echo'</div><div class="box">';
		$yield 			= round(100 - $before_yield,2);

		if($required_hrs == 0){
			$product_eff = 0;
			$total_eff = 0;
		}else{
			$product_eff 	= round(($required_hrs / $normal_time) * 100,2);
			$total_eff 		= round(($required_hrs / $total_time) * 100,2);
		}

		// $this->updateEFFHeader($header_id,$product_eff,$total_eff,$yield);

		echo "<h3>Calculation</h3>";
		echo 'Required hrs = <strong style="color:#003399;">'.$required_hrs.'</strong><br>';
		echo 'Normal hrs = <strong style="color:#4CAF50;">'.$normal_time.'</strong><br>';
		echo 'Total hrs = <strong style="color:#F44336;">'.$total_time.'</strong><br><br>';

		echo "<h3>Result</h3>";
		echo'<p><strong>'.$product_eff.' %</strong> (Product EFF) = (<strong style="color:#003399;">'.$required_hrs.'</strong> / <strong style="color:#4CAF50;">'.$normal_time.'</strong>) x 100</p>';
		echo'<p><strong>'.$total_eff.' %</strong> (Total EFF) = (<strong style="color:#003399;">'.$required_hrs.'</strong> / <strong style="color:#F44336;">'.$total_time.'</strong>) x 100</p>';
		echo'<p><strong>'.$yield.' %</strong> (Yield) = 100 - '.$before_yield.'</p></div>';
	}

	public function updateEFFandYield($header_id){
		$this->getHeader($header_id);
		$dataset 		= parent::listOpearationInHeaderData($header_id);
		$list_operation = parent::listOpearationOnly($header_id);

		$normal_time 	= $this->ttl_daily_hrs + $this->ot_10 + $this->ot_15 + $this->ot_20 + $this->ot_30;
		$total_time 	= $normal_time + $this->downtime_mc + $this->downtime_mat + $this->downtime_fac + $this->downtime_other + $this->sort_local + $this->sort_oversea + $this->rework_local + $this->rework_oversea;

		$product_eff 	= 0;
		$total_eff 		= 0;
		$yield 			= 0;
		$required_hrs 	= 0;
		$total_good 	= 0;

		foreach ($dataset as $var){
			if($var['type'] == 'final'){
				$required 	= round($var['hrs'],2);
				$input 		= round((($var['total_good']+$list['reject'])/1000),2);
				$required_hrs += round($required * $input,2);
			}

			foreach ($list_operation as $key => $list){
				if($list['operation_id'] == $var['operation_id']){
					$list_operation[$key]['good'] 	= $list['good'] + $var['total_good'];
					$list_operation[$key]['reject'] = $list['reject'] + $var['total_reject'];
				}
			}
		}

		$before_yield = 0;

		foreach ($list_operation as $key => $list){
			$input = $list['reject'] + $list['good'];

			if($list['reject'] != 0 && $list['good'] != 0){
				$list_operation[$key]['remark'] = round((($list['reject'] / $input) * 100),2);
			}else{
				$list_operation[$key]['remark'] = 0;
			}

			$before_yield += $list_operation[$key]['remark'];
		}

		$yield 			= round(100 - $before_yield,2);

		if($required_hrs == 0){
			$product_eff = 0;
			$total_eff = 0;
		}else{
			$product_eff 	= round(($required_hrs / $normal_time) * 100,2);
			$total_eff 		= round(($required_hrs / $total_time) * 100,2);
		}

		// $product_eff 	= round(($required_hrs / $normal_time) * 100,2);
		// $total_eff 		= round(($required_hrs / $total_time) * 100,2);

		$this->updateEFFHeader($header_id,$product_eff,$total_eff,$yield);

		return true;
	}

	// Header report
	public function newHeaderReport($user_id,$line_no,$line_type,$shift,$report_date,$no_monthly_emplys,$no_daily_emplys,$ttl_monthly_hrs,$ttl_daily_hrs,$ot_10,$ot_15,$ot_20,$ot_30,$losttime_vac,$losttime_sick,$losttime_abs,$losttime_mat,$losttime_other,$downtime_mc,$downtime_mat,$downtime_fac,$downtime_other,$sort_local,$sort_oversea,$rework_local,$rework_oversea,$target_yield,$target_eff,$remark){

		if(parent::alreadyHeader($line_no,$shift,$report_date)){
			$header_id = parent::createHeader($user_id,$line_no,$line_type,$shift,$report_date,$no_monthly_emplys,$no_daily_emplys,$ttl_monthly_hrs,$ttl_daily_hrs,$ot_10,$ot_15,$ot_20,$ot_30,$losttime_vac,$losttime_sick,$losttime_abs,$losttime_mat,$losttime_other,$downtime_mc,$downtime_mat,$downtime_fac,$downtime_other,$sort_local,$sort_oversea,$rework_local,$rework_oversea,$target_yield,$target_eff,$remark);

			return $header_id;
		}else{
			return 0;
		}
	}

	public function updateHeaderReport($header_id,$user_id,$line_type,$shift,$report_date,$no_monthly_emplys,$no_daily_emplys,$ttl_monthly_hrs,$ttl_daily_hrs,$ot_10,$ot_15,$ot_20,$ot_30,$losttime_vac,$losttime_sick,$losttime_abs,$losttime_mat,$losttime_other,$downtime_mc,$downtime_mat,$downtime_fac,$downtime_other,$sort_local,$sort_oversea,$rework_local,$rework_oversea,$target_yield,$target_eff,$remark){

		parent::editHeader($header_id,$user_id,$line_type,$shift,$report_date,$no_monthly_emplys,$no_daily_emplys,$ttl_monthly_hrs,$ttl_daily_hrs,$ot_10,$ot_15,$ot_20,$ot_30,$losttime_vac,$losttime_sick,$losttime_abs,$losttime_mat,$losttime_other,$downtime_mc,$downtime_mat,$downtime_fac,$downtime_other,$sort_local,$sort_oversea,$rework_local,$rework_oversea,$target_yield,$target_eff,$remark);

		return true;
	}

	// Detail report
	public function addOperationReport($report_id,$operation_id,$total_good,$total_reject,$remark_id,$remark_message){
		parent::createOperationDetail($report_id,$operation_id,$total_good,$total_reject,$remark_id,$remark_message);
	}
	public function updateOerationReport($report_id,$operation_id,$total_good,$total_reject,$remark_id,$remark_message){
		parent::editDetail($report_id,$operation_id,$total_good,$total_reject,$remark_id,$remark_message);
	}

	public function deleteHeaderReport($header_id,$shift){
		parent::deleteHeader($header_id,$shift);
		return true;
	}

	public function deleteReportDetail($report_id,$user_id){
		parent::deleteDetail($report_id,$user_id);
		return true;
	}

	public function listAllHeader($line_no,$option){
		$data = parent::listAllHeaderData($line_no);
		$this->render($data,$option);
	}

	// List all caliber code in daily report by header report.
	public function listCaliberInReport($header_id,$option){
		$data = parent::listCaliberInReportData($header_id);
		$this->render($data,$option);
	}

	public function listOperationInCaliber($report_id,$option){
		$data = parent::listOperationInCaliberData($report_id);
		$this->render($data,$option);
	}

	public function listEfficencyReport($s_year,$s_monthly,$s_day,$e_year,$e_monthly,$e_day,$option){

		$start_date = $s_year.'-'.$s_monthly.'-'.$s_day;
		$end_date 	= $e_year.'-'.$e_monthly.'-'.$e_day;

		$data = parent::listEfficencyReportData($start_date,$end_date);
		$this->render($data,$option);
	}

	public function getIdleTime($s_year,$s_monthly,$s_day,$e_year,$e_monthly,$e_day){

		$start_date = $s_year.'-'.$s_monthly.'-'.$s_day;
		$end_date 	= $e_year.'-'.$e_monthly.'-'.$e_day;

		$data = parent::getIdleTimeData($start_date,$end_date);

		$data['normal_time'] 	= $data['ttl_monthly_hrs'] + $data['ttl_daily_hrs'];
		$data['over_time'] 		= $data['ot_10'] + $data['ot_15'] + $data['ot_20'] + $data['ot_30'];
		$data['ttl_idle_time'] 	= $data['downtime_mc'] + $data['downtime_mat'] + $data['downtime_fac'] + $data['sort_local'] + $data['sort_oversea'] + $data['rework_local'] + $data['rework_oversea'] + $data['downtime_other'];		

		return $data;
	}

	public function totalEfficencyReport($s_year,$s_monthly,$s_day,$e_year,$e_monthly,$e_day){

		$start_date = $s_year.'-'.$s_monthly.'-'.$s_day;
		$end_date 	= $e_year.'-'.$e_monthly.'-'.$e_day;

		$data = parent::totalEfficencyReportData($start_date,$end_date);

		return $data;
	}

	public function listDetailReport($report_id,$option){
		$data = parent::listDetailReportData($report_id);
		$this->render($data,$option);
	}

	public function listAllTurnTo($header_id,$option){
		$data = parent::listAllTurnToData($header_id);
		$this->render($data,$option);
	}

	// render dataset to view.
    private function render($data,$option){
    	$total_items = 0;
        if($option['type'] == 'report-header-items'){
        	$now = time();
        	$month_start = '';
            foreach ($data as $var){
            	$update = intval(strtotime($var['update_time']));
            	$update = ($now - $update);
            	
            	if($update < 3600)
            		$new_items = true;
            	else
            		$new_items = false;

            	$owner = false;
            	if($option['user_id'] == $var['leader_id']){
            		$owner = true;
            	}
            	
            	if($month_start != date('F Y', strtotime($var['report_date']))){
            		$month_start = date('F Y', strtotime($var['report_date']));
            		include'template/report/month.caption.items.php';
            	}

            	if(($now-strtotime($var['create_time'])) < (60*60*24*30)){
					$lock = false;
				}else{
					$lock = true;
				}

                include'template/report/header.items.php';
                $total_items++;
            }

            if($total_items == 0){
            	// include'template/article/article.empty.items.php';
            }
        }else if($option['type'] == 'operation-items'){
            foreach ($data as $var){
                include'template/caliber/operation.items.php';
                $total_items++;
            }

            if($total_items == 0){
            	include'template/empty.items.php';
            }
        }else if($option['type'] == 'report-caliber-items'){
            foreach ($data as $var){
            	$header_id 	= $option['header_id'];
            	$can_edit 	= $option['can_edit'];
                include'template/report/report.caliber.items.php';
                
                $total_items++;
            }

            if($total_items == 0){
            	include'template/empty.items.php';
            }
        }else if($option['type'] == 'weekly-eff-items'){
            foreach ($data as $var){

            	$stdtime 	= $var['caliber_stdtime'];
            	$qty 		= number_format($var['caliber_qty']/1000,3);
            	$earned 	= $qty * $stdtime;

                include'template/report/weekly-eff-items.php';
                $total_items++;
            }

            if($total_items == 0){
            	include'template/empty.items.php';
            }
        }else if($option['type'] == 'report-caliber-detail-items'){
            foreach ($data as $var){
                include'template/report/report.caliber.detail.items.php';
                $total_items++;
            }

            if($total_items == 0){
            	include'template/empty.items.php';
            }
        }else if($option['type'] == 'turn-to-items'){
            foreach ($data as $var){
                include'template/report/turn.to.items.php';
                $total_items++;
            }

            if($total_items == 0){
            	include'template/empty.items.php';
            }
        }else if($option['type'] == 'operation-form-items'){
        	$remark_data = parent::listAllRemark();

        	$remark_option .= '<option value="0">remark...</option>';
        	foreach ($remark_data as $vars)
        		$remark_option .= '<option value="'.$vars['id'].'">'.$vars['description'].'</option>';

            foreach ($data as $var){
                include'template/caliber/operation.form.items.php';
                $total_items++;
            }

            if($total_items == 0){
            	include'template/empty.items.php';
            }
        }else if($option['type'] == 'month-items'){
        	$line = $option['line_current'];
        	$year = $option['year_current'];
        	$month = $option['month_current'];
        	
            foreach ($data as $var){
                include'template/report/month.items.php';
                $total_items++;
            }

            if($total_items == 0){
            	include'template/empty.items.php';
            }
        }else if($option['type'] == 'yield-table-items'){
        	include'template/report/yield.table.topic.php';
            foreach ($data as $var){
            	if($total_items == 16){
            		include'template/report/yield.table.topic.php';
            	}
                include'template/report/yield.table.items.php';
                $total_items++;
            }

            if($total_items == 0){
            	include'template/empty.items.php';
            }
        }

        unset($data);
        $total_items = 0;
    }

    public function ListMonth($option){
		$data = parent::ListMonthData();
		$this->render($data,$option);
	}

	public function getGraph($month,$year,$shift,$line,$option){

    	$month_time = $year.'-'.$month.'-1';
    	$dataset = parent::getGraphData($month_time,$shift,$line);

    	if($month == 4 || $month == 6 || $month == 9 || $month == 11){
    		$day_month = 30;
    	}else if($month == 2){
    		$day_month = 28;
    	}else{
    		$day_month = 31;
    	}

    	// echo'<pre>';
    	// print_r($dataset);
    	// echo'</pre>';

		$result = array();

		for($i = 0;$i < $day_month;$i++){
			$result[$i]['date'] = $i+1;

			$result[$i]['yield'] 		= 0;
			$result[$i]['target'] 		= 0;
			$result[$i]['output'] 		= 0;
			$result[$i]['product_eff'] 	= 0;
			$result[$i]['total_eff'] 	= 0;

			foreach ($dataset as $var) {
				if($i+1 == date('j',strtotime($var['report_date']))){
					$result[$i]['yield'] 		= $var['yield'];
					$result[$i]['target'] 		= $var['target_eff'];
					$result[$i]['output'] 		= $var['target_yield'];
					$result[$i]['product_eff'] 	= $var['product_eff'];
					$result[$i]['total_eff'] 	= $var['ttl_eff'];
				}
			}
		}

    	// echo'<pre>';
    	// print_r($result);
    	// echo'</pre>';

    	if($option['render'] == 'html'){
    		$this->render($result,array('type' => 'yield-table-items'));
    	}else if($option['render'] == 'json'){
    		$this->toJSON($result,$shift,$line,$month,$year);

    	}
    }

    // Export to json
	private function toJSON($dataset,$shift,$line,$month,$year){

		$date 					= array();
		$product_eff 			= array();
		$total_eff 				= array();
		$actual_yield 			= array();
		$taget_output 			= array();
		$actual_output 			= array();

		foreach ($dataset as $var){
			$date[] 			= $var['date'];
			$product_eff[] 		= floatval($var['product_eff']);
			$total_eff[] 		= floatval($var['total_eff']);
			$actual_yield[] 	= floatval($var['yield']);
			$target_output[] 	= floatval($var['target']);
			$actual_output[] 	= floatval($var['output']);
        }

        $monthText = array('January','February','March','April','May','June','July','August','September','October','November','December');
        $month = $monthText[$month-1];


		$data = array(
			"apiVersion" 	=> "1.0",
			"data" 			=> array(
				"time_now" 		=> date('Y-m-d H:i:s'),
				"shift" 		=> $shift,
				"line" 			=> $line,
				"month" 		=> $month,
				"year" 			=> $year,
				"message" 		=> $message,
				"execute_time" 	=> round(microtime(true)-StTime,4)."s",
				"totalFeeds" 	=> floatval(count($dataset)),
				"date" 			=> $date,
				"product_eff" 	=> $product_eff,
				"total_eff" 	=> $total_eff,
				"actual_yield" 	=> $actual_yield,
				"target_output" => $target_output,
				"actual_output" => $actual_output,

			),
		);

	    // JSON Encode and Echo.
	    echo json_encode($data);
	}
}
?>