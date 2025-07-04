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
$fetch_query = mysqli_query($conn, "select * from tbl_users where id='$id'");
$row = mysqli_fetch_array($fetch_query);
if(isset($_REQUEST['sv-user']))
{
   
	$user_name = $_POST['user_name'];
  $emailid = $_POST['emailid'];
  $role = $_POST['role'];
  $status = $_POST['status'];

  $update_user = mysqli_query($conn,"update tbl_users set user_name='$user_name', emailid='$emailid', role='$role', status='$status' where id='$id'");

    if($update_user > 0)
    {
        ?>
<script type="text/javascript">
    alert("User Updated successfully.");
    window.location.href='view-users.php';
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
                <li class="breadcrumb-item"><a href="#">Edit User</a></li>
            </ol>

            <div class="card mb-3">
                <div class="card-header">Edit Details</div>

                <form method="post" class="form-valide">
                    <div class="card-body">
                        
                        <!-- User Name -->
                        <div class="form-group">
                            <label for="user_name">User Name <span class="text-danger">*</span></label>
                            <input type="text" name="user_name" id="user_name" 
                                   class="form-control" placeholder="Enter User Name" required 
                                   value="<?php echo $row['user_name']; ?>">
                        </div>

                        <!-- Email ID -->
                        <div class="form-group">
                            <label for="emailid">Email ID <span class="text-danger">*</span></label>
                            <input type="email" name="emailid" id="emailid" 
                                   class="form-control" placeholder="Enter Email ID" required 
                                   value="<?php echo $row['emailid']; ?>">
                        </div>

                        <!-- Role -->
                        <div class="form-group">
                            <label for="role">Role <span class="text-danger">*</span></label>
                            <select class="form-control" id="role" name="role" required>
                                <option value="">Select Role</option>
                                <option value="1" <?php echo ($row['role'] == 1) ? "selected" : ""; ?>>Admin</option>
                                <option value="2" <?php echo ($row['role'] == 2) ? "selected" : ""; ?>>User</option>
                            </select>
                        </div>

                        <!-- Status -->
                        <div class="form-group">
                            <label for="status">Status <span class="text-danger">*</span></label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="">Select Status</option>
                                <option value="1" <?php echo ($row['status'] == 1) ? "selected" : ""; ?>>Active</option>
                                <option value="0" <?php echo ($row['status'] == 0) ? "selected" : ""; ?>>Inactive</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group text-center">
                            <button type="submit" name="sv-user" class="btn btn-primary">Save</button>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top"></a>
    <?php include('include/footer.php'); ?>
</div>
