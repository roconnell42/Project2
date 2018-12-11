<?php
echo "this is signup.php";
echo '<form method="post" action="">';
	echo 'Email'; 
	echo'<input name="Email" type="text" class="form-control" style="width: 150px; display: inline" /></br>';
	echo 'Password'; 
	echo'<input name="Password" type="text" class="form-control" style="width: 150px; display: inline" /></br>';
		echo 'First Name'; 
	echo'<input name="Fname" type="text" class="form-control" style="width: 150px; display: inline" /></br>';
		echo 'Last Name'; 
	echo'<input name="Lname" type="text" class="form-control" style="width: 150px; display: inline" /></br>';
		echo 'College'; 
	echo'<input name="college" type="text" class="form-control" style="width: 150px; display: inline" /></br>';
		echo 'major'; 
	echo'<input name="major" type="text" class="form-control" style="width: 150px; display: inline" /></br>';


		       
echo' <input name="submit" type="submit" value="Submit"/>';
echo '</form>';

	if(isset($_POST['submit'])){
		$email = $_POST['Email'];
	$newpassword = $_POST['Password'];
	$Fname = $_POST['Fname'];
	$Lname = $_POST['Lname'];
	$College = $_POST['college'];
	$Major = $_POST['major'];
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "aaq8"; // your ucid is your database name
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		
		$query = "INSERT INTO `accounts` (`email`, `fname`, `lname`,  `major`, `college`, `password`) VALUES (:email, :fname, :lname, :major, :college, :password)";
		//$statement = $conn->prepare($query);
		//$statement->bindValue(':email', $input_id);
		//$statement->execute();
	
	//$results = $statement->fetchAll();
	//$statement->closeCursor();
	header('Location: http://localhost/login.php');
	}
?>
