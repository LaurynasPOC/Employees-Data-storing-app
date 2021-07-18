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
        <a href="positionsTable.php">Positions</a>
        <a href=""></a>
    </div>

    <?php


    require_once "conn.php";

    $id = $_GET['id'];
    $sql = "SELECT * FROM positions
    WHERE id = $id";
    $qry = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($qry);
    if (isset($_POST['update'])) {

        $position = $_REQUEST['position'];

        $update = "UPDATE positions 
        SET position='$position'
        WHERE id = $id";

        if (mysqli_query($conn, $update)) {
            echo 'Record aded';
            header("location: positionsTable.php");
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
                    <td> <label for="position">Update position:</label></td>
                    <td> <input type="text" id="position" name="position" value="<?php echo $row['position'] ?>" Required></td>
                    <td> <input type="submit" name="update" value="Update"></td>
                </tr>
            </table>
        </form>
    </div>

</body>

</html>