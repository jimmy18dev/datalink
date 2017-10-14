<?php
class RouteModel extends Database{

	// ROUTE CREATE FUNCTIONS
	public function create($caliber_id,$name,$description){
		parent::query('INSERT INTO RTH_Route(caliber_id,name,description,create_time,update_time,type) VALUE(:caliber_id,:name,:description,:create_time,:update_time,:type)');
		parent::bind(':caliber_id', 	$caliber_id);
		parent::bind(':name', 			$name);
		parent::bind(':description', 	$description);
		parent::bind(':create_time',	date('Y-m-d H:i:s'));
		parent::bind(':update_time',	date('Y-m-d H:i:s'));
		parent::bind(':type', 			'disable');
		parent::execute();
		return parent::lastInsertId();
	}

	private function clearPrimary($caliber_id){
		parent::query('UPDATE RTH_Route SET type = "secondary" WHERE caliber_id = :caliber_id');
		parent::bind(':caliber_id', $caliber_id);
		parent::execute();
	}

	public function setPrimary($route_id,$caliber_id){
		$this->clearPrimary($caliber_id);

		parent::query('UPDATE RTH_Route SET type = "primary" WHERE id = :route_id');
		parent::bind(':route_id', $route_id);
		parent::execute();
	}

	// ROUTE EDITING
	public function edit($route_id,$code,$name,$description){
		parent::query('UPDATE RTH_Route SET code = :code,name = :name,description = :description,update_time = :update_time WHERE id = :route_id');
		parent::bind(':route_id', 		$route_id);
		parent::bind(':code', 			$code);
		parent::bind(':name', 			$name);
		parent::bind(':description', 	$description);
		parent::bind(':update_time',	date('Y-m-d H:i:s'));
		parent::execute();
	}

	// GET ROUTE DATA
	public function getData($route_id){
		parent::query('SELECT route.id,route.caliber_id,caliber.code caliber_code,caliber.family caliber_family,route.code,route.name,route.description,route.create_time,route.update_time,route.type,route.status,(SELECT COUNT(id) FROM RTH_RouteMatchOperation AS rmo WHERE rmo.route_id = route.id) total_operation FROM RTH_Route AS route LEFT JOIN RTH_CaliberCode AS caliber ON route.caliber_id = caliber.id WHERE route.id = :route_id');
		parent::bind(':route_id', $route_id);
		parent::execute();
		return $dataset = parent::single();
	}

	// LIST ALL ROUTE BY CALIBER ID
	public function listRouteInCaliberData($caliber_id){
		parent::query('SELECT route.id route_id,route.caliber_id route_caliber_id,route.code route_code,route.name route_name,route.create_time route_create_time,route.update_time route_update_time,route.type route_type,route.status route_status,(SELECT COUNT(id) FROM RTH_RouteMatchOperation AS rmo WHERE rmo.route_id = route.id) route_total_operation FROM RTH_Route AS route WHERE caliber_id = :caliber_id');
		parent::bind(':caliber_id', 	$caliber_id);
		parent::execute();
		$dataset = parent::resultset();
		
		// foreach ($dataset as $k => $var) {
		// 	$dataset[$k]['create_time'] = parent::datetime_thaiformat($var['create_time']);
		// 	$dataset[$k]['update_time'] = parent::date_format($var['update_time']);
		// }

		return $dataset;
	}


	// ROUTE DETETE FUNCTIONS
	public function setRouteToDelete($route_id){
		parent::query('UPDATE RTH_Route SET status = "deleted" WHERE id = :route_id');
		parent::bind(':route_id', $route_id);
		parent::execute();
	}
	public function deleteRoute($route_id){
		// Delete operation Matching
		parent::query('DELETE FROM RTH_RouteMatchOperation WHERE route_id = :route_id');
		parent::bind(':route_id', $route_id);
		parent::execute();

		// Delete Operation item
		parent::query('DELETE FROM RTH_Route WHERE id = :route_id');
		parent::bind(':route_id', $route_id);
		parent::execute();
	}

	public function checkingRouteBeforeDelate($route_id){
		parent::query('SELECT id FROM RTH_DailyOutputReportHeader WHERE route_id = :route_id');
		parent::bind(':route_id', $route_id);
		parent::execute();
		$dataset = parent::single();

		if(empty($dataset['id'])){
			return true;
		}else{
			return false;
		}
	}
}
?>