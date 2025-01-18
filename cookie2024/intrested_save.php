<?php 
include("db.php");
    if(isset($_COOKIE["login"])){
        $email=$_COOKIE["login"];
        if(isset($_REQUEST["id"]) && strlen(trim($_REQUEST["id"]))>0){
            $user_code=mysqli_real_escape_string($conn,trim($_REQUEST["id"]));
            if($q=mysqli_query($conn,"Insert into intrested values('$email','$user_code',0,'')")>0){
                echo "success";
            }
        }
    }
    else{
        header("location:logout.php");
    }
?>