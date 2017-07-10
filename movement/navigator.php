<nav class="navigator">
	<a href="index.php" class="header-items <?php echo ($current_page['1'] == 'index'?'header-items-active':'');?>">DAILY REPORTS<span class="tri"></span></a>
	<a href="yield_total_eff.php" class="header-items <?php echo ($current_page['1'] == 'yield'?'header-items-active':'');?>">YIELD & TOTAL EFF<span class="tri"></span></a>
	<a href="message.php" class="header-items <?php echo ($current_page['1'] == 'message'?'header-items-active':'');?>">NEWS(<?php echo $message->countMessage();?>)<span class="tri"></span></a>
	<a href="profile.php" class="header-items <?php echo ($current_page['1'] == 'profile'?'header-items-active':'');?>"><?php echo $user->fname?><span class="tri"></span></a>

	<a href="../logout.php" class="header-items logout">LOGOUT</a>
</nav>