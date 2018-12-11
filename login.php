<html>			
<script type = "text/javascript" src = "hw2-7.js"> </script>

<?php

session_start(); 

$_SESSION["Email"] = '' ;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aaq8"; // your ucid is your database name
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
echo "</br>";
echo '<form method="post" action="">';
echo 'Email'; 
	echo'<input name="Email" type="text" class="form-control" style="width: 150px; display: inline" /></br>';
	echo 'Password'; 
	echo'<input name="Password" type="text" class="form-control" style="width: 150px; display: inline" /></br>';
		       
echo' <input name="submit" type="submit" value="Login" />';
echo '<button type="button" onclick="Signup()">Sign Up</button>';

//echo' <input name="sumbit2" type="sumbit" value="signup" />';

echo '</form>';

if(isset($_POST['submit'])){
		$_SESSION["Email"] = $_POST['Email'] ;
		$_SESSION["Password"] = $_POST['Password'];
		$email = $_POST['Email'];
		$passworddb = $_POST['Password'];
		
		echo "This is " . $_SESSION["Email"] . " and ". $_SESSION["Password"] . "<br>";

		//$Email = $_POST['Email'] ;
				
		//echo "This is" . $_SESSION["Email"] . "and $Password";
	$query = 'select * from accounts where email = :Email AND password = :password' ;
	$statement = $conn->prepare($query);
	$statement->bindValue(':Email', $_SESSION["Email"]);
	$statement->bindValue(':password', $_SESSION["Password"] );
	//$statement->bindValue(':Email', $email);
	//$statement->bindValue(':password', $passworddb );

	$statement->execute();
	
	$results = $statement->fetchAll();
	$statement->closeCursor();
	//echo "$results";
	$rcount = count($results);
	echo "<br>". "$rcount"."<br>";
	if ($rcount > 0){
		echo "There is an email in db";
		echo $_SESSION["Email"]; 
		header('Location: http://localhost/project2-3.php');

	}
	else {
		echo "not in DB";
	}
}
//echo '<form method="post" action="">';

//echo' <input name="submit2" type="submit" value="signup" />';


//echo $signupbuttion; 
//echo'</form>';
//$var = 'signup';
/*if(isset($_POST['sumbit2'])){
	echo"signup is pressed";
	header('Location: http://localhost/signup.php');
}
*/
}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
</html>
