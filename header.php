<header class="header">
	<a href="index.php" class="logo">DATALINK</a>

	<?php if($current_page['1'] == 'caliber'){?>
		<a href="caliber.php" class="navibar"><i class="fa fa-angle-right"></i>Caliber Code</a>
		<?php if($current_page['2'] == 'caliber_code'){?>
		<a href="caliber_code.php?caliber=<?php echo $caliber->id;?>" class="navibar"><i class="fa fa-angle-right"></i><?php echo $caliber->code.' '.$caliber->family;?></a>
		<?php }else if($current_page['2'] == 'new_caliber'){?>
		<a href="#" class="navibar"><i class="fa fa-angle-right"></i>New</a>
		<?php }else if($current_page['2'] == 'edit_caliber'){?>
		<a href="caliber_code.php?caliber=<?php echo $caliber->id;?>" class="navibar"><i class="fa fa-angle-right"></i><?php echo $caliber->code.' '.$caliber->family;?></a>
		<a href="#" class="navibar"><i class="fa fa-angle-right"></i>Edit</a>
		<?php }else if($current_page['2'] == 'new_operation'){?>
		<a href="caliber_code.php?caliber=<?php echo $caliber->id;?>" class="navibar"><i class="fa fa-angle-right"></i><?php echo $caliber->code.' '.$caliber->family;?></a>
		<a href="#" class="navibar"><i class="fa fa-angle-right"></i>New Operation</a>
		<?php }?>
	<?php }?>
	<div class="profile">
		<img src="image/avatar.png" alt="">
	</div>
</header>