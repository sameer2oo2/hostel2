<?php

require_once "MoodleRest-master\MoodleRest-master\MoodleRest.php";




mb_internal_encoding("UTF-8");

$token = 'a7ec2b7e5c25ff184ee46d30875ce32c';
$domainname = 'http://localhost:70/moodle';





/// SETUP - NEED TO BE CHANGED

	// $functionname = 'core_course_create_courses';
	$functionname = 'core_course_get_contents';
	//$functionname = 'core_calendar_get_action_events_by_course';
	//$functionname = 'core_course_get_recent_courses';
	$restformat = 'json';



// Set this variables accordingly

$ip = '127.0.0.1:70';
$moodle_folder = 'moodle';
$token = 'a7ec2b7e5c25ff184ee46d30875ce32c';




$functionname = 'core_course_get_courses';
// $functionname = 'core_course_get_courses';
// $functionname = 'core_group_get_groups';
$restformat = 'json';

$cursos = '{}';

	

		 $serverurl = $domainname . '/webservice/rest/server.php'. '?wstoken=' . $token . '&wsfunction='.$functionname.'&moodlewsrestformat=' . $restformat;
		
		
		try {
			//echo 99;
			$cursos = file_get_contents($serverurl);
			
			
echo "<pre>";	


		// print_r(json_decode($cursos));
		 
		  $rec =  json_decode($cursos);
			foreach ($rec as $key=>$data) {
				 echo "<h4><a href='enrolled.php?courseid=".$data->id."'>".$data->fullname ."</a></h4>";
				 echo "<br/>";
			 }
		} catch (Exception $e) {
			
						echo $e;
			

		}
		


		$rows = json_decode($cursos);

		// echo "<pre>";
		// print_r($rows);

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
