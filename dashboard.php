<?php
session_start();
$name = $_SESSION['user_name'];
$id = $_SESSION['id'];
include 'connection.php';

if(empty($name)) {
    header("Location: index.php"); 
}

$select_book = mysqli_query($conn, "SELECT COUNT(*) FROM tbl_book WHERE availability=1");
$total_book = mysqli_fetch_row($select_book);

$issued_book = mysqli_query($conn, "SELECT COUNT(*) FROM tbl_issue WHERE user_id='$id' AND status=1");
$issued_book = mysqli_fetch_row($issued_book);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo.png">
    <title>BOOKNEST</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #343a40;
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            padding: 15px;
        }
        .card-body {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 0;
        }
        .card-text {
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 0;
        }
        .card i {
            font-size: 2.5rem;
            opacity: 0.7;
        }
        .profile-icon {
            cursor: pointer;
            color: white;
        }
        /* Navbar Hover Effect */
.navbar-nav .nav-link {
    position: relative;
    transition: color 0.3s ease-in-out;
}

.navbar-nav .nav-link::after {
    content: "";
    position: absolute;
    left: 50%;
    bottom: 4px;
    width: 0;
    height: 2px;
    background-color: white;
    transition: all 0.3s ease-in-out;
    transform: translateX(-50%);
}

.navbar-nav .nav-link:hover {
    color: #f8f9fa !important;
}

.navbar-nav .nav-link:hover::after {
    width: 100%;
}
.navbar-nav .nav-item:last-child .nav-link::after {
    width: 0;
    background-color: transparent; /* Ensures no underline */
}
.navbar-brand img {
        width: 35px;  /* Adjust the size of the logo */
        margin-right: 10px;  /* Space between the logo and text */
    }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
    <a class="navbar-brand" href="dashboard.php">
                <!-- Logo Image -->
                <img src="img/logo.png" alt="BOOKNEST"style="height:3rem; width:5rem;"> <!-- Placeholder logo, replace with your logo -->
                <!-- Website Name -->
                BOOKNEST
            </a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="book.php">Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="issued-book.php">Issued Books</a>
                </li>

                <!-- Profile Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle profile-icon" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown">
                        <i class="fa fa-user-circle fa-lg"></i> <?php echo $name; ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                        <li><a class="dropdown-item" href="change-password.php"><i class="fas fa-key"></i> Change Password</a></li>
                        <li><a class="dropdown-item text-danger" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>

<!-- Main Container -->
<div class="container mt-4">
     <!-- Dashboard Cards -->
    <div class="row">
        
        <!-- Total Books -->
        <div class="col-md-6 col-lg-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Total Books</h5>
                        <p class="card-text fs-4"><?php echo $total_book[0]; ?></p>
                    </div>
                    <i class="fa fa-book"></i>
                </div>
            </div>
        </div>

        <!-- Issued Books -->
        <div class="col-md-6 col-lg-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Books Issued</h5>
                        <p class="card-text fs-4"><?php echo $issued_book[0]; ?></p>
                    </div>
                    <i class="fa fa-book-open"></i>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
