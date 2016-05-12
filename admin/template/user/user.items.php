<div class="user-items">
	<div class="col1"><?php echo $var['code'];?></div>
	<div class="col2">
		<?php echo ($online?'<i class="fa fa-circle" aria-hidden="true"></i>':'<i class="fa fa-circle-o" aria-hidden="true"></i>');?><?php echo $var['fname'].' '.$var['lname'];?> <a href="user_editor.php?user=<?php echo $var['id'];?>">[แก้ไข]</a>
	</div>
	<div class="col3"><?php echo (empty($var['username'])?'-':$var['username']);?></div>
	<div class="col4"><?php echo (empty($var['password'])?'-':$var['password']);?></div>
	<div class="col5"><?php echo (empty($var['section_name'])?'-':$var['section_name'].' / Line No.'.$var['line_default']);?></div>
	<div class="col6"><span class="visit"><?php echo $var['visit_time'];?></span></div>
</div>