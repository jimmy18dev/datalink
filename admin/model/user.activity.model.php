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

	public function listall($user_id){
		parent::query('SELECT user_id,action,description,target_id,create_time,ip FROM RTH_User_activity WHERE user_id = :user_id ORDER BY create_time DESC LIMIT 100');
		parent::bind(':user_id', 		$user_id);
		parent::execute();
		$dataset = parent::resultset();

		// foreach ($dataset as $k => $var) {
		// 	$dataset[$k]['visit'] = $var['visit_time'];
		// 	$dataset[$k]['create_time'] = parent::datetime_thaiformat($var['create_time']);
		// 	$dataset[$k]['visit_time'] = parent::date_facebookformat($var['visit_time']);
		// }

		return $dataset;
	}

	public function countActivity($user_id){
		parent::query('SELECT COUNT(id) total_activity FROM RTH_User_activity WHERE user_id = :user_id');
		parent::bind(':user_id', $user_id);
		parent::execute();
		$dataset = parent::single();
		return $dataset['total_activity'];
	}
}
?>