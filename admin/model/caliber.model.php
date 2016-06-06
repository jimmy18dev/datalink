<?php
class CaliberModel extends Database{

	// Caliber Code
	public function create($code,$name,$description,$family){
		parent::query('INSERT INTO RTH_CaliberCode(code,name,description,family,create_time,update_time,status) VALUE(:code,:name,:description,:family,:create_time,:update_time,:status)');
		parent::bind(':code', 			$code);
		parent::bind(':name', 			$name);
		parent::bind(':description', 	$description);
		parent::bind(':family', 		$family);
		parent::bind(':create_time',	date('Y-m-d H:i:s'));
		parent::bind(':update_time',	date('Y-m-d H:i:s'));
		parent::bind(':status', 		'pending');
		parent::execute();
		return parent::lastInsertId();
	}
	public function already($code){}

	public function edit($id,$code,$name,$description,$family){
		parent::query('UPDATE RTH_CaliberCode SET code = :code,name = :name,description = :description,family = :family,update_time = :update_time WHERE id = :id');
		parent::bind(':id', 			$id);
		parent::bind(':code', 			$code);
		parent::bind(':name', 			$name);
		parent::bind(':description', 	$description);
		parent::bind(':family', 		$family);
		parent::bind(':update_time',	date('Y-m-d H:i:s'));
		parent::execute();
	}

	public function getData($id){
		parent::query('SELECT caliber.id,caliber.code,caliber.name,caliber.description,caliber.family,caliber.create_time,caliber.update_time,caliber.type,caliber.status,standard.id standard_id,standard.hrs standard_hrs,standard.remark standard_remark,route.id route_id,route.code route_code,route.name route_name 
			FROM RTH_CaliberCode AS caliber 
			LEFT JOIN RTH_StandardTime AS standard ON standard.type = "primary" AND caliber.id = standard.caliber_id 
			LEFT JOIN RTH_Route AS route ON route.caliber_id = caliber.id AND route.type = "primary" 
			WHERE caliber.id = :id');
		parent::bind(':id', $id);
		parent::execute();
		return $dataset = parent::single();
	}
	public function listAllCaliber(){
		parent::query('SELECT caliber.id caliber_id,caliber.code caliber_code,caliber.family caliber_family,std.hrs caliber_stdtime,route.id route_id,route.name route_name,caliber.name caliber_name,caliber.description caliber_description,caliber.create_time caliber_create_time,caliber.update_time caliber_update,caliber.type caliber_type,caliber.status caliber_status,(SELECT COUNT(rmo.id) FROM RTH_Route AS route LEFT JOIN RTH_RouteMatchOperation AS rmo ON rmo.route_id = route.id WHERE route.type = "primary" AND route.caliber_id = caliber.id) total_operation 
			FROM RTH_CaliberCode AS caliber 
			LEFT JOIN RTH_StandardTime AS std ON std.caliber_id = caliber.id AND std.type = "primary" 
			LEFT JOIN RTH_Route AS route ON route.caliber_id = caliber.id AND route.type = "primary" 
			WHERE caliber.status != "deleted" 
			ORDER BY caliber.update_time DESC');
		parent::execute();
		return $dataset = parent::resultset();
	}

	// Delete function
	public function setCaliberToDelete($caliber_id){
		parent::query('UPDATE RTH_CaliberCode SET status = "deleted" WHERE id = :caliber_id');
		parent::bind(':caliber_id', $caliber_id);
		parent::execute();
	}
	public function deleteCaliber($caliber_id){
		parent::query('DELETE FROM RTH_StandardTime WHERE caliber_id = :caliber_id');
		parent::bind(':caliber_id', $caliber_id);
		parent::execute();

		parent::query('DELETE FROM RTH_Route WHERE caliber_id = :caliber_id');
		parent::bind(':caliber_id', $caliber_id);
		parent::execute();

		parent::query('DELETE FROM RTH_CaliberCode WHERE id = :caliber_id');
		parent::bind(':caliber_id', $caliber_id);
		parent::execute();
	}

	public function checkingCaliberBeforeDelate($caliber_id){
		parent::query('SELECT id FROM RTH_DailyOutputDetail WHERE caliber_id = :caliber_id');
		parent::bind(':caliber_id', $caliber_id);
		parent::execute();
		$dataset = parent::single();

		if(empty($dataset['id'])){
			return true;
		}else{
			return false;
		}
	}

	/////////////////////////////////////////////////////////
	// Standard Time ////////////////////////////////////////
	/////////////////////////////////////////////////////////
	public function createStandardTime($caliber_id,$hrs,$remark){
		parent::query('INSERT INTO RTH_StandardTime(caliber_id,hrs,remark,create_time,update_time,type) VALUE(:caliber_id,:hrs,:remark,:create_time,:update_time,:type)');
		parent::bind(':caliber_id', 	$caliber_id);
		parent::bind(':hrs', 			$hrs);
		parent::bind(':remark', 		$remark);
		parent::bind(':create_time',	date('Y-m-d H:i:s'));
		parent::bind(':update_time',	date('Y-m-d H:i:s'));
		parent::bind(':type', 			'primary');
		parent::execute();
		return parent::lastInsertId();
	}

	public function setStdTimeToSecondary($caliber_id){
		parent::query('UPDATE RTH_StandardTime SET type = :type WHERE caliber_id = :caliber_id');
		parent::bind(':caliber_id', 	$caliber_id);
		parent::bind(':type', 			'secondary');
		parent::execute();
	}

	// REMARKS
	public function listAllRemark(){
		parent::query('SELECT * FROM RTH_GeneralRemark');
		parent::execute();
		return $dataset = parent::resultset();
	}

	// COUNTER
	public function countCaliber($type){
		if($type == 'active'){
			parent::query('SELECT COUNT(id) total_caliber FROM RTH_CaliberCode WHERE status = "active"');
		}else if($type == 'pending'){
			parent::query('SELECT COUNT(id) total_caliber FROM RTH_CaliberCode WHERE status = "pending"');
		}else{
			parent::query('SELECT COUNT(id) total_caliber FROM RTH_CaliberCode WHERE status != "deleted"');
		}

		parent::execute();
		$dataset = parent::single();
		return $dataset['total_caliber'];
	}
	public function countRouteinCaliber($caliber_id){
		parent::query('SELECT COUNT(id) total_route FROM RTH_Route WHERE caliber_id = :caliber_id AND status = "active"');
		parent::bind(':caliber_id', 	$caliber_id);
		parent::execute();
		$dataset = parent::single();
		return $dataset['total_route'];
	}


	// Caliber status
	public function setToActive($caliber_id){
		parent::query('UPDATE RTH_CaliberCode SET status = "active", update_time = :update_time WHERE id = :caliber_id');
		parent::bind(':caliber_id', 	$caliber_id);
		parent::bind(':update_time',	date('Y-m-d H:i:s'));
		parent::execute();
	}
	public function setToDeactive($caliber_id){
		parent::query('UPDATE RTH_CaliberCode SET status = "pending", update_time = :update_time WHERE id = :caliber_id');
		parent::bind(':caliber_id', 	$caliber_id);
		parent::bind(':update_time',	date('Y-m-d H:i:s'));
		parent::execute();
	}

	public function hasPrimaryRoute($caliber_id){
		parent::query('SELECT id FROM RTH_Route WHERE caliber_id = :caliber_id AND status = "active" AND type = "primary" LIMIT 1');
		parent::bind(':caliber_id', 	$caliber_id);
		parent::execute();
		$dataset = parent::single();

		if(!empty($dataset['id'])){
			return true;
		}else{
			return false;
		}
	}
}
?>