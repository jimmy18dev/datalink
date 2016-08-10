<div class="turn-to-items" id="turn-in-<?php echo $var['id'];?>">
	<div class="title"><?php echo $var['code'].' '.$var['family'];?></div>
	<div class="output"><?php echo number_format($var['output']);?></div>
	<div class="btn" onclick="javascript:deleteTurnTo(<?php echo $var['id'];?>);"><i class="fa fa-times" aria-hidden="true"></i></div>
</div>