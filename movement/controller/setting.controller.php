<?php
class SettingController extends SettingModel{
	public $target_eff;
	public $target_yield;

	public function getSetting(){
		$dataset = parent::listSettingData();

		foreach ($dataset as $var){
			if($var['keyword'] == 'TargetEFF') $this->target_eff = $var['value'];
			if($var['keyword'] == 'TargetYield') $this->target_yield = $var['value'];
		}
	}
}
?>