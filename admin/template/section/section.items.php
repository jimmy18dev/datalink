<div class="items section-items">
	<div class="col1"><strong><?php echo $var['name'];?></strong></div>
	<div class="col2"><i><?php echo (empty($var['description'])?'-':$var['description']);?></i></div>
	<div class="col-control"><a href="section_editor.php?section=<?php echo $var['id'];?>"><i class="fa fa-cog" aria-hidden="true"></i></a></div>
</div>