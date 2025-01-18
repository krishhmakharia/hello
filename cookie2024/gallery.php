<?php
    include("db.php");
    if(isset($_COOKIE["login"])){
        $email=$_COOKIE["login"];
        if(isset($_GET["id"])){
            $code=mysqli_real_escape_string($conn,$_GET["id"]);
            $user_code=md5($email);
            
        ?>
        <!DOCTYPE html>
            <html lang="en">
            <head>
                <title>Gallery</title>
                <meta charset="utf-8">
                    <!-- Latest compiled and minified CSS -->
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

                    <!-- Latest compiled JavaScript -->
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
                    <script>
                        $(document).ready(function(){
                            $(".fa-close").click(function(){
                                var sn=$(this).attr("rel");
                                var code=$(this).attr("id");
                                
                                $.post(
                                    "del_image.php",{id:sn,code:code},function(data){
                                        if(data=="success"){
                                            $("#"+sn).fadeOut(1000);
                                        }
                                    }
                                );
                               // alert(sn+code);
                            });
                        });
                    </script>  
                    <style>
                        .img-fluid{
                            height:300px;
                            width:100%;
                            
                        }
                        .fa-close{
                            position:relative;
                            top:35px;
                            left:15px;
                            background-color:black;
                            color:white;
                            padding:5px;
                            border-radius: 15px;
                            opacity: 0.7;
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
                            <a class="nav-link active" href="profile.php">Home</a>
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
                   <div class="row">
                    <div class="col-lg-6">
                        <form method="post" action="upload_photo_album.php?id=<?=$code?>" enctype="multipart/form-data">
                            Image<input type="file" name="pic" class="form-control" required ><br>
                            <input type="submit" value="Upload" class="btn btn-danger">
                        </form>
                    </div>
                   </div>
                   <div class="row">
                        <?php 
                              $rs=mysqli_query($conn,"Select * from galleries WHERE album_code='$code' AND email='$email'");
                              while($row=mysqli_fetch_array($rs)){
                        ?>
            
                    <div class="col-lg-3 col-md-6" id="<?=$row[0]?>">
                        <i class="fa fa-close" id="<?=$code?>" rel="<?=$row[0]?>"></i>
                        <img src="gallery/<?=$user_code ?>/<?=$code ?>/<?=$row["sn"]?>.jpg"  class="form-control img-fluid">
                    </div>
                                <?php 
                              }
                              ?>
                   </div>
                </div>
            </body>
        </html>
        <?php         
        }
        else{
           // header("location:profile.php?empty=1");
        }
             
    }
   else{
    header("location:index.php");
   }
?>