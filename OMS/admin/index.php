<center>
<?php
    ob_start();
  session_start();
    include("../conn.php");
    include("../head_tag.php");
    // print_r($_SESSION);
   
//  if(isset($_SESSION['uname'])){
//   header("location:startup.php");
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>  
</head>
<body>
<section class="vh-50 mt-5">
    <div class="container-fluid mt-5">
        <div class="row d-flex justify-content-center align-items-center mt-5 h-80">
            
            <div class="col-md-9 col-lg-6 col-xl-5 mt-5">
                <img src="https://t4.ftcdn.net/jpg/03/47/28/51/360_F_347285196_qAEPGagMfwAEueO15AcUTWt1KPI3v87c.jpg" class="img-fluid mt-5"  alt="Sample image">
            </div>

            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 mt-5">
                    <form action="" method="post">
                        <h2>Admin Login</h2><br>
                        <div class="input-group my-3 align-center ">
                                <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><i class="bx bxs-user"></i></span>
                                </div>
                                <input type="text" name="unm" class="form-control" placeholder="UserName" value="<?php 
                                        if(isset($_COOKIE['ruser1'])){
                                            $e=$_COOKIE['ruser1'];
                                            echo $e;}
                                        ?>">
                        </div>
                        <div class="input-group my-3 align-center ">
                                <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><i class='bx bxs-lock-alt'></i></span>
                                </div>
                                <input type="password" name="pwd"  class="form-control" placeholder="Password">
                        </div>

                       

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <!-- Checkbox -->
                                <div class="form-check mb-0">
                                <input class="form-check-input  " type="checkbox" name="rme"/>Remember me
                                </div> 
                                <a href="Forgot_pwd.php" class="link-primary text-decoration-none">Forgot password?</a>
                        </div>

                        
                        <input type="submit" name="login" value="Login" class="btn font-weight-bold btn-primary btn-block" >           
                    </form>   
            </div>

        </div>
    </div>
</section>
    
</body>
</html>
<?php
    if(isset($_REQUEST['login'])){
        $user=$_REQUEST['unm'];
        $pwd=$_REQUEST['pwd'];
        $q="select * from admin where anm='$user' and pwd='$pwd'";
        $res=mysqli_query($conn,$q) or die("Error...".mysqli_error($conn));
        $r=mysqli_fetch_array($res);
        if(mysqli_num_rows($res)>0){
            $_SESSION['uname']= $r[1];
            $_SESSION['aid']= $r[0];
            header("location:startup.php");
            if(!empty($_REQUEST['rme'])){
                setcookie("ruser1",$user,time() + 1*24*60*60);     
                }

       }else{
        session_destroy();
        echo "<script>alert('unm and pwd mismatch!!!');</script>";
        header("location:index.php");
       }
       
    }
    
?>
</center>