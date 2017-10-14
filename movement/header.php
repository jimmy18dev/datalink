<header class="header">
	<a href="index.php" class="items <?php echo ($current_page['1'] == 'index'?'-active':'');?>">DAILY REPORTS</a>
	<a href="yield_total_eff.php" class="items <?php echo ($current_page['1'] == 'yield'?'-active':'');?>">YIELD & TOTAL EFF</a>
	<a href="message.php" class="items <?php echo ($current_page['1'] == 'message'?'-active':'');?>">NEWS<span class="count"><?php echo $message->countMessage();?></span></a>

	<a href="../logout.php" class="btn btn-logout">Logout<i class="fa fa-sign-out" aria-hidden="true"></i></a>
	<a href="profile.php" class="btn <?php echo ($current_page['1'] == 'profile'?'-active':'');?>"><?php echo $user->fname?></a>
	<a class="btn btn-create" href="report_header_editor.php?action=create"><i class="fa fa-plus" aria-hidden="true"></i>New a Report</a>
</header>