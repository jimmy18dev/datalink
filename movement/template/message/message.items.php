<div class="message-items" id="message-<?php echo $var['id'];?>">
	<div class="info"><span class="id">#<?php echo $var['id'];?></span><span class="time"><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo ($var['create_time'] != $var['update_time']?'edit '.$var['update_time']:$var['update_time']);?></span></div>
	<div class="topic"><?php echo $var['topic'];?></div>
	<div class="message"><?php echo $var['message'];?></div>
</div>