<?php
class RemarkController extends RemarkModel{
	public $id;
	public $category_id;
	public $description;
	public $create_time;
	public $update_time;
	public $type;
	public $status;


	public function getRemark($id){
		$dataset = parent::getData($id);

		$this->id = $dataset['id'];
		$this->category_id = $dataset['category_id'];
		$this->description = $dataset['description'];
		$this->create_time = $dataset['create_time'];
		$this->update_time = $dataset['update_time'];
		$this->type = $dataset['type'];
		$this->status = $dataset['status'];
	}

	public function listAllRemark($option){
		$data = parent::listall($option);
		$this->render($data,$option);
	}

	// render dataset to view.
    private function render($data,$option){
    	$total_items = 0;
        if($option['type'] == 'remark-items'){
            foreach ($data as $var){
                include'template/remark/remark.items.php';
                $total_items++;
            }

            if($total_items == 0){
            	// include'template/article/article.empty.items.php';
            }
        }

        unset($data);
        $total_items = 0;
    }
}
?>