<header class="header">
	<div class="logo"><i class="fa fa-code-fork" aria-hidden="true"></i></div>
	<a href="index.php" target="_parent" class="header-items <?php echo ($current_page['1'] == 'report'?'header-items-active':'');?>">Report</a>
	<a href="user.php" target="_parent" class="header-items <?php echo ($current_page['1'] == 'user'?'header-items-active':'');?>">User</a>
	<a href="caliber.php" target="_parent" class="header-items <?php echo ($current_page['1'] == 'caliber'?'header-items-active':'');?>">Caliber Code</a>
	<a href="section.php" target="_parent" class="header-items <?php echo ($current_page['1'] == 'section'?'header-items-active':'');?>">Section</a>
	<a href="remark.php" target="_parent" class="header-items <?php echo ($current_page['1'] == 'remark'?'header-items-active':'');?>">General Remark</a>
	<a href="message.php" target="_parent" class="header-items <?php echo ($current_page['1'] == 'message'?'header-items-active':'');?>">Messages</a>
	<a href="setting.php" target="_parent" class="header-items <?php echo ($current_page['1'] == 'setting'?'header-items-active':'');?>">Setting</a>

	<div class="version-items">Ver. <?php echo $meta['dev']['version'];?></div>
	<a href="profile.php" target="_parent" class="header-items user-items <?php echo ($current_page['1'] == 'profile'?'header-items-active':'');?>"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $user->fname.' '.$user->lname;?></a>
</header>