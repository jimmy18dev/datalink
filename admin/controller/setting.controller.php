<?php
class SettingController extends SettingModel{
	public function listSetting($option){
		$dataset = parent::listSettingData();
		$this->render($dataset,$option);
	}

	// render dataset to view.
    private function render($data,$option){
    	$total_items = 0;
        if($option['type'] == 'setting-form-items'){
            foreach ($data as $var){
                include'template/setting/setting.form.items.php';
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