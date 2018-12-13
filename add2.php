<?php  
	require "header.php";
?>
<?php
	echo '<form method="post" action="">';
	echo "</br></br>";

	echo 'Message'; 
	echo '<input name="message" type="text" class="form-control" style="width: 150px; display: inline" /></br>';

	echo 'Due date'; 
	echo'<input name="dueDate" type="text" class="form-control" style="width: 150px; display: inline" /></br>';
	echo' <input name="addTask" type="submit" value="submit"/>';
	echo '</form>';

	if(isset($_POST['addTask'])){
		$message = $_POST['message'];
		$dueDate = $_POST['dueDate'];

		$t = time();
		$t2 = date("Y-m-d");

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "project2"; // your ucid is your database name
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		
		$query = "INSERT INTO `todos` (owneremail, createddate, duedate, message) VALUES (:ownerMail, :createDate, :dueDate, :message)";
		//$query = "INSERT INTO `todos` (`owneremail`, 'message') VALUES (:ownerMail, :message)";

		$statement = $conn->prepare($query);
		$statement->bindValue(':ownerMail', $_SESSION['Email']);
		$statement->bindValue(':message', $message);
		$statement->bindValue(':createDate', $t2);
		$statement->bindValue(':dueDate', $dueDate);


		$statement->execute();

		$results = $statement->fetchAll();
		$statement->closeCursor();
		header('Location: http://localhost/project2/todo2.php');
	}
?>