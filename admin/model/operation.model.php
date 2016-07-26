<?php
class OperationModel extends Database{

	public function create($name,$description){
		parent::query('INSERT INTO RTH_Operation(name,description,create_time,update_time) VALUE(:name,:description,:create_time,:update_time)');
		parent::bind(':name', 			$name);
		parent::bind(':description', 	$description);
		parent::bind(':create_time',	date('Y-m-d H:i:s'));
		parent::bind(':update_time',	date('Y-m-d H:i:s'));
		parent::execute();
		return parent::lastInsertId();
	}
	public function edit($id,$name,$description){
		parent::query('UPDATE RTH_Operation SET name = :name,description = :description,update_time = :update_time WHERE id = :id');
		parent::bind(':id', 			$id);
		parent::bind(':name', 			$name);
		parent::bind(':description', 	$description);
		parent::bind(':update_time',	date('Y-m-d H:i:s'));
		parent::execute();
		return parent::lastInsertId();
	}



	


	public function getData($operation_id){
		parent::query('SELECT * FROM RTH_Operation WHERE id = :operation_id');
		parent::bind(':operation_id', $operation_id);
		parent::execute();
		return $dataset = parent::single();
	}

	public function setToFinal($operation_id){
		parent::query('UPDATE RTH_Operation SET type = "final" WHERE id = :operation_id');
		parent::bind(':operation_id', $operation_id);
		parent::execute();
	}
	public function unsetFinal($operation_id){
		parent::query('UPDATE RTH_Operation SET type = "normal" WHERE id = :operation_id');
		parent::bind(':operation_id', $operation_id);
		parent::execute();
	}


	
	// List all operation and checking operation in route id.
	public function listOperationAllInRoute($route_id){
		parent::query('SELECT operation.id,operation.name,operation.description,operation.create_time,operation.update_time,operation.type,operation.status,rmo.id match_id,rmo.sort 
			FROM RTH_Operation AS operation 
			LEFT JOIN RTH_RouteMatchOperation AS rmo ON rmo.operation_id = operation.id AND rmo.route_id = :route_id 
			ORDER BY rmo.sort ASC');
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

	// Delete function
	public function setOperationToDelete($operation_id){
		parent::query('UPDATE RTH_Operation SET status = "deleted" WHERE id = :operation_id');
		parent::bind(':operation_id', $operation_id);
		parent::execute();
	}
	public function deleteOperation($operation_id){
		// Delete operation Matching
		parent::query('DELETE FROM RTH_RouteMatchOperation WHERE operation_id = :operation_id');
		parent::bind(':operation_id', $operation_id);
		parent::execute();

		// Delete Operation item
		parent::query('DELETE FROM RTH_Operation WHERE id = :operation_id');
		parent::bind(':operation_id', $operation_id);
		parent::execute();
	}

	public function checkingOperationBeforeDelate($operation_id){
		parent::query('SELECT id FROM RTH_DailyOutputDetail WHERE operation_id = :operation_id');
		parent::bind(':operation_id', $operation_id);
		parent::execute();
		$dataset = parent::single();

		if(empty($dataset['id'])){
			return true;
		}else{
			return false;
		}
	}


	// Matching operation to route
	public function connectOperationToRoute($route_id,$operation_id){

		$sort = $this->lastSort($route_id,$operation_id);

		parent::query('INSERT INTO RTH_RouteMatchOperation(route_id,operation_id,sort,create_time) VALUE(:route_id,:operation_id,:sort,:create_time)');
		parent::bind(':route_id', 		$route_id);
		parent::bind(':operation_id', 	$operation_id);
		parent::bind(':sort',		 	++$sort);
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

	public function lastSort($route_id){
		parent::query('SELECT sort FROM RTH_RouteMatchOperation WHERE route_id = :route_id ORDER BY sort DESC LIMIT 1');
		parent::bind(':route_id', 		$route_id);
		$dataset = parent::single();
		return $dataset['sort'];
	}

	public function swapMatch($route_id,$operation_id){
		parent::query('SELECT id,sort FROM RTH_RouteMatchOperation WHERE route_id = :route_id AND operation_id = :operation_id');
		parent::bind(':route_id', 		$route_id);
		parent::bind(':operation_id', 	$operation_id);
		parent::execute();
		$dataset = parent::single();

		$current_id 	= $dataset['id'];
		$current_sort 	= $dataset['sort'];

		parent::query('SELECT id,sort FROM RTH_RouteMatchOperation WHERE route_id = :route_id AND sort < :current_sort ORDER BY sort DESC LIMIT 1');
		parent::bind(':route_id', 		$route_id);
		parent::bind(':current_sort', 	$current_sort);
		parent::execute();
		$dataset = parent::single();

		$prev_id 		= $dataset['id'];
		$prev_sort 		= $dataset['sort'];

		parent::query('UPDATE RTH_RouteMatchOperation SET sort = :sort WHERE route_id = :route_id AND id = :match_id');
		parent::bind(':sort', 			$current_sort);
		parent::bind(':route_id', 		$route_id);
		parent::bind(':match_id', 		$prev_id);
		parent::execute();

		parent::query('UPDATE RTH_RouteMatchOperation SET sort = :sort WHERE route_id = :route_id AND id = :match_id');
		parent::bind(':sort', 			$prev_sort);
		parent::bind(':route_id', 		$route_id);
		parent::bind(':match_id', 		$current_id);
		parent::execute();
	}
}
?>