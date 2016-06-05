<header class="header">
	<div class="logo"><i class="fa fa-code-fork" aria-hidden="true"></i></div>
	<a href="index.php" class="header-items <?php echo ($current_page['1'] == 'report'?'header-items-active':'');?>">Report</a>
	<a href="user.php" class="header-items <?php echo ($current_page['1'] == 'user'?'header-items-active':'');?>">User</a>
	<a href="caliber.php" class="header-items <?php echo ($current_page['1'] == 'caliber'?'header-items-active':'');?>">Caliber Code</a>
	<a href="section.php" class="header-items <?php echo ($current_page['1'] == 'section'?'header-items-active':'');?>">Section</a>
	<a href="remark.php" class="header-items <?php echo ($current_page['1'] == 'remark'?'header-items-active':'');?>">General Remark</a>

	<a href="logout.php">
	<div class="signout"><i class="fa fa-sign-out" aria-hidden="true"></i></div>
	</a>
	
	<a href="profile.php" class="header-items <?php echo ($current_page['1'] == 'profile'?'header-items-active':'');?> user-items"><?php echo $user->fname.' '.$user->lname;?></a>
</header>