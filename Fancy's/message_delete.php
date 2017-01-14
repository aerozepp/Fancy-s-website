<?php
	
	require 'fancys_connect.inc.php';
	$topic_id = isset($_GET['topic_id']) ? $_GET['topic_id'] : '';
	$query = "DELETE FROM topics WHERE topic_id='$topic_id'";

	mysql_query($query);

?>

<script type="text/javascript">
	
	window.alert("deleted");
	location.href="forum.php";
</script>
