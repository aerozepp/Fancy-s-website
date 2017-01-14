<?php

	$query = "SELECT * FROM topics WHERE topic_id='$topic_id'";
	$result = mysql_query($query);

	while($row = mysql_fetch_assoc($result)){

		$image = $row['imgName'];
		$title = $row['title'];
		$content = $row['content'];
		$author = $row['author'];
		$date = $row['date'];
		$likes = $row['likes'];
?>
	<tr class="head">
		<td class="image_box" rowspan="2"><img class="profile_img" src='profile_img/<?php 
		if ($image != null){echo $image;}
		else{echo 'default.jpg';}?>'></td>
		<td class="posted_box">Posted by </td>
		<td class="author_box"><?php echo $author;?></td>
		<td class="date_box"><?php echo $date;?></td>
		<td class="back_box"><a href="forum.php"><span class="lnr lnr-cross"></a></td>

	</tr>

	<tr class="head">
		<td class="title_box" colspan="2"><strong><?php echo $title;?></strong></td>
		<td class="likes_box" colspan="2">
		
			<?php if($author == strtolower($_SESSION['username'])){
				echo "<span class='lnr lnr-pencil'></span>&nbsp&nbsp<span class='lnr lnr-trash'></span>";
			}else{


			include 'box_like_check.php';
			}
			?>
			
			
		</td>
	</tr>
	<tr class="head">
	
		<td></td>
		 <td class="content_box" colspan="4"><?php echo $content?></td>
	</tr>
	<?php }

	?>


	<tr>
		<td class="image_box">
			<img class="profile_img2" src="profile_img/
			<?php
				if($_SESSION['imgName'] != null){
					echo $_SESSION['imgName']; }
				else{ echo 'default.jpg';}	?>">
		</td>
	
		<td class="comment_input" colspan="4">
			<form action="#" method="POST">		
				<input type="text" name="reply" placeholder="Add a comment and Enter">
			</form>
		</td>
		
			

	
	</tr>
	
	<?php 

	include 'reply.php';

	$query = "SELECT * FROM reply WHERE topic_id='$topic_id' ORDER BY reply_id desc";
	$result = mysql_query($query);
	while($row = mysql_fetch_assoc($result)){

		?>

	<tr class="reply">
<td class="image_box" rowspan="2">
			<img class="profile_img2" src="profile_img/

			<?php 

			if($row['imgName']){
				echo $row['imgName'];
			}else{
				echo 'default.jpg';
			}
			?>
			">
		</td>
		<td class="comment_author" colspan="2">
			<?php echo $row['author'];?>
		</td>
		<td class="comment_date" colspan="2">
			<?php echo $row['date'];?>
		</td>
	</tr>
	<tr>
		<td class="comment_text" colspan="4">
			<?php echo $row['text'];?>
		</td>
	</tr>


<?php } ?>