<?php
error_reporting(0);
require_once "MoodleRest-master\MoodleRest-master\MoodleRest.php";
include("./include/config.php");
mb_internal_encoding("UTF-8");
//$conn

//print_r(Top10courseviews($conn));
//echo "<pre>";
// print_r(HourlyDaywise($conn));

// print_r(monthlyDaywise($conn));
// print_r(yearlyMnthlywise($conn));

// echo "<pre>";
// print_r(semesterWise($conn));
function HourlyDaywise($conn){ 
	$HourWisecount = array();
	  $sql="SELECT DATE_FORMAT(FROM_UNIXTIME(`timecreated`), ' %h:00 %p') AS 'date_hour_formatted', COUNT(*) AS 'count'
FROM `mdl_logstore_standard_log`
WHERE (
    (SUBSTRING_INDEX(SUBSTRING_INDEX(`other`, ':', -2), ';', 1) LIKE '%admin%')
    OR
    (JSON_VALID(`other`) = 1 AND JSON_EXTRACT(`other`, '$.username') LIKE '%admin%')
  )
  AND FROM_UNIXTIME(`timecreated`) >= CURDATE()
  AND HOUR(FROM_UNIXTIME(`timecreated`)) BETWEEN 0 AND 23
GROUP BY DATE_FORMAT(FROM_UNIXTIME(`timecreated`), ' %h:00 %p')
ORDER BY 
  CASE WHEN DATE_FORMAT(FROM_UNIXTIME(`timecreated`), '%p') = 'AM' THEN 1 ELSE 2 END,
  CASE WHEN HOUR(FROM_UNIXTIME(`timecreated`)) = 12 THEN 0
    WHEN HOUR(FROM_UNIXTIME(`timecreated`)) < 12 THEN HOUR(FROM_UNIXTIME(`timecreated`))
    ELSE HOUR(FROM_UNIXTIME(`timecreated`)) - 12
  END;
"; 
		  // $sql="SELECT DATE_FORMAT(FROM_UNIXTIME(`timecreated`), '  %h:00 %p') AS 'date_hour_formatted', COUNT(*) AS 'count' FROM `mdl_logstore_standard_log` 
		  // WHERE ((SUBSTRING_INDEX(SUBSTRING_INDEX(`other`, ':', -2), ';', 1) LIKE '%admin%') 
		  // OR JSON_VALID(`other`) = 1 
		  // AND JSON_EXTRACT(`other`, '$.username') LIKE '%admin%') 
		  // AND FROM_UNIXTIME(`timecreated`) >= CURDATE() 
		  // AND HOUR(FROM_UNIXTIME(`timecreated`)) BETWEEN 0 AND 23 
		  // GROUP BY DATE_FORMAT(FROM_UNIXTIME(`timecreated`), ' %h:00 %p') 
		  // ORDER BY `date_hour_formatted`;";
	  
	$retval=mysqli_query($conn, $sql);
	 //echo $retval->num_rows;
	 if ($retval->num_rows > 0) {
		// Output data for each row
		
		 while ($row = $retval->fetch_assoc()) {
			// echo $row["date_formatted"];
		   // echo  $row["count"];
			 $HourWisecount[] =$row;
		 }
	} else {
		//echo 0;
	}

 
	return($HourWisecount); 
}

