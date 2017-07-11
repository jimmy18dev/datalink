<div class="section-items">
	<div class="col1"><strong><?php echo $var['name'];?></strong></div>
	<div class="col2"><i><?php echo (empty($var['redirect'])?'-':'/'.$var['redirect']);?></i></div>
	<div class="col3"><i><?php echo (empty($var['description'])?'-':$var['description']);?></i></div>
	<div class="col-control"><a href="section_editor.php?section=<?php echo $var['id'];?>">EDIT</a></div>
</div>