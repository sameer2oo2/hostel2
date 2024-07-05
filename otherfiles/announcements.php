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


$courseid = $_REQUEST['id']; 

 $sql = "SELECT * FROM `mdl_event` where `courseid` = $courseid;";
 
   // echo "successfully.";
	
	
	
	
	
	if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        
        while($row = mysqli_fetch_array($result)){
			 
			
			  $record[] = $row;
           
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