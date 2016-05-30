<div class="user-items">
	<div class="col1"><?php echo $var['code'];?></div>
	<div class="col2">
		<a href="user_profile.php?user=<?php echo $var['id'];?>">
		<?php echo ($online?'<i class="fa fa-circle" aria-hidden="true"></i>':'<i class="fa fa-circle-o" aria-hidden="true"></i>');?><?php echo $var['fname'].' '.$var['lname'];?>
		</a>
	</div>
	<div class="col3"><?php echo (empty($var['username'])?'-':$var['username']);?></div>
	<div class="col4"><?php echo (empty($var['password'])?'-':$var['password']);?></div>
	<div class="col5">
		<?php if(!empty($var['line_default'])){?>
		<span class="line"><?php echo $var['line_default'];?></span>
		<?php }?>
		<?php echo (empty($var['section_name'])?'':$var['section_name']);?></div>
	<div class="col6"><span class="visit"><?php echo $var['visit_time'];?></span></div>
	<div class="col7"><a href="user_editor.php?user=<?php echo $var['id'];?>"><i class="fa fa-cog" aria-hidden="true"></i>EDIT</a></div>
</div>