<header class="header">
	<a href="index.php" class="logo"><i class="fa fa-code-fork" aria-hidden="true"></i>DATALINK</a>

	<?php if($current_page['1'] == 'report_detail'){?>
		<a href="report_detail.php?header=<?php echo $report->id;?>" class="navibar"><i class="fa fa-angle-right" aria-hidden="true"></i><strong><?php echo $report->date;?></strong></a>

		<?php if($current_page['2'] == 'choose_caliber'){?>
			<?php if($current_page['2'] == 'choose_caliber'){?>
				<?php if($_GET['action'] != 'edit'){?>
				<a href="report_detail_editor_choose_caliber.php?header=<?php echo $report->id;?>" class="navibar"><i class="fa fa-angle-right" aria-hidden="true"></i>Caliber : </a>
				<a href="#" class="navibar"><strong><?php echo $caliber->code;?> <?php echo $caliber->family;?></strong></a>
				<?php }else{?>
				<a href="#" class="navibar"><i class="fa fa-angle-right" aria-hidden="true"></i>Edit : <strong><?php echo $caliber->code;?> <?php echo $caliber->family;?></strong></a>
				<?php }?>
			<?php }?>
		<?php }?>
	<?php }else if($current_page['1'] == 'report_create'){?>
		<?php if(empty($report->id)){?>
		<a href="#" class="navibar"><i class="fa fa-angle-right" aria-hidden="true"></i>Create</a>
		<?php }else{?>
		<a href="#" class="navibar"><i class="fa fa-angle-right" aria-hidden="true"></i>Edit Report : <strong><?php echo $report->date;?></strong></a>
		<?php }?>
	<?php }?>


	<a href="logout.php" class="profile logout"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
	<div class="profile">
		<div class="name"><i class="fa fa-user" aria-hidden="true"></i><?php echo $user->fname?></div>
	</div>
</header>