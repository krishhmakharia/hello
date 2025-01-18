<?php 
include("db.php");
    if(isset($_COOKIE["login"])){
        $email=$_COOKIE["login"];
        if(isset($_POST["cp"]) && isset( $_POST["np"]) && isset( $_POST["rp"]) ){
            $cp=$_POST["cp"];
            $np=$_POST["np"];
            $rp=$_POST["rp"];
            $rs=mysqli_query($conn,"Select * from details Where email='$email' ");
             if($r=mysqli_fetch_array($rs)){
                if($r["password"]==$cp){
                    if($np==$rp){
                        if($q=mysqli_query($conn,"Update details set password='$np' where email='$email'")>0){
                            header("location:change_password.php?success=1");
                        }
                        else{
                            header("location:change_password.php?again=1");
                        }
                    }
                    else{
                        header("location:change_password.php?missmatch=1");
                    }
                }
                else{
                    header("location:change_password.php?invalid_pass=1");
                }
             }
             else{
                header("location:logout.php?");
             }

        }
        else{
            header("location:change_password.php?empty=1");
        }
        
    }
    else{
        header("location:logout.php");
    }
?>