<div class="message-items" id="message-<?php echo $var['id'];?>">
	<div class="title"><?php echo $var['topic'];?></div>
	<div class="info"><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $var['update_time'];?> · <span class="btn-delete" onclick="javascript:deleteMessage(<?php echo $var['id'];?>);"><i class="fa fa-times" aria-hidden="true"></i>Delete</span></div>
	<div class="message"><?php echo $var['message'];?></div>
</div>