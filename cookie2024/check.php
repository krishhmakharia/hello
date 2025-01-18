<?php 
include("db.php");
    if(empty($_POST["email"])||empty($_POST["pass"])){
        header("location:index.php?empty=1");
    }
    else{
        $email=$_POST["email"];
        $pass=$_POST["pass"];
        $q=mysqli_query($conn,"Select * from details where email='$email'");
        if($r=mysqli_fetch_array($q)){
            if($r["password"]==$pass){
                setcookie("login",$email,time()+60*60*24);
                header("location:profile.php");
            }
            else{
                header("location:index.php?invalid_pass=1");
            }
        } 
        else{
            header("location:index.php?invalid_email=1");
        }
    }

?>