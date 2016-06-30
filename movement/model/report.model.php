<?php
class ReportModel extends Database{

	// REPORT HEADER
	public function createHeader($user_id,$line_no,$line_type,$shift,$report_date,$no_monthly_emplys,$no_daily_emplys,$ttl_monthly_hrs,$ttl_daily_hrs,$ot_10,$ot_15,$ot_20,$ot_30,$losttime_vac,$losttime_sick,$losttime_abs,$losttime_mat,$losttime_other,$downtime_mc,$downtime_mat,$downtime_fac,$downtime_other,$sort_local,$sort_oversea,$rework_local,$rework_oversea,$product_eff,$ttl_eff,$yield,$target_yield,$target_eff){

		parent::query('INSERT INTO RTH_DailyOutputHeader(user_id,line_no,line_type,shift,report_date,no_monthly_emplys,no_daily_emplys,ttl_monthly_hrs,ttl_daily_hrs,ot_10,ot_15,ot_20,ot_30,losttime_vac,losttime_sick,losttime_abs,losttime_mat,losttime_other,downtime_mc,downtime_mat,downtime_fac,downtime_other,sort_local,sort_oversea,rework_local,rework_oversea,product_eff,ttl_eff,yield,target_yield,target_eff,create_time,update_time) 
			VALUE(:user_id,:line_no,:line_type,:shift,:report_date,:no_monthly_emplys,:no_daily_emplys,:ttl_monthly_hrs,:ttl_daily_hrs,:ot_10,:ot_15,:ot_20,:ot_30,:losttime_vac,:losttime_sick,:losttime_abs,:losttime_mat,:losttime_other,:downtime_mc,:downtime_mat,:downtime_fac,:downtime_other,:sort_local,:sort_oversea,:rework_local,:rework_oversea,:product_eff,:ttl_eff,:yield,:target_yield,:target_eff,:create_time,:update_time)');
		

		parent::bind(':user_id', 		$user_id);
		parent::bind(':line_no', 		$line_no);
		parent::bind(':line_type', 		$line_type);
		parent::bind(':shift', 			$shift);
		parent::bind(':report_date', 	date('Y-m-d',strtotime($report_date)));
		parent::bind(':no_monthly_emplys', 	$no_monthly_emplys);
		parent::bind(':no_daily_emplys', 	$no_daily_emplys);
		parent::bind(':ttl_monthly_hrs',  	$ttl_monthly_hrs);
		parent::bind(':ttl_daily_hrs', 	$ttl_daily_hrs);
		parent::bind(':ot_10', 			$ot_10);
		parent::bind(':ot_15', 			$ot_15);
		parent::bind(':ot_20', 			$ot_20);
		parent::bind(':ot_30', 			$ot_30);
		parent::bind(':losttime_vac', 	$losttime_vac);
		parent::bind(':losttime_sick', 	$losttime_sick);
		parent::bind(':losttime_abs', 	$losttime_abs);
		parent::bind(':losttime_mat', 	$losttime_mat);
		parent::bind(':losttime_other', $losttime_other);
		parent::bind(':downtime_mc', 	$downtime_mc);
		parent::bind(':downtime_mat', 	$downtime_mat);
		parent::bind(':downtime_fac', 	$downtime_fac);
		parent::bind(':downtime_other', $downtime_other);
		parent::bind(':sort_local', 	$sort_local);
		parent::bind(':sort_oversea', 	$sort_oversea);
		parent::bind(':rework_local', 	$rework_local);
		parent::bind(':rework_oversea', $rework_oversea);
		parent::bind(':product_eff', 	$product_eff);
		parent::bind(':ttl_eff', 		$ttl_eff);
		parent::bind(':yield', 			$yield);
		parent::bind(':target_yield', 	$target_yield);
		parent::bind(':target_eff', 	$target_eff);
		parent::bind(':create_time',	date('Y-m-d H:i:s'));
		parent::bind(':update_time',	date('Y-m-d H:i:s'));
		parent::execute();
		return parent::lastInsertId();
	}

	public function alreadyHeader($line_no,$shift,$report_date){
		parent::query('SELECT id FROM RTH_DailyOutputHeader WHERE line_no = :line_no AND shift = :shift AND report_date = :report_date');
		parent::bind(':line_no', 		$line_no);
		parent::bind(':shift', 			$shift);
		parent::bind(':report_date', 	$report_date);
		parent::execute();
		$dataset = parent::single();

		if(empty($dataset['id']))
			return true;
		else
			return false;
	}

	public function editHeader($header_id,$user_id,$line_type,$shift,$no_monthly_emplys,$no_daily_emplys,$ttl_monthly_hrs,$ttl_daily_hrs,$ot_10,$ot_15,$ot_20,$ot_30,$losttime_vac,$losttime_sick,$losttime_abs,$losttime_mat,$losttime_other,$downtime_mc,$downtime_mat,$downtime_fac,$downtime_other,$sort_local,$sort_oversea,$rework_local,$rework_oversea,$product_eff,$ttl_eff,$yield,$target_yield,$target_eff){

		parent::query('UPDATE RTH_DailyOutputHeader SET no_monthly_emplys = :no_monthly_emplys,no_daily_emplys = :no_daily_emplys,ttl_monthly_hrs = :ttl_monthly_hrs,ttl_daily_hrs = :ttl_daily_hrs,ot_10 = :ot_10,ot_15 = :ot_15,ot_20 = :ot_20,ot_30 = :ot_30,losttime_vac = :losttime_vac,losttime_sick = :losttime_sick,losttime_abs = :losttime_abs,losttime_mat = :losttime_mat,losttime_other = :losttime_other,downtime_mc = :downtime_mc,downtime_mat = :downtime_mat,downtime_fac = :downtime_fac,downtime_other = :downtime_other,sort_local = :sort_local,sort_oversea = :sort_oversea,rework_local = :rework_local,rework_oversea = :rework_oversea,product_eff = :product_eff,ttl_eff = :ttl_eff,yield = :yield,target_yield = :target_yield,target_eff = :target_eff,update_time = :update_time WHERE id = :header_id AND user_id = :user_id');
		

		parent::bind(':header_id', 		$header_id);
		parent::bind(':user_id', 		$user_id);
		// parent::bind(':line_type', 		$line_type);
		// parent::bind(':shift', 			$shift);
		parent::bind(':no_monthly_emplys', 	$no_monthly_emplys);
		parent::bind(':no_daily_emplys', 	$no_daily_emplys);
		parent::bind(':ttl_monthly_hrs',  	$ttl_monthly_hrs);
		parent::bind(':ttl_daily_hrs', 	$ttl_daily_hrs);
		parent::bind(':ot_10', 			$ot_10);
		parent::bind(':ot_15', 			$ot_15);
		parent::bind(':ot_20', 			$ot_20);
		parent::bind(':ot_30', 			$ot_30);
		parent::bind(':losttime_vac', 	$losttime_vac);
		parent::bind(':losttime_sick', 	$losttime_sick);
		parent::bind(':losttime_abs', 	$losttime_abs);
		parent::bind(':losttime_mat', 	$losttime_mat);
		parent::bind(':losttime_other', $losttime_other);
		parent::bind(':downtime_mc', 	$downtime_mc);
		parent::bind(':downtime_mat', 	$downtime_mat);
		parent::bind(':downtime_fac', 	$downtime_fac);
		parent::bind(':downtime_other', $downtime_other);
		parent::bind(':sort_local', 	$sort_local);
		parent::bind(':sort_oversea', 	$sort_oversea);
		parent::bind(':rework_local', 	$rework_local);
		parent::bind(':rework_oversea', $rework_oversea);
		parent::bind(':product_eff', 	$product_eff);
		parent::bind(':ttl_eff', 		$ttl_eff);
		parent::bind(':yield', 			$yield);
		parent::bind(':target_yield', 	$target_yield);
		parent::bind(':target_eff', 	$target_eff);
		parent::bind(':update_time',	date('Y-m-d H:i:s'));
		parent::execute();
	}

	public function getData($id){
		parent::query('SELECT header.id,header.line_no,header.line_type,header.shift,header.report_date,header.no_monthly_emplys,header.no_daily_emplys,header.ttl_monthly_hrs,header.ttl_daily_hrs,header.ot_10,header.ot_15,header.ot_20,header.ot_30,header.losttime_vac,header.losttime_sick,header.losttime_abs,header.losttime_mat,header.losttime_other,header.downtime_mc,header.downtime_mat,header.downtime_fac,header.downtime_other,header.sort_local,header.sort_oversea,header.rework_local,header.rework_oversea,header.product_eff,header.ttl_eff,header.yield,header.target_yield,header.target_eff,header.create_time,header.update_time,header.type,header.status,user.id leader_id,user.code user_code,user.fname,user.lname FROM RTH_DailyOutputHeader AS header LEFT JOIN RTH_User AS user ON header.user_id = user.id WHERE header.id = :id');
		parent::bind(':id', $id);
		parent::execute();
		$dataset = parent::single();

		// $dataset['report_date'] = parent::date_format($dataset['report_date']);
		// $dataset['date'] 			= parent::date_format($dataset['create_time']);
		$dataset['update_facebook_format'] = parent::date_facebookformat($dataset['update_time']);
		// $dataset['update_time'] 	= parent::datetime_thaiformat($dataset['update_time']);

		return $dataset;
	}

	public function listAllHeaderData($line_no){
		parent::query('SELECT header.id,header.line_no,header.line_type,header.shift,header.report_date,header.no_monthly_emplys,header.no_daily_emplys,header.ttl_monthly_hrs,header.ttl_daily_hrs,header.ot_10,header.ot_15,header.ot_20,header.ot_30,header.product_eff,header.ttl_eff,header.create_time,header.update_time,user.id leader_id,user.code user_code,user.fname,user.lname 
			FROM RTH_DailyOutputHeader AS header 
			LEFT JOIN RTH_User AS user ON header.user_id = user.id 
			WHERE header.line_no = :line_no AND header.status = "active" 
			ORDER BY header.report_date DESC,header.line_no ASC');
		parent::bind(':line_no', 		$line_no);
		parent::execute();
		$dataset = parent::resultset();
		foreach ($dataset as $k => $var) {
			$dataset[$k]['date'] = parent::date_format($var['report_date']);
			$dataset[$k]['update'] = parent::date_facebookformat($var['update_time']);
			$dataset[$k]['updated'] = parent::datetime_thaiformat($var['update_time']);
		}
		return $dataset;
	}


	// LIST CALIBER CODE IN DAILY REPORT ///////////////
	public function listCaliberInReportData($header_id){
		parent::query('SELECT header.id report_id,caliber.id caliber_id,caliber.code caliber_code,caliber.family caliber_family,route.name route_name,header.update_time,std.hrs std_time 
			FROM RTH_DailyOutputReportHeader AS header 
			LEFT JOIN RTH_CaliberCode AS caliber ON header.caliber_id = caliber.id 
			LEFT JOIN RTH_StandardTime AS std ON header.stdtime_id = std.id 
			LEFT JOIN RTH_Route AS route ON header.route_id = route.id 
			WHERE header.header_id = :header_id 
			ORDER BY header.create_time DESC');
		parent::bind(':header_id', 		$header_id);
		parent::execute();

		$dataset = parent::resultset();
		foreach ($dataset as $k => $var) {
			$dataset[$k]['update_facebook_format'] = parent::date_facebookformat($var['update_time']);
		}
		return $dataset;
	}

	public function listOperationInCaliberData($report_id){
		parent::query('SELECT detail.id,operation.name operation_name,detail.total_good,detail.total_reject,detail.output,detail.required_hrs,detail.update_time,remark.description remark_message 
			FROM RTH_DailyOutputDetail AS detail 
			LEFT JOIN RTH_Operation AS operation ON detail.operation_id = operation.id 
			LEFT JOIN RTH_GeneralRemark AS remark ON detail.remark_id = remark.id 
			WHERE detail.report_id = :report_id 
			ORDER BY detail.id ASC');
		parent::bind(':report_id', 		$report_id);
		parent::execute();
		$dataset = parent::resultset();		
		return $dataset;
	}
	// END ///////////////////////////////////


	public function countCaliberInHeaderReport($header_id){
		parent::query('SELECT COUNT(id) total FROM RTH_DailyOutputReportHeader WHERE header_id = :header_id AND status = "active"');
		parent::bind(':header_id', $header_id);
		parent::execute();
		$dataset = parent::single();
		return $dataset['total'];
	}

	//////////////////////////////////////////////
	//           CALIBER REPORT                 //
	//////////////////////////////////////////////
	// Create new caliber report to daily report
	// Step 1 : create header report
	// Step 2 : add operation into header report and loop for operation items in route.
	public function createReportHeader($header_id,$user_id,$caliber_id,$route_id,$stdtime_id,$remark,$type,$status){
		parent::query('INSERT INTO RTH_DailyOutputReportHeader(header_id,user_id,caliber_id,route_id,stdtime_id,remark,create_time,update_time,type,status) VALUE(:header_id,:user_id,:caliber_id,:route_id,:stdtime_id,:remark,:create_time,:update_time,:type,:status)');
		
		parent::bind(':header_id', 		$header_id);
		parent::bind(':user_id', 		$user_id);
		parent::bind(':caliber_id', 	$caliber_id);
		parent::bind(':route_id', 		$route_id);
		parent::bind(':stdtime_id', 	$stdtime_id);
		parent::bind(':remark' 			,$remark);
		parent::bind(':create_time',	date('Y-m-d H:i:s'));
		parent::bind(':update_time',	date('Y-m-d H:i:s'));
		parent::bind(':type', 			$type);
		parent::bind(':status', 		$status);
		parent::execute();
		return parent::lastInsertId();
	}


	// REPORT DETAIL 
	public function createOperationDetail($report_id,$operation_id,$total_good,$total_reject,$remark_id,$remark_message,$output,$required_hrs,$type,$status){

		parent::query('INSERT INTO RTH_DailyOutputDetail(report_id,operation_id,total_good,total_reject,remark_id,remark_message,output,required_hrs,create_time,update_time,type,status) VALUE(:report_id,:operation_id,:total_good,:total_reject,:remark_id,:remark_message,:output,:required_hrs,:create_time,:update_time,:type,:status)');
		
		parent::bind(':report_id', 		$report_id);
		parent::bind(':operation_id', 	$operation_id);
		parent::bind(':total_good', 	$total_good);
		parent::bind(':total_reject', 	$total_reject);
		parent::bind(':remark_id', 		$remark_id);
		parent::bind(':remark_message', $remark_message);
		parent::bind(':output', 		$output);
		parent::bind(':required_hrs', 	$required_hrs);
		parent::bind(':create_time',	date('Y-m-d H:i:s'));
		parent::bind(':update_time',	date('Y-m-d H:i:s'));
		parent::bind(':type', 			$type);
		parent::bind(':status', 		$status);
		parent::execute();
		return parent::lastInsertId();
	}

	public function editDetail($report_id,$operation_id,$total_good,$total_reject,$remark_id,$remark_message,$output,$required_hrs){
		parent::query('UPDATE RTH_DailyOutputDetail SET total_good = :total_good, total_reject = :total_reject, remark_id = :remark_id, remark_message = :remark_message,output = :output,required_hrs = :required_hrs,update_time = :update_time WHERE report_id = :report_id AND operation_id = :operation_id');

		parent::bind(':report_id', 		$report_id);
		parent::bind(':operation_id', 	$operation_id);
		parent::bind(':total_good', 	$total_good);
		parent::bind(':total_reject', 	$total_reject);
		parent::bind(':remark_id', 		$remark_id);
		parent::bind(':remark_message', $remark_message);
		parent::bind(':output', 		$output);
		parent::bind(':required_hrs', 	$required_hrs);
		parent::bind(':update_time',	date('Y-m-d H:i:s'));
		parent::execute();
		return parent::lastInsertId();
	}

	public function deleteHeader($header_id,$shift,$user_id){
		// Delete all report detail by header_id
		parent::query('SELECT id FROM RTH_DailyOutputReportHeader WHERE header_id = :header_id');
		parent::bind(':header_id', $header_id);
		parent::execute();
		$dataset = parent::resultset();
		foreach ($dataset as $k => $var) {
			parent::query('DELETE FROM RTH_DailyOutputDetail WHERE report_id = :report_id');
			parent::bind(':report_id', $dataset[$k]['id']);
			parent::execute();
		}

		// Delete all report header
		parent::query('DELETE FROM RTH_DailyOutputReportHeader WHERE header_id = :header_id');
		parent::bind(':header_id', 		$header_id);
		parent::execute();

		// Delete daily report by header_id and shift
		parent::query('DELETE FROM RTH_DailyOutputHeader WHERE id = :header_id AND shift = :shift');
		parent::bind(':header_id', 		$header_id);
		parent::bind(':shift', 			$shift);
		parent::execute();
	}

	public function deleteDetail($report_id,$user_id){
		// Delete report detail
		parent::query('DELETE FROM RTH_DailyOutputDetail WHERE report_id = :report_id');
		parent::bind(':report_id', 		$report_id);
		parent::execute();

		// Delete all report header
		parent::query('DELETE FROM RTH_DailyOutputReportHeader WHERE id = :report_id AND user_id = :user_id');
		parent::bind(':report_id', 		$report_id);
		parent::bind(':user_id', 		$user_id);
		parent::execute();
	}


	public function listDetailReportData($report_id){
		parent::query('SELECT detail.id,detail.operation_id,operation.name operation_name,detail.total_good,detail.total_reject,detail.remark_id,detail.output,detail.required_hrs FROM RTH_DailyOutputDetail AS detail LEFT JOIN RTH_Operation AS operation ON detail.operation_id = operation.id WHERE detail.report_id = :report_id');
		parent::bind(':report_id', 		$report_id);
		parent::execute();
		$dataset = parent::resultset();
		return $dataset;
	}
	// REMARKS
	public function listAllRemark(){
		parent::query('SELECT * FROM RTH_GeneralRemark');
		parent::execute();
		return $dataset = parent::resultset();
	}

	public function listEfficencyReportData($start_date,$end_date){
		parent::query('SELECT caliber.id caliber_id,caliber.code caliber_code,caliber.family caliber_family,std.hrs caliber_stdtime,caliber.name caliber_name,caliber.description caliber_description,caliber.create_time caliber_create_time,caliber.update_time caliber_update,caliber.type caliber_type,caliber.status caliber_status,(SELECT SUM(dod.output) FROM RTH_DailyOutputDetail AS dod LEFT JOIN RTH_DailyOutputHeader AS header ON dod.header_id = header.id WHERE header.report_date BETWEEN :start_date AND :end_date AND dod.caliber_id = caliber.id) caliber_qty FROM RTH_CaliberCode AS caliber LEFT JOIN RTH_StandardTime AS std ON std.caliber_id = caliber.id AND std.type = "primary" ORDER BY caliber.update_time DESC');
		parent::bind(':start_date', 	$start_date);
		parent::bind(':end_date', 		$end_date);
		parent::execute();
		$dataset = parent::resultset();
		return $dataset;
	}

	public function totalEfficencyReportData($start_date,$end_date){
		parent::query('SELECT SUM(std.hrs) total_stdtime,SUM((SELECT SUM(dod.output) FROM RTH_DailyOutputDetail AS dod LEFT JOIN RTH_DailyOutputHeader AS header ON dod.header_id = header.id WHERE header.report_date BETWEEN :start_date AND :end_date AND dod.caliber_id = caliber.id)) caliber_qty,SUM(((SELECT SUM(dod.output) FROM RTH_DailyOutputDetail AS dod LEFT JOIN RTH_DailyOutputHeader AS header ON dod.header_id = header.id WHERE header.report_date BETWEEN :start_date AND :end_date AND dod.caliber_id = caliber.id)/1000)*std.hrs) earned FROM RTH_CaliberCode AS caliber LEFT JOIN RTH_StandardTime AS std ON std.caliber_id = caliber.id AND std.type = "primary" ORDER BY caliber.update_time DESC');
		parent::bind(':start_date', 	$start_date);
		parent::bind(':end_date', 		$end_date);
		parent::execute();
		$dataset = parent::single();
		return $dataset;
	}	

	public function getIdleTimeData($start_date,$end_date){
		parent::query('SELECT SUM(ttl_monthly_hrs) ttl_monthly_hrs,SUM(ttl_daily_hrs) ttl_daily_hrs,SUM(ot_10) ot_10, SUM(ot_15) ot_15, SUM(ot_20) ot_20, SUM(ot_30) ot_30,SUM(losttime_vac) losttime_vac,SUM(losttime_sick) losttime_sick,SUM(losttime_abs) losttime_abs,SUM(losttime_mat) losttime_mat,SUM(losttime_other) losttime_other,SUM(downtime_mc) downtime_mc,SUM(downtime_mat) downtime_mat,SUM(downtime_fac) downtime_fac,SUM(downtime_other) downtime_other,SUM(sort_local) sort_local,SUM(sort_oversea) sort_oversea,SUM(rework_local) rework_local,SUM(rework_oversea) rework_oversea FROM RTH_DailyOutputHeader WHERE report_date BETWEEN :start_date AND :end_date');
		parent::bind(':start_date', 	$start_date);
		parent::bind(':end_date', 		$end_date);
		parent::execute();
		$dataset = parent::single();
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
}
?>