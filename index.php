<?php
// error_reporting(1);
// error_reporting(E_ALL);
include("./include/header.php");
 

include("./include/lefnave.php");
//include("lmsfunctions.php");
	$totalbookedbeds = "";
	$totalrooms      = "";
	$totalbeds       = "";
 
	$totalFreebeds   = "";

 // Mustfa town
 // LDA 
 // Wpda Town
 
 $allart = "SELECT * FROM `rooms` WHERE campus IN (1, 2, 3);";
 $beds = "SELECT * FROM `beds`;";
 $Bookedbeds = "SELECT * FROM `beds` where status = 'booked';";
  $Freebeds = "SELECT * FROM `beds` where status = 'available';";
// $allart = "SELECT * FROM `research`;";
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
          <h1 class="m-0">Dashboard</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <a href="#">Home</a>
            </li>
            <li class="breadcrumb-item active">Main Dashboard </li>
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
      <div class="row">
        <div class="card col-lg-12 ">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-chart-pie mr-1"></i> UMT Hostels
            </h3>
            <div class="card-tools"></div>
          </div>
          <div class="card-body">
            <div class="tab-content p-0">
              <div class="col-md-4" style="float: left;" ;>
                <a href="mustfatowncampus.php">
                  <div class="card card-widget widget-user">
                    <div class="widget-user-header text-white" style="background: url('./dist/img/photo1.png') center center;">
                      <h3 class="widget-user-username text-right">Mustfa Town</h3>
                      <h5 class="widget-user-desc text-right">Boys</h5>
                    </div>
                    <div class="widget-user-image">
                      <img class="img-circle" src="./assets/img/umtlogo.png" alt="User Avatar" style="background-color: #fff;">
                    </div>
                    <div class="card-footer">
                      <div class="row">
                        <div class="col-sm-4 border-right">
                          <div class="description-block">
                            <h5 class="description-header">50</h5>
                            <span class="description-text">Rooms</span>
                          </div>
                        </div>
                        <div class="col-sm-4 border-right">
                          <div class="description-block">
                            <h5 class="description-header">142</h5>
                            <span class="description-text">Beds</span>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="description-block">
                            <h5 class="description-header">1</h5>
                            <span class="description-text">Building</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <!-- Next colmd4 --->
              <div class="col-md-4" style="float: left;" ;>
                <a href="ldacampus.php">
                  <div class="card card-widget widget-user">
                    <div class="widget-user-header text-white" style="background: url('./dist/img/photo1.png') center center;">
                      <h3 class="widget-user-username text-right">LDA</h3>
                      <h5 class="widget-user-desc text-right">Boys</h5>
                    </div>
                    <div class="widget-user-image">
                      <img class="img-circle" src="./assets/img/umtlogo.png" alt="User Avatar" style="background-color: #fff;">
                    </div>
                    <div class="card-footer">
                      <div class="row">
                        <div class="col-sm-4 border-right">
                          <div class="description-block">
                            <h5 class="description-header">30</h5>
                            <span class="description-text">Rooms</span>
                          </div>
                        </div>
                        <div class="col-sm-4 border-right">
                          <div class="description-block">
                            <h5 class="description-header">80</h5>
                            <span class="description-text">Beds</span>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="description-block">
                            <h5 class="description-header">1</h5>
                            <span class="description-text">Building</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <!-- Next colmd4 --->
              <div class="col-md-4" style="float: left;" ;>
                <a href="wapdatowncampus.php">
                  <div class="card card-widget widget-user">
                    <div class="widget-user-header text-white" style="background: url('./dist/img/photo1.png') center center;">
                      <h3 class="widget-user-username text-right">Wpda Town</h3>
                      <h5 class="widget-user-desc text-right">Boys</h5>
                    </div>
                    <div class="widget-user-image">
                      <img class="img-circle" src="./assets/img/umtlogo.png" alt="User Avatar" style="background-color: #fff;">
                    </div>
                    <div class="card-footer">
                      <div class="row">
                        <div class="col-sm-4 border-right">
                          <div class="description-block">
                            <h5 class="description-header">25</h5>
                            <span class="description-text">Rooms</span>
                          </div>
                        </div>
                        <div class="col-sm-4 border-right">
                          <div class="description-block">
                            <h5 class="description-header">100</h5>
                            <span class="description-text">Beds</span>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="description-block">
                            <h5 class="description-header">1</h5>
                            <span class="description-text">Building</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <!-- Next colmd4 --->
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