<div class="data-items">
	<div class="v date"><?php echo $var['date'];?></div>
	<div class="v <?php echo ($var['yield'] <= 0?'zero':'');?> <?php echo ($var['yield'] > 100?'highlight':'');?>"><?php echo number_format($var['yield'],2);?></div>
	<div class="v <?php echo ($var['target'] <= 0?'zero':'');?> <?php echo ($var['target'] > 100?'highlight':'');?>"><?php echo number_format($var['target'],2);?></div>
	<div class="v <?php echo ($var['output'] <= 0?'zero':'');?> <?php echo ($var['output'] > 100?'highlight':'');?>"><?php echo number_format($var['output'],2);?></div>
	<div class="v <?php echo ($var['product_eff'] <= 0?'zero':'');?>  <?php echo ($var['product_eff'] > 100?'highlight':'');?>"><?php echo number_format($var['product_eff'],2);?></div>
	<div class="v <?php echo ($var['total_eff'] <= 0?'zero':'');?> <?php echo ($var['total_eff'] > 100?'highlight':'');?>"><?php echo number_format($var['total_eff'],2);?></div>
</div>