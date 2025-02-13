<?php
session_start();
include('connection.php');
if(isset($_REQUEST['login_btn']))
{
    $uname = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['pwd']);
    $upwd = md5($password);
    
    $select_query = mysqli_query($conn, "SELECT user_name, id FROM tbl_users WHERE emailid='$uname' AND password='$upwd' AND role=2 AND status=1");
    $username = mysqli_fetch_row($select_query);
    if(!empty($username))
    {
        $_SESSION['user_name'] = $username[0]; 
        $_SESSION['id'] = $username[1];
    }
    $rows = mysqli_num_rows($select_query);
    
    if($rows > 0)
    {
       header("Location: dashboard.php"); 
    }
    else
    { ?>
        <script>
            alert("You have entered the wrong email or password.");
        </script>
    <?php
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System - Login</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        .container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            max-width: 900px;
            width: 100%;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .left-section img {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }
        @media (max-width: 767px) {
            .left-section img {
                border-radius: 10px 10px 0 0;
            }
        }
    </style>
</head>

<body class="bg-light">
    <div class="container">
        <div class="row login-card bg-white">
            <!-- Left Section -->
            <div class="col-md-6 d-none d-md-block p-0 left-section" id="myImage" >
                <img src="img/image.png"  class="img-fluid w-100 h-100"  alt="Illustration">
            </div>

            <!-- Right Section - Login Form -->
            <div class="col-md-6 p-4">
                <h3 class="text-center mb-4">USER LOGIN</h3>
                <form name="login" method="post" action="">
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Username</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pwd" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100" name="login_btn">Login</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.getElementById("myImage").ondblclick = function() {
        window.location.href = "admin/index.php"; // Redirect to the admin folder
    };
</script>
</body>
</html>