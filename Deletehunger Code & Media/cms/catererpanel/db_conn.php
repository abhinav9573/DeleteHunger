<?php
$sname = "localhost";   // or "127.0.0.1"
$uname = "root";        // default user in XAMPP
$password = "";         // blank by default
$db_name = "deletehunger";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
?>