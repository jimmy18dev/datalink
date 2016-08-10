<?php
class MessageController extends MessageModel{

    public function saveMessage($user_id,$id,$topic,$message){

        if(empty($id)){
            $message_id = parent::create($user_id,$topic,$message);
        }else{
            parent::update($id,$topic,$message);
            $message_id = $id;
        }

        return $message_id;
    }

	public function listMessage($option){
		$dataset = parent::listMessageData();
		$this->render($dataset,$option);
	}

	// render dataset to view.
    private function render($data,$option){
    	$total_items = 0;
        if($option['type'] == 'message-items'){
            foreach ($data as $var){
                include'template/message/message.items.php';
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