<?php
ob_start();
session_start();
    include('head.php');
    include('conn.php');
    include('nav.php');
    // session_destroy();
    // print_r($_REQUEST);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <style>
         @media (min-width:300px)and (max-width:700px) {
            .h1{
              display:none;

            }
            
        }
    </style>
   
</head>


<body >

    <br>
    <div class="container">
        <div class="container">
            <center>
                <section class="vh-50 mt-5">
                    <div class="container mt-5">
                        <div class="row d-flex justify-content-center align-items-center  h-100">

                            <div class="col-md-9 col-lg-6 col-xl-5 mt-2 h1">
                                <img src="./pic/signin-image.png"
                                    class="img-fluid mt-5 float-right"
                                    style="mix-blend-mode:darken; height: 400px; width: 450px; " alt="Sample image">
                            </div>

                            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 mt-5">
                                <form method="post">
                                    <h2 class="text-center mb-4"> Sign In</h2>
                                    <table border="2" class="table">
                                        <tr>
                                            <!-- username -->
                                            <div class="form-outline mb-3">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="basic-addon2"><i
                                                                class='bx bxs-user'></i></span>
                                                    </div>
                                                    <input type="unm" name="unm" class="form-control form-control-lg"
                                                        placeholder="Name or Email" required value="<?php 
                                                     if(isset($_COOKIE['ruser'])){
                                                         $e=$_COOKIE['ruser'];
                                                        echo $e;}
                                                    ?>">
                                                </div>
                                            </div>
                                        </tr>
                                        <!-- password -->
                                        <div class="form-outline mb-3">
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2"><i
                                                            class='bx bxs-lock-alt'></i></span>
                                                </div>
                                                <input type="password" name="pwd" class="form-control form-control-lg"
                                                    placeholder=" Password" required>
                                            </div>
                                        </div>
                                        </tr>
                                        <!-- remember or forgot password -->
                                        <div class="d-flex justify-content-between align-items-center">
                                            <!-- Checkbox -->
                                            <div class="form-check mb-0">
                                                <input class="form-check-input  " type="checkbox" name="rme" />Remember
                                                me
                                            </div>
                                            <a data-bs-toggle="modal" href="#exampleModalToggle"
                                                class="link-primary text-decoration-none">Forgot password?</a>
                                        </div>
                                        <!-- captch -->
                                        <!-- <div class="d-flex justify-content-between align-items-center  mt-2">
                                                <div class="form-outline input-group m-2">
                                                    <input type="text" id="submit" class="form-control form-control-lg"
                                                     placeholder="Enter Captcha Code"  />
                                                </div>
                                              
                                                <div id="image" class="inline h-25 w-25 p-3 " selectable="False"></div>
                                                
                                                
                                        </div> -->
                                        <!-- <p id="key" ></p> -->
                                        <tr>
                                            <div class="text-center text-lg-start mt-4 pt-2">
                                                <input type="submit" name="submit"
                                                    class="btn btn-primary btn-block btn-lg"
                                                    style="padding-left: 3rem; padding-right: 3rem;" value="Login">
                                                <p class="small fw-bold mt-2 text-center pt-1 mb-0">Don't have an
                                                    account? <br> You can
                                                    <a href="reg.php" class="link-danger">Register</a> Your account <br>

                                                </p>
                                                
                                            </div>
                                        </tr>
                                    </table>
                                </form>
                            </div>

            </center>
        </div>
    </div>


    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="Label" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Label">forget name</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">

                            <input type="text" name="email" placeholder="username or email" class="form-control "
                                >
                        </div>
                        <div class="mb-3 modal-footer">
                            <input type="submit" name="submitemail" class="btn btn-success ">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <br>
</body>


</html>



<!--- Login    Page   ---->
<?php

    if(isset($_REQUEST['submit'])){
      $unm=$_REQUEST['unm'];
      $pwd=$_REQUEST['pwd'];
    //   $key=$_REQUEST['key'];

     
    
      if(empty($unm) || empty($pwd)){
        echo "<script>alert('Fill TextBox');</script>";
      }else{
            $q="select * from user where Name='$unm' OR Email='$unm' and Password='$pwd'";
            
          $res=mysqli_query($conn,$q) or die("Error...".mysqli_error($conn));
          $r=mysqli_fetch_array($res);
              if(mysqli_num_rows($res)>0){
                  $_SESSION['unm']= $r[1];
                  $_SESSION['id']= $r[0];
                       if(!empty($_REQUEST['rme'])){
                          setcookie("ruser",$unm,time() + 86400);
                          }  
                        //   echo $_SESSION['unm'];     
                               
                          header("location:captcha.php");
            ?>
        
            <?php
                  
           }else{
            session_destroy();
            echo "<script>alert('unm and pwd mismatch!!!');</script>";
            header("location:login.php");
           }
           
        }
      }
 
      if(isset($_REQUEST['submitemail'])){
        $email=$_REQUEST['email'];
  
       
        $q2="select * from user where Email='$email' OR Name='$email'";
        $result1=mysqli_query($conn,$q2) or die("Query Failed!!!".mysqli_error($conn));
       if( $r2=mysqli_fetch_array($result1)){
        // print_r($r1);
        setcookie("ruser",$r2[1],time() + 86400);
        header("location:forgot.php?id=$r2[0]");
       }else{
        echo "<script>alert('email or username is not present !!!');</script>";
       }
    
    }
?>