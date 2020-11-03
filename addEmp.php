<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<div class="header">
        <a href="employeesTable.php">Employees</a>
        <a href="pt.php">Positions</a>
        <a href="">Employees in departments</a>
    </div>

<?php
require 'conn.php';

$name = $_REQUEST['name'];
$lastName = $_REQUEST['lastname'];
$age = $_REQUEST['age'];
$contactNumber = $_REQUEST['phone_number'];
$position = $_REQUEST['position_id'];



$addEmp_sql = "INSERT INTO employees_table (name, lastname, age, phone_number, position_id) 
VALUES ('$name', '$lastName', '$age', '$contactNumber', '$position')";

if(isset($_Post['add'])){

    if(mysqli_query($conn, $addEmp_sql)){
        echo "Records added successfully.";
        header('Location: employeesTable.php');
    exit;
    } else {
        echo 'Error';
    }
    
    mysqli_close($conn);
}


?>

<form action="" method="POST">
    <label for="">New employee data:</label>
    <input type="text" name="name" placeholder="Name">
    <input type="text" name="lastName" placeholder="Last Name">
    <input type="number" name="age" placeholder="Age">
    <input type="number" name="phone_number" placeholder="Contact Number">
    
    <select id="position" name="position_id">
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
        <input type="submit" name='add' value="Add">
</form>


</body>
</html>