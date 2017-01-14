<?php

	require 'fancys_connect.inc.php';
	
	session_start();

	date_default_timezone_set("Asia/Seoul");
	$date = date("Y/m/d");

if( isset($_POST['title']) && isset($_POST['textarea']) ){

		$title = $_POST['title'];
		$textarea = $_POST['textarea'];
		$textToStore = nl2br(htmlentities($textarea, ENT_QUOTES, 'UTF-8'));
	

	if ( !empty($_POST['title']) && !empty($_POST['textarea']) ){

			$username = strtolower($_SESSION['username']); 
			$img_name = $_SESSION['imgName'];
	
		$query = " INSERT INTO topics VALUES ('', '".mysql_real_escape_string($username)."', '".mysql_real_escape_string($title)."', '".mysql_real_escape_string($textToStore)."', '".mysql_real_escape_string($date)."', '0','0','".mysql_real_escape_string($img_name)."' )";

		if( $query_run = mysql_query($query) ){
			header('Location: forum.php');
		}		
	}else{
		
		echo "
			<script type='text/javascript'>
			 	window.onload = function(){
					alert('Please fill in all fields');
				}
			</script>
		";
	}

	echo "<a href='forum.php'>back</a>";
}
?>