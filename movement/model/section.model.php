<?php
class SectionModel extends Database{
	public function create($name,$description){
		parent::query('INSERT INTO RTH_Section(name,description,create_time,update_time) VALUE(:name,:description,:create_time,:update_time)');
		parent::bind(':name', 			$name);
		parent::bind(':description', 	$description);
		parent::bind(':create_time',	date('Y-m-d H:i:s'));
		parent::bind(':update_time',	date('Y-m-d H:i:s'));
		parent::execute();
		return parent::lastInsertId();
	}
	public function edit($id,$name,$description){
		parent::query('UPDATE RTH_Section SET name = :name,description = :description,update_time = :update_time WHERE id = :id');
		parent::bind(':id', 			$id);
		parent::bind(':name', 			$name);
		parent::bind(':description', 	$description);
		parent::bind(':update_time',	date('Y-m-d H:i:s'));
		parent::execute();
	}
	public function getData($id){
		parent::query('SELECT * FROM RTH_Section WHERE id = :id');
		parent::bind(':id', $id);
		parent::execute();
		return $dataset = parent::single();
	}
	public function listall(){
		parent::query('SELECT * FROM RTH_Section');
		parent::execute();
		$dataset = parent::resultset();

		foreach ($dataset as $k => $var) {
			$dataset[$k]['create_time'] = parent::datetime_thaiformat($var['create_time']);
			$dataset[$k]['update_time'] = parent::date_format($var['update_time']);
		}

		return $dataset;
	}
}
?>