<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
			<meta charset="utf-8">
			<meta name = "description" content = "Meta description example">
			<meta name = viewport content = "width=device-width, initial-scale=1">
			<title></title>
			<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<header>
			<nav class="nav-header-main">
				<a class="header-logo" href="index.php">
					<!--image here
					<img src="img/logo.png alt="logo">
					-->
				</a>

				<?php
				if (isset($_SESSION["loggedin"])) {	
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "project2"; // your ucid is your database name

					try {
					    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
					    // set the PDO error mode to exception
					    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$query = 'select * from accounts where email = :email';
						$statement = $conn->prepare($query);
						$statement->bindValue(':email', $_SESSION["Email"]);
						$statement->execute();
						
						$results = $statement->fetchAll();
						$statement->closeCursor();

						foreach ($results as $record){
							echo "Welcome ".$record[2]." ".$record[3]."</br>";
						}
					}
					catch(PDOException $e){
				    	echo "Connection failed: " . $e->getMessage();
				    }
				}
				?>

				<a href="index.php">Home</a>
				<a href="about.php">About us</a>
				
				<div class="header-login">
					
					<form action="login.php" method="post">
						<button type="submit" name="login-submit">Login</button>
					</form>

					<form action="signup.php" method="post">
						<button type="submit" name="signup-submit">Signup</button>
					</form>

					<form action="todo2.php" method="post">
						<button type="submit" name="todo-list">Todo List</button>
					</form>

					<form action="logout.php" method="post">
						<button type="submit" name="logout-submit">Logout</button>
					</form>





				</div>
			</nav>	



		</header>
	</body>
</html>

