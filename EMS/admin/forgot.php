<?php
ob_start();
    include('../head.php'); 
    include('../conn.php');
    session_start();
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $q="select * from login where Id='$id'";
        $result=mysqli_query($conn,$q) or die();
        $r=mysqli_fetch_array($result);
        // print_r($r);
    }else{
        header('location:index.php');
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<center>
<body class="container-fluid">
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-4 mt-5">
        <form action="" method="post">
        
        <h2>Forgot Password</h2><br>
        <p class="text-center">Welcome, <?php 
            echo $r[1];
         ?></p>
            <div class="form-group">
            
                <input type="password" name="pwd" class="form-control" placeholder="Password" required><br>
            </div>
            <div class="form-group">
            
            <input type="password" name="cpwd" class="form-control" placeholder="Confirm Password" required><br>
        </div>
        <input type="submit" name="forgot" class="btn btn-primary btn-block btn-lg" style="padding-left: 3rem; padding-right: 3rem;" value="FORGET">
        </form>
    </div>
</div>
</body>
</center>
</html>
<?php

    if(isset($_REQUEST['forgot'])){
        $pwd=$r[3];
        $cpwd=$_REQUEST['pwd'];
        $ncpwd=$_REQUEST['cpwd'];
        
        if($pwd == $cpwd){
            echo "<script>alert('old password same as not valid !!!');</script>";
        }else{
            if($cpwd == $ncpwd){
                $q ="update login set Password='$ncpwd' where Id=$id";
                    if(mysqli_query($conn,$q)){
                        header("location:index.php");
                    }else{
                        die("Could not update admin pwd.".mysqli_error($conn));
                    }
            }else{
                echo "<script>alert('new pasword ($cpwd)and new pwd ($ncpwd) !!!');</script>";
                echo "<script>alert('pleace enter pwd same as confirm pwd !!!');</script>";
            }
        }      
    }
?>

