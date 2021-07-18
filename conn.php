<?php
$conn = mysqli_connect("localhost", "root", "mysql", "testas1000");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
