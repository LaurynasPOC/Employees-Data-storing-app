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



$table_Sql = "SELECT id, positions, group_concat(CONCAT_WS(' ', name, lastname)) as fullname
FROM pt 
LEFT JOIN employees_table ON employees_table.position_id = pt.id
Group by id, positions";


$result = mysqli_query($conn, $table_Sql);
if (mysqli_num_rows($result) > 0) { ?>
    <table id="customers">
    <th>ID</th>
    <th>Positions</th>
    <th>Employees at position</th>
    <th>Action</th>
   <?php
    while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
        <td><?php echo $row["id"]?></td>
        <td><?php echo $row["positions"]?></td>
        <td><?php echo $row["fullname"]?></td>
        <td> 
        <button><a href='delPos.php?id="<?php echo $row['id']?>"'>Delete</a></button>
        </td>
        </td>
        </tr>
        <?php
    } 
    print("</table>");
}

 else {
    echo "0 results";
}

mysqli_close($conn);

?>

    
<button><a href="addpt.php">New Position</a></button>

</body>
</html>
