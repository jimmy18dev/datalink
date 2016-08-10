<div class="message-items" id="message-<?php echo $var['id'];?>">
	<div class="id">#<?php echo $var['id'];?></div>
	<div class="detail">
		<?php if(!empty($var['topic'])){?>
		<div class="topic"><?php echo $var['topic'];?></div>
		<?php }?>
		<div class="message"><span class="time"><?php echo ($var['create_time'] != $var['update_time']?'Edit '.$var['update_time']:$var['update_time']);?><i class="fa fa-clock-o" aria-hidden="true"></i></span> | <?php echo $var['message'];?></div>
	</div>
</div>