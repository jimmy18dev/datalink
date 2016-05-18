<?php
class UserModel extends Database{
	public function getData($id){
		parent::query('SELECT * FROM RTH_User WHERE id = :id');
		parent::bind(':id', $id);
		parent::execute();
		return $dataset = parent::single();
	}

	public function updateVisitTime($id){
		parent::query('UPDATE RTH_User SET visit_time = :visit_time WHERE id = :id');
		parent::bind(':id', 			$id);
		parent::bind(':visit_time',	date('Y-m-d H:i:s'));
		parent::execute();
	}

	public function userLogin($username,$password){
		parent::query('SELECT id FROM RTH_User WHERE password = :password AND username = :username');
		parent::bind(':username', $username);
		parent::bind(':password', $password);
		parent::execute();
		$dataset = parent::single();
		return $dataset['id'];
	}
}
?>