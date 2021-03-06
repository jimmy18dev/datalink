<?php
class CaliberController extends CaliberModel{

	public $id;
	public $code;
	public $name;
	public $description;
	public $family;
	public $create_time;
	public $update_time;
	public $type;
	public $status;

	// standard time
	public $std_id;
	public $std_time;
	public $remark;

	// Route
	public $route_id;
	public $route_caliber_id;
	public $route_code;
	public $route_name;
	public $route_description;
	public $route_create_time;
	public $route_update_time;
	public $route_type;
	public $route_status;
	public $total_operation;

	// Operation
	// public $operation_id;
	// public $operation_name;
	// public $operation_description;
	// public $operation_create_time;
	// public $operation_update_time;
	// public $operation_type;
	// public $operation_status;


	// CALIBER CODE
	// ROUTE
	public function listAllRoutes($caliber_id,$option){
		$data = parent::listRouteInCaliber($caliber_id);
		$this->render($data,$option);
	}
	public function connectOperationAndRoute($route_id,$operation_id){
		if(parent::alreadyConnect($route_id,$operation_id)){
			parent::connectOperationToRoute($route_id,$operation_id);
		}else{
			parent::removeOperationOnRoute($route_id,$operation_id);
		}
	}
	// OPERATION
	public function listAllOperations($route_id,$option){
		$data = parent::listOperationAllInRoute($route_id);
		$this->render($data,$option);
	}

	public function createCaliber($code,$name,$description,$family,$hrs,$remark){
		$caliber_id = parent::create($code,$name,$description,$family);

		// Create standrad time
		parent::createStandardTime($caliber_id,$hrs,$remark);
		return $caliber_id;
	}

	public function editCaliber($id,$code,$name,$description,$family,$hrs,$remark){
		parent::edit($id,$code,$name,$description,$family);

		parent::setStdTimeToSecondary($id);
		// Create standrad time
		parent::createStandardTime($id,$hrs,$remark);
	}

	// public function getOperation($operation_id){
	// 	$dataset = parent::getOperationData($operation_id);

	// 	$this->operation_id 			= $dataset['id'];
	// 	$this->operation_name 			= $dataset['name'];
	// 	$this->operation_description 	= $dataset['description'];
	// 	$this->operation_create_time 	= $dataset['create_time'];
	// 	$this->operation_update_time 	= $dataset['update_time'];
	// 	$this->operation_type 			= $dataset['type'];
	// 	$this->operation_status 		= $dataset['status'];
	// }


	// public function getRoute($route_id){
	// 	$dataset = parent::getRouteData($route_id);

	// 	$this->route_id = $dataset['id'];
	// 	$this->route_caliber_id = $dataset['caliber_id'];
	// 	$this->route_code = $dataset['route_code'];
	// 	$this->route_name = $dataset['route_name'];
	// 	$this->route_description = $dataset['name'];
	// 	$this->route_create_time = $dataset['create_time'];
	// 	$this->route_update_time = $dataset['update_time'];
	// 	$this->route_type = $dataset['type'];
	// 	$this->route_status = $dataset['status'];
	// }

	public function getCaliber($id){
		$dataset = parent::getData($id);

		$this->id 			= $dataset['id'];
		$this->code 		= $dataset['code'];
		$this->name 		= $dataset['code'].' '.$dataset['family'];
		$this->family 		= $dataset['family'];
		$this->description 	= $dataset['description'];
		$this->create_time 	= $dataset['create_time'];
		$this->update_time 	= $dataset['update_time'];
		$this->type 		= $dataset['type'];
		$this->status 		= $dataset['status'];

		// Std. Time
		$this->std_id 		= $dataset['std_id'];
		$this->std_time 	= $dataset['std_time'];

		// Route
		$this->route_id 	= $dataset['route_id'];
		$this->route_code 	= $dataset['route_code'];
		$this->route_name 	= $dataset['route_name'];
		$this->total_operation = $dataset['total_operation'];
	}

	public function listAllCalibers($option,$output = null,$keyword = ''){
		$dataset = parent::listAllCaliber($option['header_id'],$keyword);

		if($output == 'json'){
			$json_data = array(
	          "apiVersion"  => "1.0",
	          "message"     => "List order in table #".$table_id,
	          "return"      => $return,
	          "head_id" 	=> $head_id,
	          "keyword" 	=> $keyword,
	          "total_pay" 	=> floatval(number_format($total_pay,2)),
	          "total_items" => floatval(count($dataset)),
	          "execute"     => round(microtime(true)-StTime,4)."s",
	          "data"        => array(
	            'items'         => $dataset,
	          ),
	        );
	        
	        // JSON Encode and Echo.
	        echo json_encode($json_data);
		}else{
			$this->render($dataset,$option);
		}
	}

	public function listAllCaliberByTurnTo($option){
		$data = parent::listAllCaliberByTurnToData($option['header_id']);
		$this->render($data,$option);
	}

	// public function listAllOperationRecipe($caliber_id,$option){
	// 	$data = parent::listallOperation($caliber_id);
	// 	$this->render($data,$option);
	// }

	public function listOperationInRoute($caliber_id,$option){
		$data = parent::listOperationInRouteData($caliber_id);
		$this->render($data,$option);
	}

	// render dataset to view.
    private function render($data,$option){
    	$total_items = 0;

        if($option['type'] == 'caliber-items'){
        	// caliber items
            foreach ($data as $var){
                include'template/caliber/caliber.items.php';
                $total_items++;
            }

            if($total_items == 0){ include'template/article/article.empty.items.php'; }

        }else if($option['type'] == 'operation-items'){
            foreach ($data as $var){
                include'template/caliber/operation.items.php';
                $total_items++;
            }

            if($total_items == 0){
            	include'template/empty.items.php';
            }
        }else if($option['type'] == 'operation-form-items'){
        	$remark_data = parent::listAllRemark();
        	$remark_option .= '<option value="0">select remark...</option>';
        	foreach ($remark_data as $vars)
        		$remark_option .= '<option value="'.$vars['id'].'">'.$vars['description'].'</option>';

            foreach ($data as $var){
                include'template/caliber/operation.form.items.php';
                $total_items++;
            }

            if($total_items == 0){
            	include'template/empty.items.php';
            }
        }else if($option['type'] == 'caliber-choose-items'){
        	$header_id = $option['header_id'];
            foreach ($data as $var){

            	if($var['total_operation'] > 0)
            		include'template/caliber/caliber.choose.items.php';
                $total_items++;
            }

            if($total_items == 0){
            	include'template/empty.items.php';
            }
        }else if($option['type'] == 'caliber-turn-to-choose-items'){
        	$header_id = $option['header_id'];
            foreach ($data as $var){

            	if($var['total_operation'] > 0)
            		include'template/caliber/caliber.turn.to.choose.items.php';
                $total_items++;
            }

            if($total_items == 0){
            	include'template/empty.items.php';
            }
        }
        else if($option['type'] == 'route-items'){
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