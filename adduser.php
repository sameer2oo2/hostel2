<?php
error_reporting(1);
error_reporting(E_ALL);
include("./include/header.php");


 
	  $allart = "SELECT * FROM `rooms` WHERE campus = '1';";
 
include("./include/lefnave.php");




	
?> <div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"> </h1>
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
              <i class="fas fa-chart-pie mr-1"></i> User
            </h3>
            <!--<div class="card-tools">-->
        
          </div>
          <div class="card-body">
            <div class="tab-content p-0">
              <!--<h5 class="mb-2 mt-4">---</h5> -->
              <div class="row">
               
                </div> <?php
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
          
						}
					}
				 ?>
              </div>
              <div class="col-md-12">
                 
              
                <div class="card card-warning">
                  <div class="card-header">
                    <h3 class="card-title">Add User</h3>
                  </div>
                  <div class="card-body">
                    <form id="add-user" action="" method="POST">
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Student ID</label>
                            <input type="text" name="regNo" class="form-control" placeholder="Enter ...">
                          </div>
                        </div>
						<div class="col-sm-4">
                          <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="firstName" class="form-control" placeholder="Enter ...">
                          </div>
                        </div>
						<div class="col-sm-4">
                          <div class="form-group">
                            <label>CNIC</label>
                            <input type="text" name="cnic" class="form-control" placeholder="Enter ...">
                          </div>
                        </div>
						
			 
						<div class="col-sm-4">
						<div class="form-group">
						  <label>Gender</label>
							<div class="form-check">
							<input class="form-check-input" type="radio" name="gender" value="Male">
							<label class="form-check-label">Male </label>
						 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input class="form-check-input" type="radio" name="gender"  value="Female">
							<label class="form-check-label">Female</label>
							</div>
					 
						</div>
						</div>
				 
						
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" name="contactNo" class="form-control" placeholder="030063000000" >
                          </div>
                        </div>
						
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Father/ Guardian’s Name </label>
                            <input type="text" name="GuardianName" class="form-control" placeholder="Enter Name" >
                          </div>
                        </div>
						
						
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Father/ Guardian’s CNIC </label>
                            <input type="text" name="GuardianCnic"  class="form-control" placeholder="Enter CNIC" >
                          </div>
                        </div>
						 <div class="col-sm-4">
                          <div class="form-group">
                            <label>Emergency Contact #</label>
                            <input type="text" name="emergencyContact"  class="form-control" placeholder="" >
                          </div>
                        </div>
						
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Any Disability  </label>
                            <input type="text" name="Disability" class="form-control" placeholder="Disability" >
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
                            <label>Email</label>
                            <input type="email" name="email" id="email"  onChange="checkemail(this.value);" class="form-control" placeholder="s2023000000@umt.edu.pk" >
							 <div id="uniqueemail" class="invalid-feedback">Please Enter Unique Email</div>
                          </div>
                        </div>
						 
						 
						<div class="col-sm-4">
                          <div class="form-group">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control" placeholder="Enter Password" >
                          </div>
                        </div>
						 
					 
						
						 
					 
                      </div>
                      <div class="row">
                       
                       <!--
							 <div class="col-sm-4">
							<div class="form-group">
								<label>Taking any Medicine on a Regular Basis (if yes, please give details)</label>
								<input type="text" name="Disability" class="form-control" placeholder="Enter ..." >
                          </div>
                        </div>
						 -->
				  <div class="col-sm-4">
                          <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" name="address" rows="3" placeholder="Address"></textarea>
                          </div>
                        </div>
						
						
						
						
						
                      </div>
                      
                      <div class="row">
                      
						 
					
					 
                      </div>
					  
					  
                      <div class="row">
                      
					 
						 
						
						 <button type="submit" id="add-user2" class="btn btn-block btn-primary btn-sm" style="width: 150px; float: right;">Submit</button>
						 
					 
                      </div>
					  
					  
					  
					 
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
			 
	$(document).ready(function() {
				console.log(655);
    $("#add-user").submit(function(event) {
				console.log(655);
        event.preventDefault();
        const formData = $(this).serialize();
		console.log(formData);

        $.ajax({
            type: "post",
            url: "include/insert_user.php",
            data: formData,
            success: function(responseData, textStatus, jqXHR) {
				  console.log(responseData);
                $("#message").text("Record inserted successfully.");
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $("#message").text("Error occurred.");
                console.log(errorThrown);
            }
        });
    });
   

		
		
		
		});
     		function checkemail(email){
			 
			console.log(email);
			var email =document.getElementById('email').value;
			var request = $.ajax({
			  url: "./include/checkemail.php",
			  type: "POST",
			  data: {email:email},
			  dataType: "html"
			});

			request.done(function(msg) {
			  // $("#log").html( msg );
			  console.log(msg);
			  if(msg == 1){
				  console.log(1);
				  document.getElementById('uniqueemail').style.display = "block"
				  
			  }else{
				  console.log(0);
				   document.getElementById('uniqueemail').style.display = "none"
			  }
			});

			request.fail(function(jqXHR, textStatus) {
			   console.log(858);
			});
			
		}

</script>