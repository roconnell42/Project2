<?php
session_start();
echo"logged out";
session_unset(); 
session_destroy(); 
echo '<form method="post" action="">';
		       
echo' <input name="BtH" type="submit" value="Back to Home" />';
echo '</form>';
if(isset($_POST['BtH'])){
	header('Location: http://localhost/project2/index.php');
}
?>