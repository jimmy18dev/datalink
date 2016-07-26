<?php
class SettingModel extends Database{
	public function updateSetting($id,$value){
		parent::query('UPDATE RTH_Setting SET value = :value,update_time = :update_time WHERE id = :id');
		parent::bind(':id', 			$id);
		parent::bind(':value', 			$value);
		parent::bind(':update_time',		date('Y-m-d H:i:s'));
		parent::execute();
	}

	public function listSettingData(){
		parent::query('SELECT * FROM RTH_Setting WHERE 1 = 1 ORDER BY id DESC');
		parent::execute();
		$dataset = parent::resultset();
		foreach ($dataset as $k => $var) {
			$dataset[$k]['update_time'] = parent::date_format($var['update_time']);
		}

		return $dataset;
	}
}
?>