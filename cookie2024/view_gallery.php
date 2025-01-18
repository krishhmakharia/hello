<?php
include("db.php");
if (isset($_COOKIE["login"])) {
    $email = $_COOKIE["login"];
    $code = md5($email);
    if (isset($_GET["id"])) {
        $user_code = $_GET["id"];
        if (mysqli_query($conn, "Select * from details where code IN (Select code from intrested where email='$email'AND interest=1 ) OR email IN(Select email from intrested where code='$user_code' AND interest=1) ")) {
                ?>
                <!DOCTYPE html>
                <html lang="en">

                <head>
                    <title>Album</title>
                    <meta charset="utf-8">
                    <!-- Latest compiled and minified CSS -->
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

                    <!-- Latest compiled JavaScript -->
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                    <script src="https://code.jquery.com/jquery-2.2.4.js"
                        integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

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
                            <?php
                            $alb = mysqli_query($conn, "Select * from album where email IN (Select email from details where code='$user_code')");
                            $code = md5($email);
                            while ($row = mysqli_fetch_array($alb)) {
                                $ig = mysqli_query($conn, "Select * from galleries where album_code='" . $row["code"] . "'");
                                $src = "gallery/folder.png";
                                if ($img = mysqli_fetch_array($ig)) {
                                    $src = "gallery/$user_code/" . $row["code"] . "/" . $img["sn"] . ".jpg";
                                }
                                ?>
                                <div class="col-lg-3" id="<?= $row["code"] ?>">
                                    <div class="card">
                                        <div class="card-body">
                                            <img src="<?= $src ?>" class="img-fluid" style="height:250px">
                                        </div>
                                        <div class="card-footer bg-dark text-center">
                                            <a href="view_album.php?id=<?= $user_code ?>&name=<?= $row["code"] ?>"
                                                style="color:white;text-decoration:none;font-weight:600;"> <?= $row["album_name"] ?> </a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        </di>
                    </div>
                </body>

                </html>
                <?php
            }
        
    }
} else {
    header("location:index.php");
}
?>