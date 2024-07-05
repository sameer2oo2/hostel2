<?php
	 
//	error_reporting(E_ALL);
//	error_reporting(1);
	 
	include "config.php";
	$email = "";
	$articlevalue   = "";	
	if(isset($_REQUEST)){	
		$email =   $_REQUEST['email'];
 
 
	 
	 
	 $allart = "SELECT * FROM `userregistration` WHERE email = '$email';";
	$retval = mysqli_query($conn, $allart);

	if (!$retval) {
		echo "Error in query: " . mysqli_error($con);
	} else {
		if ($retval->num_rows > 0) {
			echo 1;
		} else {
			echo 0;
		}
	}

	}
	
 
?>