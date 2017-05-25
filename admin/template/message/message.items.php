<div class="message-items" id="message-<?php echo $var['id'];?>">
	<div class="desc">
		<span class="btn-delete" onclick="javascript:deleteMessage(<?php echo $var['id'];?>);"><i class="fa fa-times" aria-hidden="true"></i></span>
	</div>

	<div class="title"><?php echo $var['topic'];?></div>
	<div class="message"><?php echo $var['message'];?></div>
</div>