<?php
error_reporting(1);
error_reporting(E_ALL);
include("./include/header.php");

  
 
include("./include/lefnave.php");
	
?> 



<div class="content-wrapper">

<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1 class="m-0">Total Rooms</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Total Rooms </li>
</ol>
</div>
</div>
</div>




<div class="row">


<div class="card col-lg-12 " >
<div class="card-header">
	<h3 class="card-title">
	 <i class="fas fa-chart-pie mr-1"></i>
		Mustfa Town Rooms
	</h3>
	<div class="card-tools">
	 
	</div>
</div>
<div class="card-body">
<div class="tab-content p-0">


    <!--
<h5 class="mb-2 mt-4">---</h5> -->
<div class="row">


<?php

$allart = "SELECT * FROM `rooms` WHERE campus = '1';"; 
$beds = "SELECT * FROM `beds` WHERE campus = '1';";
$Bookedbeds = "SELECT * FROM `beds` where status = 'Booked' AND campus = '1';";
 $Freebeds = "SELECT * FROM `beds` where status = 'Free' AND campus = '1';";

$retval=mysqli_query($conn, $allart);
$bedscpunt=mysqli_query($conn, $beds);
$Bookedbedq=mysqli_query($conn, $Bookedbeds);
$Freebedq=mysqli_query($conn, $Freebeds);

 $totalrooms = $retval->num_rows;
 $totalbeds = $bedscpunt->num_rows;
 $totalbookedbeds = $Bookedbedq->num_rows;
 $totalFreebeds = $Freebedq->num_rows;

			 $retval=mysqli_query($conn, $allart);
			 //echo $retval->num_rows;
			 $i =1;
			 if ($retval->num_rows > 0) {
				// Output data for each row
				
				 while ($row = mysqli_fetch_assoc($retval)) {
					 $rec[] =$row; 
					   $id = $row['id'];
					   $room_no = $row['room_no']; 
					   $seater = $row['seater']; 
						$level = $row['level']; 
						$campus = $row['campus']; 
						$fees = $row['fees']; 
						$ac = $row['ac']; 
					
				?>
					<div class="col-lg-2 col-6">

					<div class="small-box bg-info">
					<div class="inner">
					<h3><?php echo $room_no; ?></h3>
					<p>Total Seats <?php echo $seater; ?></p>
					</div>
					<div class="icon">
					<i class="far fa-bookmark"></i>
					</div>
					<a href="bookroom.php?roomid=<?php echo $id;?>" class="small-box-footer">
					More info <i class="fas fa-arrow-circle-right"></i>
					</a>
					</div>
					</div>

 
				 <?php 
						}
					}
				 ?>

</div>



 
</div>
</div>
</div>
</div>



</div>



<div class="row">

<div class="card col-lg-12 " >
<div class="card-header">
	<h3 class="card-title">
	 <i class="fas fa-chart-pie mr-1"></i>
		LDA Campus Rooms
	</h3>
	<div class="card-tools">
	 
	</div>
</div>
<div class="card-body">
<div class="tab-content p-0">


    <!--
<h5 class="mb-2 mt-4">---</h5> -->
<div class="row">


<?php

$allart_lda = "SELECT * FROM `rooms` WHERE campus = '2';";
  
 
$beds_lda = "SELECT * FROM `beds` WHERE campus = '2';";
$Bookedbeds_lda = "SELECT * FROM `beds` where status = 'Booked' AND campus = '2';";
 $Freebeds_lda = "SELECT * FROM `beds` where status = 'Free' AND campus = '2';";

