<?php
session_start();
include ('../connection.php');
$name = $_SESSION['name'];
$id = $_SESSION['id'];
if(empty($id)) {
    header("Location: index.php"); 
}
if(isset($_REQUEST['change-pwd'])) {
    $c_password = md5($_POST['c_password']);
    $n_password = $_POST['n_password'];
    $c_n_password = $_POST['c_n_password'];
    
    $select_query = mysqli_query($conn, "SELECT password FROM tbl_users WHERE id='$id'");
    $curr_pass = mysqli_fetch_assoc($select_query); 
    if($curr_pass['password'] == $c_password) {
        if($n_password == $c_n_password) {
            $new_pwd = md5($n_password);
            $sql = "UPDATE tbl_users SET password='$new_pwd' WHERE id='$id' AND role=1";   
            $result = mysqli_query($conn, $sql);
            if($result) {
                echo "<script>alert('Your Password updated successfully!');</script>";
            }
        } else {
            echo "<script>alert('New Password and Confirm Password do not match!');</script>";
        }
    } else {
        echo "<script>alert('Current Password do not match!');</script>";
    }
}
?>
<head>
  <style>
    .card-body{
      display :flex;
      justify-content: center;
      align-items:center;
    }
  </style>
</head>
<?php include('include/header.php'); ?>

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h4><i class="fa fa-key"></i> Change Password</h4>
        </div>
        <div class="card-body">
            <form method="post" class="needs-validation" novalidate>
                <div class="mb-3">
                    <label for="c_password" class="form-label">Current Password</label>
                    <input type="password" name="c_password" id="c_password" class="form-control" placeholder="Enter Current Password" required>
                </div>
                <div class="mb-3">
                    <label for="n_password" class="form-label">New Password</label>
                    <input type="password" name="n_password" id="n_password" class="form-control" placeholder="Enter New Password" required>
                </div>
                <div class="mb-3">
                    <label for="c_n_password" class="form-label">Confirm New Password</label>
                    <input type="password" name="c_n_password" id="c_n_password" class="form-control" placeholder="Confirm New Password" required>
                </div>
                <div class="text-center">
                    <button type="submit" name="change-pwd" class="btn btn-success"><i class="fa fa-save"></i> Update Password</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('include/footer.php'); ?>
