<?php
session_start();
include ('../connection.php');
$name = $_SESSION['name'];
$id = $_SESSION['id'];
if(empty($id))
{
    header("Location: index.php"); 
}
?>
<?php include('include/header.php'); ?>
<div id="wrapper">
    <div id="content-wrapper">
        <div class="container-fluid">

            <!-- Breadcrumbs -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">View Users</a></li>
            </ol>

            <div class="card mb-3">
                <div class="card-header">View Details</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>User Name</th>
                                    <th>Email ID</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_GET['ids'])) {
                                    $id = $_GET['ids'];
                                    $delete_query = mysqli_query($conn, "DELETE FROM tbl_users WHERE id='$id'");
                                }
                                $select_query = mysqli_query($conn, "SELECT * FROM tbl_users");
                                $sn = 1;
                                while ($row = mysqli_fetch_array($select_query)) { 
                                ?>
                                    <tr>
                                        <td><?php echo $sn; ?></td>
                                        <td><?php echo $row['user_name']; ?></td>
                                        <td><?php echo $row['emailid']; ?></td>
                                        <td><?php echo ($row['role'] == 1) ? "Admin" : "User"; ?></td>
                                        <td>
                                            <span class="badge <?php echo ($row['status'] == 1) ? 'badge-success' : 'badge-danger'; ?>">
                                                <?php echo ($row['status'] == 1) ? 'Active' : 'Inactive'; ?>
                                            </span>
                                        </td>
                                        <td>
                                            <a href="edit-user.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="view-users.php?ids=<?php echo $row['id']; ?>" 
                                               onclick="return confirmDelete()" 
                                               class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                <?php $sn++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top"></a>
    <?php include('include/footer.php'); ?>
</div>

<script>
function confirmDelete() {
    return confirm('Are you sure you want to delete this User?');
}
</script>
