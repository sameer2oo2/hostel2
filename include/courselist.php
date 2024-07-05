
<?php

require_once "MoodleRest-master\MoodleRest-master\MoodleRest.php";
include("config.php");
mb_internal_encoding("UTF-8");


//$domainname = LMSDomain;

 //$courseid = $_REQUEST['courseid'];



//$ip = '127.0.0.1:70';
//$moodle_folder = 'moodle';
//$token = Token;



//$functionname = 'core_enrol_get_enrolled_users';
 $functionname = 'core_course_get_courses';
// $functionname = 'core_group_get_groups';
$restformat = 'json';

$cursos = '{}';


//	$params = array('courseid' => $courseid);
	//print_r($params );

	/// REST CALL
	//header('Content-Type: text/plain');
	$serverurl = LMSDomain . '/webservice/rest/server.php'. '?wstoken=' . Token . '&wsfunction='.$functionname;
	require_once('./curl.php');
	$curl = new curl;
	//if rest format == 'xml', then we do not add the param for backward compatibility with Moodle < 2.2
	$restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:'';
	$resp = $curl->post($serverurl . $restformat);
	

	
		
		
		  $rec =  json_decode($resp);
			foreach ($rec as $key=>$data) {
		
			 $courseId = $data->id;
			 $courseName = $data->fullname;
			 $courseFormat = $data->format;
			 $startdate = $data->startdate;
			 $visible = $data->visible;
			echo "<a href='http://localhost:70/mapi/enrolled.php?courseid=$courseId'>$courseName </a><br/><br/>";
				
			
			 }

	
	
	
	exit();

	

?></html>