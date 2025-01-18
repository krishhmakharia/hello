<?php 
    include("db.php");
    if(isset($_COOKIE["login"])){
        $email=$_COOKIE["login"];
        $user_code=md5($email);
        if(strlen($_REQUEST["id"])>0 && strlen($_REQUEST["code"])>0){
            $sn=intval($_REQUEST["id"]);
            $code=mysqli_real_escape_string($conn,$_REQUEST["code"]);
            if(mysqli_query($conn,"Delete from galleries where sn=$sn AND album_code='$code' AND email='$email' ")>0){
                echo "success";
                unlink("gallery/$user_code/$code/$sn.jpg");
            }
        }
    }
?>