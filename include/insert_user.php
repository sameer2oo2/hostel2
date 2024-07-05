<?php
 
	include "config.php";

// if (mysqli_connnect_errno()) {
    // echo "Failed to connnect to MySQL: " . mysqli_connnect_error();
    // exit();
// }

  $_POST['roll'] = 'User';
  $_POST['status'] = 'Active';
echo "<pre>";
print_r($_POST);


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Make sure to establish a database connection.

    $fields = ['regNo', 'firstName', 'gender', 'contactNo', 'emergencyContact', 'cnic', 'email', 'password', 'GuardianName', 'GuardianCnic', 'address', 'Disability',  'roll', 'status'];
    $values = [];

    foreach ($fields as $field) {
        if (isset($_POST[$field]) && !empty($_POST[$field])) {
            $values[] = "'" . mysqli_real_escape_string($conn, $_POST[$field]) . "'";
        } else {
            $values[] = 'NULL'; // Skip empty fields by inserting NULL
        }
    }

    $insertQuery = "INSERT INTO userregistration (regNo, firstName, gender, contactNo, emergencyContact, cnic, email, password, GuardianName, GuardianCnic, address, Disability,  roll, status) VALUES (" . implode(', ', $values) . ")";

    if (mysqli_query($conn, $insertQuery)) {
        echo "Record inserted successfully.";
    } else {
        echo "Error inserting record: " . mysqli_error($conn);
    }
}



mysqli_close($conn);
?>