$retval_lda=mysqli_query($conn, $allart_lda);
$bedscpunt_lda=mysqli_query($conn, $beds_lda);
$Bookedbedq_lda=mysqli_query($conn, $Bookedbeds_lda);
$Freebedq_lda=mysqli_query($conn, $Freebeds_lda);

 $totalrooms_lda = $retval_lda->num_rows;
 $totalbeds_lda = $bedscpunt_lda->num_rows;
 $totalbookedbeds_lda = $Bookedbedq_lda->num_rows;
 $totalFreebeds_lda = $Freebedq_lda->num_rows;
			 $retval_lda=mysqli_query($conn, $allart_lda);
			 //echo $retval->num_rows;
			 $i =1;
			 if ($retval_lda->num_rows > 0) {
				// Output data for each row
				
				 while ($row = mysqli_fetch_assoc($retval_lda)) {
					 $rec[] =$row; 
					 $id = $row['id'];
					 $room_no = $row['room_no']; 
					    $seater = $row['seater'];  
					 $level = $row['level']; 
					 $campus = $row['campus']; 
					 $fees = $row['fees']; 
					 $ac = $row['ac']; 
					
				?>
					<div class="col-lg-2 col-6">

					<div class="small-box bg-info">
					<div class="inner">
					<h3><?php echo $room_no; ?></h3>
					<p>Total Seats <?php echo $seater; ?></p>
					</div>
					<div class="icon">
					<i class="far fa-bookmark"></i>
					</div>
					<a href="bookroom.php?roomid=<?php echo $id;?>" class="small-box-footer">
					More info <i class="fas fa-arrow-circle-right"></i>
					</a>
					</div>
					</div>

 
				 <?php 
						}
					}
				 ?>

</div>



 
</div>
</div>
</div>
</div>




<div class="row">

<div class="card col-lg-12 " >
<div class="card-header">
	<h3 class="card-title">
	 <i class="fas fa-chart-pie mr-1"></i>
		Wapda Town Rooms
	</h3>
	<div class="card-tools">
	 
	</div>
</div>
<div class="card-body">
<div class="tab-content p-0">


    <!--
<h5 class="mb-2 mt-4">---</h5> -->
<div class="row">


<?php

$allart_wp = "SELECT * FROM `rooms` WHERE campus = '3';";
  
 
 $beds_wp = "SELECT * FROM `beds` WHERE campus = '3';";
 $Bookedbeds_wp = "SELECT * FROM `beds` where status = 'Booked' AND campus = '3';";
  $Freebeds_wp = "SELECT * FROM `beds` where status = 'Free' AND campus = '3';";
 
$retval_wp=mysqli_query($conn, $allart_wp);
$bedscpunt_wp=mysqli_query($conn, $beds_wp);
$Bookedbedq_wp=mysqli_query($conn, $Bookedbeds_wp);
$Freebedq_wp=mysqli_query($conn, $Freebeds_wp);
 
  $totalrooms_wp = $retval_wp->num_rows;
  $totalbeds_wp = $bedscpunt_wp->num_rows;
  $totalbookedbeds_wp = $Bookedbedq_wp->num_rows;
  $totalFreebeds_wp = $Freebedq_wp->num_rows;



			 $retval_wp=mysqli_query($conn, $allart_wp);
			 //echo $retval->num_rows;
			 $i =1;
			 if ($retval_wp->num_rows > 0) {
				// Output data for each row
				
				 while ($row = mysqli_fetch_assoc($retval_wp)) {
					 $rec[] =$row; 
					 $id = $row['id'];
					 $room_no = $row['room_no']; 
					    $seater = $row['seater']; 
					 $level = $row['level']; 
					 $campus = $row['campus']; 
					 $fees = $row['fees']; 
					 $ac = $row['ac']; 
					
				?>
					<div class="col-lg-2 col-6">

					<div class="small-box bg-info">
					<div class="inner">
					<h3><?php echo $room_no; ?></h3>
					<p>Total Seats <?php echo $seater; ?></p>
					</div>
					<div class="icon">
					<i class="far fa-bookmark"></i>
					</div>
					<a href="bookroom.php?roomid=<?php echo $id;?>" class="small-box-footer">
					More info <i class="fas fa-arrow-circle-right"></i>
					</a>
					</div>
					</div>

 
				 <?php 
						}
					}
				 ?>

</div>



 
</div>
</div>
</div>
</div>













</div>

<?php
	include("./include/footer.php");
?> 