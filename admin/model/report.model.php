<?php
class ReportModel extends Database{
	public function getData($id){
		parent::query('SELECT header.id,header.line_no,header.line_type,header.shift,header.report_date,header.no_monthly_emplys,header.no_daily_emplys,header.ttl_monthly_hrs,header.ttl_daily_hrs,header.ot_10,header.ot_15,header.ot_20,header.ot_30,header.losttime_vac,header.losttime_sick,header.losttime_abs,header.losttime_mat,header.losttime_other,header.downtime_mc,header.downtime_mat,header.downtime_fac,header.downtime_other,header.sort_local,header.sort_oversea,header.rework_local,header.rework_oversea,header.product_eff,header.ttl_eff,header.yield,header.target_yield,header.target_eff,header.remark,header.create_time,header.update_time,header.type,header.status,user.id leader_id,user.code user_code,user.fname,user.lname FROM RTH_DailyOutputHeader AS header LEFT JOIN RTH_User AS user ON header.user_id = user.id WHERE header.id = :id');
		parent::bind(':id', $id);
		parent::execute();
		$dataset = parent::single();

		$dataset['report_filename'] = parent::date_to_filename($dataset['report_date']);
		$dataset['report_date'] = parent::date_format($dataset['report_date']);
		$dataset['date'] = parent::date_format($dataset['create_time']);
		$dataset['update'] = parent::date_facebookformat($dataset['update_time']);
		$dataset['update_time'] = parent::datetime_thaiformat($dataset['update_time']);

		return $dataset;
	}

