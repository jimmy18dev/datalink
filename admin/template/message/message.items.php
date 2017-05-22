<div class="message-items" id="message-<?php echo $var['id'];?>">
	<div class="title"><?php echo $var['topic'];?></div>
	<div class="info">
		<span class="time"><?php echo ($var['create_time'] != $var['update_time']?'Edit '.$var['update_time']:$var['update_time']);?></span> · 
		<span class="btn-delete" onclick="javascript:deleteMessage(<?php echo $var['id'];?>);">Delete</span>
	</div>
	<div class="message"><?php echo $var['message'];?></div>
</div>