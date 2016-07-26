<div class="message-items" id="message-<?php echo $var['id'];?>">
	<div class="time"><span class="id">#<?php echo $var['id'];?></span> · <?php echo ($var['create_time'] != $var['update_time']?'edit '.$var['update_time']:$var['update_time']);?></div>
	<div class="topic"><?php echo $var['topic'];?></div>
	<div class="message"><?php echo $var['message'];?></div>
	<div class="control">
		<div class="btn delete" onclick="javascript:deleteMessage(<?php echo $var['id'];?>);">Delete</div>
		<div class="btn edit" onclick="javascript:edit(<?php echo $var['id'];?>,'<?php echo $var['topic'];?>','<?php echo $var['message'];?>');">Edit</div>
	</div>
</div>