function monthlyDaywise($conn){
	$daywisecount = array();
	 $sql="SELECT DATE_FORMAT(FROM_UNIXTIME(`timecreated`), '%Y-%m-%d') AS 'date_formatted', COUNT(*) AS 'count'
			FROM `mdl_logstore_standard_log`
			WHERE (((SUBSTRING_INDEX(SUBSTRING_INDEX(`other`, ':', -2), ';', 1) LIKE '%admin%')
					OR JSON_VALID(`other`) = 1 AND JSON_EXTRACT(`other`, '$.username') LIKE '%admin%'))
				  AND (FROM_UNIXTIME(`timecreated`) >= DATE_SUB(CURDATE(), INTERVAL DAYOFMONTH(CURDATE())-1 DAY)
					   AND FROM_UNIXTIME(`timecreated`) <= DATE_ADD(CURDATE(), INTERVAL 1 DAY))
			GROUP BY DATE_FORMAT(FROM_UNIXTIME(`timecreated`), '%Y-%m-%d')
			ORDER BY `date_formatted`;";
	  
	$retval=mysqli_query($conn, $sql);
	 
	 if ($retval->num_rows > 0) {
		// Output data for each row
		
		 while ($row = $retval->fetch_assoc()) {
			// echo $row["date_formatted"];
		   // echo  $row["count"];
			 $daywisecount[] =$row;
		 }
	} else {
		echo 0;
	}


	return($daywisecount); 
}




function yearlyMnthlywise($conn){
	$daywisecount = array();
	 $sql="SELECT DATE_FORMAT(FROM_UNIXTIME(`timecreated`), '%Y-%m') AS date_month_formatted, COUNT(*) AS `count`
FROM mdl_logstore_standard_log
WHERE ((SUBSTRING_INDEX(SUBSTRING_INDEX(`other`, ':', -2), ';', 1) LIKE '%admin%')
       OR JSON_VALID(`other`) = 1 AND JSON_EXTRACT(`other`, '$.username') LIKE '%admin%')
      AND YEAR(FROM_UNIXTIME(`timecreated`)) = YEAR(CURDATE())
      AND MONTH(FROM_UNIXTIME(`timecreated`)) <= MONTH(CURDATE())
GROUP BY DATE_FORMAT(FROM_UNIXTIME(`timecreated`), '%Y-%m')
ORDER BY date_month_formatted;";
	  
	$retval=mysqli_query($conn, $sql);
	 
	 if ($retval->num_rows > 0) {
		// Output data for each row
		
		 while ($row = $retval->fetch_assoc()) {
			// echo $row["date_formatted"];
		   // echo  $row["count"];
			 $daywisecount[] =$row;
		 }
	} else {
		echo 0;
	}


	return($daywisecount); 
}




function semesterWise($conn){
	$daywisecount = array();
	 $sql="SELECT 
    CASE
        WHEN SUBSTRING_INDEX(SUBSTRING_INDEX(`other`, ':', -2), ';', 1) LIKE '%s2016%' THEN 's2016'
        WHEN SUBSTRING_INDEX(SUBSTRING_INDEX(`other`, ':', -2), ';', 1) LIKE '%f2021%' THEN 'f2021'
        WHEN SUBSTRING_INDEX(SUBSTRING_INDEX(`other`, ':', -2), ';', 1) LIKE '%s2021%' THEN 's2021'
        WHEN SUBSTRING_INDEX(SUBSTRING_INDEX(`other`, ':', -2), ';', 1) LIKE '%f2023%' THEN 'f2023'
        WHEN SUBSTRING_INDEX(SUBSTRING_INDEX(`other`, ':', -2), ';', 1) LIKE '%s2023%' THEN 's2023'
    END AS 'match_string',
    COUNT(*) AS 'count'
FROM `mdl_logstore_standard_log`
WHERE (
    (SUBSTRING_INDEX(SUBSTRING_INDEX(`other`, ':', -2), ';', 1) LIKE '%s2016%')
    OR (SUBSTRING_INDEX(SUBSTRING_INDEX(`other`, ':', -2), ';', 1) LIKE '%f2021%')
    OR (SUBSTRING_INDEX(SUBSTRING_INDEX(`other`, ':', -2), ';', 1) LIKE '%s2021%')
    OR (SUBSTRING_INDEX(SUBSTRING_INDEX(`other`, ':', -2), ';', 1) LIKE '%f2023%')
    OR (SUBSTRING_INDEX(SUBSTRING_INDEX(`other`, ':', -2), ';', 1) LIKE '%s2023%')
 
    OR (JSON_VALID(`other`) = 1 AND JSON_EXTRACT(`other`, '$.username') LIKE '%s2016%')
    OR (JSON_VALID(`other`) = 1 AND JSON_EXTRACT(`other`, '$.username') LIKE '%f2021%')
    OR (JSON_VALID(`other`) = 1 AND JSON_EXTRACT(`other`, '$.username') LIKE '%s2021%')
    OR (JSON_VALID(`other`) = 1 AND JSON_EXTRACT(`other`, '$.username') LIKE '%f2023%')
    OR (JSON_VALID(`other`) = 1 AND JSON_EXTRACT(`other`, '$.username') LIKE '%s2023%')
  )
  AND `action` = 'loggedin'
GROUP BY `match_string`;";
	  
	$retval=mysqli_query($conn, $sql);
	 
	 if ($retval->num_rows > 0) {
		// Output data for each row
		
		 while ($row = $retval->fetch_assoc()) {
			// echo $row["date_formatted"];
		   // echo  $row["count"];
			 $daywisecount[] =$row;
		 }
	} else {
		echo 0;
	}


	return($daywisecount); 
}



 
// SELECT DATE_FORMAT(FROM_UNIXTIME(`timecreated`), '%Y-%m-%d') AS 'date_formatted', COUNT(*) AS 'count'
// FROM `mdl_logstore_standard_log`
// WHERE (SUBSTRING_INDEX(SUBSTRING_INDEX(`other`, ':"', -2), '";', 1) Like '%admin%')
   // OR (`other` LIKE '%"username":"%admin"%') AND
   // FROM_UNIXTIME(`timecreated`) >= '2023-07-01'
  // AND FROM_UNIXTIME(`timecreated`) <=  DATE_ADD(CURDATE(),INTERVAL 1 DAY)
