<?php 
    include("db.php");
    if(isset($_COOKIE["login"])){
        $email=$_COOKIE["login"];
        ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <title>Change pass..</title>
                <meta charset="utf-8">
                    <!-- Latest compiled and minified CSS -->
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

                    <!-- Latest compiled JavaScript -->
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                    
            </head>
            <body>
                <!-- Nav bar start-->
                <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">Profile</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                            <a class="nav-link" href="profile.php">Home</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="edit.php">Edit Profile</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="search.php">Search</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link " href="interested.php">Interested</a>
                             </li>
                            <li class="nav-item">
                            <a class="nav-link active" href="#">Change Password</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                            </li>
                        </ul>
                        </div>
                    </div>
                </nav>
                
                <!--NAv bar close-->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                        <?php 
                                        if(isset($_GET["success"])){
                                            echo "<div class='alert alert-success'>Password Changed Successfull </div>";
                                        }
                                        else if(isset($_GET["missmatch"])){
                                            echo "<div class='alert alert-warning'>New password and retyped password not matched</div>";
                                        }
                                        else if(isset($_GET["again"])){
                                            echo "<div class='alert alert-danger'>Try Again</div>";
                                        }
                                        else if(isset($_GET["invalid_pass"])){
                                            echo "<div class='alert alert-danger'>Invalid Password </div>";
                                        }
                                        else if(isset($_GET["empty"])){
                                            echo "<div class='alert alert-warning'>All fields Required</div>";
                                        }
                                    ?>
                        </div>    
                    </div>
                </div>
                <div class="container mt-2">
                    <?php 
                                $q=mysqli_query($conn,"Select * from details where email='$email'");
                               if($row=mysqli_fetch_array($q)){
                    ?>
                    <div class="row">
                        
                        <div class="col-lg-6">
                            <img src="profile/<?=$row["code"]?>.jpg" style="height:510px" class="img-fluid">
                        </div>
                        <div class="col-lg-6 ">
                            <div class="card">
                                <div class="card-header">
                                    <h1>Change Password</h1>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="update_pass.php">
                                        Current Password<input type="password" name="cp" class="form-control" required>
                                        New Password<input type="password" name="np" class="form-control" required>
                                        Retype Password<input type="password" name="rp" class="form-control" required><br>
                                        <input type="submit" value="Save" class="btn btn-primary">
                                    </form>
                                 </div>    
                            </div>
                                    
                                <?php 
                                }
                                else{
                                    header("location:logout.php");
                                }    
                                ?>
                        </div>
                    </div>
                </div>
            </body>
        </html>

<?php    
    }
    else{
        header("location:logout.php");
    }
?>