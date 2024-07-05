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

			
			 while ($row = mysqli_fetch_assoc($bedscpunt)) {
				$rec[] = $row;
				$bed_no = isset($row['bed_no']) ? $row['bed_no'] : 'N/A';
				$room_no = isset($row['roomno']) ? $row['roomno'] : 'N/A'; // Add this line to get the room number
				
				
				// Check if the bed belongs to the desired campus (e.g., campus ID is 1)
				if (isset($row['campus']) && in_array($row['campus'], array(1, 2, 3))) {
				  echo '<div class="col-md-1 col-sm-3 col-4" style="text-align: center;">';
					
					if (isset($row['status'])) {
						$status = $row['status'];
			  
						// Apply different styles based on the status
						if ($status == "1") {
							echo '<div class="info-box bg-fuchsia" ';
						} else {
							echo '<div class="info-box bg-green">';
						}
					} else {
						// Handle the case where $_POST['status' . $bed_no] is not set
						echo '<div class="info-box">';
					}
			  
					echo '<span class="info-box-icon" style="font-size: x-large;">';
					echo '<i class="fa fa-bed"><br>' . $bed_no  . '<br />';
					// echo 'Room: ' . $room_no . '<br />'; // Display the room number
					echo '<div class="fa fa-wifi" style="font-size:10px" ></div>&nbsp;';
					echo '<div class="fa fa-lightbulb" style="font-size:10px"></div>&nbsp;';
					echo '<div class="fa fa-hamburger" style="font-size:10px"></div>&nbsp;';
					echo '</i></span></div></div>';
			  
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
 
                
 while ($row = mysqli_fetch_assoc($bedscpunt_lda)) {
   $rec[] = $row;
   $bed_no = isset($row['bed_no']) ? $row['bed_no'] : 'N/A';
   $room_no = isset($row['roomno']) ? $row['roomno'] : 'N/A'; // Add this line to get the room number
   
   
   // Check if the bed belongs to the desired campus (e.g., campus ID is 1)
   if (isset($row['campus']) && in_array($row['campus'], array(1, 2, 3))) {
	 echo '<div class="col-md-1 col-sm-3 col-4" style="text-align: center;">';
	   
	   if (isset($row['status'])) {
		   $status = $row['status'];
 
		   // Apply different styles based on the status
		   if ($status == "1") {
			   echo '<div class="info-box bg-fuchsia" ';
		   } else {
			   echo '<div class="info-box bg-green">';
		   }
	   } else {
		   // Handle the case where $_POST['status' . $bed_no] is not set
		   echo '<div class="info-box">';
	   }
 
	   echo '<span class="info-box-icon" style="font-size: x-large;">';
	   echo '<i class="fa fa-bed"><br>' . $bed_no  . '<br />';
	   // echo 'Room: ' . $room_no . '<br />'; // Display the room number
	   echo '<div class="fa fa-wifi" style="font-size:10px" ></div>&nbsp;';
	   echo '<div class="fa fa-lightbulb" style="font-size:10px"></div>&nbsp;';
	   echo '<div class="fa fa-hamburger" style="font-size:10px"></div>&nbsp;';
	   echo '</i></span></div></div>';
 
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



  while ($row = mysqli_fetch_assoc($bedscpunt_wp)) {
	$rec[] = $row;
	$bed_no = isset($row['bed_no']) ? $row['bed_no'] : 'N/A';
	$room_no = isset($row['roomno']) ? $row['roomno'] : 'N/A'; // Add this line to get the room number
	
	
	// Check if the bed belongs to the desired campus (e.g., campus ID is 1)
	if (isset($row['campus']) && in_array($row['campus'], array(1, 2, 3))) {
	  echo '<div class="col-md-1 col-sm-3 col-4" style="text-align: center;">';
		
		if (isset($row['status'])) {
			$status = $row['status'];
  
			// Apply different styles based on the status
			if ($status == "1") {
				echo '<div class="info-box bg-fuchsia" ';
			} else {
				echo '<div class="info-box bg-green">';
			}
		} else {
			// Handle the case where $_POST['status' . $bed_no] is not set
			echo '<div class="info-box">';
		}
  
		echo '<span class="info-box-icon" style="font-size: x-large;">';
		echo '<i class="fa fa-bed"><br>' . $bed_no  . '<br />';
		// echo 'Room: ' . $room_no . '<br />'; // Display the room number
		echo '<div class="fa fa-wifi" style="font-size:10px" ></div>&nbsp;';
		echo '<div class="fa fa-lightbulb" style="font-size:10px"></div>&nbsp;';
		echo '<div class="fa fa-hamburger" style="font-size:10px"></div>&nbsp;';
		echo '</i></span></div></div>';
  
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