<?php
header('Access-Control-Allow-Origin: *'); 
header('Content-Type: text/plain');
mb_internal_encoding("UTF-8");

$servername = "localhost";
 $database = "moodle";
$username = "root";
$password = "";
 
// Create connection
 $record = array();
$conn = mysqli_connect($servername, $username, $password, $database);
 
// Check connection
 
if (!$conn) {
 
    die("Connection failed: " . mysqli_connect_error());
 
}
//echo "Connected successfully";



$userEmail = $_REQUEST['userEmail'];
$sql = "SELECT * FROM `mdl_user` WHERE email = '$userEmail';";
 
   // echo "successfully.";
	
	
	
	
	
	if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        // echo "<table>";
            // echo "<tr>";
                // echo "<th>id</th>";
                // echo "<th>first_name</th>";
                // echo "<th>last_name</th>";
                // echo "<th>email</th>";
            // echo "</tr>";
        while($row = mysqli_fetch_array($result)){
			//echo "<pre>";
			//print_r($row);
			
			 $userId = $row['id'];
            // echo "<tr>";
                // echo "<td>" . $row['id'] . "</td>";
                // echo "<td>" . $row['firstname'] . "</td>";
                // echo "<td>" . $row['email'] . "</td>";
                // echo "<td>" . $row['phone1'] . "</td>";
            // echo "</tr>";
        }
      //  echo "</table>";
        // Free result set
		
		//mdl_user_enrolments
		
		
		 $sql2 = "SELECT * FROM `mdl_user_enrolments` WHERE userid = '$userId';";
 
		if($result2 = mysqli_query($conn, $sql2)){
			if(mysqli_num_rows($result2) > 0){
				 while($row2 = mysqli_fetch_array($result2)){
				 
				 // echo "<pre>";
				 // print_r($row2);
					$enrolid = $row2['enrolid'];
					
					
					
					 $sql3 = "SELECT * FROM `mdl_enrol` WHERE id = '$enrolid';";
 
					if($result3 = mysqli_query($conn, $sql3)){
						if(mysqli_num_rows($result3) > 0){
							 while($row3 = mysqli_fetch_array($result3)){
							 
							 // echo "<pre>";
							 // print_r($row2);
								 $courseid = $row3['courseid'];
								 
								 	 $sql4 = "SELECT * FROM `mdl_course` WHERE id = '$courseid';";
 
										if($result4 = mysqli_query($conn, $sql4)){
											if(mysqli_num_rows($result4) > 0){
												 while($row4 = mysqli_fetch_array($result4)){
												 
												 // echo "<pre>";
												  // print_r($row4);
													// $courseid = $row3['courseid'];
													 
													 $record[]=$row4;
													 
													
												 }
												
										
											}
									
										}
								
							 }
					
						}
					
					}
					
					
				 }
		
			}
		
		}
			 //echo '<pre>';
			 //print_r($record);
			  echo json_encode($record);
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}






mysqli_close($conn);
?>