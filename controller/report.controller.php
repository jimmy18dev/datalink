<?php
class ReportController extends ReportModel{

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


	// Operation Recipe
	public $opt_id;
	public $opt_caliber_id;
	public $opt_route_id;
	public $opt_route_name;
	public $opt_name;
	public $opt_create_time;
	public $opt_update_time;
	public $opt_type;
	public $opt_status;

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

	public function getOperationRecipe($id){
		$dataset = parent::getDataOperation($id);

		$this->opt_id = $dataset['id'];
		$this->opt_caliber_id = $dataset['caliber_id'];
		$this->opt_route_id = $dataset['route_id'];
		$this->opt_route_name = $dataset['route_name'];
		$this->opt_name = $dataset['name'];
		$this->opt_create_time = $dataset['create_time'];
		$this->opt_update_time = $dataset['update_time'];
		$this->opt_type = $dataset['type'];
		$this->opt_status = $dataset['status'];
	}

	public function getCaliber($id){
		$dataset = parent::getData($id);

		$this->id = $dataset['id'];
		$this->code = $dataset['code'];
		$this->name = $dataset['name'];
		$this->description = $dataset['description'];
		$this->family = $dataset['family'];
		$this->create_time = $dataset['create_time'];
		$this->update_time = $dataset['update_time'];
		$this->type = $dataset['type'];
		$this->status = $dataset['status'];

		$this->standard_id = $dataset['standard_id'];
		$this->hrs = $dataset['standard_hrs'];
		$this->remark = $dataset['standard_remark'];
	}

	public function listAllCaliber($option){
		$data = parent::listall($option);
		$this->render($data,$option);
	}

	public function listAllOperationRecipe($caliber_id,$option){
		$data = parent::listallOperation($caliber_id);
		$this->render($data,$option);
	}

	// render dataset to view.
    private function render($data,$option){
    	$total_items = 0;
        if($option['type'] == 'caliber-items'){
            foreach ($data as $var){
                include'template/caliber/caliber.items.php';
                $total_items++;
            }

            if($total_items == 0){
            	// include'template/article/article.empty.items.php';
            }
        }else if($option['type'] == 'operation-items'){
            foreach ($data as $var){
                include'template/caliber/operation.items.php';
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