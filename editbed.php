<?php
error_reporting(1);
error_reporting(E_ALL);
include("./include/header.php");

$bed_up = mysqli_real_escape_string($conn, $_GET['id']);
$bedRow = "SELECT * FROM `beds` WHERE id = {$bed_up}";
$retval = mysqli_query($conn, $bedRow);

include("./include/lefnave.php");

?>

<div class="content-wrapper">
    <div class="content-header">
        <!-- Your header content goes here -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card col-lg-12">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-chart-pie mr-1"></i> Edit Room
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="tab-content p-0">
                        <div class="row">
                                <?php
                                $retval = mysqli_query($conn, $bedRow);

                                if (mysqli_num_rows($retval) > 0) {
                                    while ($row = mysqli_fetch_assoc($retval)) {
                                ?>

                                        <form id="editBedForm" action="bedlist.php?id=<?php echo $bed_up; ?>" method="post">
                                            <div class="row">
                                           
                        
                                            <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Bed No</label>
                                                <input type="text" name="roomno" class="form-control" placeholder="Enter ..." value="<?php echo $row['roomno']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Bed Fee</label>
                                                <input type="text" name="fee" class="form-control" placeholder="Enter ..." value="<?php echo $row['fee']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="status">
                                                    <option value="available" <?php echo ($row['status'] == 'available') ? 'selected' : ''; ?>>Available</option>
                                                    <option value="booked" <?php echo ($row['status'] == 'booked') ? 'selected' : ''; ?>>Booked</option>
                                                </select>
                                            </div>
                                        </div>

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <input type="submit" name="submit" value="Update">
                                                    </div>
                                                
                                                </div>
                                            </div>
                                        </form>

                                <?php
                                   }
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row"></div>
    </section>
</div>

<?php
include("./include/footer.php");

if (isset($_POST['submit'])) {
    // Handle form submission and update the database
    $roomno = mysqli_real_escape_string($conn, $_POST['roomno']);
    $bed_no = mysqli_real_escape_string($conn, $_POST['bed_no']);
    $fee = mysqli_real_escape_string($conn, $_POST['fee']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    // Update the bed details in the database
    $updateBedSql = "UPDATE `beds` SET `roomno`='$roomno', `bed_no`='$bed_no', `fee`='$fee', `status`='$status' WHERE `id`='$bed_up'";
    $updateBedResult = mysqli_query($conn, $updateBedSql);

    if ($updateBedResult) {
        echo '<div class="alert alert-success" role="alert">Bed details updated successfully</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Error updating bed details</div>';
    }
}
?>
        <div class="row"></div>
    </div>
    </section>
</div>


