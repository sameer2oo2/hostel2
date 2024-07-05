<?php
error_reporting(1);
error_reporting(E_ALL);
include("./include/header.php");

$room_up = mysqli_real_escape_string($conn, $_GET['id']);
$allart = "SELECT * FROM `rooms` WHERE id = {$room_up}";
$retval = mysqli_query($conn, $allart);

$roomRow = "SELECT * FROM `rooms` WHERE id = {$room_up}";


include("./include/lefnave.php");

?>

<div class="content-wrapper">
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
                            <i class="fas fa-chart-pie mr-1"></i> Edit Room
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="tab-content p-0">
                            <div class="row">
                                <?php
                                $retval = mysqli_query($conn, $roomRow);

                                if (mysqli_num_rows($retval) > 0) {
                                    while ($row = mysqli_fetch_assoc($retval)) {
                                ?>

<form id="editRoomForm" action="editroom.php?id=<?php echo $room_up; ?>" method="post">
                                    <div class="row">
                                        <!-- <div class="col-sm-4">
                                            <div class="form-group">
                                               
                                            </div>
                                        </div> -->
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Room Name</label>
                                                <input type="text" name="roomname" class="form-control" placeholder="Enter ..." value="<?php echo $row['room_no']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Level</label>
                                                <input type="text" name="level" class="form-control" placeholder="1" value="<?php echo $row['level']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Seats</label>
                                                <input type="number" name="seater" class="form-control" placeholder="0" value="<?php echo $row['seater']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Fees</label>
                                                <input type="number" name="fees" class="form-control" placeholder="0" value="<?php echo $row['fees']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="acrequired" value="1" <?php if ($row['ac'] == 1) echo 'checked'; ?>>
                                                    <label class="form-check-label">AC</label>
                                                </div>
                                            </div>
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
    // $campus = mysqli_real_escape_string($conn, $_POST['campus']);
    $roomname = mysqli_real_escape_string($conn, $_POST['roomname']);
    $level = mysqli_real_escape_string($conn, $_POST['level']);
    $seater = mysqli_real_escape_string($conn, $_POST['seater']);
    $fees = mysqli_real_escape_string($conn, $_POST['fees']);
    $acrequired = isset($_POST['acrequired']) ? 1 : 0;

    // Update the room details in the database
    $updateSql = "UPDATE `rooms` SET `room_no`='$roomname', `level`='$level', `seater`='$seater', `fees`='$fees', `ac`='$acrequired' WHERE `id`='$room_up'";
    $updateResult = mysqli_query($conn, $updateSql);

    if ($updateResult) {
        echo '<div class="alert alert-success" role="alert">Room details updated successfully</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Error updating room details</div>';
    }
    exit();
}
?>