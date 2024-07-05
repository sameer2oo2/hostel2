<?php

require_once "MoodleRest-master\MoodleRest-master\MoodleRest.php";
header('Access-Control-Allow-Origin: *');
header('Content-Type: text/plain');
mb_internal_encoding("UTF-8");

$token = 'a7ec2b7e5c25ff184ee46d30875ce32c';
$domainname = 'http://localhost:70/moodle';


 $courseID = $_REQUEST['id'];

// This file is NOT a part of Moodle - http://moodle.org/

	// $functionname = 'core_course_create_courses';
	$functionname = 'core_course_get_contents';
	//$functionname = 'core_calendar_get_action_events_by_course';
	//$functionname = 'core_course_get_recent_courses';
	$restformat = 'json';





	$course = new stdClass();

		// string,      1, Obrigatorio,				Padrão para "weeks" //Formato do curso: weeks, topics, social, site,..
	//$course->courseid  = $courseID;					// string,      1, Obrigatorio,				Padrão para "weeks" //Formato do curso: weeks, topics, social, site,..



	//$courses = array( $course);
	$params = array('courseid' => $courseID);
	//print_r($params );

	/// REST CALL
 
	 $serverurl = $domainname . '/webservice/rest/server.php'. '?wstoken=' . $token . '&wsfunction='.$functionname;
	require_once('./curl.php');
	$curl = new curl;
	//if rest format == 'xml', then we do not add the param for backward compatibility with Moodle < 2.2
	$restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:'';
	$resp = $curl->post($serverurl . $restformat, $params);
	print_r($resp);











exit();




