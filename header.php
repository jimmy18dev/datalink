<header class="header">
	<a href="index.php" class="header-items <?php echo ($current_page['1'] == 'index'?'header-items-active':'');?>">Daily Report</a>
	<a href="yield_total_eff.php" class="header-items <?php echo ($current_page['1'] == 'yield'?'header-items-active':'');?>">Yield & Total EFF</a>
	<a href="profile.php" class="header-items <?php echo ($current_page['1'] == 'profile'?'header-items-active':'');?>"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $user->fname?></a>

	<a href="report_header_editor.php?action=create" class="header-items create-btn"><i class="fa fa-plus" aria-hidden="true"></i>NEW REPORT</a>
</header>