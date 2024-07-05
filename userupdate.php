<?php
error_reporting(E_ALL);
include("./include/header.php");

$user_reg = $_GET['id'];
$allart = "SELECT * FROM `userregistration` WHERE id = {$user_reg}";

include("./include/lefnave.php");

$rec = array();

$retval = mysqli_query($conn, $allart);

if (mysqli_num_rows($retval) > 0) {
    // Output data for each row
    while ($row = mysqli_fetch_assoc($retval)) {
        $rec[] = $row;
        $id = $row['id'];
        $regNo = $row['regNo'];
        $fullname = $row['firstName'] . $row['middleName'] . $row['lastName'];
        $contactNo = $row['contactNo'];
        $email = $row['email'];
        $gender = $row['gender'];
        $contactNo = $row['contactNo'];
        $emergencyContact = $row['emergencyContact'];
        $cnic = $row['cnic'];
        $city = $row['city'];
        $password = $row['password'];
        $GuardianName = $row['GuardianName'];
        $GuardianCnic = $row['GuardianCnic'];
        $address = $row['address'];
        $Disability = $row['Disability'];
    }
}
?>

<div class="content-wrapper">
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
              <i class="fas fa-chart-pie mr-1"></i> Update User
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
			 if (mysqli_num_rows($retval) > 0) {
				// Output data for each row
				
				 while ($row = mysqli_fetch_assoc($retval)) {
					 $rec[] =$row; 
                     $id = $row['id'];
                     $regNo = $row['regNo'];
                     $fullname = $row['firstName'].$row['lastName'];
                     $contactNo = $row['contactNo']; 
                     $email = $row['email']; 
                     $gender = $row['gender'];
                     $contactNo = $row['contactNo'];
                     $emergencyContact = $row['emergencyContact'];
                     $cnic = $row['cnic'];
                     $city = $row['city'];
                     $password = $row['password'];
                     $GuardianName = $row['GuardianName'];
                     $GuardianCnic = $row['GuardianCnic'];
                     $address = $row['address'];
                     $Disability = $row['Disability'];
          
						}
					}
				 ?>
              </div>
              <div class="col-md-12">
                 
              
                <div class="card card-warning">
                  <div class="card-header">
                    <h3 class="card-title">Update User</h3>
                  </div>
                  <div class="card-body">
                    <form id="add-user" action="userlist.php" method="POST">
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Student ID</label>
                            <input type="hidden" name="id"  value="<?php echo $id; ?>" >
                            <input type="text" name="regNo" class="form-control" placeholder="Enter ..." value="<?php echo $regNo; ?>">
                          </div>
                        </div>
						<div class="col-sm-4">
                          <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="firstName" class="form-control" placeholder="Enter ..."  value="<?php echo $fullname ; ?>">
                          </div>
                        </div>
						<div class="col-sm-4">
                          <div class="form-group">
                            <label>CNIC</label>
                            <input type="text" name="cnic" class="form-control" placeholder="Enter ..."  value="<?php echo $cnic; ?>">
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
                            <input type="text" name="contactNo" class="form-control" placeholder="030063000000"  value="<?php echo $contactNo; ?>" >
                          </div>
                        </div>
						
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Father/ Guardian’s Name </label>
                            <input type="text" name="GuardianName" class="form-control" placeholder="Enter Name"  value="<?php echo $GuardianName; ?>">
                          </div>
                        </div>
						
						
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Father/ Guardian’s CNIC </label>
                            <input type="text" name="GuardianCnic"  class="form-control" placeholder="Enter CNIC" value="<?php echo $GuardianCnic; ?>">
                          </div>
                        </div>
						 <div class="col-sm-4">
                          <div class="form-group">
                            <label>Emergency Contact #</label>
                            <input type="text" name="emergencyContact"  class="form-control" placeholder="" value="<?php echo $emergencyContact; ?>">
                          </div>
                        </div>
						
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Any Disability  </label>
                            <input type="text" name="Disability" class="form-control" placeholder="Disability" value="<?php echo $Disability; ?>">
                          </div>
                        </div>
						
						
						<div class="col-sm-4">
                          <div class="form-group">
                            <label>City</label>
                            <input type="text" name="city" class="form-control" placeholder="Enter ..." value="<?php echo $city; ?>">
                          </div>
                        </div>
					 
						 
						<div class="col-sm-4">
                          <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" id="email"  onChange="checkemail(this.value);" class="form-control" placeholder="s2023000000@umt.edu.pk" value="<?php echo $email; ?>">
							 <div id="uniqueemail" class="invalid-feedback">Please Enter Unique Email</div>
                          </div>
                        </div>
						 
						 
						<div class="col-sm-4">
                          <div class="form-group">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control" placeholder="Enter Password" value="<?php echo $password; ?>">
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
                            <textarea class="form-control" name="address" rows="3" placeholder="Address" value="<?php echo $address; ?>"></textarea>
                          </div>
                        </div>
						
						
						
						
						
                      </div>
                      
                      <div class="row">
                      
						 
					
					 
                      </div>
					  
					  
                      <div class="row">
                      
					 
						 
						
						 <button type="submit" id="add-user2" class="btn btn-block btn-primary btn-sm" style="width: 150px; float: right;">Update</button>
						 
					 
                      </div>
					  
					  
					  
					 
                    </form>

                    <?php


  if(isset($_POST['submit'])){

                    $id = $_POST['id'];
                     $regNo = $_POST['regNo'];
                     $fullname = $_POST['firstName'].$_POST['middleName'].$_POST['lastName'];;
                     $contactNo = $_POST['contactNo']; 
                     $email = $_POST['email']; 
                     $gender = $_POST['gender'];
                     $contactNo = $_POST['contactNo'];
                     $emergencyContact = $_POST['emergencyContact'];
                     $cnic = $_POST['cnic'];
                     $city = $_POST['city'];
                     $password = $row['password'];
                     $GuardianName = $_POST['GuardianName'];
                     $GuardianCnic = $_POST['GuardianCnic'];
                     $address = $_POST['address'];
                     $Disability = $_POST['Disability'];

    $sql = "UPDATE `userregistration` SET `id`='$id',`regNo`='$regNo',`firstName`='$fullname',`middleName`='$fullname',`lastName`='$fullname',`gender`='$gender',`contactNo`='$contactNo',`emergencyContact`=' $emergencyContact',`cnic`='$cnic',`city`='$city',`email`='$email',`password`='$password',`GuardianName`=' $GuardianName',`GuardianCnic`='$GuardianCnic',`address`='$address',`Disability`='$Disability' WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo '<div class="alert alert-success" role="alert"> Record Updated successfully </div>';
      } else {
          echo "Error inserting record: " . mysqli_error($conn);
      }
   

    }


?>  


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
