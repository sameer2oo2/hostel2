<?php

//$domainname = 'http://localhost:70/moodle';
define("Domain","http://localhost:70/moodle");
define("Ip","127.0.0.1:70");
define("MoodleFolder","moodle");
define("Token","a7ec2b7e5c25ff184ee46d30875ce32c");
  //=Sum(Fields!Graduates.Value)
  
  //or sc.cms_gradename not in ('F','SA','W','I')
$host = 'localhost';  
$user = 'root';  
$pass = '';  
$dbname = 'hostel2';  
  
$conn = mysqli_connect($host, $user, $pass,$dbname);  
if(!$conn){  
  //echo 1;
  die('Could not connect: '.mysqli_connect_error());  
}  
//echo 'Connected successfully<br/>';  
  
//mysqli_close($conn);  
 

// $ip = '127.0.0.1:70';
// $moodle_folder = 'moodle';
// $token = 'a7ec2b7e5c25ff184ee46d30875ce32c';

?>