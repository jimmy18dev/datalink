<?php
class UserModel extends Database{
	public function create($code,$fname,$lname,$password){
		parent::query('INSERT INTO RTH_User(code,fname,lname,password,register_time,update_time,visit_time,ip) VALUE(:code,:fname,:lname,:password,:register_time,:update_time,:visit_time,:ip)');
		parent::bind(':code', 			$code);
		parent::bind(':fname', 			$fname);
		parent::bind(':lname', 			$lname);
		parent::bind(':password', 		$password);
		parent::bind(':register_time',	date('Y-m-d H:i:s'));
		parent::bind(':update_time',	date('Y-m-d H:i:s'));
		parent::bind(':visit_time',		date('Y-m-d H:i:s'));
		parent::bind(':ip',				parent::GetIpAddress());
		parent::execute();
		return parent::lastInsertId();
	}

	// Already checking before regsiter new user
	public function already($code,$fname,$lname){
		parent::query('SELECT id FROM RTH_User WHERE code = :code OR fname = :fname OR lname = :lname');
		parent::bind(':code',				$code);
		parent::bind(':fname',			$fname);
		parent::bind(':lname',			$lname);
		parent::execute();
		$dataset = parent::single();
		return $dataset['id'];
	}

	// Already chicking by user code
	public function checkAlready($code){
		parent::query('SELECT id FROM RTH_User WHERE code = :code');
		parent::bind(':code', $code);
		parent::execute();
		$dataset = parent::single();
		return $dataset['id'];
	}

	public function edit($id,$code,$fname,$lname,$password){
		parent::query('UPDATE RTH_User SET code = :code,fname = :fname,lname = :lname,password = :password,update_time = :update_time WHERE id = :id');
		parent::bind(':id', 			$id);
		parent::bind(':code', 			$code);
		parent::bind(':fname', 			$fname);
		parent::bind(':lname', 			$lname);
		parent::bind(':password', 		$password);
		parent::bind(':update_time',	date('Y-m-d H:i:s'));
		parent::execute();
	}

	public function listall(){
		parent::query('SELECT * FROM RTH_User');
		parent::execute();
		return $dataset = parent::resultset();
	}

	public function getData($id){
		parent::query('SELECT * FROM RTH_User WHERE id = :id');
		parent::bind(':id', $id);
		parent::execute();
		return $dataset = parent::single();
	}

	public function userLogin($password){
		parent::query('SELECT id FROM RTH_User WHERE password = :password');
		parent::bind(':password', $password);
		parent::execute();
		$dataset = parent::single();
		return $dataset['id'];
	}
}
?>