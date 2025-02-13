<?php
session_start();
include ('../connection.php');
$name = $_SESSION['name'];
$id = $_SESSION['id'];
if(empty($id))
{
    header("Location: index.php"); 
}
if(isset($_REQUEST['sbt-plc']))
{
   
	$place_name = $_POST['place_name'];
  $status = $_POST['status'];

  $insert_location = mysqli_query($conn,"insert into tbl_location set name='$place_name', status='$status'");

    if($insert_location > 0)
    {
        ?>
<script type="text/javascript">
    alert("Location added successfully.")
</script>
<?php
}
}
?>
<?php include('include/header.php'); ?>
<div id="wrapper">
    <div id="content-wrapper">
        <div class="container-fluid">

            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Add Place</a>
                </li>
            </ol>

            <div class="card">
                <div class="card-header">
                    <i class="fa fa-info-circle"></i> Submit Details
                </div>

                <form method="post">
                    <div class="card-body">
                        
                        <!-- Place Name -->
                        <div class="form-group">
                            <label for="place_name">Place Name <span class="text-danger">*</span></label>
                            <input type="text" name="place_name" id="place_name" 
                                   class="form-control" placeholder="Enter Place Name" required>
                        </div>

                        <!-- Status -->
                        <div class="form-group">
                            <label for="status">Status <span class="text-danger">*</span></label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" name="sbt-plc" class="btn btn-primary px-4">Submit</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scroll to Top Button -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php include('include/footer.php'); ?>
</div>
