<?php

require 'fancys_core.inc.php';
require 'fancys_connect.inc.php';

if(!loggedin()) {


	if ( isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password_again']) ){

		$email = $_POST['email'];
		$username = strtolower($_POST['username']);
		$password = $_POST['password'];
		$password_again = $_POST['password_again'];

		if( !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['password_again'])){

			if (strlen($password) >= 13){
				echo "Your password cannot be longer than 12 characters";
			}

			else if( $password != $password_again){
				echo "Password Unmatched";
			}else{
				//START REGISTRATION

				//profile img upload
				if(isset ($_FILES['profile']) && !empty($_FILES['profile'])){
					
					$file = $_FILES['profile'];
					$fileName = $_FILES['profile']['name'];
					$fileTmpName = $_FILES['profile']['tmp_name']; 
					$fileSize = $_FILES['profile']['size'];
					$fileError = $_FILES['profile']['error'];

					$fileExt = explode('.', $fileName);
					$fileActualExt = strtolower(end($fileExt));   

					$allowed = array('jpg', 'jpeg', 'png');

					if (in_array($fileActualExt, $allowed)) {
						if ($fileError === 0) {
							if($fileSize < 1000000){
								$fileNameNew = uniqid('', true).".".$fileActualExt;
								$fileDestination = 'profile_img/'.$fileNameNew;
								move_uploaded_file($fileTmpName, $fileDestination);
							}else{
								echo "This file is too big";
							}
						}else{
							echo "error in uploading";
						}
					}else{
						echo "This type of file can't be uploaded";
					}
				}else{


				}

				$query = "SELECT username FROM fancys_users WHERE username='$username' OR email='$email'";

				$query_run = mysql_query($query);				
				$query_num = mysql_num_rows($query_run);

				if( mysql_num_rows($query_run) == 1 ){
					echo $username."/".$email. " already exists";
				}else{

					$password_md5 = md5($password);
				$query = "INSERT INTO fancys_users VALUES ( '', '".mysql_real_escape_string($email)."', '".
					mysql_real_escape_string($username)."', '".    
					mysql_real_escape_string($password_md5)."', '".
					mysql_real_escape_string($fileNameNew)."')"; //user's profile image name

					if( $query_run = mysql_query($query) ){
					
						header('Location: main.php');
					
					}else{
						echo "error!!!!";
					}

				}

			}

		}else{
			echo "Fill In All Fields";
		}
	}

}else if(loggedin()){
	echo "you are already signed in";

}

?>


