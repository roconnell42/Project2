<?php  
	require "header.php";
?>
<?php 
	$errors = "";
	$db = mysqli_connect("localhost", "root", "", "project2");

		if (isset($_SESSION["loggedin"])) {
   	 		echo "</br>". $_SESSION['Email']. " is logged in";
		}
	if (isset($_POST['submit'])) {
		$task = $_POST['message'];
		$sql = "INSERT INTO todos (message) VALUES ('$task')";
		mysqli_query($db, $sql);
		header('location: todo2.php');
	}

	if (isset($_GET['del_task'])) {
		$id = $_GET['del_task'];
		mysqli_query($db, "DELETE FROM todos WHERE id=".$id);
		header('location: todo2.php');
	}
	

	if (isset($_GET['com_task'])) {
		$id = $_GET['com_task'];

		mysqli_query($db, "UPDATE todos SET isdone = 1 WHERE id=".$id);
		header('location: todo2.php');
	}
?>

<html>
	<head>
		<title>ToDo List Application PHP and MySQL</title>
	</head>
	<body>
		<div class="heading">
			<h2 style="font-style: 'Hervetica';">ToDo List </h2>
		</div>
			<form action="add2.php">
				<button type="submit" name="submit" id="add_btn" class="add_btn">Add New Task</button>
			</form>
		<table>
			<thead>
				<tr>
					<th></th>
					<th>Tasks</th>
					<th>Created Date</th>
					<th>Due Date</th>
				</tr>
			</thead>

		<tbody>
		<?php 
			$tasks = mysqli_query($db, "SELECT * FROM todos WHERE isdone = 0");
			if (!"SELECT * FROM todos") {
				printf("Error: %s\n", mysqli_error($id));
    			exit();
			}

			$i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
			<tr>
				<td> <?php echo $i; ?> </td>
				<td class="task"> <?php echo $row['message']; ?> </td>
				<td class="task"> <?php echo $row['createddate']; ?> </td>
				<td class="task"> <?php echo $row['duedate']; ?> </td>
				<td class="delete">
				<td class="edit">
				<a href="todo2.php?edit_task=<?php echo $row['id'] ?>">edit</a> 
				<a href="todo2.php?del_task=<?php echo $row['id'] ?>">delete</a> 
				<a href="todo2.php?com_task=<?php echo $row['id'] ?>">complete</a>
				</td>
			</tr>
		<?php $i++; } ?>	
		</tbody>
		</table>
		<table>
			<thead>
				<tr>
					<th></th>
					<th>Completed Tasks</th>
				</tr>
			</thead>

			<tbody>
			<?php 
				$tasks = mysqli_query($db, "SELECT * FROM todos WHERE isdone = 1" );
				if (!"SELECT * FROM todos") {
	    			printf("Error: %s\n", mysqli_error($id));
	    			exit();
				}

				$i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
				<tr>
					<td> <?php echo $i; ?> </td>
					<td class="task"> <?php echo $row['message']; ?> </td>
					<td class="delete">
					<td class="edit">
					<a href="todo2.php?edit_task=<?php echo $row['id'] ?>">edit</a> 
					<a href="todo2.php?del_task=<?php echo $row['id'] ?>">delete</a> 
					<a href="todo2.php?incom_task=<?php echo $row['id'] ?>">incomplete</a>


					</td>
				</tr>

			<?php $i++; } ?>	
			</tbody>
		</table>

		<?php
			if (isset($_GET['incom_task'])) {
		$id = $_GET['incom_task'];

		mysqli_query($db, "UPDATE todos SET isdone = 0 WHERE id=".$id);
		header('location: todo2.php');
	}
			if (isset($_GET['edit_task'])) {
				$updateId = $_GET['edit_task'];
				//header('Location: http://localhost/project2/edit.php');
				echo '<form method="post" action="">';
				echo "</br></br>";

				echo 'Update'; 
				echo '<input name="message" type="text" class="form-control" style="width: 150px; display: inline" /></br>';

			//	echo 'Due date'; 
			//	echo'<input name="dueDate" type="text" class="form-control" style="width: 150px; display: inline" /></br>';
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
					
					$query = "UPDATE `todos` SET message =:message WHERE id = :id";
					//$query = "INSERT INTO `todos` (`owneremail`, 'message') VALUES (:ownerMail, :message)";

					$statement = $conn->prepare($query);
					$statement->bindValue(':id', $updateId);
					$statement->bindValue(':message', $message);



					$statement->execute();

					$results = $statement->fetchAll();
					$statement->closeCursor();
					header('Location: http://localhost/project2/todo2.php');

				}
			}
		?>

	</body>
</html>