<div class="message-items" id="message-<?php echo $var['id'];?>">
	<h2><?php echo $var['topic'];?></h2>
	<p class="info">Message ID <?php echo $var['id'];?></span> · <span class="time"><?php echo ($var['create_time'] != $var['update_time']?'Edit '.$var['update_time']:$var['update_time']);?></p>
	<p><?php echo $var['message'];?></p>
</div>