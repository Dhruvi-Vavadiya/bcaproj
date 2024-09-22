<?php
ob_start();
    include('../head_tag.php'); 
    include('../conn.php');
    session_start();
    if(isset($_SESSION['aid'])){
        $aid=$_SESSION['aid'];
        $q="select * from admin where aid='$aid'";
        $result=mysqli_query($conn,$q) or die();
        $r=mysqli_fetch_array($result);
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
        
        <h2>Forget Password</h2><br>
        <p class="text-center"><?php if(isset($_SESSION['uname'])){
            $e=$_SESSION['uname'];
            echo $e;
        } ?></p>
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
        $pwd=$r[2];
        $cpwd=$_REQUEST['pwd'];
        $ncpwd=$_REQUEST['cpwd'];
        
        if($pwd == $cpwd){
            echo "<script>alert('old password same as not valid !!!');</script>";
        }else{
            if($cpwd == $ncpwd){
                $q ="update admin set pwd='$ncpwd' where aid=$aid";
                    if(mysqli_query($conn,$q)){
                        header("location:index.php");
                    }else{
                        die("Could not update admin pwd.".mysqli_error($conn));
                    }
            }else{
                echo "<script>alert('new pasword ($cpwd)and new pwd ($ncpwd) !!!');</script>";
                echo "<script>alert('pleace enter pwd same as new pwd !!!');</script>";
            }
        }      
    }
?>

