<div class="message-items" id="message-<?php echo $var['id'];?>">
	<div class="time"><?php echo ($var['create_time'] != $var['update_time']?'Edit '.$var['update_time']:$var['update_time']);?> <div class="btn-delete" onclick="javascript:deleteMessage(<?php echo $var['id'];?>);">Delete</div></div>
	<div class="message"><?php echo $var['message'];?></div>
</div>