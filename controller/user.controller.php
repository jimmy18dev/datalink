<?php
class UserController extends UserModel{
	public $id;
	public $code;
	public $fname;
	public $lname;
	public $password;
	public $register_time;
	public $update_time;
	public $visit_time;
	public $type;
	public $status;

	// Register new user
	public function register($code,$fname,$lname,$password){
		$already_id = parent::already($code,$fname,$lname);

		if(empty($already_id)){
			return parent::create($code,$fname,$lname,$password);
		}else{
			return 0;
		}
	}

	public function editInfo($id,$code,$fname,$lname,$password){

		if(empty($id) || empty($code) || empty($fname) || empty($lname) || empty($password)){ return false; }
		
		parent::edit($id,$code,$fname,$lname,$password);
	}

	public function login($password){
		if(empty($password)){ return false; }

		$user_id = parent::userLogin($password);
		
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

		$this->id = $dataset['id'];
		$this->code = $dataset['code'];
		$this->fname = $dataset['fname'];
		$this->lname = $dataset['lname'];
		$this->password = $dataset['password'];
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

	// render dataset to view.
    private function render($data,$option){
    	$total_items = 0;
        if($option['type'] == 'user-items'){
            foreach ($data as $var){
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