<?php
$id = $_GET['id'];
require 'conn.php';

$sql = "DELETE FROM positions WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: pt.php');
    exit;
} else {
    echo "Error deleting record";
}
