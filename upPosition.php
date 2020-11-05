<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="header">
        <a href="employeesTable.php">Employees</a>
        <a href="pt.php">Positions</a>
        <a href="">Employees in departments</a>
    </div>

<?php


require_once "conn.php"; 
 
    $id = $_GET['id'];
    echo $id;
    $sql = "SELECT * FROM pt
    WHERE id = $id";
    $qry = mysqli_query($conn, $sql); 

    $row = mysqli_fetch_array($qry); 
    if(isset($_POST['update'])) 
    {
    
        $position = $_REQUEST['positions'];
        
        $update = "UPDATE pt 
        SET positions='$position'
        WHERE id = $id";
        
        if(mysqli_query($conn, $update))
        {
            echo 'Record aded'; 
            header("location: pt.php"); 
            exit;
        }
        else
        {
            echo ("Error ");
            
        } 
        mysqli_close($conn); 
    }       	



?>
 <div class="form">
 <form method="POST" >
		<table >
			<tr>
                <td> <label for="positions">Update position:</label></td>
                <td> <input type="text" id="positions" name="positions" value="<?php echo $row['positions'] ?>" Required></td>
                <td> <input type="submit" name="update" value="Update"></td>
			</tr>		
		</table>
	</form>	
    </div>

</body>
</html>