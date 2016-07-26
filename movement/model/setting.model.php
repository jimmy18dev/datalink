<?php
class SettingModel extends Database{
	
	public function listSettingData(){
		parent::query('SELECT * FROM RTH_Setting');
		parent::execute();
		return $dataset = parent::resultset();
	}
}
?>