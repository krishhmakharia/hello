<?php
include("db.php");
if (isset($_COOKIE["login"])) {
    $email = $_COOKIE["login"];

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
             $(document).ready(function(){
                $(".fa-trash").click(function(){
                    var code=$(this).attr("rel");
                   // alert(code);
                    $.post(
                        "del_album.php",{id:code},function(data){
                            if(data="success"){
                                $("#"+code).fadeOut(1000);
                            }
                        }
                    )
                });
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
                            <a class="nav-link active" href="#">Home</a>
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
            <?php
            $q = mysqli_query($conn, "Select * from details where email='$email'");
            if ($row = mysqli_fetch_array($q)) {
                ?>
                <div class="row">
                    <div class="col-lg-6">
                        <img src="profile/<?= $row["code"] ?>.jpg" style="height:510px" class="img-fluid">
                    </div>
                    <div class="col-lg-6">

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
                                <td class="td">Religion:</td>
                                <td class="td"><?= $row["religion"] ?></td>
                            </tr>
                            <tr>
                                <td class="td">Occupation:</td>
                                <td class="td"><?= $row["occupation"] ?></td>
                            </tr>
                            <tr>
                                <td class="td">City:</td>
                                <td class="td"><?= $row["city"] ?></td>
                            </tr>
                            <tr>
                                <td class="td">State:</td>
                                <td class="td"><?= $row["state"] ?></td>
                            </tr>
                            <tr>
                                <td class="td">Country:</td>
                                <td class="td"><?= $row["country"] ?></td>
                            </tr>
                        </table>
                        <h3>Create Album</h3>
                        <form action="create_album.php" method="post">
                            Album Name:<input type="text" name="album" class="form-control" required><br>
                            <input type="submit" value="Create" class="btn btn-dark">
                        </form>
                    <?php
            } else {
                header("location:logout.php");
            }
            ?>
                </div>
                <div class="row">
                    <?php
                    $alb = mysqli_query($conn, "Select * from album where email='$email'");
                    $user_code=md5($email);
                    while ($row = mysqli_fetch_array($alb)) {
                        $ig=mysqli_query($conn,"Select * from galleries where album_code='".$row["code"]."'");
                        $src="gallery/folder.png";
                        if($img=mysqli_fetch_array($ig)){
                                $src="gallery/$user_code/".$row["code"]."/".$img["sn"].".jpg";
                         }
                        ?>
                        <div class="col-lg-3" id="<?=$row["code"]?>">
                            <div class="card">
                                <div class="card-body">
                                    <img src="<?=$src?>" class="img-fluid" style="height:250px">
                                </div>
                                <div class="card-footer bg-dark text-center">
                                    <a href="gallery.php?id=<?= $row["code"]?>&name=<?= $row["album_name"] ?>" style="color:white;text-decoration:none;font-weight:600;"> <?= $row["album_name"] ?> </a>
                                    <i class="fa fa-trash" rel="<?=$row["code"]?>" style="color:red; float:right"></i>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php
} else {
    header("location:index.php");
}
?>