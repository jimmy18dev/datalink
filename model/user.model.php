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
		parent::query('SELECT id FROM RTH_Setting WHERE keyword = "VisitTime"');
		parent::execute();
		$dataset = parent::single();

		if(empty($dataset['id'])){
			parent::query('INSERT INTO RTH_Setting(keyword,value,section,description,update_time) VALUE(:keyword,:value,:section,:description,:update_time)');
			parent::bind(':keyword', 		'VisitTime');
			parent::bind(':value', 			'0');
			parent::bind(':section', 		NULL);
			parent::bind(':description', 	'Last Access Time');
			parent::bind(':update_time',	date('Y-m-d H:i:s'));
			parent::execute();
			return parent::lastInsertId();
		}else{
			parent::query('UPDATE RTH_Setting SET update_time = :update_time WHERE keyword = "VisitTime"');
			parent::bind(':update_time',	date('Y-m-d H:i:s'));
			parent::execute();
		}

		return true;
	}
}
?>