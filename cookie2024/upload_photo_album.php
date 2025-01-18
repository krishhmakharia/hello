<?php
include("db.php");
    if(isset($_COOKIE["login"])){
        $email= $_COOKIE["login"];
        if(isset($_GET["id"])){
            $code=mysqli_real_escape_string($conn,$_GET["id"]);
            $user_code=md5($email);
            $sn=0;
            $rs=mysqli_query($conn,"Select MAX(sn) from galleries WHERE album_code='$code' AND email='$email' ");
            if($row=mysqli_fetch_array($rs)){
                $sn= $row[0];
            }
            $sn++;
            $target="gallery/$user_code/$code/$sn.jpg";
            // echo $sn;
            // echo $target;
            if(move_uploaded_file($_FILES["pic"]["tmp_name"],$target)){
                if(mysqli_query($conn,"Insert into galleries values($sn,'$code','$email')")){
                    header("location:gallery.php?id=$code&success=1");
                }
                else{
                    header("location:gallery.php?id=$code&again=1");
                }
            }
            else{
                header("location:gallery.php?id=$code&img_empty=1");
            }
               
        }
        else{
            header("location:gallery.php?id=$code&empty=1");
        }
    }
    else{
        header("location:logout.php");
    }
?>