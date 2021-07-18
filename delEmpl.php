<?php
$id = $_GET['id'];
echo $id;
require_once 'conn.php';

$sql = "DELETE FROM employees WHERE id_number = $id";
if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: employeesTable.php');
    exit;
} else {
    echo "Error deleting record";
}
