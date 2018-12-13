<?php 
    
	$errors = "";

	
	$db = mysqli_connect("localhost", "root", "", "mjb78");

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

	mysqli_query($db, "UPDATE todos SET isdone = 0 WHERE id=".$id);
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
	<form action="add.php">
    


		<button type="submit" name="submit" id="add_btn" class="add_btn">Add New Task</button>
	</form>
	<table>
	<thead>
		<tr>
			<th></th>
			<th>Tasks</th>
			<th style="width: 60px;"></th>
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
				<td class="delete">
				<td class="edit">
				<a href="todo2.php?del_task=<?php echo $row['id'] ?>">edit</a> 
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
			<th style="width: 60px;"></th>
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
				<a href="todo2.php?del_task=<?php echo $row['id'] ?>">edit</a> 
				<a href="todo2.php?del_task=<?php echo $row['id'] ?>">delete</a> 

				</td>
			</tr>
		<?php $i++; } ?>	
	</tbody>
</table>

</body>
</html>
