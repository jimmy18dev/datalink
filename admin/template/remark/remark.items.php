<div class="remark-items">
	<div class="title"><?php echo $var['description'];?> <a href="remark_editor.php?id=<?php echo $var['id'];?>">[edit]</a></div>
	<?php if($lastupdate){?>
	<div class="lastupdate">Updated <?php echo $var['update_facebook_format'];?></div>
	<?php }?>
</div>