// GROUP BY DATE_FORMAT(FROM_UNIXTIME(`timecreated`), '%Y-%m-%d')
// ORDER BY `date_formatted`;
 
 
// SELECT DATE_FORMAT(FROM_UNIXTIME(`timecreated`), '%Y-%m-%d %H:00:00') AS 'date_hour_formatted', COUNT(*) AS 'count'
// FROM `mdl_logstore_standard_log`
// WHERE ((SUBSTRING_INDEX(SUBSTRING_INDEX(`other`, ':"', -2), '";', 1) LIKE '%admin%')
       // OR (`other` LIKE '%"username":"%admin"%'))
       // AND FROM_UNIXTIME(`timecreated`) >= CURDATE()
       // AND HOUR(FROM_UNIXTIME(`timecreated`)) = HOUR(NOW())
// GROUP BY DATE_FORMAT(FROM_UNIXTIME(`timecreated`), '%Y-%m-%d %H:00:00')
// ORDER BY `date_hour_formatted`;
 
  
function CountAllCourses(){
	
	$functionname = 'core_course_get_courses';
	$restformat = 'json';
	$cursos = '{}';

		$serverurl = LMSDomain . '/webservice/rest/server.php'. '?wstoken=' . Token . '&wsfunction='.$functionname;
		require_once('./curl.php');
		$curl = new curl;
		//if rest format == 'xml', then we do not add the param for backward compatibility with Moodle < 2.2
		$restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:'';
		$resp = $curl->post($serverurl . $restformat);
		$rec =  json_decode($resp);		
		return(count($rec));
}

