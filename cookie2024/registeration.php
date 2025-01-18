<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Registeration</title>
    <style>
    
    </style>
</head>
<body>
    <!--Navbar start-->
        <nav class="navbar navbar-expand-sm bg-light navbar-light">
            <div class="container-fluid">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <i class="fa fa-user-circle p-1" style="font-size:30px;"></i>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="index.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Registeration</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li> -->
                </ul>
            </div>
        </nav>
    <!--Navbar end-->
    <div class="container-fluid">
        <!-- <div class="row"> -->
        <div class="row mt-2">
            <div class="col-lg-12">
                <?php 
                if(isset($_GET["empty"])){
                    echo "<div class='alert alert-danger'>All fields Required</div>";
                }
                else if(isset($_GET["success"])){
                    echo "<div class='alert alert-success'>Registeration Complete</div>";
                }
                else if(isset($_GET["mismatch"])){
                    echo "<div class='alert alert-warning'>Password not matchted</div>";
                }
                else if(isset($_GET["again"])){
                    echo "<div class= 'alert alert-danger'>Try again</div>";
                }

                ?>
            </div>
        </div>
    </div>
    <div class="container">
            <div class="col-lg-8" >
                <div class="card" >
                    <div class="card-header bg-danger text-white ">
                        Registeration form
                    </div>
                    <div class="card-body">
                        
                        <form method="post" action="register.php" enctype="multipart/form-data">
                                First Name: <input type="text" name="fname" class="form-control" required><br>
                                Last Name: <input type="text" name="lname" class="form-control" required><br>
                                Gender:<br> <input type="radio" name="gender" value="male">Male  <input type="radio" name="gender" value="female" >Female<br><br>
                                DOB: <input type="date" name="birth" class="form-control"> <br>
                                Email: <input type="email" name="email" class="form-control"><br>
                                Password: <input type="password" name="pass" class="form-control"><br>
                                Re-Check: <input type="password" name="repass" class="form-control"><br>
                                Caste: <input type="text" name="caste" class="form-control" required><br>
                                Religion: <select class="form-control" name="religion" required>
                                                <option  value="hindu"> hindu </option>
                                                <option  value="Muslim"> muslim </option>
                                                <option  value="Christian"> christian </option>
                                                <option  value="jain"> jain </option>
                                                <option  value="sikh"> sikh </option>
                                          </select> <br>   
                                Occupation: <select class="form-control" name="occupation" required>
                                                <option  value="engineer"> engineer </option>
                                                <option  value="doctor"> doctor </option>
                                                <option  value="CA"> CA </option>
                                                <option  value="musictian"> musictian </option>
                                                <option  value="actor"> actor </option>
                                             </select><br>
                                City: <input type="text" name="city"  class="form-control" required> <br>
                                State: <input type="text" name="state"  class="form-control" required> <br>
                                Country: <input type="text" name="country"  class="form-control" required> <br>
                                IMAGE: <input type="file" name="pic" class="form-control" required><br>
                                <input type="submit" value="Register" class="btn btn-warning"><br> 
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
</body>
</html>