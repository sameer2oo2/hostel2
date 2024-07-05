<?php
error_reporting(1);
error_reporting(E_ALL);
include("./include/header.php");
$allart = "SELECT * FROM `beds`;";
 
include("./include/lefnave.php");




	
?> <div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"> Beds</h1>
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
          <div class="card-body">
            <div class="tab-content p-0">
              <!--<h5 class="mb-2 mt-4">---</h5> -->
              <div class="row">
                
                </div> <?php
			 $retval=mysqli_query($conn, $allart);
			 //echo $retval->num_rows;
			
				 ?>
              </div>
              <div class="col-md-12">
                 
              
                <div class="card card-warning">
                  <!--<div class="card-header">
                    <h3 class="card-title">Bed No.</h3>
                  </div>  -->
                  <div class="card-body">
                    <form id="bookBedForm">
                      <div class="row">
                       <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
							<thead style="width: 100%;">
							<tr>
							<th>Id</th>
							<th>Bed No</th>
							<th>Campus Name</th>
							<th>Bed Fee</th>
							<th>Status</th>
							<th>Edit</th>
							<th>Delete</th>

							</tr>
							</thead>
							<tbody style="width: 100%;">

							<?php 
								$i =1;
								 if ($retval->num_rows > 0) {
									// Output data for each row
									
									 while ($row = mysqli_fetch_assoc($retval)) {
										 $rec[] =$row; 
										   $id = $row['id'];
                                            $room_no = $row['roomno']; 
											$campus = $row['campus']; 
											$fees = $row['fee']; 
											$status = $row['status']; 
										
									 
												 

							?>
							 
							<tr>
							<td><?php echo $id;?></td>
							<td><?php echo $room_no;?>
							</td>
							<td><?php echo $campus;?></td>
							<td><?php echo $fees;?></td>
							<td> <?php echo $status;?></td>
							<td>
                    <a href="updatebed.php?id=<?php echo $id;?>" >Update</a>
              </td>
							<td>
                <a href="deletebed.php?id=<?php echo $id;?>">Delete</a>
              </td>
							</tr>
							 <?php 
							 
											 }
										 }
							 ?>
							 
							</tbody>
							<tfoot>
							<tr>
							<th>Id</th>
							<th>Bed No</th>
							<th>Campus Name</th>
							<th>Bed Fee</th>
							<th>Status</th>
							<th>Edit</th>
							<th>Delete</th>
							</tr>
							</tfoot>
							</table>
											
					 
						 
					 
						 
					 
					 
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