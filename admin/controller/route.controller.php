<?php
class RouteController extends RouteModel{
	public $id;
	public $caliber_id;
	public $caliber_name;
	public $code;
	public $name;
	public $description;
	public $create_time;
	public $update_time;
	public $type;
	public $status;
	public $total_operation;

	public function getRoute($route_id){
		$dataset = parent::getData($route_id);

		$this->id 				= $dataset['id'];
		$this->caliber_id 		= $dataset['caliber_id'];
		$this->caliber_name 	= $dataset['caliber_code'].' '.$dataset['caliber_family'];
		$this->code 			= $dataset['code'];
		$this->name 			= $dataset['name'];
		$this->description 		= $dataset['description'];
		$this->create_time 		= $dataset['create_time'];
		$this->update_time 		= $dataset['update_time'];
		$this->type 			= $dataset['type'];
		$this->status 			= $dataset['status'];
		$this->total_operation 	= $dataset['total_operation'];
	}


	public function createRoute($caliber_id,$code,$name,$description){
		parent::create($caliber_id,$code,$name,$description);
	}
	public function editRoute($route_id,$code,$name,$description){
		parent::edit($route_id,$code,$name,$description);
	}

	public function listRouteInCaliber($caliber_id,$option){
		$data = parent::listRouteInCaliberData($caliber_id);
		$this->render($data,$option);
	}
	public function connectOperationAndRoute($route_id,$operation_id){
		if(parent::alreadyConnect($route_id,$operation_id)){
			parent::connectOperationToRoute($route_id,$operation_id);
		}else{
			parent::removeOperationOnRoute($route_id,$operation_id);
		}
	}
	public function deleteRoute($route_id){
        if(parent::checkingRouteBeforeDelate($route_id)){
            parent::deleteRoute($route_id);
        }else{
            parent::setRouteToDelete($route_id);
        }
    }

    // render dataset to view.
    private function render($data,$option){
    	$total_items = 0;

        if($option['type'] == 'route-items'){
            foreach ($data as $var){
                include'template/caliber/route.items.php';
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