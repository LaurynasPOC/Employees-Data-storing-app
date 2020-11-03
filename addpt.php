<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
<?php 
    
	require_once 'conn.php';
	
	
	if(isset($_POST['add']))
	{	 
        $pos = $_REQUEST['positions'];
		
		 $sql = "INSERT INTO pt (positions)
		 VALUES ('$pos')";
		 if (mysqli_query($conn, $sql)) {
             echo 'record aded';
			header('Location: pt.php');
		 } else {
			echo "Error: " . $sql . "
	" . mysqli_error($conn);
		 }
		 mysqli_close($conn);
	}
	?>
   
    <form  method="post" action="">		
		<p>New position</p><br>
		<input type="text" name="positions">
		<input type="submit" name="add" value="Add">
	</form>
</body>
</html>