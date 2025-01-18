<?php 
    include("db.php");
    if(isset($_COOKIE["login"])){
        if(empty($_POST["fname"]) || empty($_POST["lname"]) || empty($_POST["gender"]) || empty($_POST["birth"]) || empty($_POST["caste"]) || empty($_POST["religion"]) || empty($_POST["occupation"]) || empty($_POST["city"]) || empty($_POST["state"]) || empty($_POST["country"]) ){
            header("location:edit.php?empty=1");
         
        }
        else{
            $email=$_COOKIE["login"];
            $fname=$_POST["fname"];
            $lname=$_POST["lname"];
            $gender=$_POST["gender"];
            $birth=$_POST["birth"];
            $caste=$_POST["caste"];
            $religion=$_POST["religion"];
            $occupation=$_POST["occupation"];
            $city=$_POST["city"];
            $state=$_POST["state"];
            $country=$_POST["country"];
    
            if(mysqli_query($conn,"Update details set fname='$fname', lname='$lname', gender='$gender', birth='$birth', caste='$caste', religion='$religion', occupation='$occupation', city='$city', state='$state', country='$country' where email='$email' ")){
                header("location:profile.php?updated_success=1");
            }
            else{
                header("location:edit.php?again=1");
            }
    
        }
    }
    else{
        header("location:index.php");
    }
?>