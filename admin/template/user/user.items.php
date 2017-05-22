<div class="user-items -<?php echo $var['status'];?>">
	<div class="id"><?php echo (!empty($var['code'])?$var['code']:'-');?></div>
	<div class="name">
		<?php echo ($online == 'active'?'<i class="fa fa-circle" aria-hidden="true"></i>':'');?>
		<a href="user_profile.php?user=<?php echo $var['id'];?>">
		<?php echo $var['fname'].' '.$var['lname'];?>

		<?php if($var['type']== 'Administrator'){?>
		<span class="admin">(Admin)</span>
		<?php }?>
		</a>
	</div>
	<div class="username"><?php echo (empty($var['username'])?'-':$var['username']);?></div>
	<div class="password"><?php echo (empty($var['password'])?'-':$var['password']);?></div>
	<div class="section">
		<?php echo (empty($var['section_name'])?'None':$var['section_name']);?>
		<?php if(!empty($var['line_default'])){?><span class="line"> (Line <?php echo $var['line_default'];?>)</span><?php }?>
	</div>
	<div class="visit"><?php echo $var['visit_time'];?></div>
</div>