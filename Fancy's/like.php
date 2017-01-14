<?php 

require 'fancys_connect.inc.php';
session_start();

$author = $_SESSION['username'];
$topic_id = isset($_GET['topic_id']) ? $_GET['topic_id'] : '';

$query = "SELECT * FROM likes WHERE author='$author' AND topic_id='$topic_id'";
$result = mysql_query($query);
if(mysql_num_rows($result) == 0){
	$is_started = 0;
	$is_liked = 0;
}else{
	while($row = mysql_fetch_assoc($result)){
		$is_started = $row['start'];
		$is_liked = $row['is_liked'];
	}
}


if($is_started == 0){

$like_start_query = "INSERT INTO likes values('', '".mysql_real_escape_string($topic_id)."', '".mysql_real_escape_string($author)."', '1','1')";
$result_start = mysql_query($like_start_query);

$count_query = "SELECT * FROM topics WHERE topic_id='$topic_id'";
		$count_result = mysql_query($count_query);
		while($row = mysql_fetch_assoc($count_result)){
			$likes = $row['likes']+1;
		}
$like_count_query = "UPDATE topics SET likes='$likes' WHERE topic_id='$topic_id'";
mysql_query($like_count_query);

}else{

	if($is_liked == 0){

		$query = "SELECT * FROM topics WHERE topic_id='$topic_id'";
		$result = mysql_query($query);
		while($row = mysql_fetch_assoc($result)){
			$likes = $row['likes']+1;
		}

		$like_update_query = "UPDATE likes SET is_liked = '1'";
		$like_count_query = "UPDATE topics SET likes='$likes' WHERE topic_id='$topic_id'";

	}else{
		$query = "SELECT * FROM topics WHERE topic_id='$topic_id'";
		$result = mysql_query($query);
		while($row = mysql_fetch_assoc($result)){
			$likes = $row['likes']-1;
		}
		$like_update_query = "UPDATE likes SET is_liked = '0'";
		$like_count_query = "UPDATE topics SET likes='$likes' WHERE topic_id='$topic_id'";
	}

	$result_update = mysql_query($like_update_query);
	$result_count = mysql_query($like_count_query);
}



		header('Location: forum.php');


?>