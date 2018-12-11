<html>			
<script type = "text/javascript" src = "hw2-7.js"> </script>
<?php 
echo 'this is add.php' ;
 echo '<form method="post" action="">';
echo 'Value1'; 
	echo'<input name="Value1" type="text" class="form-control" style="width: 150px; display: inline" /></br>';
		       
echo' <input name="submit" type="submit" value="Submit" />';
//echo ' <input name="Logout" type="sumbit" value="Logout" />';

echo'</form>';
	//$InsertValue1 = '<input name=Value1 type=submit value=Value1 />'; 

	//$button2 = '<input name="Delete'."$y".'" type="submit" value='.'Delete'."$y".''.' />'; 
	//$button3 = '<input name="Edit'."$y".'" type="submit" value='.'Edit'."$y".''.' />'; 
	//$button4 = '<input name="ToggleComplete'."$y".'" type="submit" value='.'Complete'."$y".''.' />'; 
	//echo$InsertValue1;
	//echo$button2;
	//echo$button3;
	//echo$button4;
	
	if(isset($_POST['submit'])){
		$Value1 = $_POST['Value1'] ;
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "aaq8"; // your ucid is your database name
		//$input_id = 3;
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	
	$query = "INSERT INTO `todos` (`owneremail`,  `message`) VALUEs (:Email , :messege )"
		//echo "$query";

	$statement = $conn->prepare($query);
	echo "$query";
	//$statement->bindValue(':account_id', $input_id);
	$statement->bindValue(':Email', $_SESSION["Email"]);
	$statement->bindValue(':messege', $Value1);


	$statement->execute();
	
	$results = $statement->fetchAll();
	$statement->closeCursor();
		header('Location: http://localhost/project2-3.php');

	}
echo '<button type="button" onclick="Logout()">Logout</button>';




?>
</html>
