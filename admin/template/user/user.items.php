<div class="items user-items">
	<div class="col1"><?php echo $var['code'];?></div>
	<div class="col2">
		<a href="user_profile.php?user=<?php echo $var['id'];?>">
		<?php echo $var['fname'].' '.$var['lname'];?><?php echo ($online?' <i class="fa fa-circle" aria-hidden="true"></i> ':'');?>
		<span class="admin">(Administrator)</span>
		</a>
	</div>
	<div class="col3"><?php echo (empty($var['username'])?'-':$var['username']);?></div>
	<div class="col4"><?php echo (empty($var['password'])?'-':$var['password']);?></div>
	<div class="col5">
		<?php echo (empty($var['section_name'])?'':$var['section_name']);?>
		<?php if(!empty($var['line_default'])){?><span class="line"> (Line No: <?php echo $var['line_default'];?>)</span><?php }?>
	</div>
	<div class="col6"><span class="visit"><?php echo $var['visit_time'];?></span></div>
	<div class="col-control"><a href="user_editor.php?user=<?php echo $var['id'];?>"><i class="fa fa-cog" aria-hidden="true"></i></a></div>
</div>