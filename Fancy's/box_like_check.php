<?php
	require 'fancys_connect.inc.php';

	$username = $_SESSION['username'];
	$a_topic_id = $row['topic_id'];

	$likes_query="SELECT * from likes WHERE author='$username' AND topic_id='$a_topic_id'";
	$likes_result = mysql_query($likes_query);

	if(mysql_num_rows($likes_result) != 0 ){

		while($a_row = mysql_fetch_assoc($likes_result)){
			$is_liked = $a_row['is_liked'];

			if($username == $a_row['author']){
			
			if($is_liked == 1){?>

  				<a href='like.php?topic_id=$topic_id'><span class='lnr lnr-thumbs-up red'></span></a>
 				<?php }

 				else{?>
					<a href='like.php?topic_id=$topic_id'><span class='lnr lnr-thumbs-up blue'></span></a><?php }

		}else if($username != $a_row['author']){?>
				<a href='like.php?topic_id=$topic_id'><span class='lnr lnr-thumbs-up blue'></span></a>
		<?php }

 	}
 }else{?>
 		<a href='like.php?topic_id=$topic_id'><span class='lnr lnr-thumbs-up blue'></span></a>

 <?php }

?>

