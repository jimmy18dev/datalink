<?php
class CaliberModel extends Database{

	// Caliber Code
	public function create($code,$name,$description,$family){
		parent::query('INSERT INTO RTH_CaliberCode(code,name,description,family,create_time,update_time) VALUE(:code,:name,:description,:family,:create_time,:update_time)');
		parent::bind(':code', 			$code);
		parent::bind(':name', 			$name);
		parent::bind(':description', 	$description);
		parent::bind(':family', 		$family);
		parent::bind(':create_time',	date('Y-m-d H:i:s'));
		parent::bind(':update_time',	date('Y-m-d H:i:s'));
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
		parent::query('SELECT caliber.id,caliber.code,caliber.name,caliber.description,caliber.family,caliber.create_time,caliber.update_time,caliber.type,caliber.status,standard.id standard_id,standard.hrs standard_hrs,standard.remark standard_remark,route.id route_id,route.route_code,route.route_name,(SELECT COUNT(rmo.id) FROM RTH_Route AS route LEFT JOIN RTH_RouteMatchOperation AS rmo ON rmo.route_id = route.id WHERE route.type = "primary" AND route.caliber_id = caliber.id) total_operation 
			FROM RTH_CaliberCode AS caliber 
			LEFT JOIN RTH_StandardTime AS standard ON standard.type = "primary" AND caliber.id = standard.caliber_id 
			LEFT JOIN RTH_Route AS route ON route.caliber_id = caliber.id AND route.type = "primary" 
			WHERE caliber.id = :id');
		parent::bind(':id', $id);
		parent::execute();
		return $dataset = parent::single();
	}
	public function listAllCaliber($header_id){
		parent::query('SELECT caliber.id caliber_id,caliber.code caliber_code,caliber.family caliber_family,std.hrs caliber_stdtime,route.id route_id,route.route_name route_name,caliber.name caliber_name,caliber.description caliber_description,caliber.create_time caliber_create_time,caliber.update_time caliber_update,caliber.type caliber_type,caliber.status caliber_status,(SELECT COUNT(rmo.id) FROM RTH_Route AS route LEFT JOIN RTH_RouteMatchOperation AS rmo ON rmo.route_id = route.id WHERE route.type = "primary" AND route.caliber_id = caliber.id) total_operation,dod.id detail_id 
FROM RTH_CaliberCode AS caliber 
LEFT JOIN RTH_StandardTime AS std ON std.caliber_id = caliber.id AND std.type = "primary" 
LEFT JOIN RTH_Route AS route ON route.caliber_id = caliber.id AND route.type = "primary" 
LEFT JOIN RTH_DailyOutputDetail AS dod ON dod.header_id = :header_id AND dod.caliber_id = caliber.id
GROUP BY caliber.id 
ORDER BY caliber.update_time DESC');
		parent::bind(':header_id', $header_id);
		parent::execute();
		return $dataset = parent::resultset();
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

	/////////////////////////////////////////////////////////
	// ROUTE ////////////////////////////////////////////////
	/////////////////////////////////////////////////////////
	public function createRoute($caliber_id,$route_code,$route_name,$name){
		
		// Clean primary type
		$this->clearPrimaryRoute($caliber_id);

		parent::query('INSERT INTO RTH_Route(caliber_id,route_code,route_name,name,create_time,update_time,type) VALUE(:caliber_id,:route_code,:route_name,:name,:create_time,:update_time,:type)');
		parent::bind(':caliber_id', 	$caliber_id);
		parent::bind(':route_code', 	$route_code);
		parent::bind(':route_name', 	$route_name);
		parent::bind(':name', 			$name);
		parent::bind(':create_time',	date('Y-m-d H:i:s'));
		parent::bind(':update_time',	date('Y-m-d H:i:s'));
		parent::bind(':type', 			'primary');
		parent::execute();
		return parent::lastInsertId();
	}

	public function clearPrimaryRoute($caliber_id){
		parent::query('UPDATE RTH_Route SET type = "secondary" WHERE caliber_id = :caliber_id');
		parent::bind(':caliber_id', $caliber_id);
		parent::execute();
	}

	public function editRoute($route_id,$route_code,$route_name,$name){
		parent::query('UPDATE RTH_Route SET route_code = :route_code,route_name = :route_name,name = :name,update_time = :update_time WHERE id = :route_id');
		parent::bind(':route_id', 		$route_id);
		parent::bind(':route_code', 	$route_code);
		parent::bind(':route_name', 	$route_name);
		parent::bind(':name', 			$name);
		parent::bind(':update_time',	date('Y-m-d H:i:s'));
		parent::execute();
	}

	public function listAllRoute(){
		parent::query('SELECT * FROM RTH_Route');
		parent::execute();
		return $dataset = parent::resultset();
	}

	public function listRouteInCaliber($caliber_id){
		parent::query('SELECT route.id,route.caliber_id,route.route_code,route.route_name,route.name,route.create_time,route.update_time,route.type,route.status,(SELECT COUNT(id) FROM RTH_RouteMatchOperation AS rmo WHERE rmo.route_id = route.id) total_operation FROM RTH_Route AS route WHERE caliber_id = :caliber_id');
		parent::bind(':caliber_id', 	$caliber_id);
		parent::execute();
		$dataset = parent::resultset();
		foreach ($dataset as $k => $var) {
			$dataset[$k]['create_time'] = parent::datetime_thaiformat($var['create_time']);
			$dataset[$k]['update_time'] = parent::date_format($var['update_time']);
		}

		return $dataset;
	}

	// ROUTE
	public function getRouteData($route_id){
		parent::query('SELECT * FROM RTH_Route WHERE id = :route_id');
		parent::bind(':route_id', $route_id);
		parent::execute();
		return $dataset = parent::single();
	}
	public function listOperationInRouteData($caliber_id){
		parent::query('SELECT route.id route_id,route.caliber_id,stdtime.id stdtime_id,stdtime.hrs stdtime_hrs,route.route_name,operation.id operation_id,operation.name operation_name FROM RTH_Route AS route LEFT JOIN RTH_StandardTime AS stdtime ON stdtime.caliber_id = route.caliber_id AND stdtime.type = "primary" LEFT JOIN RTH_RouteMatchOperation AS rmo ON rmo.route_id = route.id LEFT JOIN RTH_Operation AS operation ON operation.id = rmo.operation_id WHERE route.type = "primary" AND route.caliber_id = :caliber_id');
		parent::bind(':caliber_id', 	$caliber_id);
		parent::execute();
		$dataset = parent::resultset();

		foreach ($dataset as $k => $var) {
			$dataset[$k]['create_time'] = parent::datetime_thaiformat($var['create_time']);
			$dataset[$k]['update_time'] = parent::date_format($var['update_time']);
		}

		return $dataset;
	}


	// OPERATION
	public function getOperationData($operation_id){
		parent::query('SELECT * FROM RTH_Operation WHERE id = :operation_id');
		parent::bind(':operation_id', $operation_id);
		parent::execute();
		return $dataset = parent::single();
	}
	public function createOperation($name,$description){
		parent::query('INSERT INTO RTH_Operation(name,description,create_time,update_time) VALUE(:name,:description,:create_time,:update_time)');
		parent::bind(':name', 			$name);
		parent::bind(':description', 	$description);
		parent::bind(':create_time',	date('Y-m-d H:i:s'));
		parent::bind(':update_time',	date('Y-m-d H:i:s'));
		parent::execute();
		return parent::lastInsertId();
	}
	public function editOperation($id,$name,$description){
		parent::query('UPDATE RTH_Operation SET name = :name,description = :description,update_time = :update_time WHERE id = :id');
		parent::bind(':id', 			$id);
		parent::bind(':name', 			$name);
		parent::bind(':description', 	$description);
		parent::bind(':update_time',	date('Y-m-d H:i:s'));
		parent::execute();
		return parent::lastInsertId();
	}

	// List all operation and checking operation in route id.
	public function listOperationAllInRoute($route_id){
		parent::query('SELECT operation.id,operation.name,operation.description,operation.create_time,operation.update_time,operation.type,operation.status,rmo.id match_id FROM RTH_Operation AS operation LEFT JOIN RTH_RouteMatchOperation AS rmo ON rmo.operation_id = operation.id AND rmo.route_id = :route_id');
		parent::bind(':route_id', 	$route_id);
		parent::execute();
		$dataset = parent::resultset();

		foreach ($dataset as $k => $var) {
			$dataset[$k]['create_time'] = parent::datetime_thaiformat($var['create_time']);
			$dataset[$k]['update_time'] = parent::date_format($var['update_time']);
		}

		return $dataset;
	}

	// list all operation by route id
	public function listAllOperation($route_id){
		parent::query('SELECT * FROM RTH_Operation');
		parent::bind(':route_id', 	$route_id);
		parent::execute();
		return $dataset = parent::resultset();
	}


	// Matching operation to route
	public function connectOperationToRoute($route_id,$operation_id){
		parent::query('INSERT INTO RTH_RouteMatchOperation(route_id,operation_id,create_time) VALUE(:route_id,:operation_id,:create_time)');
		parent::bind(':route_id', 		$route_id);
		parent::bind(':operation_id', 	$operation_id);
		parent::bind(':create_time',	date('Y-m-d H:i:s'));
		parent::execute();
		return parent::lastInsertId();
	}
	public function alreadyConnect($route_id,$operation_id){
		parent::query('SELECT id FROM RTH_RouteMatchOperation WHERE route_id = :route_id AND operation_id = :operation_id');
		parent::bind(':route_id', 		$route_id);
		parent::bind(':operation_id', 	$operation_id);
		parent::execute();
		$dataset = parent::single();

		if(empty($dataset['id']))
			return true;
		else
			return false;
	}
	public function removeOperationOnRoute($route_id,$operation_id){
		parent::query('DELETE FROM RTH_RouteMatchOperation WHERE route_id = :route_id AND operation_id = :operation_id');
		parent::bind(':route_id', 		$route_id);
		parent::bind(':operation_id', 	$operation_id);
		parent::execute();
	}

	// REMARKS
	public function listAllRemark(){
		parent::query('SELECT * FROM RTH_GeneralRemark');
		parent::execute();
		return $dataset = parent::resultset();
	}

}
?>