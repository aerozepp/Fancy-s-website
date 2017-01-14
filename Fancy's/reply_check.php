<?php 
require 'fancys_connect.inc.php';

	$username = $_SESSION['username'];
	$a_topic_id = $row['topic_id'];

	$replies_query = "SELECT * FROM reply WHERE author='$username' AND topic_id='$a_topic_id'";
	$replies_result = mysql_query($replies_query);
	$num = mysql_num_rows($replies_result);

	if(mysql_num_rows($replies_result) == 0){?>
		<li class="replies"><span class="lnr lnr-bubble blue"></span>&nbsp<?=$row['replies']?>&nbsp&nbsp&nbsp</li>
<?php }else {?>
		<li class="replies"><span class="lnr lnr-bubble red"></span>&nbsp<?=$row['replies']?>&nbsp&nbsp&nbsp</li>

<?php }?>