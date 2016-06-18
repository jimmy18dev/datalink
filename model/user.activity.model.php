<?php
class UserActivityModel extends Database{
	public function create($user_id,$action,$description,$target_id){
		parent::query('INSERT INTO RTH_User_activity(user_id,action,description,target_id,create_time,ip) VALUE(:user_id,:action,:description,:target_id,:create_time,:ip)');
		parent::bind(':user_id', 		$user_id);
		parent::bind(':action', 		$action);
		parent::bind(':description', 	$description);
		parent::bind(':target_id', 		$target_id);
		parent::bind(':create_time',	date('Y-m-d H:i:s'));
		parent::bind(':ip',				parent::GetIpAddress());
		parent::execute();
		return parent::lastInsertId();
	}
}
?>