<?php
error_reporting(1);
error_reporting(E_ALL);
include("./include/config.php");

$room_id = $_GET['id'];

$sql = "DELETE FROM `rooms` WHERE id = {$room_id}";
$retval = mysqli_query($conn, $sql) or die("Query Unsuccesfull");

header("Location: http://localhost/hostel2/roomlist.php");

mysqli_close($conn);
?>