<nav class="navigator">
	<a href="index.php" class="header-items <?php echo ($current_page['1'] == 'index'?'header-items-active':'');?>">Daily Reports</a>
	<a href="yield_total_eff.php" class="header-items <?php echo ($current_page['1'] == 'yield'?'header-items-active':'');?>">Yield & Total EFF</a>
	<a href="message.php" class="header-items <?php echo ($current_page['1'] == 'message'?'header-items-active':'');?>">News (<?php echo $message->countMessage();?>)</a>
	<a href="profile.php" class="header-items <?php echo ($current_page['1'] == 'profile'?'header-items-active':'');?>"><?php echo $user->fname?></a>

	<a href="../logout.php" class="header-items logout">Logout</a>
</nav>