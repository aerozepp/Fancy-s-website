<?php
	require 'fancys_connect.inc.php';

	if( isset($_POST['title']) && isset($_POST['textarea']) ){

		$title = $_POST['title'];
		$textarea = $_POST['textarea'];
		$textToStore = nl2br(htmlentities($textarea, ENT_QUOTES, 'UTF-8'));
		
		$topic_id = isset($_GET['topic_id']) ? $_GET['topic_id'] : '';


		if ( !empty($_POST['title']) && !empty($_POST['textarea']) ){
				
				$edit_query = "UPDATE topics SET 
								title='$title', content='$textToStore' WHERE topic_id='$topic_id'";

				if( $query_run = mysql_query($edit_query) ){
					header('Location: forum.php');
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
	}		
?>

