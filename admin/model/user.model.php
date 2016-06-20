<?php
class UserModel extends Database{
	public function create($section_id,$code,$fname,$lname,$username,$password,$line_default){

		parent::query('INSERT INTO RTH_User(section_id,code,fname,lname,username,password,line_default,register_time,update_time,visit_time,ip) VALUE(:section_id,:code,:fname,:lname,:username,:password,:line_default,:register_time,:update_time,:visit_time,:ip)');
		parent::bind(':section_id', 	$section_id);
		parent::bind(':code', 			$code);
		parent::bind(':fname', 			$fname);
		parent::bind(':lname', 			$lname);
		parent::bind(':username', 		$username);
		parent::bind(':password', 		$password);
		parent::bind(':line_default', 	$line_default);
		parent::bind(':register_time',	date('Y-m-d H:i:s'));
		parent::bind(':update_time',	date('Y-m-d H:i:s'));
		parent::bind(':visit_time',		date('Y-m-d H:i:s'));
		parent::bind(':ip',				parent::GetIpAddress());
		parent::execute();
		return parent::lastInsertId();
	}

	// Already checking before regsiter new user
	public function already($code,$username){
		parent::query('SELECT id FROM RTH_User WHERE code = :code || username = :username');
		parent::bind(':code',			$code);
		parent::bind(':username',		$username);
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

	public function edit($id,$section_id,$code,$fname,$lname,$username,$password,$line_default){
		parent::query('UPDATE RTH_User SET section_id = :section_id,code = :code,fname = :fname,lname = :lname,username = :username,password = :password,line_default = :line_default,update_time = :update_time WHERE id = :id');
		parent::bind(':id', 			$id);
		parent::bind(':section_id', 	$section_id);
		parent::bind(':code', 			$code);
		parent::bind(':fname', 			$fname);
		parent::bind(':lname', 			$lname);
		parent::bind(':username', 		$username);
		parent::bind(':password', 		$password);
		parent::bind(':line_default', 	$line_default);
		parent::bind(':update_time',	date('Y-m-d H:i:s'));
		parent::execute();
	}

	public function listall(){
		parent::query('SELECT user.id,user.code,user.fname,user.lname,user.username,user.password,user.line_default,user.register_time,user.update_time,user.visit_time,user.type,user.status,section.name section_name FROM RTH_User AS user LEFT JOIN RTH_Section AS section ON user.section_id = section.id ORDER BY visit_time DESC,create_time DESC');
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

	// Administrator only can login to control panel
	public function userLogin($username,$password){
		parent::query('SELECT id FROM RTH_User WHERE password = :password AND username = :username AND type = "Administrator"');
		parent::bind(':username', $username);
		parent::bind(':password', $password);
		parent::execute();
		$dataset = parent::single();
		return $dataset['id'];
	}

	// Delete function
	public function setToDeactive($user_id){
		parent::query('UPDATE RTH_User SET status = "deactive" WHERE id = :user_id');
		parent::bind(':user_id', $user_id);
		parent::execute();
	}


	// User and Grant Permissions
	public function setToAdmin($user_id){
		parent::query('UPDATE RTH_User SET type = "Administrator" WHERE id = :user_id');
		parent::bind(':user_id', $user_id);
		parent::execute();
	}

	public function setToUser($user_id){
		parent::query('UPDATE RTH_User SET type = "normal" WHERE id = :user_id');
		parent::bind(':user_id', $user_id);
		parent::execute();
	}

	// Total user account
	public function countUser(){
		parent::query('SELECT COUNT(id) total_user FROM RTH_User WHERE status = "active"');
		parent::execute();
		$dataset = parent::single();
		return $dataset['total_user'];
	}
}
?>