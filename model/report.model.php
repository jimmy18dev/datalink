<?php
class ReportModel extends Database{

	// REPORT HEADER
	public function createHeader($user_id,$line_no,$line_type,$shift,$report_date,$no_monthly_emplys,$no_daily_emplys,$ttl_monthly_hrs,$ttl_daily_hrs,$ot_10,$ot_15,$ot_20,$ot_30,$losttime_vac,$losttime_sick,$losttime_abs,$losttime_mat,$losttime_other,$downtime_mc,$downtime_mat,$downtime_fac,$sort_local,$sort_oversea,$rework_local,$rework_oversea){

		parent::query('INSERT INTO RTH_DailyOutputHeader(user_id,line_no,line_type,shift,report_date,no_monthly_emplys,no_daily_emplys,ttl_monthly_hrs,ttl_daily_hrs,ot_10,ot_15,ot_20,ot_30,losttime_vac,losttime_sick,losttime_abs,losttime_mat,losttime_other,downtime_mc,downtime_mat,downtime_fac,sort_local,sort_oversea,rework_local,rework_oversea,create_time,update_time) 
			VALUE(:user_id,:line_no,:line_type,:shift,:report_date,:no_monthly_emplys,:no_daily_emplys,:ttl_monthly_hrs,:ttl_daily_hrs,:ot_10,:ot_15,:ot_20,:ot_30,:losttime_vac,:losttime_sick,:losttime_abs,:losttime_mat,:losttime_other,:downtime_mc,:downtime_mat,:downtime_fac,:sort_local,:sort_oversea,:rework_local,:rework_oversea,:create_time,:update_time)');
		

		parent::bind(':user_id', 		$user_id);
		parent::bind(':line_no', 		$line_no);
		parent::bind(':line_type', 		$line_type);
		parent::bind(':shift', 			$shift);
		parent::bind(':report_date', 	$report_date);
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
		parent::bind(':sort_local', 	$sort_local);
		parent::bind(':sort_oversea', 	$sort_oversea);
		parent::bind(':rework_local', 	$rework_local);
		parent::bind(':rework_oversea', $rework_oversea);
		parent::bind(':create_time',	date('Y-m-d H:i:s'));
		parent::bind(':update_time',	date('Y-m-d H:i:s'));
		parent::execute();
		return parent::lastInsertId();
	}
	// REPORT DETAIL 
	public function createDetail($header_id,$caliber_id,$route_id,$total_good,$total_reject,$remark_id,$remark_message,$product_eff,$ttl_eff,$std_time,$output,$required_hrs){
		parent::query('INSERT INTO RTH_DailyOutputDetail(header_id,caliber_id,route_id,total_good,total_reject,remark_id,remark_message,product_eff,ttl_eff,std_time,output,required_hrs,create_time,update_time) VALUE(:header_id,:caliber_id,:route_id,:total_good,:total_reject,:remark_id,:remark_message,:product_eff,:ttl_eff,:std_time,:output,:required_hrs,:create_time,:update_time)');
		

		parent::bind(':header_id', 		$header_id);
		parent::bind(':caliber_id', 	$caliber_id);
		parent::bind(':route_id', 		$route_id);
		parent::bind(':total_good', 	$total_good);
		parent::bind(':total_reject', 	$total_reject);
		parent::bind(':remark_id', 		$remark_id);
		parent::bind(':remark_message', $remark_message);
		parent::bind(':product_eff', 	$product_eff);
		parent::bind(':ttl_eff', 		$ttl_eff);
		parent::bind(':std_time', 		$std_time);
		parent::bind(':output', 		$output);
		parent::bind(':required_hrs', 	$required_hrs);
		parent::bind(':create_time',	date('Y-m-d H:i:s'));
		parent::bind(':update_time',	date('Y-m-d H:i:s'));
		parent::execute();
		return parent::lastInsertId();
	}
}
?>