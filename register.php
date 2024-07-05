<?php
// error_reporting(1);
// error_reporting(E_ALL);
	include("./include/config.php");
?>

<title> UMT</title>

<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="dist/css/adminlte.min2167.css?v=3.2.0">




<?php

  if(isset($_POST['register'])){

    $firstname = $_POST['firstname'];
    $contact = $_POST['contact'];
    $gender =  $_POST['gender'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $sql = "INSERT INTO `userregistration`(`firstName`, `contactNo`, `gender`, `email`, `password`) VALUES ('$firstname','$contact','$gender','$email','$pass')";

    if (mysqli_query($conn, $sql)) {
      echo '<div class="alert alert-success" role="alert"> Record inserted successfully </div>';
    } else {
        echo "Error inserting record: " . mysqli_error($conn);
    }

    
  }
  


  ?>


<div class="register-page ">
<div class="register-box">


<div class="card">
<div class="card-body register-card-body">
<img src="assets\img\umtlogo.png" height="100" width="100" class="rounded mx-auto d-block m-b-2" alt="UMT">
<br>
<h3 style="text-align: center">SIGNUP</h3>
<br>

<form action="register.php" method="post" >
<div class="input-group mb-3">
<input type="text" class="form-control" placeholder="First name" name="firstname">
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-user"></span>
</div>
</div>
</div>
<div class="input-group mb-3">
<input type="text" class="form-control" placeholder="Contact #" name="contact">
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-user"></span>
</div>
</div>
</div>


<div class="input-group mb-3">
<div class="col-12">
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

<div class="input-group mb-3">
<input type="email" class="form-control" placeholder="Email" name="email">
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-envelope"></span>
</div>
</div>
</div>
<div class="input-group mb-3">
<input type="password" class="form-control" placeholder="Password" name="pass">
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-lock"></span>
</div>
</div>
</div>

<div class="row">


<div class="col-4">
<button type="submit" class="btn btn-primary btn-block" name="register">Register</button>
</div>

</div>

</form>
</div>
</div>
</div>
</div>





<?php
	include("./include/footer.php");
?>


