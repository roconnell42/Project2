<?php  
	require "header.php";
?>

<main>
	<div class="wrapper-main">
		<section class="section-default">
			<?php
				if (isset($_SESSION["loggedin"])) {
   	 			echo "</br>". $_SESSION['Email']. " is logged in";
				}

			?>
		</section>
	</div>
</main>