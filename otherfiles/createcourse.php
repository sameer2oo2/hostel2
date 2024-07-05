<?php

require_once "MoodleRest-master\MoodleRest-master\MoodleRest.php";





$token = 'a7ec2b7e5c25ff184ee46d30875ce32c';
$domainname = 'http://localhost:70/moodle';














mb_internal_encoding("UTF-8");

// This file is NOT a part of Moodle - http://moodle.org/
//
// This client for Moodle 2 is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//

/**
 * REST client for Moodle 2
 * Return JSON or XML format
 *
 * @authorr Jerome Mouneyrac
 */

/// SETUP - NEED TO BE CHANGED

	$functionname = 'core_course_create_courses';
	$restformat = 'json';


	/*	fullname string   //full name
		shortname string   //course short name
		categoryid int   //category id
		summaryformat int  Padrão para "1" //summary format (1 = HTML, 0 = MOODLE, 2 = PLAIN or 4 = MARKDOWN)
		format string  Padrão para "weeks" //course format: weeks, topics, social, site,..
		showgrades int  Padrão para "1" //1 if grades are shown, otherwise 0
		newsitems int  Padrão para "5" //number of recent items appearing on the course page
		maxbytes int  Padrão para "0" //largest size of file that can be uploaded into the course
		showreports int  Padrão para "0" //are activity report shown (yes = 1, no =0)
		groupmode int  Padrão para "0" //no group, separate, visible
		groupmodeforce int  Padrão para "0" //1: yes, 0: no
		defaultgroupingid int  Padrão para "0" //default grouping id
		
	*/



	$course = new stdClass();

	$course->fullname = "Web Development";	// string,    254, Obrigatorio,          Nome Completo do Curso
	$course->shortname = "WebDev";					// string,    100, Obrigatorio,          Nome Curto, evite usar espaço, substitua os espaços por traço baixo (underscore)
	$course->categoryid  = 1;					// int, 	   10, Obrigatorio, 		 Id da categoria
													// deve ser conhecido o id conforme já cadastrado no moodle 
	$course->summaryformat = 1;
	$course->showgrades = 1;
	$course->newsitems = 5;
	$course->maxbytes = 0;
	$course->showreports = 0;
	$course->groupmodeforce = 0;
	$course->defaultgroupingid = 0;
	//$course->idnumber  = "axo.44d.1x";				// string,    100, Opcional,             Id universal do curso
	$course->summary  = "Este curso foi criado para teste do Enrol/Matricula de usuário via novo WebService do Aula";
													// string,     1K, Obrigatorio, 			 Sumário
	$course->visible  = 1;						// int,         1, Obrigatorio,             1: Disponível para estudante, 0:Não disponível
	$course->groupmode  =  0;						// int,         1, Obrigatorio,             Padrão para "0" //no group, separate, visible
	$course->format  = "weeks";					// string,      1, Obrigatorio,				Padrão para "weeks" //Formato do curso: weeks, topics, social, site,..



	$courses = array( $course);
	$params = array('courses' => $courses);
	print_r($params );

	/// REST CALL
	header('Content-Type: text/plain');
	$serverurl = $domainname . '/webservice/rest/server.php'. '?wstoken=' . $token . '&wsfunction='.$functionname;
	require_once('./curl.php');
	$curl = new curl;
	//if rest format == 'xml', then we do not add the param for backward compatibility with Moodle < 2.2
	$restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:'';
	$resp = $curl->post($serverurl . $restformat, $params);
	print_r($resp);





















































// Set this variables accordingly

$ip = '127.0.0.1:70';
$moodle_folder = 'moodle';
$token = 'a7ec2b7e5c25ff184ee46d30875ce32c';








$functionname = 'core_course_get_courses';
// $functionname = 'core_group_get_groups';
$restformat = 'json';

