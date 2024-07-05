<?php
error_reporting(1);
error_reporting(E_ALL);
include("./include/header.php");

$allart = "SELECT * FROM `rooms`;";
 
include("./include/lefnave.php");




	
?> <div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"> Beds </h1>
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
              <i class="fas fa-chart-pie mr-1"></i> Add Bed
            </h3>
            <!--<div class="card-tools">-->
            <!--
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
            </div>  -->
          </div>
          </div>
              <div class="col-md-12">
                 
              
                <div class="card card-warning">
                  <div class="card-header">
                    <h3 class="card-title">Add Bed</h3>
                  </div>
                  <div class="card-body">
                    <form id="add-user" action="addbed.php" method="POST" onsubmit="disableButton()">
                      <div class="row">
						 

					

            <div class="col-sm-4">
                          <div class="form-group">
						 
							<label>Campus</label>
								<select class="form-control" name="campus" id="campus">
								<option value="1">Mustfa Town</option>
								<option value="2" >LDA</option>
								<option value="3">Wapda Town</option>
								
							</select>
						 
							</div>
                        </div>

                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Room No</label>
                            <input type="text" name="room_no" class="form-control" placeholder="Enter ...">
                          </div>
                        </div>

                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Bed No</label>
                            <input type="text" name="bed_no" class="form-control" placeholder="Enter ...">
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
                          <label>Status</label>
                            <select class="form-control" name="status" id="status">
                            <option value="available">Availaible</option>
                            <option value="booked" >Booked</option>
                            </select>					 
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


    $room_no = $_POST['room_no'];
    $bed_no  = $_POST['bed_no'];
    $fee = $_POST['fee'];
    $campus = $_POST['campus'];
    $status = isset($_POST['status']);
      
    $sql = "INSERT INTO `beds`(`roomno`,`bed_no`, `fee`, `campus`, `status`) VALUES ('$room_no','$bed_no',' $fee','$campus','$status')";

    if (mysqli_query($conn, $sql)) {
        echo '<div class="alert alert-success" role="alert"> Record inserted successfully </div>';
      } else {
          echo "Error inserting record: " . mysqli_error($conn);
    }
   

  }
mysqli_close($conn);
?>  
                </div>
                 
              </div>
			  
			  
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row"></div>
</div>
</section>
</div>




<?php
	include("./include/footer.php");
?>
