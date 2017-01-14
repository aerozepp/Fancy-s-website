<!DOCTYPE html>
<html>
<head>

	<meta name="viewport"
	content="width=device-width, initial-scale=1, maximum-scale=1">

	<meta name="apple-mobile-web-app-capable" content="yes">
	
	<meta charset="utf-8">

	<title>Fancy's Homepage</title>

	<!-- css link -->
  	<link rel="stylesheet" href="css/style.css">

  	<!-- responsive link -->
  	<link rel="stylesheet" href="css/responsive.css">

  	<!-- icon pack -->
	<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">

	<!-- font -->	
	<link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">

	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="js/jQuery.js"></script>


</head>
<body>

	<section id="cover">
		<div class="container">
			<div class="img">
				<a href="main.php"><img id="logo" src="img/fancys_logo.jpg"></a>
			</div>
			<div class="burger-bar">
				<span class="lnr lnr-menu"></span>
			</div>
		</div>
	</section>


	<section id="signin_box">
	

		<div class="signin_btn">
			<?php include 'signin_show.php';?>
		</div>
	</section>



	<section id="menu">
			<div class="container">
				<nav>
						<ul>
							<li><a href="#music">Music</a></li>
							<li><a href="#tour">Tour</a></li>


							<?php

							if(loggedin()){
							echo "<li><a href='forum.php'>Forum</a></li>";
							}
							else
							echo "<li><a class='forum' href='#'>Forum</a></li>";	
							?>


							<li><a href="#contact">Contact</a></li>
						</ul>
			
				</nav>

			</div>

			<div class="responsive_menu">
				
				<ul>
					<li><a href="#music">Music</a></li>
					<li><a href="#tour">Tour</a></li>
					<?php

							if(loggedin()){
							echo "<li><a href='forum.php'>Forum</a></li>";
							}
							else
							echo "<li><a class='forum' href='#'>Forum</a></li>";	
							?>
					<li><a href="#contact">Contact</a></li>
				</ul>
			</div>

	</section>

	<section id="forum_popup" >
		<div class="container">
			<div class="box">
				<table class="table">
					<tr>
						<td class="ghost"></td>
						<td class="title"><h2>ALERT</h2></td>
						<td class="back"><a href="main.php"><span class="lnr lnr-cross"></span></a></td>
					</tr>
					<tr>

					<td class="content" colspan="3">
						<h3>Sign-in required</h3>
					</td>
					</tr>
				</table>
			</div>
		</div>
	</section>


	<section id="signin_popup">
			<div class="container">
				<div class="box">
					<table class="table">
						<form action="signin.php" method="POST">	
							<tr>
								<td class="ghost"></td>
								<td class="title">
									<h2>Sign In</h2>
								</td>
								<td class="back">
									<a href="main.php">
										<span class="lnr lnr-cross"></span>
									</a>
								</td>
							</tr>
							<tr>
								<td class="content">
									username	
									
								</td>
								<td class="input" colspan="2">
										<input type="text" name="username" placeholder="username">
								</td>
							</tr>
							<tr>
								<td class="content">password</td>
								<td class="input" colspan="2">
									<input type="password" name="password" placeholder="password">
								</td>

							</tr>
							<tr><td colspan="3">&nbsp</td></tr>
							<tr>
								<td class="up_forgot" colspan="2">
									<ul>
									<li><a id="signup_btn" href="#">Sign Up</a></li>

									<li><a href="forgot_password.php">Forgot Password</a></li>
									</ul>
								</td>
								<td class="submit">

								<input type="submit" name="submit" value="SUBMIT">
								</td>
							</tr>
						</form>
					</table>
				</div>
			</div>
	</section>

	<section id="signup_popup">
			<div class="container">
				<div class="box">
					<table class="table">

						<form action="registration.php" method="POST" enctype="multipart/form-data">
					
							<tr>
								<td class="ghost"></td>
								<td class="title">
									<h2>Sign Up</h2>
								</td>
								<td class="back">
									<a href="main.php">
										<span class="lnr lnr-cross"></span>
									</a>
								</td>
							</tr>
							<tr>
								<td class="content">
									email
									
								</td>
								<td class="input" colspan="2">
										<input type="email" name="email" value="<?php if( isset($email) ) echo $email;?>">
								</td>
							</tr>
							<tr>
								<td class="content">
									username
									
								</td>
								<td class="input" colspan="2">
										<input type="text" name="username" value="<?php if(isset($username)) echo $username;?>">
								</td>
							</tr>
							<tr>
								<td class="content">
									password
									
								</td>
								<td class="input" colspan="2">
										<input type="password" name="password">
								</td>
							</tr>
							<tr>
								<td class="content">
									password confirm
									
								</td>
								<td class="input" colspan="2">
										<input type="password" name="password_again">
								</td>
							</tr>
							<tr>
								<td class="content">profile image upload</td>
								<td class="profile" colspan="2">
									<input type="file" accept="image/*" capture="camera" name="profile">
								
								</td>

							</tr>
							<tr><td colspan="4">&nbsp</td></tr>
							<tr>
								<td class="up_forgot" colspan="2">
								</td>
								<td class="submit">

								<input type="submit" name="submit" value="SUBMIT">
								</td>
							</tr>
						</form>
					</table>
				</div>
			</div>
	</section>
	
	

	<section id="music">

		<div class="container">

		
			<div class="img">
				<img id="album_img" src="img/fancys_cd_cover_2000.jpeg">
			</div>

			<div class="buying">
				<p><a href="http://music.naver.com/album/index.nhn?albumId=370864">AVAILABLE NOW</a></P>
			</div>


		</div>

	</section>


	<section id="tour">
		<div class="container">
			<div class="heading">
				<h1>TOUR</h1>
			</div>			

			<div class="content">
				<h2>TBA</h2>
			</div>
		</div>
	</section>

	<footer id="footer">
		<?php include './footer.php';?>
	</footer>

</body>
</html>