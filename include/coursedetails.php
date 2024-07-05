<?php
error_reporting(1);
error_reporting(E_ALL);
include("./include/header.php");

include("./include/lefnave.php");
include("lmsfunctions.php");


$Totalcourses = CountAllCourses();
 $courseData=courseviews($conn);
 
  $courseid =  $_REQUEST['courseid'];
 $ccoursename = $_REQUEST['ccoursename'];
 

 
foreach ($courseData as $cvalue) {  
    
    $maxviews = $cvalue['maxviews']; 
}





 
?> 



<section class="content">
<div class="container-fluid">

<div class="row">
<div class="col-lg-3 col-6">

<div class="small-box bg-info">
<div class="inner">
<h3><?php echo $Totalcourses;?></h3>
<p>Total Courses</p>
</div>
<div class="icon">
<i class="ion ion-bag"></i>
</div>
<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-success">
<div class="inner">
<h3><?php echo TotalEnrolledUsers($conn);?>
<!--<sup style="font-size: 20px">%</sup> -->
</h3>
<p>Enrolled Users</p>
</div>
<div class="icon">
<i class="ion ion-stats-bars"></i>
</div>
<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-warning">
<div class="inner">
<h3><?php echo  max($maxviews);?></h3>
<p>Max Course viewed</p>
</div>
<div class="icon">
<i class="ion ion-person-add"></i>
</div>
<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-danger">
<div class="inner">
<h3>65</h3>
<p>Unique Visitors</p>
</div>
<div class="icon">
<i class="ion ion-pie-graph"></i>
</div>
<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

</div>


<div class="row">
<div class="col-lg-8 col-8">
<h2><?php echo $ccoursename;?></h2>
<?php    print_r(GetcourseEnroledUsers($courseid) );?>
</div>
</div>




</div>
</section>

</div>

<?php
 
include("footer.php");
?> 