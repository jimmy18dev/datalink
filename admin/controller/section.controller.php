<?php
class SectionController extends SectionModel{
	public $id;
	public $name;
	public $description;
	public $create_time;
	public $update_time;
	public $type;
	public $status;

	public function getSection($id){
		$dataset = parent::getData($id);

		$this->id = $dataset['id'];
		$this->name = $dataset['name'];
		$this->description = $dataset['description'];
		$this->create_time = $dataset['create_time'];
		$this->update_time = $dataset['update_time'];
		$this->type = $dataset['type'];
		$this->status = $dataset['status'];
	}

	public function listAllSection($option){
		$data = parent::listall($option);
		$this->render($data,$option);
	}

    public function deleteSection($section_id){
        if(parent::checkingBeforeDelate($section_id)){
            parent::delete($section_id);
        }else{
            parent::setToDelete($section_id);
        }
    }

	// render dataset to view.
    private function render($data,$option){
    	$total_items = 0;
        if($option['type'] == 'section-items'){
            foreach ($data as $var){
                include'template/section/section.items.php';
                $total_items++;
            }

            if($total_items == 0){
            	// include'template/article/article.empty.items.php';
            }
        }else if($option['type'] == 'section-option-select-items'){
        	$current = $option['current'];
            foreach ($data as $var){
                include'template/section/section.option.select.items.php';
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