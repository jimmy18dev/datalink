<?php
class MessageModel extends Database{

	public function countMessage(){
		parent::query('SELECT COUNT(id) total FROM RTH_Message WHERE 1 = 1');
		parent::execute();
		$dataset = parent::single();
		return $dataset['total'];
	}

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