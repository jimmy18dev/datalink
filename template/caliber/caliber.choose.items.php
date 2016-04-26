<a href="report_detail_editor.php?caliber=<?php echo $var['caliber_id'];?>&header=<?php echo $header_id;?>">
<div class="caliber-items">
	<div class="col1"><?php echo $var['caliber_code'].' '.$var['caliber_family'];?></div>
	<div class="col2"><?php echo (empty($var['route_name'])?'-':$var['route_name']);?></div>
	<div class="col3"><?php echo (empty($var['caliber_stdtime'])?'-':$var['caliber_stdtime']);?></div>
	<div class="col4"><?php echo $var['caliber_description'];?></div>
</div>
</a>