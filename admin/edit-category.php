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
$fetch_query = mysqli_query($conn, "select * from tbl_category where id='$id'");
$row = mysqli_fetch_array($fetch_query);
if(isset($_REQUEST['sv-cat']))
{
   
	$category_name = $_POST['category_name'];
  $status = $_POST['status'];

  $update_category = mysqli_query($conn,"update tbl_category set category_name='$category_name', status='$status' where id='$id'");

    if($update_category > 0)
    {
        ?>
<script type="text/javascript">
    alert("Category Updated successfully.")
    window.location.href='view-category.php';
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
                    <a href="#">Edit Category</a>
                </li>
            </ol>

            <div class="card">
                <div class="card-header">
                    <i class="fa fa-info-circle"></i> Edit Details
                </div>

                <form method="post">
                    <div class="card-body">
                        
                        <!-- Category Name -->
                        <div class="form-group">
                            <label for="category_name">Category Name <span class="text-danger">*</span></label>
                            <input type="text" name="category_name" id="category_name" 
                                   class="form-control" placeholder="Enter Category Name" 
                                   value="<?php echo isset($row['category_name']) ? htmlspecialchars($row['category_name']) : ''; ?>" 
                                   required>
                        </div>

                        <!-- Status -->
                        <div class="form-group">
                            <label for="status">Status <span class="text-danger">*</span></label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="">Select Status</option>
                                <option value="1" <?php echo isset($row['status']) && $row['status'] == 1 ? 'selected' : ''; ?>>Active</option>
                                <option value="0" <?php echo isset($row['status']) && $row['status'] == 0 ? 'selected' : ''; ?>>Inactive</option>
                            </select>
                        </div>

                        <!-- Save Button -->
                        <div class="text-center">
                            <button type="submit" name="sv-cat" class="btn btn-primary px-4">Save</button>
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