function GetcourseEnroledUsers($cid){
	
	$functionname = 'core_enrol_get_enrolled_users';
	$restformat = 'json';
	$cursos = '{}';
$params = array('courseid' => $cid);
		$serverurl = LMSDomain . '/webservice/rest/server.php'. '?wstoken=' . Token . '&wsfunction='.$functionname;
		require_once('./curl.php');
		$curl = new curl;
		//if rest format == 'xml', then we do not add the param for backward compatibility with Moodle < 2.2
		$restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:'';
		$resp = $curl->post($serverurl . $restformat, $params);
		$rec =  json_decode($resp);	


 $rec =  json_decode($resp);
			foreach ($rec as $key=>$data) {
			
			
				
				$findrole = $data->roles;
				//print_r($findrole);
				 foreach ($findrole as $keys=>$rol) {
				
				 if($rol->shortname=='editingteacher')
				
			
						echo "<h4>Teacher:</h4>";
						echo "  &nbsp; &nbsp; <a href='teacherdata.php?tname=".$data->fullname."&userid=".$data->id."'>".$data->fullname."</a>";
				}
				echo "<br/>";
				if($rol->shortname=='student'){
							echo "<h4>Students:</h4>";
					echo " &nbsp; &nbsp; ".$data->fullname;
					echo "</br>";
				}
				 // echo "<h4><a href='enrolled.php?courseid=".$data->id."'>".$data->fullname ."</a></h4>";
				 // echo "<br/>";
			 }







		
		//return($rec);
}

function TotalEnrolledUsers($conn){
	
	$sql = 'SELECT DISTINCT(`userid`) FROM `mdl_user_enrolments` GROUP BY `userid`;';  
$retval=mysqli_query($conn, $sql);  
   $totalenrol =  mysqli_num_rows($retval);
// if(mysqli_num_rows($retval) > 0){  
 // // while($row = mysqli_fetch_assoc($retval)){  
    // // // echo "EMP ID :{$row['id']}  <br> ".  
         // // // "EMP NAME : {$row['name']} <br> ".  
         // // // "EMP SALARY : {$row['salary']} <br> ".  
         // // // "--------------------------------<br>";  
 // // } //end of while  
// }else{  
// echo 0;  
// }  
return( $totalenrol);


}


function courseviews($conn){

$fullname = "";
$shortname = "";
$courseView = array();
$maxviews = array();
$sql = "SELECT `courseid`,count(action) as CourseView FROM `mdl_logstore_standard_log` where target ='course' and action='viewed' GROUP BY `courseid`;";

$retval=mysqli_query($conn, $sql);  
   $totalenrol =  mysqli_num_rows($retval);
  
 while($row = mysqli_fetch_assoc($retval)){  
	
	$courseid = $row['courseid'];
	$CourseView = $row['CourseView'];
 
 $sql2 = "SELECT fullname,shortname,category,format,startdate,enddate FROM `mdl_course` WHERE `id` = $courseid;";
  $eventsql = "SELECT id  FROM `mdl_event` where `courseid` = $courseid;";

 $retval2=mysqli_query($conn, $sql2);  
 $eventresult=mysqli_query($conn, $eventsql);  
 $eventCount = mysqli_num_rows($eventresult);

   if(mysqli_num_rows($retval2) > 0){ 
 $row2 = mysqli_fetch_assoc($retval2); 
		 
		  $fullname  = $row2['fullname'];
          $shortname = $row2['shortname'];
          $format    = $row2['format'];
          $startdate = $row2['startdate'];
          $enddate   = $row2['enddate'];
		  $maxviews[] =  $CourseView;
 $data[] = array( 
          'courseid' => $courseid,
          'CourseView' => $CourseView,
          'FullName' => $fullname,
          'ShortName' => $shortname,
          'Format' => $format,
          'StartDate' => $startdate,
          'EndDate' => $enddate,
          'maxviews' => $maxviews, 
          'CourseEvents' => $eventCount 
           
          
        );
  }
 } //end of while  
return($data);

}



