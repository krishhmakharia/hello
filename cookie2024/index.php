<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
    <style>
    </style>
</head>
<body>
    <!--Navbar start-->
        <nav class="navbar navbar-expand-sm bg-light navbar-light">
            <div class="container-fluid">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <i class="fa fa-user-circle p-1 " style="font-size:30px;"></i>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registeration.php">Registeration</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li> -->
                </ul>
            </div>
        </nav>
    <!--Navbar end-->
    <div class="container">
        <div class="row mt-2">
            <div class="col-lg-4" >
                <div class="card" >
                    <div class="card-header bg-danger text-white ">
                        Login
                    </div>
                    <div class="card-body">
                        <?php
                            if(isset($_GET["empty"])){
                                echo "<div class='alert alert-danger'>All fields Required</div>";
                            }
                            else if(isset($_GET["invalid_email"])){
                                echo "<div class='alert alert-danger'>Invalid Email</div>";
                            }
                            else if(isset($_GET["invalid_pass"])){
                                echo "<div class='alert alert-danger'>Invalid Password</div>";
                            }
                        ?>
                        <form action="check.php" method="post">
                            Email<input type="email" class="form-control" name="email" required>
                            Password<input type="password" class="form-control" name="pass" required><br>
                            <input type="submit" value="Login" class="btn btn-danger">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>