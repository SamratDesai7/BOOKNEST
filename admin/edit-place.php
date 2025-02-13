<?php
session_start();
include ('../connection.php');
$name = $_SESSION['name'];
$id = $_SESSION['id'];
if(empty($id))
{
    header("Location: index.php"); 
}
$id = $_GET['id'];
$fetch_query = mysqli_query($conn, "select * from tbl_location where id='$id'");
$row = mysqli_fetch_array($fetch_query);
if(isset($_REQUEST['sv-place']))
{
   
	$name = $_POST['name'];
  $status = $_POST['status'];

  $update_place = mysqli_query($conn,"update tbl_location set name='$name', status='$status' where id='$id'");

    if($update_place > 0)
    {
        ?>
<script type="text/javascript">
    alert("Place Updated successfully.")
    window.location.href='view-place.php';
</script>
<?php
}
}
?>
<?php include('include/header.php'); ?>
<div id="wrapper">
    <div id="content-wrapper">
        <div class="container-fluid">

            <!-- Breadcrumbs -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Edit Place</a></li>
            </ol>

            <div class="card mb-3">
                <div class="card-header">Edit Details</div>

                <form method="post" class="form-valide">
                    <div class="card-body">

                        <!-- Place Name Field -->
                        <div class="form-group">
                            <label for="name">Place Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control" 
                                   placeholder="Enter Place Name" value="<?php echo $row['name']; ?>" required>
                        </div>

                        <!-- Status Dropdown -->
                        <div class="form-group">
                            <label for="status">Status <span class="text-danger">*</span></label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="">Select Status</option>
                                <option value="1" <?php if ($row['status'] == 1) echo 'selected'; ?>>Active</option>
                                <option value="0" <?php if ($row['status'] == 0) echo 'selected'; ?>>Inactive</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group text-center">
                            <button type="submit" name="sv-place" class="btn btn-primary">Save</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top"></a>
    <?php include('include/footer.php'); ?>
</div>