	public function listAllHeaderData($line_no){
		parent::query('SELECT header.id,header.line_no,header.line_type,header.shift,header.report_date,header.no_monthly_emplys,header.no_daily_emplys,header.ttl_monthly_hrs,header.ttl_daily_hrs,header.ot_10,header.ot_15,header.ot_20,header.ot_30,header.create_time,header.update_time,user.code user_code,user.fname,user.lname 
			FROM RTH_DailyOutputHeader AS header 
			LEFT JOIN RTH_User AS user ON header.user_id = user.id 
			WHERE header.line_no = :line_no 
			ORDER BY header.report_date DESC,header.line_no ASC');
		parent::bind(':line_no', 		$line_no);
		parent::execute();
		$dataset = parent::resultset();
		foreach ($dataset as $k => $var) {
			$dataset[$k]['date'] = parent::date_format($var['report_date']);
			$dataset[$k]['update'] = parent::date_facebookformat($var['update_time']);
			$dataset[$k]['update_time'] = parent::datetime_thaiformat($var['update_time']);
		}
		return $dataset;
	}

	public function listAllCaliber($header_id){
		parent::query('SELECT header.id report_id,caliber.id caliber_id,caliber.code caliber_code,caliber.family caliber_family,route.name route_name,header.update_time,std.hrs std_time 
			FROM RTH_DailyOutputReportHeader AS header 
			LEFT JOIN RTH_CaliberCode AS caliber ON header.caliber_id = caliber.id 
			LEFT JOIN RTH_StandardTime AS std ON header.stdtime_id = std.id 
			LEFT JOIN RTH_Route AS route ON header.route_id = route.id 
			WHERE header.header_id = :header_id 
			ORDER BY header.create_time DESC');
		parent::bind(':header_id', 		$header_id);
		parent::execute();
		return $dataset = parent::resultset();
	}


	public function listallOperation($report_id){
		parent::query('SELECT detail.id,operation.name operation_name,detail.total_good,detail.total_reject,detail.output,detail.required_hrs,detail.update_time,remark.description remark_message 
			FROM RTH_DailyOutputDetail AS detail 
			LEFT JOIN RTH_Operation AS operation ON detail.operation_id = operation.id 
			LEFT JOIN RTH_GeneralRemark AS remark ON detail.remark_id = remark.id 
			WHERE detail.report_id = :report_id 
			ORDER BY detail.id ASC');
		parent::bind(':report_id', 		$report_id);
		parent::execute();
		return $dataset = parent::resultset();
	}

	// public function listDetailReportData($header_id,$caliber_id){
	// 	parent::query('SELECT dod.id detail_id,dod.header_id,dod.caliber_id,dod.route_id,dod.operation_id,dod.total_good,dod.total_reject,dod.remark_id,dod.remark_message,dod.output,dod.required_hrs,dod.update_time,operation.id operation_id,operation.name operation_name,operation.description operation_description,stdtime.id stdtime_id,stdtime.hrs stdtime_hrs 
	// 		FROM RTH_DailyOutputDetail AS dod 
	// 		LEFT JOIN RTH_Operation AS operation ON dod.operation_id = operation.id 
	// 		LEFT JOIN RTH_StandardTime AS stdtime ON dod.stdtime_id = stdtime.id 
	// 		WHERE dod.header_id = :header_id AND dod.caliber_id = :caliber_id');
	// 	parent::bind(':header_id', 		$header_id);
	// 	parent::bind(':caliber_id', 	$caliber_id);
	// 	parent::execute();
	// 	$dataset = parent::resultset();

	// 	echo'<pre>';
	// 	print_r($dataset);
	// 	echo'</pre>';
	// 	return $dataset;
	// }

	// REMARKS
	// public function listAllRemark(){
	// 	parent::query('SELECT * FROM RTH_GeneralRemark');
	// 	parent::execute();
	// 	return $dataset = parent::resultset();
	// }

	public function listEfficencyReportData($start_date,$end_date){
		parent::query('SELECT caliber.id caliber_id,CONCAT(caliber.code," ",caliber.family) caliber_name,std.hrs caliber_stdtime,(SELECT SUM(detail.output) FROM RTH_DailyOutputReportHeader AS report LEFT JOIN RTH_DailyOutputHeader AS header ON report.header_id = header.id LEFT JOIN RTH_DailyOutputDetail AS detail ON report.id = detail.report_id WHERE report.caliber_id = caliber.id AND header.report_date BETWEEN :start_date AND :end_date) caliber_qty 
			FROM RTH_CaliberCode AS caliber 
			LEFT JOIN RTH_StandardTime AS std ON std.caliber_id = caliber.id AND std.type = "primary" 
			WHERE caliber.status = "active" 
			ORDER BY caliber.update_time DESC');
		parent::bind(':start_date', 	$start_date);
		parent::bind(':end_date', 		$end_date);
		parent::execute();
		$dataset = parent::resultset();
		return $dataset;
	}

	public function totalEfficencyReportData($start_date,$end_date){
		parent::query('SELECT SUM(std.hrs) total_stdtime,SUM((SELECT SUM(detail.output) FROM RTH_DailyOutputReportHeader AS report LEFT JOIN RTH_DailyOutputHeader AS header ON report.header_id = header.id LEFT JOIN RTH_DailyOutputDetail AS detail ON report.id = detail.report_id WHERE report.caliber_id = caliber.id AND header.report_date BETWEEN :start_date AND :end_date)) caliber_qty,SUM(((SELECT SUM(detail.output) FROM RTH_DailyOutputReportHeader AS report LEFT JOIN RTH_DailyOutputHeader AS header ON report.header_id = header.id LEFT JOIN RTH_DailyOutputDetail AS detail ON report.id = detail.report_id WHERE report.caliber_id = caliber.id AND header.report_date BETWEEN :start_date AND :end_date)/1000)*std.hrs) earned 
			FROM RTH_CaliberCode AS caliber 
			LEFT JOIN RTH_StandardTime AS std ON std.caliber_id = caliber.id AND std.type = "primary" 
			WHERE caliber.status = "active" 
			ORDER BY caliber.update_time DESC');
		parent::bind(':start_date', 	$start_date);
		parent::bind(':end_date', 		$end_date);
		parent::execute();
		$dataset = parent::single();
		return $dataset;
	}	

	public function getIdleTimeData($start_date,$end_date){
		parent::query('SELECT SUM(ttl_monthly_hrs) ttl_monthly_hrs,SUM(ttl_daily_hrs) ttl_daily_hrs,SUM(ot_10) ot_10, SUM(ot_15) ot_15, SUM(ot_20) ot_20, SUM(ot_30) ot_30,SUM(losttime_vac) losttime_vac,SUM(losttime_sick) losttime_sick,SUM(losttime_abs) losttime_abs,SUM(losttime_mat) losttime_mat,SUM(losttime_other) losttime_other,SUM(downtime_mc) downtime_mc,SUM(downtime_mat) downtime_mat,SUM(downtime_fac) downtime_fac,SUM(downtime_other) downtime_other,SUM(sort_local) sort_local,SUM(sort_oversea) sort_oversea,SUM(rework_local) rework_local,SUM(rework_oversea) rework_oversea 
			FROM RTH_DailyOutputHeader 
			WHERE report_date BETWEEN :start_date AND :end_date');
		parent::bind(':start_date', 	$start_date);
		parent::bind(':end_date', 		$end_date);
		parent::execute();
		$dataset = parent::single();
		return $dataset;
	}

	// GRAPH REPORT
	public function getGraphData($month,$shift,$line_no){
		parent::query('SELECT report_date,shift,product_eff,ttl_eff,yield,target_yield,target_eff 
			FROM RTH_DailyOutputHeader 
			WHERE MONTH(report_date) = MONTH(:month) AND shift = :shift AND line_no = :line_no 
			ORDER BY report_date ASC');
		parent::bind(':month', 		$month);
		parent::bind(':shift', 		$shift);
		parent::bind(':line_no', 	$line_no);
		parent::execute();
		$dataset = parent::resultset();
		return $dataset;
	}

	// List month of header report
	public function ListMonthData(){
		parent::query('SELECT report_date FROM RTH_DailyOutputHeader WHERE status = "active" GROUP BY MONTH(report_date), YEAR(report_date) ORDER BY report_date ASC');
		parent::execute();
		$dataset = parent::resultset();
		foreach ($dataset as $k => $var) {
			$dataset[$k]['year'] = date('Y',strtotime($var['report_date']));
			$dataset[$k]['month'] = date('n',strtotime($var['report_date']));
			$dataset[$k]['month_name'] = parent::month_name($var['report_date']);
		}
		return $dataset;
	}


	// Group header report by date
	public function groupHeaderReportData(){
		parent::query('SELECT report_date,COUNT(id) total_report FROM RTH_DailyOutputHeader WHERE status = "active" GROUP BY report_date ORDER BY report_date DESC');
		parent::execute();
		$dataset = parent::resultset();
		foreach ($dataset as $k => $var) {
			$dataset[$k]['year'] 		= date('Y',strtotime($var['report_date']));
			$dataset[$k]['month'] 		= date('n',strtotime($var['report_date']));
			$dataset[$k]['month_name'] 	= parent::month_name($var['report_date']);
			$dataset[$k]['day'] 		= date('j',strtotime($var['report_date']));
		}
		return $dataset;
	}

	public function listHeaderReportData($report_date){
		parent::query('SELECT header.id,header.line_no,header.line_type,header.shift,header.report_date,header.no_monthly_emplys,header.no_daily_emplys,header.ttl_monthly_hrs,header.ttl_daily_hrs,header.ot_10,header.ot_15,header.ot_20,header.ot_30,header.product_eff,header.ttl_eff,header.create_time,header.update_time,user.id leader_id,user.code user_code,user.fname leader_name,user.lname 
			FROM RTH_DailyOutputHeader AS header 
			LEFT JOIN RTH_User AS user ON header.user_id = user.id 
			WHERE header.report_date = :report_date AND header.status = "active" 
			ORDER BY header.line_no ASC');
		parent::bind(':report_date', $report_date);
		parent::execute();
		$dataset = parent::resultset();
		return $dataset;
	}





	public function retrieveCalibers($header_id){
		parent::query('SELECT header.id report_id,caliber.id caliber_id,caliber.code caliber_code,caliber.family caliber_family,route.name route_name,header.update_time,std.hrs std_time 
			FROM RTH_DailyOutputReportHeader AS header 
			LEFT JOIN RTH_CaliberCode AS caliber ON header.caliber_id = caliber.id 
			LEFT JOIN RTH_StandardTime AS std ON header.stdtime_id = std.id 
			LEFT JOIN RTH_Route AS route ON header.route_id = route.id 
			WHERE header.header_id = :header_id 
			ORDER BY header.create_time DESC');
		parent::bind(':header_id', 		$header_id);
		parent::execute();
		return $dataset = parent::resultset();
	}
	public function retrieveOperations($report_id){
		parent::query('SELECT detail.id,operation.name operation_name,detail.total_good,detail.total_reject,detail.output,detail.required_hrs,detail.update_time,remark.description remark_message 
			FROM RTH_DailyOutputDetail AS detail 
			LEFT JOIN RTH_Operation AS operation ON detail.operation_id = operation.id 
			LEFT JOIN RTH_GeneralRemark AS remark ON detail.remark_id = remark.id 
			WHERE detail.report_id = :report_id 
			ORDER BY detail.id ASC');
		parent::bind(':report_id', 		$report_id);
		parent::execute();
		return $dataset = parent::resultset();
	}
	public function retrieveTurnTo($header_id){
		parent::query('SELECT turnto.id id,caliber.code,caliber.family,turnto.output FROM RTH_TurnTo AS turnto LEFT JOIN RTH_CaliberCode AS caliber ON turnto.caliber_id = caliber.id WHERE report_id = :header_id');
		parent::bind(':header_id', $header_id);
		parent::execute();
		$dataset = parent::resultset();
		return $dataset;
	}
}
?>