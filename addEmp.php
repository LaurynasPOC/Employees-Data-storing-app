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



    if (isset($_POST['add'])) {

        $name = $_REQUEST['name'];
        $lastName = $_REQUEST['lastName'];
        $age = $_REQUEST['age'];
        $contactNumber = $_REQUEST['phone_number'];
        $position = $_REQUEST['position_id'];

        $addEmp_sql = "INSERT INTO employees (name, lastname, age, phone_number, position_id) 
    VALUES ('$name', '$lastName', '$age', '$contactNumber', '$position')";

        if (mysqli_query($conn, $addEmp_sql)) {
            echo "Records added successfully.";
            header('Location: employeesTable.php');
        } else {
            echo "Error: " . $addEmp_sql . "
" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }


    ?>
    <div class="form">
        <form action="" method="POST">
            <label for="">New employee data:</label>
            <input type="text" name="name" placeholder="Name">
            <input type="text" name="lastName" placeholder="Last Name">
            <input type="number" name="age" placeholder="Age">
            <input type="number" name="phone_number" placeholder="Contact Number">

            <select id="position" name="position_id">
                <?php
                $sql = "SELECT id, position 
                FROM positions";

                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['position']; ?></option>
                <?php
                    }
                } ?>
            </select>
            <input type="submit" name='add' value="Add">
        </form>
    </div>


</body>

</html>