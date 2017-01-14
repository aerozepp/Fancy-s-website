<?php

	require 'fancys_connect.inc.php';
	require 'fancys_core.inc.php';

	if(loggedin()){

			$imgName = $_SESSION['imgName'];
			if($_SESSION['imgName'] != null){?>

			<table>
				<tr>
					<td>	
						<img class="profile_img" src="profile_img/<?php echo $imgName;?>">
					</td>
				</tr>
				<tr>
					<td class="signout_popup">	
						<a href="fancys_signout.php">sign out</a>
					</td>
				</tr>
			</table>


		<?php }else{?> 
			<table>
				<tr>
					<td>	
						<img class="profile_img" src="profile_img/default.jpg">
					</td>
				</tr>
				<tr>
					<td class="signout_popup">	
						<a href="fancys_signout.php">sign out</a>
					</td>
				</tr>
			</table>	


		<?php }
			
	}else{?>
			<table>
				<tr>
					<td class='signin_popup'>
						<a href='#'>sign in</a>
					</td>	
				</tr>
			</table>
<?php		
	}

?>