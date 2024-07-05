<?php
error_reporting(1);
error_reporting(E_ALL);
include("./include/config.php");

$bed_id = $_GET['id'];

$sql = "DELETE FROM `beds` WHERE id = {$bed_id}";
$retval = mysqli_query($conn, $sql) or die("Query Unsuccesfull");

header("Location: http://localhost/hostel2/bedlist.php");

mysqli_close($conn);
?>