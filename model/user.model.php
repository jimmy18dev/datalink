<?php
class UserModel extends Database{
	public function getData($user_id){
		parent::query('SELECT user.id,user.code,user.fname,user.lname,user.line_default,user.register_time,user.update_time,user.visit_time,user.ip,user.type,user.status,section.id section_id,section.name section_name,section.redirect section_redirect 
			FROM RTH_User AS user 
			LEFT JOIN RTH_Section AS section ON user.section_id = section.id 
			WHERE user.id = :user_id');
		parent::bind(':user_id', $user_id);
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
		parent::query('SELECT id FROM RTH_User WHERE password = :password AND username = :username AND type = "normal"');
		parent::bind(':username', $username);
		parent::bind(':password', $password);
		parent::execute();
		$dataset = parent::single();
		return $dataset['id'];
	}

	public function checkingConnection(){
		parent::query('SELECT COUNT(id) FROM RTH_User');
		parent::execute();
		$dataset = parent::single();
		if(!empty($dataset['COUNT(id)'])){
			return true;
		}else{
			return false;
		}
	}
}
?>