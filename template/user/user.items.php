<div class="user-items">
	<div class="col1"><?php echo $var['code'];?></div>
	<div class="col2"><?php echo $var['fname'].' '.$var['lname'];?> <a href="user_editor.php?user=<?php echo $var['id'];?>">แก้ไข<i class="fa fa-angle-right"></i></a></div>
	<div class="col3"><?php echo $var['password'];?></div>
	<div class="col4"><?php echo $var['visit_time'];?></div>
	<div class="col5"><?php echo $var['status'];?></div>
</div>