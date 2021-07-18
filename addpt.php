<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>

<body>
	<div class="header">
		<a href="employeesTable.php">Employees</a>
		<a href="positionsTable.php">Positions</a>
		<a href=""></a>
	</div>
	<?php

	require_once 'conn.php';


	if (isset($_POST['add'])) {
		$pos = $_REQUEST['position'];

		$sql = "INSERT INTO positions (position)
		 VALUES ('$pos')";
		if (mysqli_query($conn, $sql)) {
			echo 'record aded';
			mysqli_close($conn);
			header('Location: positionsTable.php');
		} else {
			echo "Error: " . $sql . "
	" . mysqli_error($conn);
		}
	}
	?>
	<div class="form">
		<form method="post" action="">
			<label for="position">Add new position:</label>
			<input type="text" id="position" name="position">
			<input type="submit" name="add" value="Add">
		</form>
	</div>
</body>

</html>