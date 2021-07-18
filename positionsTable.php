<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>

<body>
    <div class="header">
        <a href="employeesTable.php">Employees</a>
        <a href="positionsTable.php">Positions</a>
        <a href=""></a>

    </div>

    <?php
    require 'conn.php';



    $table_Sql = "SELECT positions.id, positions.position, group_concat(CONCAT_WS(' ', name, lastname)) as fullname
    FROM positions 
    LEFT JOIN employees ON employees.position_id = positions.id
    Group by positions.id, positions.position";



    $result = mysqli_query($conn, $table_Sql);
    if (mysqli_num_rows($result) > 0) { ?>
        <table id="customers">
            <th>ID</th>
            <th>Positions</th>
            <th>Employees at position</th>
            <th>Action</th>
            <?php
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row["id"] ?></td>
                    <td><?php echo $row["position"] ?></td>
                    <td><?php echo $row["fullname"] ?></td>
                    <td>
                        <button><a href='delPos.php?id="<?php echo $row['id'] ?>"'>Delete</a></button>
                        <button><a href='upPosition.php?id="<?php echo $row['id'] ?>"'>Update</a></button>
                    </td>
                </tr>
        <?php
            }
            print("</table>");
        } else {
            echo "0 results";
        }

        mysqli_close($conn);

        ?>


        <button><a href="addpt.php">New Position</a></button>

</body>

</html>