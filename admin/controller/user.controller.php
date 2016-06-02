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

	// Register new user
	public function register($section_id,$code,$fname,$lname,$username,$password,$line_default){
		$already_id = parent::already($code,$fname,$lname);

		if(empty($already_id)){
			return parent::create($section_id,$code,$fname,$lname,$username,$password,$line_default);
		}else{
			return 0;
		}
	}

	public function editInfo($id,$section_id,$code,$fname,$lname,$username,$password,$line_default){

		if(empty($id) || empty($code) || empty($fname) || empty($lname) || empty($password)){ return false; }
		
		parent::edit($id,$section_id,$code,$fname,$lname,$username,$password,$line_default);
	}

	public function login($username,$password){
		if(empty($username) || empty($password)){ return false; }

		$user_id = parent::userLogin($username,$password);
		
		if(!empty($user_id)){
			$_SESSION['user_id'] = $user_id;
            setcookie('user_id', $user_id, COOKIE_TIME);
            return $user_id;
		}else{
			return 0;
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

		$this->id = $dataset['id'];
		$this->code = $dataset['code'];
		$this->fname = $dataset['fname'];
		$this->lname = $dataset['lname'];
		$this->name = $this->fname.' '.$this->lname;
		$this->password = $dataset['password'];
		$this->line_default = $dataset['line_default'];
		$this->register_time = $dataset['register_time'];
		$this->update_time = $dataset['update_time'];
		$this->visit_time = $dataset['visit_time'];
		$this->type = $dataset['type'];
		$this->status = $dataset['status'];
	}

	public function listAllUser($option){
		$data = parent::listall();
		$this->render($data,$option);
	}

	// User and Grant Permissions
	public function grantAdmin($user_id){
		parent::setToAdmin($user_id);
	}
	public function removeAdmin($user_id){
		parent::setToUser($user_id);
	}
	public function deactiveUser($user_id){
		parent::setToDeactive($user_id);
	}

	// render dataset to view.
    private function render($data,$option){
    	$total_items = 0;
        if($option['type'] == 'user-items'){
            foreach ($data as $var){

            	// Online checking
            	$timestamp = strtotime($var['visit']);
            	if(time() - $timestamp < 300){
            		$online = true;
            	}else{
            		$online = false;
            	}

                include'template/user/user.items.php';
                $total_items++;
            }

            if($total_items == 0){
            	// include'template/article/article.empty.items.php';
            }
        }

        unset($data);
        $total_items = 0;
    }
}
?>