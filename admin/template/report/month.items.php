<a href="graph.php?year=<?php echo $var['year'];?>&month=<?php echo $var['month'];?>&line=<?php echo $line;?>" class="filter-items <?php echo ($year == $var['year'] && $month == $var['month']?'active':'');?>"><?php echo $var['month_name'];?><?php echo (date('Y') != $var['year']?' '.$var['year']:'');?></a>