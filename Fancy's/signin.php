<?php

require 'fancys_connect.inc.php';
require 'fancys_core.inc.php';



if(loggedin()){

	echo 'You are already signed in <a href="fancys_signout.php">sign out</a>';

}else{
	include 'fancys_signin.inc.php';
}

?>

