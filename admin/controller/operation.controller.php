<?php
class OperationController extends OperationModel{

	public $id;
	public $name;
	public $description;
	public $create_time;
	public $update_time;
	public $type;
	public $status;

	public function createOperation($name,$description){
		parent::create($name,$description);
	}
	public function editOperation($id,$name,$description){
		parent::edit($id,$name,$description);
	}

	public function getOperation($operation_id){
		$dataset = parent::getData($operation_id);

		$this->id 			= $dataset['id'];
		$this->name 		= $dataset['name'];
		$this->odescription = $dataset['description'];
		$this->create_time 	= $dataset['create_time'];
		$this->update_time 	= $dataset['update_time'];
		$this->type 		= $dataset['type'];
		$this->status 		= $dataset['status'];
	}


	public function listAllOperations($route_id,$option){
		$data = parent::listOperationAllInRoute($route_id);
		$this->render($data,$option);
	}

	public function deleteOperation($operation_id){
        if(parent::checkingOperationBeforeDelate($operation_id)){
            parent::deleteOperation($operation_id);
        }else{
            parent::setOperationToDelete($operation_id);
        }
    }

    public function connectOperationAndRoute($route_id,$operation_id){
		if(parent::alreadyConnect($route_id,$operation_id)){
			parent::connectOperationToRoute($route_id,$operation_id);
		}else{
			parent::removeOperationOnRoute($route_id,$operation_id);
		}
	}

    // render dataset to view.
    private function render($data,$option){
    	$total_items = 0;

        if($option['type'] == 'operation-items'){
        	$status = $option['status'];
        	$route_current = $option['route_current'];
            foreach ($data as $var){
            	if($status == 'active' && !empty($var['match_id'])){
            		include'template/caliber/operation.items.php';
            	}else if($status == 'disable' && empty($var['match_id'])){
            		include'template/caliber/operation.items.php';
            	}
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