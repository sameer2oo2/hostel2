<?php
error_reporting(1);
error_reporting(E_ALL);
include("./include/header.php");

$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id === null) {
    // Handle the case where room ID is not provided
    echo "Room ID is missing.";
}
$roomQuery = "SELECT * FROM `rooms` WHERE campus IN (1,2,3) AND id = '$id';";
$roomResult = mysqli_query($conn, $roomQuery);

if ($roomResult && mysqli_num_rows($roomResult) > 0) {
    $roomRow = mysqli_fetch_assoc($roomResult);

    // Extract relevant room details
    $room_no = $roomRow['room_no'];
    $campus = $roomRow['campus'];

    // Fetch bed information for the specified room and campus
    $beds = "SELECT * FROM `beds` WHERE campus = '$campus' AND roomno = '$room_no';";
    $bedscpunt = mysqli_query($conn, $beds);

    // Rest of your code...


	  $allart = "SELECT * FROM `rooms` WHERE campus IN (1,2,3)";
    $Bookedbeds = "SELECT * FROM `beds` where status = 'Booked';";
     $Freebeds = "SELECT * FROM `beds` where status = 'Available';";

     $retval=mysqli_query($conn, $allart);     
$Bookedbedq=mysqli_query($conn, $Bookedbeds);
$Freebedq=mysqli_query($conn, $Freebeds);


 
include("./include/lefnave.php");


	
?> <div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"> Bed</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <a href="#">Home</a>
            </li>
            <li class="breadcrumb-item active">.. </li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="card col-lg-12 ">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-chart-pie mr-1"></i> Book Bed
            </h3>
            <!--<div class="card-tools">-->
            <div class=" ">
              <div class="row d-flex flex-row-reverse" style="padding-top: 10px;">
                <div class="col-md-1 col-sm-1 col-1"> Available </div>
                <div class="col-md-1 col-sm-1 col-1" style="padding-left: 10px;  padding-right: 10px;">
                  <div class="info-box bg-fuchsia" style="    border-radius: 0px;   min-height: 100%;"></div>
                </div>
                <div class="col-md-1 col-sm-1 col-1"> Reserved </div>
                <div class="col-md-1 col-sm-1 col-1">
                  <div class="info-box bg-success " style="border-radius: 0px;   min-height: 100%;"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="tab-content p-0">
              <!--<h5 class="mb-2 mt-4">---</h5> -->
              <div class="row">
                <?php

                
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
          if ($status == "available") {
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
                <!-- <div class="col-md-1 col-sm-3 col-4" >
                  <div class="info-box bg-fuchsia" onclick="getBedDetails(102)">
                    <span class="info-box-icon " style="font-size: x-large;">
                      <i class="fa fa-bed "> 102 <br />
                        <div class="fa fa-wifi" style="font-size:10px"></div>
                        <div class="fa fa-lightbulb" style="font-size:10px"></div>
                        <div class="fa fa-hamburger" style="font-size:10px"></div>
                      </i>
                    </span>
                  </div>
                </div>
                <div class="col-md-1 col-sm-3 col-4">
                  <div class="info-box bg-fuchsia" onclick="getBedDetails(103)">
                    <span class="info-box-icon " style="font-size: x-large;">
                      <i class="fa fa-bed "> 103 <br />
                        <div class="fa fa-wifi" style="font-size:10px"></div>
                        <div class="fa fa-lightbulb" style="font-size:10px"></div>
                        <div class="fa fa-hamburger" style="font-size:10px"></div>
                      </i>
                    </span>
                  </div>
                </div>
                <div class="col-md-1 col-sm-3 col-4">
                  <div class="info-box bg-fuchsia" onclick="getBedDetails(104)">
                    <span class="info-box-icon " style="font-size: x-large;">
                      <i class="fa fa-bed "> 104 <br />
                        <div class="fa fa-wifi" style="font-size:10px"></div>
                        <div class="fa fa-lightbulb" style="font-size:10px"></div>
                        <div class="fa fa-hamburger" style="font-size:10px"></div>
                      </i>
                    </span>
                  </div>  
                </div>
                <div class="col-md-1 col-sm-3 col-4">
                  <div class="info-box bg-fuchsia" onclick="getBedDetails(105)">
                    <span class="info-box-icon " style="font-size: x-large;">
                      <i class="fa fa-bed "> 105 <br />
                        <div class="fa fa-wifi" style="font-size:10px"></div>
                        <div class="fa fa-lightbulb" style="font-size:10px"></div>
                        <div class="fa fa-hamburger" style="font-size:10px"></div>
                      </i>
                    </span>
                  </div>
                </div>
                <div class="col-md-1 col-sm-3 col-4">
                  <div class="info-box bg-fuchsia" onclick="getBedDetails(106)">
                    <span class="info-box-icon " style="font-size: x-large;">
                      <i class="fa fa-bed "> 106 <br />
                        <div class="fa fa-wifi" style="font-size:10px"></div>
                        <div class="fa fa-lightbulb" style="font-size:10px"></div>
                        <div class="fa fa-hamburger" style="font-size:10px"></div>
                      </i>
                    </span>
                  </div>
                </div>
                <div class="col-md-1 col-sm-3 col-4">
                  <div class="info-box bg-fuchsia" onclick="getBedDetails(107)">
                    <span class="info-box-icon " style="font-size: x-large;">
                      <i class="fa fa-bed "> 107 <br />
                        <div class="fa fa-wifi" style="font-size:10px"></div>
                        <div class="fa fa-lightbulb" style="font-size:10px"></div>
                        <div class="fa fa-hamburger" style="font-size:10px"></div>
                      </i>
                    </span>
                  </div>
                </div>
                <div class="col-md-1 col-sm-3 col-4">
                  <div class="info-box bg-fuchsia" onclick="getBedDetails(108)">
                    <span class="info-box-icon " style="font-size: x-large;">
                      <i class="fa fa-bed "> 108 <br />
                        <div class="fa fa-wifi" style="font-size:10px"></div>
                        <div class="fa fa-lightbulb" style="font-size:10px"></div>
                        <div class="fa fa-hamburger" style="font-size:10px"></div>
                      </i>
                    </span>
                  </div>
                </div>
                <div class="col-md-1 col-sm-3 col-4">
                  <div class="info-box bg-fuchsia" onclick="getBedDetails(109)">
                    <span class="info-box-icon " style="font-size: x-large;">
                      <i class="fa fa-bed "> 109 <br />
                        <div class="fa fa-wifi" style="font-size:10px"></div>
                        <div class="fa fa-lightbulb" style="font-size:10px"></div>
                        <div class="fa fa-hamburger" style="font-size:10px"></div>
                      </i>
                    </span>
                  </div>
                </div> -->
<!-- 
                <?php

			//  $retval=mysqli_query($conn, $allart);
       
			//  //echo $retval->num_rows;
			//  if ($retval->num_rows > 0) {
			// 	// Output data for each row
				
			// 	 while ($row = mysqli_fetch_assoc($retval)) {
			// 		 $rec[] =$row; 
      //      $id = $row['id'];
			// 		 $room_no = $row['room_no']; 
			//     $seater = $row['seater'];  
			// 		 $level = $row['level']; 
			// 		 $campus = $row['campus']; 
			// 		 $fees = $row['fees']; 
			// 		 $ac = $row['ac']; 
					
      //      $allart = "SELECT * FROM `rooms` WHERE campus IN (1,2,3) AND room_no = 'roomno';";
				 
			// 			}
			// 		}
      //     $totalrooms = $retval->num_rows;
      //     $totalbeds = $bedscpunt->num_rows;
      //     $totalbookedbeds = $Bookedbedq->num_rows;
      //     $totalFreebeds = $Freebedq->num_rows;

				 ?> -->



              </div>

              <div class="col-md-12">
                 
              
                <div class="card card-warning">
                  <div class="card-header">
                    <h3 class="card-title">Bed No.<span id="booking"> </span></h3>
                  </div>
                  <div class="card-body">
                    <form id="bookBedForm" action="bookbed.php"method="post" >
                       <div class="row">
 
                         <div class="col-sm-4">
                           <div class="form-group">
                             <label>Room No</label>
                             <input type="text" name="roomno" class="form-control" placeholder="Enter ..." value="<?php echo isset($room_no) ? $room_no : 'N/A'; ?>" readonly>
                              </div>
                           </div>
             
                         <div class="col-sm-4">
                           <div class="form-group">
                             <label>Bed No</label>
                             <input type="text" name="bed_no" class="form-control" placeholder="Enter ..." value="<?php echo isset($bed_no) ? $bed_no : 'N/A'; ?>" readonly>
                              </div>
                           </div>
             
                         <div class="col-sm-4">
                           <div clas  s="form-group">
                             <label>Student ID</label>
                             <input type="text" name="studentid" class="form-control" placeholder="Enter ...">
                           </div>
                         </div>
 
                         <div class="col-sm-4">
                           <div class="form-group">
                             <label>Name</label>
                             <input type="text" name="name" class="form-control" placeholder="Enter ...">
                           </div>
                         </div>
 
                         <div class="col-sm-4">
                           <div class="form-group">
                             <label>Mobile</label>
                             <input type="text" name="contactno" class="form-control" placeholder="030063000000" >
                           </div>
                         </div>
             
                         <div class="col-sm-4">
                           <div class="form-group">
                             <label>Father/ Guardian’s Name </label>
                             <input type="text" name="guardianName" class="form-control" placeholder="Enter Name" >
                           </div>
                         </div>
             
             
                         <div class="col-sm-4">
                           <div class="form-group">
                             <label>Father/ Guardian’s Contact </label>
                             <input type="text" name="guardianContactno"  class="form-control" placeholder="Enter CNIC" >
                           </div>
                         </div>
           
             <div class="col-sm-4">
                           <div class="form-group">
                             <label>City</label>
                             <input type="text" name="city" class="form-control" placeholder="Enter ..." >
                           </div>
                         </div>
            
           
                         <div class="col-sm-4">
                           <div class="form-group">
                             <label>Fees</label>
                             <input type="text" name="fee" class="form-control" placeholder="Enter ...">
                           </div>
                         </div>
 
                       <div class="col-sm-4">
                           <div class="form-group">
                             <label>Duration</label>
                             <input type="text" name="duration" class="form-control" placeholder="Enter ...">
                           </div>
                         </div>
 
                       <div class="col-sm-4">
                           <div class="form-group">
                             <label>Stay From</label>
                             <input type="date" name="stayfrom" class="form-control" placeholder="Enter ...">
                           </div>
                         </div>
 
                         <div class="col-sm-4">
                           <div class="form-group">
                             <label>Address</label>
                             <textarea class="form-control" name="address" rows="3" placeholder="Address"></textarea>
                           </div>
                         </div> 


 
                       </div>
             
                        <div class="row">
              <button type="submit" name="submit" id="add-user2" class="btn btn-block btn-primary btn-sm" style="width: 150px; float: right;">Submit</button>
                        </div>
                      </form>
                    </div>
 
                   <?php
 
   if(isset($_POST['submit'])){
 
 
     $room_no = $_POST['roomno'];
     $bed_no  = $_POST['bed_no'];
     $studentid = $_POST['studentid'];
     $name = $_POST['name'];
     $fee = $_POST['fee'];
     $stayfrom = $_POST['stayfrom'];
     $duration = $_POST['duration'];
     $contactno = $_POST['contactno'];
     $guardianName = $_POST['guardianName'];
     $guardianContactno = $_POST['guardianContactno'];
     $city = $_POST['city'];
     $address = $_POST['address'];

       
     $sql = "INSERT INTO `bookbed`(`roomno`,`bed_no`, `studentid`, `name`, `fee`, `stayfrom`, `duration`, `contactno`, `egycontactno`, `guardianName`, `city`, `address`) VALUES ('$room_no','$bed_no','$studentid','$name',' $fee','$stayfrom','$duration',' $contactno','$guardianName',' $guardianContactno','$city','$address')";
 
     if (mysqli_query($conn, $sql)) {
         echo '<div class="alert alert-success" role="alert"> Record inserted successfully </div>';
       } else {
           echo "Error inserting record: " . mysqli_error($conn);
     }

   }
   
   mysqli_close($conn);
 
 ?>  
 



                    </form>
                  </div>
                </div>
                </div>
                 
              </div>

              
			  <!--
              <form id="bookBedForm">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                      <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>. </label>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
			  -->
			  
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row"></div>
</div>



</section>
</div> <?php
}
	include("./include/footer.php");
?>



<script>
function getBedDetails(bedNo) {
    console.log(bedNo);
    document.getElementById('booking').innerHTML = bedNo;

    // Set the selected bed number in the hidden input field
    document.getElementById('selectedBed').value = bedNo;


    // document.getElementById('selectedBed').value = bedNo;


    // You can add additional code here to fetch and display bed details dynamically
}


</script>