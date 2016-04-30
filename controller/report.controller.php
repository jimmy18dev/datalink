<?php
class ReportController extends ReportModel{
	public $id;
	public $line_no;
	public $line_type;
	public $shift;
	public $report_date;
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
	public $sort_local;
	public $sort_oversea;
	public $rework_local;
	public $rework_oversea;
	public $type;
	public $status;

	public $date;
	public $update;
	public $update_time;

	public $leader_name;
	public $leader_id;




	/* REPORT MANAGEMENT */

	// Header report
	public function newReport($user_id,$line_no,$line_type,$shift,$report_date,$no_monthly_emplys,$no_daily_emplys,$ttl_monthly_hrs,$ttl_daily_hrs,$ot_10,$ot_15,$ot_20,$ot_30,$losttime_vac,$losttime_sick,$losttime_abs,$losttime_mat,$losttime_other,$downtime_mc,$downtime_mat,$downtime_fac,$downtime_other,$sort_local,$sort_oversea,$rework_local,$rework_oversea){

		if(parent::alreadyHeader($user_id,$line_no,$shift,$report_date)){
			$header_id = parent::createHeader($user_id,$line_no,$line_type,$shift,$report_date,$no_monthly_emplys,$no_daily_emplys,$ttl_monthly_hrs,$ttl_daily_hrs,$ot_10,$ot_15,$ot_20,$ot_30,$losttime_vac,$losttime_sick,$losttime_abs,$losttime_mat,$losttime_other,$downtime_mc,$downtime_mat,$downtime_fac,$downtime_other,$sort_local,$sort_oversea,$rework_local,$rework_oversea);

			return $header_id;
		}else{
			return 0;
		}
	}
	
	public function updateReport(){}

	// Detail report
	public function addOperationReport(){}
	public function updateOerationReport(){}
	public function deleteOperationReport(){}





	public function getHeader($id){
		$data = parent::getData($id);

		$this->id = $data['id'];
		$this->leader_id = $data['leadder_id'];
		$this->leader_name = $data['leader_name'];
		$this->line_no = $data['line_no'];
		$this->line_type = $data['line_type'];
		$this->shift = $data['shift'];
		$this->report_date = $data['report_date'];
		$this->no_monthly_emplys = $data['no_monthly_emplys'];
		$this->no_daily_emplys = $data['no_daily_emplys'];
		$this->ttl_monthly_hrs = $data['ttl_monthly_hrs'];
		$this->ttl_daily_hrs = $data['ttl_daily_hrs'];
		$this->ot_10 = $data['ot_10'];
		$this->ot_15 = $data['ot_15'];
		$this->ot_20 = $data['ot_20'];
		$this->ot_30 = $data['ot_30'];
		$this->losttime_vac = $data['losttime_vac'];
		$this->losttime_sick = $data['losttime_sick'];
		$this->losttime_abs = $data['losttime_abs'];
		$this->losttime_mat = $data['losttime_mat'];
		$this->losttime_other = $data['losttime_other'];
		$this->downtime_mc = $data['downtime_mc'];
		$this->downtime_mat = $data['downtime_mat'];
		$this->downtime_fac = $data['downtime_fac'];
		$this->sort_local = $data['sort_local'];
		$this->sort_oversea = $data['sort_oversea'];
		$this->rework_local = $data['rework_local'];
		$this->rework_oversea = $data['rework_oversea'];

		// timer
		$this->date = $data['date'];
		$this->update = $data['update'];
		$this->update_time = $data['update_time'];

		$this->leader_name = $data['fname'].' '.$data['lname'];
		
		$this->type  = $data['type'];
		$this->status  = $data['status'];
	}

	public function listAllHeaders($option){
		$data = parent::listAllHeader($option);
		$this->render($data,$option);
	}

	public function listAllCalibers($header_id,$option){
		$data = parent::listAllCaliber($header_id);
		$this->render($data,$option);
	}

	public function listallOperations($header_id,$caliber_id,$option){
		$data = parent::listallOperation($header_id,$caliber_id);
		$this->render($data,$option);
	}

	// public function listAllOperationRecipe($caliber_id,$option){
	// 	$data = parent::listallOperation($caliber_id);
	// 	$this->render($data,$option);
	// }

	public function listDetailReport($header_id,$caliber_id,$option){
		$data = parent::listDetailReportData($header_id,$caliber_id);
		$this->render($data,$option);
	}

	// render dataset to view.
    private function render($data,$option){
    	$total_items = 0;
        if($option['type'] == 'report-header-items'){
            foreach ($data as $var){
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
            	$header_id = $option['header_id'];
                include'template/report/report.caliber.items.php';
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
        }else if($option['type'] == 'operation-form-items'){
        	$remark_data = parent::listAllRemark();
        	foreach ($remark_data as $vars)
        		$remark_option .= '<option value="'.$vars['id'].'">'.$vars['description'].'</option>';

            foreach ($data as $var){
                include'template/caliber/operation.form.items.php';
                $total_items++;
            }

            if($total_items == 0){
            	include'template/empty.items.php';
            }
        }

        unset($data);
        $total_items = 0;
    }
}
?>