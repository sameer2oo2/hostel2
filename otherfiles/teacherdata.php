
<?php

require_once "MoodleRest-master\MoodleRest-master\MoodleRest.php";

mb_internal_encoding("UTF-8");


$domainname = 'http://localhost:70/moodle';

 $userid = $_REQUEST['userid'];


// Set this variables accordingly

$ip = '127.0.0.1:70';
$moodle_folder = 'moodle';
$token = 'a7ec2b7e5c25ff184ee46d30875ce32c';

//SELECT TOP 1 * FROM onlineCanidate where semesterSession = @semesterSession  Order By vistorCode Desc


$functionname = 'core_enrol_get_users_courses';
// $functionname = 'core_course_get_courses';
// $functionname = 'core_group_get_groups';
$restformat = 'json';

$cursos = '{}';


	$params = array('userid' => $userid);
	//print_r($params );

	/// REST CALL
	//header('Content-Type: text/plain');
	$serverurl = $domainname . '/webservice/rest/server.php'. '?wstoken=' . $token . '&wsfunction='.$functionname;
	require_once('./curl.php');
	$curl = new curl;
	//if rest format == 'xml', then we do not add the param for backward compatibility with Moodle < 2.2
	$restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:'';
	$resp = $curl->post($serverurl . $restformat, $params);
	
	
	
				
echo "<pre>";	


		
		 
		 $rec =  json_decode($resp);
		 echo count($rec);
		  //print_r(json_decode($resp));
		  
		  
		  
			foreach ($rec as $key=>$data) {
			
				echo "<h3>".$data->fullname."</h3>";
			
			}
		 
		 
		 
		 
		 exit();
		  $rec =  json_decode($resp);
			foreach ($rec as $key=>$data) {
			
			
				
				$findrole = $data->roles;
				//print_r($findrole);
				 foreach ($findrole as $keys=>$rol) {
				
				 if($rol->shortname=='editingteacher')
				
			
						echo "<h3>Teacher</h3>";
						echo "Teacher: <a href='".$data->id."'>".$data->fullname."</a>";
				}
				echo "<br/>";
				if($rol->shortname=='student'){
							echo "<h3>Student</h3>";
					echo "Student: ".$data->fullname;
					echo "</br>";
				}
				 // echo "<h4><a href='enrolled.php?courseid=".$data->id."'>".$data->fullname ."</a></h4>";
				 // echo "<br/>";
			 }
	//print_r(json_decode($resp));

	
	
	
	
	
	
	
	
	exit();

	

?></html>