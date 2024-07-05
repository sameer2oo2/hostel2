<?php
error_reporting(1);
error_reporting(E_ALL);
include("./include/header.php");

include("./include/lefnave.php");
//include("lmsfunctions.php");

// foreach ($TopcourseData as $Topcvalue) {  
    
	// // echo "<pre>";
	// // print_r($Topcvalue);
   // // // $maxviews = $Topcvalue['maxviews']; 
// }

 // Mustfa town
 // LDA 
 // Wpda Town
?> 


<div class="content-wrapper">

<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1 class="m-0">Fees</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Fees </li>
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
              <i class="fas fa-chart-pie mr-1"></i> Fees
            </h3>
            </div>

<div class="card-body">
            <div class="tab-content p-0">
<div class="row">
</div>
</div>
<div class="col-md-12">
<div class="card card-warning">
<div class="card-body">
                    <form id="bookBedForm">
                      <div class="row">
<table id="example1" class="table table-bordered table-striped" style="width: 100%;">
							<thead style="width: 100%;">
							<tr>
							<th>Room</th>
							<th>AC</th>
							<th>Parking</th>
							<th>Internet</th>
							<th>Bed Fee</th>
                            <th>Edit</th>
							<th>Delete</th>
							</tr>
							</thead>

							<tbody style="width: 100%;">
                            <tr>
							<td>9000</td>
							<td>1000</td>
							<td>500</td>
							<td>1000</td>
							<td>1500</td>
							<td>Edit</td>
							<td>Delete</td>
							</tr>
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