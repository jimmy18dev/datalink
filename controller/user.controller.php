<?php
class UserController extends UserModel{
	public $id;
	public $code;
	public $fname;
	public $lname;
	public $name;
	public $password;
	public $line_default;
	public $register_time;
	public $update_time;
	public $visit_time;
	public $type;
	public $status;

	public function login($username,$password){
		if(empty($username) || empty($password)){ return false; }

		$user_id = parent::userLogin($username,$password);
		
		if(!empty($user_id)){
			$_SESSION['user_id'] = $user_id;
            setcookie('user_id', $user_id, COOKIE_TIME);
            return true;
		}else{
			return false;
		}
	}

	public function cookieChecking(){
        if(!empty($_COOKIE['user_id']))
        	return true;
        else
        	return false; 
    }

    public function sessionOnline(){
        if(!empty($_SESSION['user_id']))
        	return true;
        else
        	return false;
    }


	public function getUser($id){
		$dataset = parent::getData($id);
		parent::updateVisitTime($id);

		$this->id 				= $dataset['id'];
		$this->code 			= $dataset['code'];
		$this->fname 			= $dataset['fname'];
		$this->lname 			= $dataset['lname'];
		$this->name 			= $this->fname.' '.$this->lname;
		$this->password 		= $dataset['password'];
		$this->line_default 	= $dataset['line_default'];
		$this->register_time 	= $dataset['register_time'];
		$this->update_time 		= $dataset['update_time'];
		$this->visit_time 		= $dataset['visit_time'];
		$this->type 			= $dataset['type'];
		$this->status 			= $dataset['status'];
	}
}
?>