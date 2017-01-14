<?php

	$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
	$perPage = 6;
	$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

	//total data number
	$query = "SELECT * FROM topics";
	$result = mysql_query($query);
	$total = 0;
	while($row = mysql_fetch_assoc($result)){
		$total++;
	}

	$topic_id = isset($_GET['topic_id']) ? $_GET['topic_id'] : '';
	$pages = ceil($total / $perPage);
	$query = "SELECT * FROM topics ORDER BY topic_id desc limit $start, $perPage";
	$result = mysql_query($query);
	$count = 1;

	while($row = mysql_fetch_assoc($result)){ 

?>
	<a class="content" href="?topic_id=<?php echo $row['topic_id'];?>&page=<?php echo $page;?>">
		<table class="box<?php if(!($count%2)){echo ' grey';}else{echo ' white';}?>">
			<tr>
				<td class="image" rowspan="2">
					<img class="profile_img" src="profile_img/<?php 

					if($row['imgName'] != null){echo $row['imgName'];}
					else{ echo "default.jpg";}?>">
				</td>
				<td class="title" >
					<strong><?=$row['title']?></strong>
				</td>
				<td class="date"><?=$row['date']?></td>
			</tr>	
			<tr>
				
				<td class="posted_by" colspan="2">
					<?php include 'reply_check.php';
							include 'like_check.php';?>
					<li>Posted by&nbsp&nbsp</li>
					<li class="author"><?=$row['author']?></li>
				</td>
			</tr>
		</table>
		</a>
<?php 
	$count++; 
	} 
?>