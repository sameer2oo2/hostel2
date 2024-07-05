<?php
error_reporting(E_ALL);
error_reporting(1);



e more requests using the same object



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
$token = '2fda5d2ace40b6dbfcfbfb3f5fc65483';
$domainname = 'http://localhost:70/moodle';
$functionname = 'core_user_create_users';
// REST RETURNED VALUES FORMAT
$restformat = 'xml'; //Also possible in Moodle 2.2 and later: 'json'
                     //Setting it to 'json' will fail all calls on earlier Moodle version

//////// moodle_user_create_users ////////

/// PARAMETERS - NEED TO BE CHANGED IF YOU CALL A DIFFERENT FUNCTION
$user1 = new stdClass();
$user1->username = 'testusername1';
$user1->password = 'testpassword1';
$user1->firstname = 'testfirstname1';
$user1->lastname = 'testlastname1';
$user1->email = 'testemail1@moodle.com';
$user1->auth = 'manual';
$user1->idnumber = 'testidnumber1';
$user1->lang = 'en';
$user1->theme = 'standard';
$user1->timezone = '-12.5';
$user1->mailformat = 0;
$user1->description = 'Hello World!';
$user1->city = 'testcity1';
$user1->country = 'au';
$preferencename1 = 'preference1';
$preferencename2 = 'preference2';
$user1->preferences = array(
    array('type' => $preferencename1, 'value' => 'preferencevalue1'),
    array('type' => $preferencename2, 'value' => 'preferencevalue2'));
$user2 = new stdClass();
$user2->username = 'testusername2';
$user2->password = 'Testpassword2';
$user2->firstname = 'testfirstname2';
$user2->lastname = 'testlastname2';
$user2->email = 'testemail2@moodle.com';
$user2->timezone = 'Asia/Karachi';
$users = array($user1, $user2);
$params = array('users' => $users);

print_r($user1);
/// REST CALL
header('Content-Type: text/plain');
echo $serverurl = $domainname . '/webservice/rest/server.php'. '?wstoken=' . $token . '&wsfunction='.$functionname;
include('curl.php');
$curl = new curl;

//if rest format == 'xml', then we do not add the param for backward compatibility with Moodle < 2.2
$restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:'';

$resp = $curl->post($serverurl . $restformat, $params);
var_dump($resp);

print_r($resp);
