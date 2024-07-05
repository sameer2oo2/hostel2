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
          <h1 class="m-0"> Rooms</h1>
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
              <i class="fas fa-chart-pie mr-1"></i> Add Room
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
          <div class="card-body">
            <div class="tab-content p-0">
              <!--<h5 class="mb-2 mt-4">---</h5> -->
              <div class="row">
                
                </div> 
                
              </div>
              <div class="col-md-12">
                 
              
                <div class="card card-warning">
                  <!--<div class="card-header">
                    <h3 class="card-title">Bed No.</h3>
                  </div>  -->
                  <div class="card-body">
                    <form id="bookBedForm" action="addroom.php"  method="post">
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
                            <label>Level</label>
                            <input type="text" name="level" class="form-control" placeholder="1">
                          </div>
                        </div>
						
						
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Seats</label>
                            <input type="Number" name="seater" class="form-control" placeholder="0" >
                          </div>
                        </div>
						
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Fees</label>
                            <input type="Number" name="fees" class="form-control" placeholder="0" >
                          </div>
                        </div>
						
                
					 
						 
					 
						  <div class="col-sm-6">
                          <div class="form-group">
                            <div class="form-check">
						 
                              <input class="form-check-input" type="checkbox" name="acrequired" value="1">
                              <label class="form-check-label">ac</label>
                            </div>
                            </div>
                          </div>


                        
					 
                      </div>

                      <div class="row">
                        <div class="col-sm-12">
                        <div class="form-group">
                    <input type="submit" name="submit" value="submit"> 
                  </div>
                  </div>
        </div>
                     
                     

        <?php

  if(isset($_POST['submit'])){

    $campus = $_POST['campus'];
    $roomName = $_POST['room_no'];
    $level = $_POST['level'];
    $seater =  $_POST['seater'];
    $fees = $_POST['fees'];
    $ac = isset($_POST['acrequired']);

    $sql = "INSERT INTO `rooms`( `campus`, `room_no`, `level`, `seater`  , `fees`, `ac`) VALUES ('$campus','$roomName','$level','$seater','$fees', '$ac')";

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
          </div>
        </div>
      </div>
    </div>
    <div class="row"></div>
</div>
</section>



</div> <?php
	include("./include/footer.php");
?>

<script>

$(document).ready(function () {
    // Attach an event listener to a button or use another trigger to initiate the AJAX request.
    $('#load-data-button').click(function () {
        $.ajax({
            url: './include/addroomrequest.php', // The PHP script that will fetch and return data
            method: 'GET', // or 'POST', depending on your needs
            dataType: 'json', // The expected data type of the response
            success: function (data) {
                // Handle the data returned from the server
                if (data.length > 0) {
                    var table = $('#data-table tbody');
                    table.empty(); // Clear existing data
                    
                    // Loop through the data and append it to the table
                    $.each(data, function (index, item) {
                        table.append('<tr><td>' + item.name + '</td><td>' + item.email + '</td></tr>');
                        // Add more columns as needed
                    });
                } else {
                    // Handle the case where no data is returned
                }
            },
            error: function (xhr, status, error) {
                // Handle any errors that occur during the request
            }
        });
    });
});

</script>