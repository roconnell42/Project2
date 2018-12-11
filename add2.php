<?php  
	require "header.php";
?>
<?php
	echo "</br></br>";
	echo "Sign Up";
	echo '<form method="post" action="">';
	echo 'Email'; 
	echo '<input name="Messege" type="text" class="form-control" style="width: 150px; display: inline" /></br>';

	
	echo' <input name="signup" type="submit" value="submit"/>';
	echo '</form>';

if(isset($_POST['signup'])){
	$Messege = $_POST['Messege'];

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "project2"; // your ucid is your database name
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	
	$query = "INSERT INTO `todos` (`email`, 'messege') VALUES (:email, :messege)";
	$statement = $conn->prepare($query);
	$statement->bindValue(':email', $_POST['Email']);
	$statement->bindValue(':messege', $Messege);


	$statement->execute();

	$results = $statement->fetchAll();
	$statement->closeCursor();
	//header('Location: http://localhost/login.php');
}
?>