<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>document</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <div class="header">
        <a href="employeesTable.php">Employees</a>
        <a href="positionsTable.php">Positions</a>
        <a href=""></a>
    </div>

    <?php


    require_once "conn.php";

    $id = $_GET['id'];
    echo $id . '<br>';
    echo $name . '<br>';
    $lastname = $_REQUEST['lastname'];
    echo $lastname . '<br>';
    $age = $_REQUEST['age'];
    echo $age . '<br>';
    $tel = $_REQUEST['phone_number'];
    echo $tel . '<br>';
    $position = $_REQUEST['position_id'];
    echo $position . '<br>';

    $sql = "SELECT * FROM employees
    WHERE id_number = $id";
    $qry = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($qry);
    if (isset($_POST['update'])) {
        $name = $_REQUEST['name'];
        echo $name . '<br>';
        $lastname = $_REQUEST['lastname'];
        echo $lastname . '<br>';
        $age = $_REQUEST['age'];
        echo $age . '<br>';
        $tel = $_REQUEST['phone_number'];
        echo $tel . '<br>';
        $position = $_REQUEST['position_id'];
        echo $position . '<br>';

        $update = "UPDATE employees 
        SET position_id='$position', name='$name', lastname='$lastname', age='$age', phone_number='$tel' 
        WHERE id_number = $id";

        if (mysqli_query($conn, $update)) {
            echo 'Record aded';
            header("location: employeesTable.php");
            exit;
        } else {
            echo ("Error ");
        }
        mysqli_close($conn);
    }



    ?>
    <div class="form">
        <form method="POST">
            <table>
                <tr>
                    <td> <label for="name">Update name:</label></td>
                    <td> <input type="text" id="name" name="name" value="<?php echo $row['name'] ?>" Required></td>
                </tr>
                <tr>
                    <td> <label for="lastname">Update lastname:</label></td>
                    <td> <input type="text" id="lastname" name="lastname" value="<?php echo $row['lastname'] ?>" Required></td>
                </tr>
                <tr>
                    <td> <label for="age">Update age:</label></td>
                    <td> <input type="number" id="age" name="age" value="<?php echo $row['age'] ?>" Required></td>
                </tr>
                <tr>
                    <td> <label for="phone_number">Update phone number:</label></td>
                    <td> <input type="number" id="phone_number" name="phone_number" value="<?php echo $row['phone_number'] ?>" Required></td>
                </tr>
                <tr>
                    <td><label for="position_id">Position:</label></td>
                    <td><select id="position_id" name="position_id">
                            <option value="" disabled>Select current possition</option>

                            <?php
                            $sql = "SELECT * 
                FROM positions";

                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>

                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['position']; ?></option>
                            <?php
                                }
                            } ?>
                        </select></td>
                </tr>

                <tr>
                    <td><input type="submit" name="update" value="Update"></td>
                </tr>
            </table>
        </form>
    </div>

</body>

</html>