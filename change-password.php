<?php
session_start();
include ('connection.php');
$name = $_SESSION['user_name'];
$id = $_SESSION['id'];
if(empty($id)) {
    header("Location: index.php"); 
}
if(isset($_POST['change-pwd'])) {
    $c_password = md5($_POST['c_password']);
    $n_password = $_POST['n_password'];
    $c_n_password = $_POST['c_n_password'];
    
    $select_query = mysqli_query($conn, "SELECT password FROM tbl_users WHERE id='$id'");
    $curr_pass = mysqli_fetch_assoc($select_query); 
    
    if($curr_pass['password'] == $c_password) {
        if($n_password == $c_n_password) {
            $new_pwd = md5($n_password);
            $sql = "UPDATE tbl_users SET password='$new_pwd' WHERE id='$id' AND role=2";   
            $result = mysqli_query($conn, $sql);
            
            if($result) {
                echo '<div class="alert alert-success" role="alert">Your Password has been updated successfully!</div>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">New Password and Confirm Password do not match!</div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">Current Password does not match!</div>';
    }
}
?>

<?php include('include/header.php'); ?>
<div id="wrapper">
    <div id="content-wrapper">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Change Password</li>
            </ol>
            <div class="card mb-3">
                <div class="card-header bg-primary text-white">
                    <i class="fa fa-info-circle"></i> Submit Password Details
                </div>
                <div class="card-body">
                    <form method="post" class="needs-validation" novalidate>
                        <div class="form-group">
                            <label for="c_password">Current Password <span class="text-danger">*</span></label>
                            <input type="password" name="c_password" id="c_password" class="form-control" placeholder="Enter Current Password" required>
                        </div>
                        <div class="form-group">
                            <label for="n_password">New Password <span class="text-danger">*</span></label>
                            <input type="password" name="n_password" id="n_password" class="form-control" placeholder="Enter New Password" required>
                        </div>
                        <div class="form-group">
                            <label for="c_n_password">Confirm New Password <span class="text-danger">*</span></label>
                            <input type="password" name="c_n_password" id="c_n_password" class="form-control" placeholder="Confirm New Password" required>
                        </div>
                        <button type="submit" name="change-pwd" class="btn btn-success btn-block">Update Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<?php include('include/footer.php'); ?>