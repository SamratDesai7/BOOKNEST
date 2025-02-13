<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
 <link rel="icon" href="../img/logo.png">
 <title>BOOKNEST</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link href="css/custom_style.css?ver=1.1" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css' rel='stylesheet' />
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css" rel="stylesheet" />
  
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
        color : white;
        padding: 0.5rem 1rem;
    }
    .navbar-brand {
        display: flex;
        align-items: center;
        color: white !important;
    }
    .navbar-brand img {
        width: 35px;  /* Adjust the size of the logo */
        margin-right: 10px;  /* Space between the logo and text */
    }
    .navbar-nav .nav-link {
        color: white !important;
    }
    .navbar-nav .nav-item.dropdown:hover > .dropdown-menu {
        display: block;
    }
    .navbar-nav .nav-item.dropdown .nav-link::after {
        content: none;  /* Remove the arrow */
    }
    .navbar-nav .nav-link:hover {
        background-color: #495057;
        color: #f8f9fa !important;
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

    /* Customizing Navbar's Hover Effect */
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

  </style>
</head>

<body id="page-top">

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <!-- Left side logo and website name -->
    <a class="navbar-brand" href="dashboard.php">
        <img src="../img/logo.png" alt="BOOKNEST Logo" style="height:3rem; width:5rem;">  <!-- Replace 'path/to/logo.png' with your logo image path -->
        <span>BOOKNEST</span>
    </a>

    <!-- Sidebar -->
    <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="manageBooksDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span>Manage Books</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="manageBooksDropdown">
                <a class="dropdown-item" href="add-book.php">Add Book</a>
                <a class="dropdown-item" href="view-book.php">View Book</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="manageCategoryDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span>Manage Category</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="manageCategoryDropdown">
                <a class="dropdown-item" href="add-category.php">Add Category</a>
                <a class="dropdown-item" href="view-category.php">View Category</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="issue-request.php">
                <span>Book Issue Requests</span>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="managePlaceDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span>Manage Place</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="managePlaceDropdown">
                <a class="dropdown-item" href="add-place.php">Add Place</a>
                <a class="dropdown-item" href="view-place.php">View Place</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="manageUsersDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span>Manage Users</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="manageUsersDropdown">
                <a class="dropdown-item" href="add-users.php">Add Users</a>
                <a class="dropdown-item" href="view-users.php">View Users</a>
            </div>
        </li>
    </ul>
  
    <!-- Welcome User & Profile -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <span>Welcome, <?php echo $name; ?></span> 
    </form>

    <!-- Profile Dropdown -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="change-password.php">Change Password</a>
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
      </li>
    </ul>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
