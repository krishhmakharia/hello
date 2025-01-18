<?php
    include ("db.php");
    if(empty($_POST["fname"])||empty($_POST["lname"])||empty($_POST["gender"])||empty($_POST["birth"])||empty($_POST["email"])||empty($_POST["pass"])||empty($_POST["repass"])||empty($_POST["caste"])||empty($_POST["religion"])||empty($_POST["occupation"])||empty($_POST["city"])||empty($_POST["state"])||empty($_POST["country"])){
       header("location:registeration.php?empty=1");
     
    }
    else{
        $fname=$_POST["fname"];
        $lname=$_POST["lname"];
        $gender=$_POST["gender"];
        $birth=$_POST["birth"];
        $email=$_POST["email"];
        $pass=$_POST["pass"];
        $repass=$_POST["repass"];
        $caste=$_POST["caste"];
        $religion=$_POST["religion"];
        $occupation=$_POST["occupation"];
        $city=$_POST["city"];
        $state=$_POST["state"];
        $country=$_POST["country"];
        //echo "All values are successfully retrive";
        if($pass==$repass){
            $sn=0;
            $rs=mysqli_query($conn,"Select MAX(sn) from details");
            if($r=mysqli_fetch_array($rs)){
                $sn=$r[0];
            }
            $sn=$sn+1;
            $code=md5($email);//encription
            $target="profile/$code.jpg";
            if(move_uploaded_file($_FILES["pic"]["tmp_name"],$target)){
                if(mysqli_query($conn,"Insert into details values($sn,'$code','$fname','$lname','$email','$pass','$gender','$caste','$religion','$occupation','$birth','$city','$state','$country')")>0){
                    mkdir("gallery/$code");
                    header("location:registeration.php?success=1");
                }
                else{
                    header("location:registeration.php?again=1");
                }
            }
            else{
                header("location:registeration.php?img_error=1");
            }


        }
        else{
            header("location:registeration.php?missmatch=1");
        }
    }
?>