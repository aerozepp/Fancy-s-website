<?php

require 'fancys_connect.inc.php';

$query = "SELECT * FROM fancys_users WHERE username='$author'";
$result = mysql_query($query);

while($row = mysql_fetch_assoc($result)){

	echo $row['imgName'];
}

?>