function Top10courseviews($conn){

$fullname = "";
$shortname = "";
$courseView = array();
$maxviews = array();
$sql = "SELECT `courseid`,count(action) as CourseView FROM `mdl_logstore_standard_log` where target ='course' and action='viewed' GROUP BY `courseid`ORDER BY CourseView DESC Limit 10;";

$retval=mysqli_query($conn, $sql);  
   $totalenrol =  mysqli_num_rows($retval);
  
 while($row = mysqli_fetch_assoc($retval)){  
	
	$courseid = $row['courseid'];
	$CourseView = $row['CourseView'];
 
 $sql2 = "SELECT fullname,shortname,category,format,startdate,enddate FROM `mdl_course` WHERE `id` = $courseid;";

 $retval2=mysqli_query($conn, $sql2);  

  
   if(mysqli_num_rows($retval2) > 0){ 
 $row2 = mysqli_fetch_assoc($retval2); 
		 
		  $fullname = $row2['fullname'];
          $shortname =$row2['shortname'];
          $format     =$row2['format'];
          $startdate =$row2['startdate'];
          $enddate   =$row2['enddate'];
 $maxviews[] =  $CourseView;
 $data[] = array( 
          'courseid' => $courseid,
          'CourseView' => $CourseView,
          'FullName' => $fullname,
          'ShortName' => $shortname,
          'Format' => $format,
          'StartDate' => $startdate,
          'EndDate' => $enddate,
          'maxviews' => $maxviews 
           
          
        );
  }
 } //end of while  
return($data);

}




function Top10Activites($conn){

$fullname = "";
$shortname = "";
$data = array();
$sql = "SELECT `mdl_user`.id, `mdl_user`.`firstname`, `mdl_user`.`lastname`, count(`mdl_user`.id) as Activeuser  FROM `mdl_logstore_standard_log` inner JOIN  `mdl_user` ON `mdl_user`.id =`mdl_logstore_standard_log`.`userid` GROUP BY `mdl_user`.id ORDER by Activeuser DESC LIMIT 10;";

$retval=mysqli_query($conn, $sql);  
   $totalenrol =  mysqli_num_rows($retval);
  
 while($row = mysqli_fetch_assoc($retval)){  
	
$data[] = $row;
	// echo "<pre>";
	// print_r($row);

  
 } //end of while  
return($data);

}



function GetTeacherData($userid){
	 
	$functionname = 'core_enrol_get_users_courses';
	// $functionname = 'core_course_get_courses';
	// $functionname = 'core_group_get_groups';
	$restformat = 'json';
	$cursos = '{}';
	$params = array('userid' => $userid);
	//print_r($params );

	/// REST CALL
	//header('Content-Type: text/plain');
	$serverurl = LMSDomain . '/webservice/rest/server.php'. '?wstoken=' . Token . '&wsfunction='.$functionname;
	require_once('./curl.php');
	$curl = new curl;
	//if rest format == 'xml', then we do not add the param for backward compatibility with Moodle < 2.2
	$restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:'';
	$resp = $curl->post($serverurl . $restformat, $params);
	
	
 


		
		 
		 $rec =  json_decode($resp);
		  count($rec);
		  //print_r(json_decode($resp));
		  
			foreach ($rec as $key=>$data) {
			
				echo "<h6>".$data->fullname."</h6>";
			
			}
		 
 }


// SELECT `mdl_user`.id, `mdl_user`.`firstname`, `mdl_user`.`lastname`, count(`mdl_user`.id) as Activeuser FROM `mdl_logstore_standard_log` inner JOIN `mdl_user` ON `mdl_user`.id =`mdl_logstore_standard_log`.`userid` GROUP BY `mdl_user`.id;


//SELECT `userid`,count(action) as Activeuser FROM `mdl_logstore_standard_log`  where target ='course'   GROUP BY `userid` ORDER BY Activeuser DESC LIMIT 10;


//SELECT `userid`,count(action) as Activeuser FROM `mdl_logstore_standard_log` inner JOIN `mdl_user`  where target ='course'   GROUP BY `userid` ORDER BY Activeuser DESC LIMIT 10;
//SELECT `mdl_user`.id, `mdl_user`.`firstname`, `mdl_user`.`lastname`, count(DISTINCT(`mdl_user`.id)) as Activeuser  FROM `mdl_logstore_standard_log` inner JOIN  `mdl_user` ON `mdl_user`.id =`mdl_logstore_standard_log`.`userid` GROUP BY `mdl_user`.id;


?>

