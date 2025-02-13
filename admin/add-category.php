<?php
session_start();
include ('../connection.php');
$name = $_SESSION['name'];
$id = $_SESSION['id'];
if(empty($id))
{
    header("Location: index.php"); 
}
if(isset($_REQUEST['sbt-cat']))
{
   
	$category_name = $_POST['category_name'];
  $status = $_POST['status'];

  $insert_category = mysqli_query($conn,"insert into tbl_category set category_name='$category_name', status='$status'");

    if($insert_category > 0)
    {
        ?>
<script type="text/javascript">
    alert("Category added successfully.")
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
                    <a href="#">Add Category</a>
                </li>
            </ol>

            <div class="card mb-2"> <!-- Reduced margin-bottom -->
                <div class="card-header p-2"> <!-- Reduced padding -->
                    <i class="fa fa-info-circle"></i> Submit Details
                </div>

                <form method="post" class="form-valide">
                    <div class="card-body p-3"> <!-- Reduced padding -->
                        <div class="col-md-8 mx-auto"> <!-- Adjusted width -->

                            <!-- Category Name -->
                            <div class="form-group mb-2">
                                <label for="category_name">Category Name <span class="text-danger">*</span></label>
                                <input type="text" name="category_name" id="category_name" class="form-control form-control-sm" placeholder="Enter Category Name" required>
                            </div>

                            <!-- Status -->
                            <div class="form-group mb-3">
                                <label for="status">Status <span class="text-danger">*</span></label>
                                <select class="form-control form-control-sm" id="status" name="status" required>
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>

                            <!-- Submit Button -->
                            <div class="form-group text-center">
                                <button type="submit" name="sbt-cat" class="btn btn-primary btn-sm px-4"style="width:25rem;">
                                  Submit
                                </button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php include('include/footer.php'); ?>
</div>
