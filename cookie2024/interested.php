<?php
include("db.php");
if (isset($_COOKIE["login"])) {
    $email = $_COOKIE["login"];
    $code=md5($email);
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
        <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script> 
     
        <script>
            $(document).on("click",".connect",function(){
                var code=$(this).attr("rel");
                $.post(
                    "intrested_friend.php",{id:code},function(data){
                        if(data=="success"){
                            $("#"+code).fadeOut(1000);
                        }
                    }
                );
            });
        </script>   
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
                            <a class="nav-link " href="profile.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="edit.php">Edit Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="search.php">Search</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="interested.php">Interested</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="connected.php">Connects</a>
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
        <div class="container">
            <div class="row">
            <?php 
                        $q=mysqli_query($conn,"Select * from details Where email IN (Select email from intrested where code='$code' AND interest=0)");
                        while($row=mysqli_fetch_array($q)){
                            ?>
                <div class="col-lg-8" id="<?=$row["code"]?>">
                    
                        <div class="row">   
                            <div class="col-lg-5 mt-3 ">
                                <img src="profile/<?=$row["code"]?>.jpg" alt="img" class="img-fluid" style="height:200px">
                            </div>
                                <div class="col-lg-7">
                                    <table class="table table-striped">
                                        <tr>
                                            <td class="td">First name:</td>
                                            <td class="td"><?= $row["fname"] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="td">Last name:</td>
                                            <td class="td"><?= $row["lname"] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="td">Gender:</td>
                                            <td class="td"><?= $row["gender"] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="td">DOB:</td>
                                            <td class="td"><?= $row["birth"] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="td">Caste:</td>
                                            <td class="td"><?= $row["caste"] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="td"> <a href="view_profile.php?id=<?=$row["code"]?>" class="btn btn-info">View Profile</a></td>
                                            <td class="td"> <a href="view_gallery.php?id=<?=$row["code"]?>" class="btn btn-info">Gallery</a>
                                            <button style="margin-left: 40px;" class="btn btn-danger connect" rel="<?=$row["code"]?>">Connect</button></td>
                                            
                                        </tr>
                                        </table>
                                </div>  
                        </div>    
                            <?php 
                        }
                    ?>
            
                </div>

                <div class="col-lg-4">
                    <form method="post" action="search.php">
                        Gender:<br> <input type="radio" name="gender" value="male">Male  <input type="radio" name="gender" value="female" >Female<br>
                        Caste: <input type="text" name="caste" class="form-control" required>
                        Religion: <select class="form-control" name="religion" required>
                                                    <option  value="hindu"> hindu </option>
                                                    <option  value="Muslim"> muslim </option>
                                                    <option  value="Christian"> christian </option>
                                                    <option  value="jain"> jain </option>
                                                    <option  value="sikh"> sikh </option>
                                    </select> 
                        <input type="submit" value="Search" style="margin-top:10px;" class="btn btn-warning">            
                    </form>
                </div>
                
            </div>
        </div>
    <?php 
}
else {
    header("location:logout.php");
}
    ?>
    </body>

    </html>    