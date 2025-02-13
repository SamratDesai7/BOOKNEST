<?php
session_start();
include '../connection.php';
$name = $_SESSION['name'];
$id = $_SESSION['id'];
if (empty($id)) {
    header("Location: index.php");
}

$select_user = mysqli_query($conn, "SELECT COUNT(*) FROM tbl_users WHERE role=2");
$total_user = mysqli_fetch_row($select_user);

$select_book = mysqli_query($conn, "SELECT COUNT(*) FROM tbl_book");
$total_book = mysqli_fetch_row($select_book);

$select_avail_book = mysqli_query($conn, "SELECT COUNT(*) FROM tbl_book WHERE availability=1");
$avail_book = mysqli_fetch_row($select_avail_book);

$issued_book = mysqli_query($conn, "SELECT COUNT(*) FROM tbl_issue WHERE status=1");
$issued_book = mysqli_fetch_row($issued_book);

$return_book = mysqli_query($conn, "SELECT COUNT(*) FROM tbl_return GROUP BY book_id");
$return_book = mysqli_num_rows($return_book);
?>

<?php include('include/header.php'); ?>

<style>
    .dashboard-container {
        padding: 30px;
    }
    
    .card-custom {
        border-radius: 12px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15);
        padding: 20px;
        color: white;
        display: flex;
        align-items: center;
        justify-content: space-between;
        min-height: 100px;
        margin : 5px;
    }

    .card-custom i {
        font-size: 40px;
        opacity: 0.8;
    }

    .card-blue {
        background: #007bff;
    }

    .card-yellow {
        background: #ffc107;
        color: #333;
    }

    .card-green {
        background: #28a745;
    }

    .card-red {
        background: #dc3545;
    }

    .card-lightblue {
        background: #17a2b8;
    }

    .row {
        margin-bottom: 20px;
    }
</style>

<div class="container-fluid dashboard-container">
    <div class="row">
        <!-- Total Books -->
        <div class="col-md-6 col-lg-3">
            <div class="card-custom card-blue">
                <div>
                    <h4>Total Books</h4>
                    <h2><?php echo $total_book[0]; ?></h2>
                </div>
                <i class="fa fa-book"></i>
            </div>
        </div>

        <!-- Available Books -->
        <div class="col-md-6 col-lg-3">
            <div class="card-custom card-green">
                <div>
                    <h4>Available Books</h4>
                    <h2><?php echo $avail_book[0]; ?></h2>
                </div>
                <i class="fa fa-book"></i>
            </div>
        </div>

        <!-- Issued Books -->
        <div class="col-md-6 col-lg-3">
            <div class="card-custom card-yellow">
                <div>
                    <h4>Books Issued</h4>
                    <h2><?php echo $issued_book[0]; ?></h2>
                </div>
                <i class="fa fa-book-open"></i>
            </div>
        </div>

        <!-- Returned Books -->
        <div class="col-md-6 col-lg-3">
            <div class="card-custom card-lightblue">
                <div>
                    <h4>Returned Books</h4>
                    <h2><?php echo $return_book; ?></h2>
                </div>
                <i class="fa fa-undo"></i>
            </div>
        </div>

        <!-- Total Users -->
        <div class="col-md-6 col-lg-3">
            <div class="card-custom card-red">
                <div>
                    <h4>Total Users</h4>
                    <h2><?php echo $total_user[0]; ?></h2>
                </div>
                <i class="fa fa-user"></i>
            </div>
        </div>
    </div>
</div>

<?php include('include/footer.php'); ?>
