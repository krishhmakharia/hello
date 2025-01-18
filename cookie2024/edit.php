<?php
include("db.php");
    if(isset($_COOKIE["login"])){
        $email=$_COOKIE["login"];
        //echo "<h2>Profile</h2>";
        //echo $email;
        ?>
        <!DOCTYPE html>
            <html lang="en">
            <head>
                <title>Form php</title>
                <meta charset="utf-8">
                    <!-- Latest compiled and minified CSS -->
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

                    <!-- Latest compiled JavaScript -->
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                    <style>
                        .card {
                            display: grid;
                            place-items: center;
                            width: 300px;
                            
                            border: 1px solid #ccc;
                            border-radius: 8px;
                            overflow: hidden;
                            background-color: #f9f9f9;
                        }
                    </style>
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
                            <a class="nav-link active" href="#">Edit Profile</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="search.php">Search</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link " href="interested.php">Interested</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="change_password.php">Change Password</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                            </li>
                        </ul>
                        </div>
                    </div>
                </nav>
                
                <!--NAv bar close-->
                <div class="container mt-2">
                                     <?php 
                                         $q=mysqli_query($conn,"Select * from details where email='$email'");
                                         if($row=mysqli_fetch_array($q)){
                                    ?>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <img alt="profile-pic" src="profile/<?=$row["code"]?>.jpg" style="height:300px;" class="img-fluid">
                                </div>
                                <div class="card-footer">          
                                    <form method="post" action="change_img.php" enctype="multipart/form-data">
                                        <input type="file" name="pic" class="form-control" required>
                                        <input type="submit" value="Change Image"  class="btn btn-danger mt-2">
                                    </form>
                                </div>
                            </div>            
                        </div>
                        <div class="col-lg-6">
                            
                            <form method="post" action="update.php">
                                <table class="table table-boaderless">
                                    <tr><td class="td">First name:</td><td class="td"> <input type="text" name="fname" value="<?=$row["fname"]?>" class="form-control" required> </td></tr>
                                    <tr><td class="td">Last name:</td><td class="td"> <input type="text" name="lname" value="<?=$row["lname"]?>" class="form-control" required> </td></tr>
                                    <tr><td class="td">Gender:</td><td class="td">
                                        <select class="form-control" name="gender" required>
                                            <option  value="<?=$row["gender"]?>"> <?=$row["gender"]?> </option>
                                            <option  value="male"> male </option>
                                            <option  value="female"> female </option>
                                         </select> </td></tr>
                                    <tr><td class="td">DOB:</td><td class="td"> <input type="date" name="birth" value="<?=$row["birth"]?>" class="form-control"> </td></tr>
                                    <tr><td class="td">Caste:</td><td class="td"> <input type="text" name="caste" value="<?=$row["caste"]?>" class="form-control" required> </td></tr>
                                    <tr><td class="td">Religion:</td><td class="td">
                                        <select class="form-control" name="religion" required>
                                                <option  value="<?=$row["religion"]?>"> <?=$row["religion"]?> </option>
                                                <option  value="hindu"> hindu </option>
                                                <option  value="Muslim"> muslim </option>
                                                <option  value="Christian"> christian </option>
                                                <option  value="jain"> jain </option>
                                                <option  value="sikh"> sikh </option>
                                        </select> </td></tr>
                                    
                                    <tr><td class="td">Occupation:</td><td class="td">
                                        <select class="form-control" name="occupation" required>
                                            <option  value="<?=$row["occupation"]?>"> <?=$row["occupation"]?> </option>
                                            <option  value="engineer"> engineer </option>
                                            <option  value="doctor"> doctor </option>
                                            <option  value="CA"> CA </option>
                                            <option  value="musictian"> musictian </option>
                                            <option  value="actor"> actor </option>
                                        </select></td></tr>
                                    <tr><td class="td">City:</td><td class="td"> <input type="text" name="city" value="<?=$row["city"]?>" class="form-control" required> </td></tr>
                                    <tr><td class="td">State:</td><td class="td"> <input type="text" name="state" value="<?=$row["state"]?>" class="form-control" required> </td></tr>
                                    <tr><td class="td">Country:</td><td class="td"> <input type="text" name="country" value="<?=$row["country"]?>" class="form-control" required> </td></tr>
                                    <tr><td colspan="2" align="center"><input type="submit" value="Update" class="btn btn-success"></td></tr>
                                </table> 
                            </form>   
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
    header("location:index.php");
   }
?>