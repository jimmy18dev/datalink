<?php
class UserActivityController extends UserActivityModel{
	public $id;

	public function saveActivity($user_id,$action,$description,$target_id){
		parent::create($user_id,$action,$description,$target_id);
	}

	public function listActivity($user_id,$option){
		$data = parent::listall($user_id);
		$this->render($data,$option);
	}

	// render dataset to view.
    private function render($data,$option){
    	$total_items = 0;
        if($option['type'] == 'user-activity-items'){
            foreach ($data as $var){
                include'template/user/user.activity.items.php';
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