<nav class="navigator">
	<a href="index.php" class="header-items <?php echo ($current_page['1'] == 'index'?'header-items-active':'');?>"><i class="fa fa-database" aria-hidden="true"></i>Daily Report</a>
	<a href="yield_total_eff.php" class="header-items <?php echo ($current_page['1'] == 'yield'?'header-items-active':'');?>"><i class="fa fa-bar-chart" aria-hidden="true"></i>Yield & Total EFF</a>
	<a href="message.php" class="header-items <?php echo ($current_page['1'] == 'message'?'header-items-active':'');?>"><i class="fa fa-bullhorn" aria-hidden="true"></i>News (<?php echo $message->countMessage();?>)</a>
	<a href="profile.php" class="header-items <?php echo ($current_page['1'] == 'profile'?'header-items-active':'');?>"><i class="fa fa-user-o" aria-hidden="true"></i><?php echo $user->fname?></a>

	<a href="../logout.php" class="header-items logout">Logout</a>
</nav>