$cursos = '{}';

	

		echo $serverurl = $domainname . '/webservice/rest/server.php'. '?wstoken=' . $token . '&wsfunction='.$functionname.'&moodlewsrestformat=' . $restformat;
		
		
		try {
			//echo 99;
			$cursos = file_get_contents($serverurl);
			
		} catch (Exception $e) {
			
			echo 22;
			echo $e;
			
		}
		


		$rows = json_decode($cursos);

		echo "<pre>";
		print_r($rows);

exit();


// /*
// The $parameters variable below translates in URL as:
    // userlist[0][userid]=5&
    // userlist[0][courseid]=2&
    // userlist[1][userid]=4&
    // userlist[1][courseid]=2"
// */
// $parameters = array('userlist' => array(array('userid' => 3, 'courseid' => 2)));

// $json =
    // (new MoodleRest())->setServerAddress("http://127.0.0.1:70/moodle/webservice/rest/server.php")->
    // setToken('a7ec2b7e5c25ff184ee46d30875ce32c')->
    // setReturnFormat(MoodleRest::RETURN_JSON)->request('core_user_get_course_user_profiles', $parameters);

// echo $json;

// exit();






// $MoodleRest = new MoodleRest();
// $MoodleRest->setServerAddress("http://127.0.0.1:70/moodle/webservice/rest/server.php");
// $MoodleRest->setToken('a7ec2b7e5c25ff184ee46d30875ce32c');
// $MoodleRest->setReturnFormat(MoodleRest::RETURN_ARRAY); // Array is default. You can use RETURN_JSON or RETURN_XML too.

// // You can enable debugging information using setDebug()
// // When debugging is enabled, after each request the built URL and the result returned by the webservice function are printed to the standard output.
// $MoodleRest->setDebug();
// $arr = $MoodleRest->request('core_group_get_groups', array('groupids' => array(1,2)), MoodleRest::METHOD_GET);


// print_r($arr);
// // Note: You can mak























// // // Uncomment the example block you want to run. The first block (example A) is already uncommented.

// // // Example A: Two requests using the same object, returns array
// // echo "http://$ip/$moodle_folder/webservice/rest/server.php";
// // $MoodleRest = new MoodleRest();
// // $MoodleRest->setServerAddress("http://$ip/$moodle_folder/webservice/rest/server.php");
// // $MoodleRest->setToken($token);
// // $MoodleRest->setReturnFormat(MoodleRest::RETURN_ARRAY);

// // $result1 = $MoodleRest->request('core_group_get_groups', array('groupids' => array(1,2))); // groupids[0]=1&groupids[1]=2

// // echo "result1:\n" . print_r($result1, true);
// // $params = array('userlist' => array(array('userid' => 2, 'courseid' => 2), array('userid' => 4, 'courseid' => 2))); //userlist[0][userid]=5&userlist[1][userid]=4&userlist[0][courseid]=2&userlist[1][courseid]=2

// // $result2 = $MoodleRest->request('core_user_get_course_user_profiles', $params);

// // echo "result2:\n" . print_r($result2, true);
// // die();


// //Example B: Returning and printing a json

// $MoodleRest = new MoodleRest();
// $MoodleRest->setServerAddress("http://$ip/$moodle_folder/webservice/rest/server.php");
// $MoodleRest->setToken($token);
// $MoodleRest->setReturnFormat(MoodleRest::RETURN_JSON);

// $json = $MoodleRest->request('core_group_get_groups', array('groupids' => array(1,2)));

// $MoodleRest->printRequest(); // this prints the header and the json string
// echo $json; // this prints only the json string
// die();



// //Example C: Returning a xml using method chaining

// $xml =
    // (new MoodleRest())->setServerAddress("http://$ip/$moodle_folder/webservice/rest/server.php")->
    // setToken($token)->
    // setReturnFormat(MoodleRest::RETURN_XML)->request('core_group_get_groups', array('groupids' => array(1,2)));

// echo $xml;
// die();
