<?php

if ( isset($_POST['email']) && isset($_POST['username']) ){

	$email = $_POST['email'];
	$username = $_POST['username'];

	if ( !empty($email) && !empty($username)){

		$query = "SELECT id FROM fancys_users WHERE email='$email' AND username='$username'";

		if ( $query_run = mysql_query($query) ){
			$query_num = mysql_num_rows($query_run);
			if($query_num == 0){
				echo 'Invalid Username or email';
			}else{
				
				//send email


			}

		}else{


		}

	}

}else{

	echo "Fill In All Fields";
}




?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<!-- css link -->
  	<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color: #FEF200;">
	<section id="signin">
		<div class="container">
			<div class="box">
				<form action="forgot_password.php" method="POST">
					
					email : <br><input type="email" name="email"><br>
					username : <br><input type="username" name="username"><br>
					<input type="submit" value="submit">
					<a href="main.php">Home</a>
				</form>
			</div>
		</div>
	</section>
</body>
</html>