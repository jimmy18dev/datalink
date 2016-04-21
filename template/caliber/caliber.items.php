<div class="caliber-items">
	<div class="col1"><a href="caliber_code.php?caliber=<?php echo $var['id'];?>"><?php echo $var['code'].' '.$var['family'];?></a></div>
	<div class="col2"><?php echo (empty($var['standard_hrs'])?'-':$var['standard_hrs']);?></div>
	<div class="col3">( <?php echo $var['total_operation'];?> operations ) <?php echo $var['description'];?></div>
</div>