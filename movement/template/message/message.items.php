<div class="message-items" id="message-<?php echo $var['id'];?>">
	<div class="icon">
		<i class="fa fa-bullhorn" aria-hidden="true"></i>
	</div>
	<div class="detail">
		<div class="id">
			<span class="topic">Topic <?php echo $var['id'];?></span> · <span class="time"><?php echo ($var['create_time'] != $var['update_time']?'Edit '.$var['update_time']:$var['update_time']);?></span>
		</div>
		<?php if(!empty($var['topic'])){?>
		<div class="topic"><?php echo $var['topic'];?></div>
		<?php }?>
		<div class="message"><?php echo $var['message'];?></div>
	</div>
</div>