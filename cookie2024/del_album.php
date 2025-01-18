<?php 
    include("db.php");
    if(isset($_COOKIE["login"])){
        $email=$_COOKIE["login"];
        $user_name=md5($email);
        if(strlen($_REQUEST["id"])>0){
            $code=mysqli_real_escape_string($conn,$_REQUEST["id"]);
            $row=mysqli_query($conn,"Select * from galleries Where album_code='$code' AND email='$email'");
            while($r=mysqli_fetch_array($row)){
                $sn=$r[0];
                $path="gallery/$user_code/$code/$sn.jpg";
                unlink($path);
                mysqli_query($conn,"Delete from galleries where album_code='$code' AND email='$email' AND sn='$sn'");   
            }
            mysqli_query($conn,"Delete from album Where code='$code' AND email='$email' ");
            echo "success";
        }
    }
    // else{
    //     header("location:logout.php");
    // }
?>