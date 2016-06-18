<?php
class UserActivityController extends UserActivityModel{
	public function saveActivity($user_id,$action,$description,$target_id){
		parent::create($user_id,$action,$description,$target_id);
	}
}
?>