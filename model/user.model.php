<?php
class UserModel extends Database{
	public function create($section_id,$code,$fname,$lname,$username,$password){

		parent::query('INSERT INTO RTH_User(section_id,code,fname,lname,username,password,register_time,update_time,visit_time,ip) VALUE(:section_id,:code,:fname,:lname,:username,:password,:register_time,:update_time,:visit_time,:ip)');
		parent::bind(':section_id', 	$section_id);
		parent::bind(':code', 			$code);
		parent::bind(':fname', 			$fname);
		parent::bind(':lname', 			$lname);
		parent::bind(':username', 		$username);
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

	public function edit($id,$section_id,$code,$fname,$lname,$username,$password){
		parent::query('UPDATE RTH_User SET section_id = :section_id,code = :code,fname = :fname,lname = :lname,username = :username,password = :password,update_time = :update_time WHERE id = :id');
		parent::bind(':id', 			$id);
		parent::bind(':section_id', 	$section_id);
		parent::bind(':code', 			$code);
		parent::bind(':fname', 			$fname);
		parent::bind(':lname', 			$lname);
		parent::bind(':username', 		$username);
		parent::bind(':password', 		$password);
		parent::bind(':update_time',	date('Y-m-d H:i:s'));
		parent::execute();
	}

	public function listall(){
		parent::query('SELECT user.id,user.code,user.fname,user.lname,user.username,user.password,user.register_time,user.update_time,user.visit_time,section.name section_name FROM RTH_User AS user LEFT JOIN RTH_Section AS section ON user.section_id = section.id ORDER BY visit_time DESC,create_time DESC');
		parent::execute();
		$dataset = parent::resultset();

		foreach ($dataset as $k => $var) {
			$dataset[$k]['visit'] = $var['visit_time'];
			$dataset[$k]['create_time'] = parent::datetime_thaiformat($var['create_time']);
			$dataset[$k]['visit_time'] = parent::date_facebookformat($var['visit_time']);
		}

		return $dataset;
	}

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