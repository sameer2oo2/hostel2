<?php
error_reporting(1);
error_reporting(E_ALL);
include("./include/header.php");
include("./include/lefnave.php");


 
	 $allart = "SELECT * FROM `rooms` WHERE campus = '1';";
  
 
 $beds = "SELECT * FROM `beds` WHERE campus = '1';";
 $Bookedbeds = "SELECT * FROM `beds` where status = 'booked' AND campus = '1';";
  $Freebeds = "SELECT * FROM `beds` where status = 'available' AND campus = '1';";
 
$retval=mysqli_query($conn, $allart);
$bedscpunt=mysqli_query($conn, $beds);
$Bookedbedq=mysqli_query($conn, $Bookedbeds);
$Freebedq=mysqli_query($conn, $Freebeds);
 
  $totalrooms = $retval->num_rows;
  $totalbeds = $bedscpunt->num_rows;
  $totalbookedbeds = $Bookedbedq->num_rows;
  $totalFreebeds = $Freebedq->num_rows;



	
?> 

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Mustfa Town</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <a href="#">Home</a>
            </li>
            <li class="breadcrumb-item active">Mustfa Town </li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3>   <?php echo $totalrooms;?> </h3>
              <p>Total Rooms</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="totalroom.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <h3>  
                <!--<sup style="font-size: 20px">%</sup> --> <?php echo $totalbeds;?>
              </h3>
              <p>Total Beds</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="totalbed.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>   <?php echo $totalbookedbeds; ?> </h3>
              <p>Booked</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="bookedbed.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-danger">
            <div class="inner">
              <h3> <?php echo $totalFreebeds;?> </h3>
              <p>Available </p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="availablebed.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
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
					<a href="bookbed.php?roomid=<?php echo $id;?>" class="small-box-footer">
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
<!--
<section class="col-lg-12 connectedSortable">

 

<div class="card">
<div class="card-header">
<h3 class="card-title">Course Views</h3>
</div>

<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>Id</th>
<th>Name</th>
<th>Format</th>
<th>Activities </th>
<th>Start Date</th>
<th>End Date</th>
<th>Views</th>

</tr>
</thead>
<tbody>


 
<tr>
<td>346</td>
<td><a href="sd.php?courseid=<?php //echo $courseid; ?>&ccoursename=<?php// echo $FullName;?>">6767</a>
</td>
<td>3463</td>
<td>3636</td>
<td> 5636</td>
<td> vdfgh</td>
<td>45345</td>
</tr>
 
 
</tbody>
<tfoot>
<tr>
<th>Id</th>
<th>Name</th>
 <th>Formate</th>
 <th>Activities </th>
<th>Start Date</th>
<th>End Date</th>
<th>Views</th>
</tr>
</tfoot>
</table>
</div>

</div>

</section>
-->
<!--
<section class="col-lg-5 connectedSortable">

</section>
-->
</div>

</div>
</section>

</div>

<?php
	include("./include/footer.php");
?> 