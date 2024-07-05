<?php
error_reporting(1);
error_reporting(E_ALL);
include("./include/header.php");

 
  
	  $allart = "SELECT * FROM `userregistration` ;";
include("./include/lefnave.php");
?>

<div class="content-wrapper">
<div class="card">
<div class="card-header">
<h3 class="card-title">User List</h3>  <a href="adduser.php"><button type="button" class="btn btn-block btn-primary btn-sm" style="width: 150px; float: right;">Add User</button></a>
</div>

<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>id</th>
<th>Full Name</th>
<th>Contact No.</th>
<th>Email</th>
<th>Edit</th>

</tr>
</thead>
<tbody>



 

<?php 
 $retval=mysqli_query($conn, $allart);
 			 if ($retval->num_rows > 0) {
				// Output data for each row
				
				 while ($row = $retval->fetch_assoc()) {
					 $rec[] =$row; 
					   $id = $row['id'];
					    $fullname = $row['firstName'].$row['lastName'];
					    $contactNo = $row['contactNo']; 
					    $email = $row['email']; 
					    $gender = $row['gender']; 
					
				 
				
?>
				<tr>
				<td><?php echo $id;?></td>
				<td><?php echo $fullname;?></td>
				<td><?php echo $contactNo;?></td>
			 
				<td><?php echo $email;?></td>
				<td>
					<a href="userupdate.php?id=<?php echo $id;?>">Edit</a>
				</td>
				 
				</tr>

<?php
		}
					}

?>
</tbody>
<tfoot>
<tr>
<th>id</th>
<th>Full Name</th>
<th>Contact No.</th>
 
<th>Email</th>
<th>Edit</th>
</tr>
</tfoot>
</table>
</div>

</div>

</div>
</section>
</div
<?php
	include("./include/footer.php");
?>