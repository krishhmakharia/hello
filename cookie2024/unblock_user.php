<?php 
    include("db.php");
    if(isset($_COOKIE["login"])){
        $email=$_COOKIE["login"];
        $code=md5($email);
        if(isset($_REQUEST["id"]) && strlen(trim($_REQUEST["id"]))>0){
            $ucode=mysqli_real_escape_string($conn,trim($_REQUEST["id"]));
            $rs=mysqli_query($conn,"Select email from details Where code='$ucode'");
            $uemail="";
            if($r=mysqli_fetch_array($rs)){
                $uemail=$r["email"];
            }
            if($q1=mysqli_query($conn,"Update intrested set interest=1, blocked='' Where (email='$uemail' AND code='$code') OR (email='$email' AND code='$ucode')")>0){
                echo "success";
            }
            
        }
    }
        
?>