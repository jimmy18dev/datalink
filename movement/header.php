<header class="header">
	<a href="index.php" class="items <?php echo ($current_page['1'] == 'index'?'-active':'');?>">DAILY REPORTS</a>
	<a href="yield_total_eff.php" class="items <?php echo ($current_page['1'] == 'yield'?'-active':'');?>">YIELD & TOTAL EFF</a>
	<a href="message.php" class="items <?php echo ($current_page['1'] == 'message'?'-active':'');?>">NEWS(<?php echo $message->countMessage();?>)</a>
	<a href="profile.php" class="items <?php echo ($current_page['1'] == 'profile'?'-active':'');?>"><i class="fa fa-user-o" aria-hidden="true"></i><?php echo $user->fname?></a>
	<a href="../logout.php" class="items btn-logout">Logout</a>
	<a class="btn" href="report_header_editor.php?action=create">NEW REPORT</a>
</header>