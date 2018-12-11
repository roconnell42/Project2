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
				if (isset($_SESSION['Email'])) {
   					echo "</br>". $_SESSION['Email']. " is logged in</br>";
				}
				?>

				<a href="index.php">Home</a>
				<a href="about.php">About us</a>
				<a href="#">Content</a>
				<!--
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="#">Portfolio</a></li>
					<li><a href="#">About</a></li>
					<li><a href="#">Content</a></li>
				</ul>
			-->
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

