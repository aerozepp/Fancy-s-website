<!DOCTYPE html>
<html>
<head>
	<title>Fancy's Forum</title>

	<meta name="viewport"
	content="width=device-width, initial-scale=1, maximum-scale=1">

	<meta charset="utf-8">

	<!-- css link -->
  	<link rel="stylesheet" href="css/forum.css">

  	<!-- responsive link -->
  	<link rel="stylesheet" href="css/responsive.css">

  	<!-- icon pack -->
	<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">

	<!-- font -->	
	<link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">
	<script src="https://use.fontawesome.com/639da023b9.js"></script>

	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="js/jQuery.js"></script>


</head>
<body>

<?php
	require 'fancys_connect.inc.php';
	require 'fancys_core.inc.php';
?>

	<section id="forum_menu">
		<div class="container">
			<table>
				<tr>
					<td>
						<div class="logo">
							<a href="main.php">
								<img src="img/fancys_logo_2.jpg">
							</a>
						</div>
					</td>
						<td class="create">
						<p>+ create message</p>
					</td>
				<tr>	
					<td class="title" colspan="2">
						<p><a href="forum.php">FORUM</a>  
						<?php 
							echo "&nbsp&nbsp&nbsp".strtolower($_SESSION['username']);?>
						</p>
					</td>
				
				</tr>
			</table>		
		</div>	

	</section>

	<section id="message_popup">
			<div class="container">
				<div class="box">
					<table>
						<form action="message_create.php" method="POST">	
							<tr>
								<td class="title">
									<h2>Create Your Message</h2>
								</td>
								<td class="back">
									<a href="forum.php">
										<span class="lnr lnr-cross"></span>
									</a>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<div class="content">
										<input type="text" name="title" placeholder="title">
										<textarea rows="4" cols="40" name="textarea"></textarea>
									</div>
								</td>
							</tr>
							<tr>
								<td class="submit" colspan="2">
								<input type="submit" name="submit" value="SUBMIT">
								</td>
							</tr>
						</form>
					</table>
				</div>
			</div>
	</section>

	<section id="forum_page">
		<div class="container">
			<div class="body">
			<?php include './message_box.php';?>
			</div>

			<div class="pagination">
				<div class="pagination_box">
				<?php include './pagination.php'; ?>
				</div>
			</div>
		</div>
	</section>
	
	<section id="comment_box">
		<?php if ($topic_id != 0){?>
		<div class="container">
			<table class="forum_table">
				<?php require './comment_box.php';?>
			</table>
		</div>
		<?php }?>
	</section>

	<section id="message_edit_popup">
		<div class="container">
			<div class="box">
				<table>
					<form action="message_edit.php?topic_id=<?php echo $topic_id;?>" method="POST">	
						<tr>
							<td class="title">
								<h2>Edit Your Message</h2>
							</td>
							<td class="back">
								<a href="?topic_id=<?php echo $topic_id;?>">
									<span class="lnr lnr-cross"></span>
								</a>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<div class="content">
									<input type="text" name="title" value="<?php echo $title;?>">
									<textarea rows="4" cols="40" name="textarea">
										<?php echo $content;
										?>
									</textarea>
								</div>
							</td>
						</tr>
						<tr>
							<td class="submit" colspan="2">
							<input type="submit" name="submit" value="EDIT">
							</td>
						</tr>
					</form>
				</table>
			</div>
		</div>
	</section>

<section id="delete_popup">
		<div class="container">
			<table class="box">
				<tr>
					<td class="title"><h2>Delete</h2></td>
					<td class="back"><a href="?topic_id=<?php echo $topic_id;?>"><span class="lnr lnr-cross"></span></a></td>
				</tr>
				<tr>
					<td class="content" colspan="2"><h2><a href="message_delete.php?topic_id=<?php echo $topic_id;?>"">OK</a></h2></td>
				</tr>
				
			</table>
		</div>

	</section>

	


	<footer id='footer'>
		<?php include './footer.php';?>		
	</footer>

</body>
</html>