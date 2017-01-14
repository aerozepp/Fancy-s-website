		<a href="?page=<?php if($page > 1) {echo ($page-1);}else{echo $page;} ?>&perPage=<?php echo $perPage; ?>"><?php echo "[prev]" ?></a>

<?php 

for($x = 1 ; $x <= $pages ; $x++){ 

?>

		<a<?php if($page==$x) {echo ' class="underline"';}?> href="?page=<?php echo $x; ?>&perPage=<?php echo $perPage; ?>"><?php echo $x; ?></a>

<?php } ?>

		<a href="?page=<?php if($page < $pages) {echo ($page+1);}else{echo $page;} ?>&perPage=<?php echo $perPage; ?>">

<?php echo "[next]" ?></a>




