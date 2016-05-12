<?php
class RemarkModel extends Database{

	public function create($category_id,$description){
		parent::query('INSERT INTO RTH_GeneralRemark(category_id,description,create_time,update_time) VALUE(:category_id,:description,:create_time,:update_time)');
		parent::bind(':category_id', 	$category_id);
		parent::bind(':description', 	$description);
		parent::bind(':create_time',	date('Y-m-d H:i:s'));
		parent::bind(':update_time',	date('Y-m-d H:i:s'));
		parent::execute();
		return parent::lastInsertId();
	}
	public function edit($id,$category_id,$description){
		parent::query('UPDATE RTH_GeneralRemark SET category_id = :category_id,description = :description,update_time = :update_time WHERE id = :id');
		parent::bind(':id', 			$id);
		parent::bind(':category_id', 	$category_id);
		parent::bind(':description', 	$description);
		parent::bind(':update_time',	date('Y-m-d H:i:s'));
		parent::execute();
	}
	public function getData($id){
		parent::query('SELECT * FROM RTH_GeneralRemark WHERE id = :id');
		parent::bind(':id', $id);
		parent::execute();
		return $dataset = parent::single();
	}
	public function listall(){
		parent::query('SELECT * FROM RTH_GeneralRemark');
		parent::execute();
		return $dataset = parent::resultset();
	}

	public function toDelete(){

	}
	public function deleteAll(){
		parent::query('SELECT * FROM RTH_GeneralRemark');
		parent::execute();
		return $dataset = parent::resultset();
	}
}
?>