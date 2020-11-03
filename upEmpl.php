<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
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
    $sql = "SELECT name, lastname, age, phone_number, position_id FROM employees_table 
            WHERE employee_id='$id'";
    $qry = mysqli_query($conn, $sql); 

    $row = mysqli_fetch_array($qry); 
    if(isset($_POST['update'])) 
    {
        $name = $_REQUEST['name'];
        $age = $_REQUEST['age'];
        $tel = $_REQUEST['phone_number'];
        $position = $_REQUEST['position_id'];
        
        $update = mysqli_query($conn,
        "UPDATE employees_table 
        SET position_id='$position', name='$name', lastname='$lastname', age='$age', phone_number='$tel' 
        WHERE employee_id='$id'");

        if($update)
        {
            mysqli_close($conn);   
            echo 'Record aded'; 
            header("location: employeesTable.php"); 
        }
        else
        {
            echo ("Error ");
            
        } 
          	
}

?>
 
<form action="" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $row['name'] ?>">
        <br>
        <label for="lastname">Last name:</label>
        <input type="text" id="lastname"  name="lastname" value="<?php echo $row['lastname'] ?>">
        <br>
        <label for="age">Age:</label>
        <input type="text" id="age" name="age" value="<?php echo $row['age'] ?>">
        <br>
        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number" value="<?php echo $row['phone_number'] ?>">
        <br>
        <label for="position"></label>
        <select name="position_id" id="position">
            <?php
            $sql = "SELECT id, positions 
                FROM pt";

            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['positions']; ?></option>
                    <?php 
                }
            } ?>
        </select>    
    <input type="submit" name="update" value="Update">
</form>



</body>
</html>