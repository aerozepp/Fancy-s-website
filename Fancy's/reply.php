<?php

if(isset($_POST['reply']) && !empty($_POST['reply']) ){

	$reply = $_POST['reply'];
	$author = $_SESSION['username'];
	$img_name = $_SESSION['imgName']; 
	date_default_timezone_set("Asia/Seoul");
	$date = date("Y/m/d");


	$reply_count_query = "SELECT * FROM topics WHERE topic_id='$topic_id'";
	$result = mysql_query($reply_count_query);
	while($row = mysql_fetch_assoc($result)){
			$reply_count = $row['replies'] + 1;
	}

	$count_insert_query = "UPDATE topics SET replies='$reply_count' WHERE topic_id='$topic_id'";

	mysql_query($count_insert_query);

	$query = " INSERT INTO reply VALUES ('', '".mysql_real_escape_string($topic_id)."', '".mysql_real_escape_string($author)."', '".mysql_real_escape_string($reply)."', '".mysql_real_escape_string($date)."', '".mysql_real_escape_string($img_name)."') ";

	if( $query_run = mysql_query($query) ){
		$query = null;
	}else{
		echo "error!!!!";
	}
}

?>