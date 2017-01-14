<?php

if ( isset($_POST['username']) && 
	isset($_POST['password']) ){

	$username = $_POST['username'];
	$password = $_POST['password'];
	$password_md5 = md5($password);


	if( !empty($username) && !empty($password) ){

		$query = "SELECT * FROM fancys_users WHERE username='$username' AND password='$password_md5'";

		if(	$query_run = mysql_query($query) ) {
			$query_num = mysql_num_rows($query_run);
			if($query_num == 0){
				echo '<p id="message">'.'Invalid Username or Password'.'</p>';

			}else{
				$user_id = mysql_result($query_run, 0, 'id');
				$user_img = mysql_result($query_run, 0, 'imgName');
				
				$_SESSION['username'] = $username;
				$_SESSION['user_id'] = $user_id;
				$_SESSION['imgName'] = $user_img;


				header('Location: main.php');
			}
		}

	}else{
		echo '<p id="message">'.'Fill In All Fields'.'</p>';
	}	
}

?>  
