<div class="section-items">
	<div class="col1"><strong><?php echo $var['name'];?></strong></div>
	<div class="col2"><?php echo (empty($var['description'])?'-':$var['description']);?></div>
	<div class="col3"><a href="section_editor.php?section=<?php echo $var['id'];?>">Edit</a></div>
</div>