<?php  
	require "header.php";
?>
<?php
	echo "</br></br>";
	echo "Sign Up";
	echo '<form method="post" action="">';
	echo 'Email'; 
	echo '<input name="Email" type="text" class="form-control" style="width: 150px; display: inline" /></br>';

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
		       
	echo' <input name="signup" type="submit" value="submit"/>';
	echo '</form>';

if(isset($_POST['signup'])){
	$email = $_POST['Email'];
	$newpassword = $_POST['Password'];
	$fname = $_POST['Fname'];
	$lname = $_POST['Lname'];
	$college = $_POST['college'];
	$major = $_POST['major'];

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "project2"; // your ucid is your database name
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	
	$query = "INSERT INTO `accounts` (`email`, `fname`, `lname`,  `major`, `college`, `password`, `date`) VALUES (:email, :fname, :lname, :major, :college, :password, :date)";
	$statement = $conn->prepare($query);
	$statement->bindValue(':email', $email);
	$statement->bindValue(':password', $newpassword);
	$statement->bindValue(':fname', $fname);
	$statement->bindValue(':lname', $lname);
	$statement->bindValue(':college', $college);
	$statement->bindValue(':major', $major);
	$statement->bindValue(':date', 'date');

	$statement->execute();

	$results = $statement->fetchAll();
	$statement->closeCursor();
	//header('Location: http://localhost/login.php');
}
?>