<header class="header">
	<a href="index.php" class="logo"><i class="fa fa-code-fork" aria-hidden="true"></i>DATALINK</a>

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
	<?php }else if($current_page['1'] == 'remark'){?>
		<a href="remark.php" class="navibar"><i class="fa fa-angle-right"></i>General Remark</a>

		<?php if($current_page['2'] == 'new_remark'){?>
		<a href="#" class="navibar"><i class="fa fa-angle-right"></i>Create Remark</a>
		<?php }else if($current_page['2'] == 'edit_remark'){?>
		<a href="#" class="navibar"><i class="fa fa-angle-right"></i>Edit Remark</a>
		<?php }?>
	<?php }else if($current_page['1'] == 'user'){?>
		<a href="user.php" class="navibar"><i class="fa fa-angle-right"></i>User</a>

		<?php if($current_page['2'] == 'new_user'){?>
		<a href="#" class="navibar"><i class="fa fa-angle-right"></i>Create User</a>
		<?php }else if($current_page['2'] == 'edit_user'){?>
		<a href="#" class="navibar"><i class="fa fa-angle-right"></i>Edit User</a>
		<?php }?>
	<?php }else if($current_page['1'] == 'report'){?>
		<a href="report_header.php" class="navibar"><i class="fa fa-angle-right"></i>Report</a>

		<?php if($current_page['2'] == 'report_detail'){?>
		<a href="#" class="navibar"><i class="fa fa-angle-right"></i>2016-04-23</a>
			<?php if($current_page['3'] == 'report_caliber_detail'){?>
			<a href="#" class="navibar"><i class="fa fa-angle-right"></i>740 SD</a>
			<?php }?>
		<?php }else if($current_page['2'] == 'edit_user'){?>
		<a href="#" class="navibar"><i class="fa fa-angle-right"></i>Edit User</a>
		<?php }?>
	<?php }?>
	<div class="profile">
		<div class="name"><a href="profile.php"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $user->fname?></a></div>
	</div>
</header>