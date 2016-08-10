<?php
class MessageModel extends Database{

	public function create($user_id,$topic,$message){
		parent::query('INSERT INTO RTH_Message(user_id,topic,message,create_time,update_time) VALUE(:user_id,:topic,:message,:create_time,:update_time)');
		parent::bind(':user_id', 		$user_id);
		parent::bind(':topic', 			$topic);
		parent::bind(':message', 		$message);
		parent::bind(':create_time',	date('Y-m-d H:i:s'));
		parent::bind(':update_time',	date('Y-m-d H:i:s'));
		parent::execute();
		return parent::lastInsertId();
	}

	public function update($id,$topic,$message){
		parent::query('UPDATE RTH_Message SET topic = :topic, message = :message, update_time = :update_time WHERE id = :id');
		parent::bind(':id', 			$id);
		parent::bind(':topic', 			$topic);
		parent::bind(':message', 		$message);
		parent::bind(':update_time',	date('Y-m-d H:i:s'));
		parent::execute();
		return parent::lastInsertId();
	}

	public function delete($id){
		parent::query('DELETE FROM RTH_Message WHERE id = :id');
		parent::bind(':id', $id);
		parent::execute();
	}

	// public function updateSetting($id,$value){
	// 	parent::query('UPDATE RTH_Setting SET value = :value,update_time = :update_time WHERE id = :id');
	// 	parent::bind(':id', 			$id);
	// 	parent::bind(':value', 			$value);
	// 	parent::bind(':update_time',		date('Y-m-d H:i:s'));
	// 	parent::execute();
	// }

	public function listMessageData(){
		parent::query('SELECT * FROM RTH_Message WHERE 1 = 1 ORDER BY create_time DESC');
		parent::execute();
		$dataset = parent::resultset();
		// foreach ($dataset as $k => $var) {
		// 	$dataset[$k]['update_time'] = parent::date_format($var['update_time']);
		// 	$dataset[$k]['create_time'] = parent::date_format($var['create_time']);
		// }

		return $dataset;
	}
}
?>