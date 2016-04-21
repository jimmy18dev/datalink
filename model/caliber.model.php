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
		parent::query('SELECT caliber.id,caliber.code,caliber.name,caliber.description,caliber.family,caliber.create_time,caliber.update_time,caliber.type,caliber.status,standard.id standard_id,standard.hrs standard_hrs,standard.remark standard_remark FROM RTH_CaliberCode AS caliber LEFT JOIN RTH_StandardTime AS standard ON caliber.id = standard.caliber_id WHERE caliber.id = :id');
		parent::bind(':id', $id);
		parent::execute();
		return $dataset = parent::single();
	}
	public function listall(){
		parent::query('SELECT * FROM RTH_CaliberCode');
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

	/////////////////////////////////////////////////////////
	// Operation Recipe /////////////////////////////////////
	/////////////////////////////////////////////////////////
	public function createOperation($caliber_id,$route_id,$route_name,$name){
		parent::query('INSERT INTO RTH_OperationRecipe(caliber_id,route_id,route_name,name,create_time,update_time) VALUE(:caliber_id,:route_id,:route_name,:name,:create_time,:update_time)');
		parent::bind(':caliber_id', 	$caliber_id);
		parent::bind(':route_id', 		$route_id);
		parent::bind(':route_name', 	$route_name);
		parent::bind(':name', 			$name);
		parent::bind(':create_time',	date('Y-m-d H:i:s'));
		parent::bind(':update_time',	date('Y-m-d H:i:s'));
		parent::execute();
		return parent::lastInsertId();
	}

	public function editOperation($id,$route_id,$route_name,$name){
		parent::query('UPDATE RTH_OperationRecipe SET route_id = :route_id,route_name = :route_name,name = :name,update_time = :update_time WHERE id = :id');
		parent::bind(':id', 			$id);
		parent::bind(':route_id', 		$route_id);
		parent::bind(':route_name', 	$route_name);
		parent::bind(':name', 			$name);
		parent::bind(':update_time',	date('Y-m-d H:i:s'));
		parent::execute();
	}

	public function listallOperation($caliber_id){
		parent::query('SELECT * FROM RTH_OperationRecipe WHERE caliber_id = :caliber_id');
		parent::bind(':caliber_id', 	$caliber_id);
		parent::execute();
		return $dataset = parent::resultset();
	}
	public function getDataOperation($id){
		parent::query('SELECT * FROM RTH_OperationRecipe WHERE id = :id');
		parent::bind(':id', $id);
		parent::execute();
		return $dataset = parent::single();
	}
}
?>