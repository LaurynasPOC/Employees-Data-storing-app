<?php
$conn = mysqli_connect("localhost", "root", "mysql", "employees");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>