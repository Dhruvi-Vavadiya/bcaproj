<?php
    //  include("../head_tag.php");
    //  include("../conn.php");
    //  ob_start();
    // session_start();
    //  if(isset($_SESSION['pid'])){
    //      $id=$_SESSION['pid'];
         
    //      $q="select * from user where uid='$id'";
    //      $result=mysqli_query($conn,$q) or die();
    //      $r=mysqli_fetch_array($result); 
    //     //  print_r($r[1]);
    //      echo "<script>alert('".$r[1]."');</script>";
    //  }else{
    //     echo "<script>alert('and your name');</script>";
    //     header('location:../login.php');
    //  }
    //  print_r($_COOKIE);
?>
<?php
     include("../head_tag.php");
     include("../conn.php");
     ob_start();
    
     if(isset($_GET['id'])){
         $id=$_GET['id'];
         
         $q="select * from user where uid='$id'";
         $result=mysqli_query($conn,$q) or die();
         $r=mysqli_fetch_array($result); 
     }else{
        header('location:../login.php');
     }
    //  print_r($_COOKIE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
        <div class="container-fluid row mt-2">
            <center>
                <div class="col-md-9 col-lg-6 col-xl-4 mt-5">
                        <form method="post">
                            <table class="table table-borderless">
                                 <h2 class="text-center mb-5"> Forget Password</h2>
                                    
                                <tr>
                                    <td>
                                        <div class="form-group">
                                                <input type="password" name="cpwd" class="form-control form-control-lg"placeholder="New password" required/>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                                <input type="password" name="ncpwd" class="form-control form-control-lg"placeholder="New Confirm password" required/>
                                        </div>
                                    </td>
                                </tr> 
                                <tr>
                                    <td>
                                        <input type="submit" name="submit" class="btn btn-primary btn-block btn-lg" style="padding-left: 3rem; padding-right: 3rem;" value="FORGET">
                                    </td>
                                </tr>                              
                            </table>
                        </form>
                </div>
            </center>
        </div>
</center>
</body>
</html>

<?php
    if(isset($_REQUEST['submit'])){
        $pwd=$r[3];
        $cpwd=$_REQUEST['cpwd'];
        $ncpwd=$_REQUEST['ncpwd'];
        
        if($pwd == $cpwd){
            echo "<script>alert('old password same as not valid !!!');</script>";
        }else{
            if($cpwd == $ncpwd){
                include('../conn.php');
                $q ="update user set pwd='$ncpwd' where uid=$id";
                    if(mysqli_query($conn,$q)){
                        header("location:../login.php");
                    }else{
                        die("Could not update dept.".mysqli_error($conn));
                    }
            }else{
                echo "<script>alert('new pasword ($cpwd)and new pwd ($ncpwd) !!!');</script>";
                echo "<script>alert('pleace enter pwd same as new pwd !!!');</script>";
            }
        }      
    }
?>