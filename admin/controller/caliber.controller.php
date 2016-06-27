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
	public $standard_id;
	public $hrs;
	public $remark;

	// Route
	public $route_id;
	public $route_code;
	public $route_name;

	public $total_route;
	public $has_primary_route;


	// CALIBER CODE
	public function deleteCaliber($caliber_id){
        if(parent::checkingCaliberBeforeDelate($caliber_id)){
            parent::deleteCaliber($caliber_id);
        }else{
            parent::setCaliberToDelete($caliber_id);
        }
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

	public function getCaliber($id){
		$dataset = parent::getData($id);

		$this->id 				= $dataset['id'];
		$this->code 			= $dataset['code'];
		$this->name 			= $dataset['name'];
		$this->description 		= $dataset['description'];
		$this->family 			= $dataset['family'];
		$this->create_time 		= $dataset['create_time'];
		$this->update_time 		= $dataset['update_time'];
		$this->type 			= $dataset['type'];
		$this->status 			= $dataset['status'];

		// Std. Time
		$this->standard_id 		= $dataset['standard_id'];
		$this->hrs 				= $dataset['standard_hrs'];
		$this->remark 			= $dataset['standard_remark'];

		// Route
		$this->route_id 		= $dataset['route_id'];
		$this->route_code 		= $dataset['route_code'];
		$this->route_name 		= $dataset['route_name'];

		$this->total_route 		= parent::countRouteinCaliber($this->id);
		$this->has_primary_route = parent::hasPrimaryRoute($this->id);
	}

	public function listAllCalibers($option){
		$data = parent::listAllCaliber($option);
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
        }else if($option['type'] == 'operation-items'){
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
        }else if($option['type'] == 'operation-form-items'){
        	$remark_data = parent::listAllRemark();
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
                include'template/caliber/caliber.choose.items.php';
                $total_items++;
            }

            if($total_items == 0){
            	include'template/empty.items.php';
            }
        }else if($option['type'] == 'route-items'){
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