<header class="header">
	<div class="logo">
		<h1><a href="index.php">DATALINK</a></h1>
		<div class="version">Version <?php echo $meta['dev']['version'];?></div>
	</div>
	<a href="index.php" target="_parent" class="header-items <?php echo ($current_page['1'] == 'report'?'header-items-active':'');?>">Report</a>
	<a href="caliber.php" target="_parent" class="header-items <?php echo ($current_page['1'] == 'caliber'?'header-items-active':'');?>">Caliber Code</a>
	<a href="user.php" target="_parent" class="header-items <?php echo ($current_page['1'] == 'user'?'header-items-active':'');?>">User</a>
	<a href="message.php" target="_parent" class="header-items <?php echo ($current_page['1'] == 'message'?'header-items-active':'');?>">Messages</a>
	<a href="remark.php" target="_parent" class="header-items <?php echo ($current_page['1'] == 'remark'?'header-items-active':'');?>">General Remark</a>

	<div class="footer-menu">
		<a href="setting.php" target="_parent" class="header-items <?php echo ($current_page['1'] == 'setting'?'header-items-active':'');?>">Setting</a>
		<a href="section.php" target="_parent" class="header-items <?php echo ($current_page['1'] == 'section'?'header-items-active':'');?>">Section</a>
		<a href="profile.php" target="_parent" class="header-items user-items <?php echo ($current_page['1'] == 'profile'?'header-items-active':'');?>"><?php echo $user->fname;?></a>
		<a href="logout.php" target="_parent" class="header-items logout">Logout</a>
	</div>
</header>