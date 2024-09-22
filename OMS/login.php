<?php
session_start();
ob_start();
 include('./head_tag.php');
 include('./conn.php'); 
 include('./nav.php');
// unset($_SESSION['ruser']);
// session_destroy();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <style>
        body{
            background-color: lightblue;
        }
        
        .modal {
          display: none;
          position: fixed; /* Stay in place */
          z-index: 1; /* Sit on top */
          left: 0;
          top: 0;
          width: 100%; /* Full width */
          height: 100%; /* Full height */
          overflow: auto; /* Enable scroll if needed */
          background-color: rgb(0,0,0); /* Fallback color */
          background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
          padding-top: 60px;
        }


        .animate {
          -webkit-animation: animatezoom 0.6s;
          animation: animatezoom 0.5s
        }

        @-webkit-keyframes animatezoom {
          from {-webkit-transform: scale(0)} 
          to {-webkit-transform: scale(1)}
        }
          
        @keyframes animatezoom {
          from {transform: scale(0)} 
          to {transform: scale(1)}
        }

    </style>
</head>
<body>
<section class="vh-50 mt-5">
  <div class="container-fluid mt-5">
    <div class="row d-flex justify-content-center align-items-center  h-100">
      <div class="col-md-9 col-lg-6 col-xl-5 mt-5">
        <img src="./pic/login.avif"class="img-fluid mt-5" style="mix-blend-mode:darken;" alt="Sample image">
      </div>

      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 mt-5">
        <form method="post">
            <h2 class="text-center mb-4"> Sign In</h2>
         <!-- Email input -->
          <div class="form-outline mb-4">
              <div class="input-group mb-3">                   
                    <input type="text" name="unm" class="form-control form-control-lg" placeholder="UserName" value="<?php 
                               if(isset($_COOKIE['ruser'])){
                                $e=$_COOKIE['ruser'];
                                echo $e;}
                            ?>">
                            <div class="input-group-append">
                      <span class="input-group-text" id="basic-addon2"><i class="bx bxs-user"></i></span>
                    </div>
              </div>
          </div>
          <!-- Password input -->
          <div class="form-outline mb-3">
              <div class="input-group mb-3">
                  <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2"><i class='bx bxs-lock-alt'></i></span>
                  </div>
                    <input type="password" name="pwd"  class="form-control form-control-lg" placeholder="Password">
              </div>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
                <div class="form-check mb-0">
                    <input class="form-check-input  " type="checkbox" name="rme"  />Remember me
                </div> 
                <a href="#" onclick="document.getElementById('id02').style.display='block'" class="link-primary text-decoration-none">Forgot password?</a>
          </div>
 
          <div class="text-center text-lg-start mt-4 pt-2">
                <input type="submit" name="submit" class="btn btn-primary btn-block btn-lg" style="padding-left: 3rem; padding-right: 3rem;" value="Login">
                <p class="small fw-bold mt-2 text-center pt-1 mb-0">Don't have an account? <br> You can
                    <a href="./regist/reg.php"  class="link-danger">Register</a> Your account <br>
                    And <a href="./regist/editprofile.php"  class="link-danger">Edit</a> Your account
                     <?php
                      // if(isset($_SESSION['unm'])){
                      //   echo 'And <a href="#"
                      //   <script type="text/JavaScript"> 
                      //   onclick="document.getElementById('.id01.').style.display='.block.'";
                      //   </script>
                      //       class="link-danger">Edit</a> Your account';
                      // }
                  ?>
                     
                </p>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<!-- forgot password -->
<?php
  if(isset($_COOKIE['ruser'])){?>
<div id="id02" class="modal">
    <center>
      <div class="col-md-9 col-lg-6 col-xl-4 mt-5 ">
            <form class="modal-content animate" method="post" >
              <div class="container p-4">
                <h1 class="text-center">Forget Password</h1><br>
                <table class="table table-borderless">
                    <tr>
                        <td>  
                        <input type="text" name="email" placeholder="username or email" class="form-control form-control-lg" readonly
                        value="<?php
                                  if(isset($_COOKIE['ruser'])){
                                    $e=$_COOKIE['ruser'];
                                    echo $e;
                                  }
                               ?>">
                          </td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="submitemail" class="btn btn-success btn-block btn-lg" style="padding-left: 3rem; padding-right: 3rem;" value="Next >>>"></td>
                    </tr>
                </table>
              </div>
            </form>
      </div>
    </center>
</div>
<?php 
}
?>

<!-- edit profile get user name -->
<?php
  // if(isset($_SESSION['unm'])){?>
<!-- <div id="id01" class="modal">
    <center>
      <div class="col-md-9 col-lg-6 col-xl-4 mt-5 ">
          <form class="modal-content animate"  method="post">
          <p class="float-right mt-3 mr-4"><span onclick="document.getElementById('id01').style.display='none'"  class="close" style="font-size: 35px;cursor: pointer;" title="Close Modal">&times;</span></p>
            <div class="container p-4">
            <h3 class="text-center">Edit Profile</h3>
            <table class="table table-borderless">
                    <tr>
                        <td>  
                          <input type="text" name="uname" placeholder="username" class="form-control form-control-lg my-3" value="<?php 
                          // echo $_SESSION['unm']?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                          <input type="submit" name="submitusername" class="btn btn-success btn-block btn-lg" style="padding-left: 3rem; padding-right: 3rem;" value="Next >>>">
                        </td>
                    </tr>
                </table>
            </div>
          </form>
      </div>
    </center>
</div> -->
 <?php 
// }
?>

  

<script>
// var modal = document.getElementById('id01');
// window.onclick = function(event) {
//     if (event.target == modal) {
//         modal.style.display = "none";
//     }
// }
var modal1 = document.getElementById('id02');
window.onclick = function(event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
    }
}
</script>
</body>
</html>

<?php

    if(isset($_REQUEST['submit'])){
      $unm=$_REQUEST['unm'];
      $pwd=$_REQUEST['pwd'];
    
      if(empty($unm) || empty($pwd)){
        echo "<script>alert('Fill TextBox');</script>";
      }else{
            $q="select * from user where unm='$unm' and pwd='$pwd'";
          $res=mysqli_query($conn,$q) or die("Error...".mysqli_error($conn));
          $r=mysqli_fetch_array($res);
              if(mysqli_num_rows($res)>0){
                  $_SESSION['unm']= $r[1];
                       if(!empty($_REQUEST['rme'])){
                          setcookie("ruser",$unm,time() + 86400);
                          }                  
                  header("location:user_wise_view_playlist.php");
                  $_SESSION['pid']= $r[0];
           }else{
            session_destroy();
            echo "<script>alert('unm and pwd mismatch!!!');</script>";
            header("location:login.php");
           }
           
        }
      }
      if(isset($_REQUEST['submitusername'])){
        $uname=$_REQUEST['uname'];

        $q1="select * from user where unm='$uname'";
        $result=mysqli_query($conn,$q1) or die("Query Failed!!!".mysqli_error($conn));
       if( $r1=mysqli_fetch_array($result)){
        // print_r($r1);
        header("location:./regist/editprofile.php?id=$r1[0]");
       }else{
        echo "<script>alert('username is not present !!!');</script>";
       }
		
    }
    if(isset($_REQUEST['submitemail'])){
      $email=$_REQUEST['email'];

     
      $q2="select * from user where email='$email' OR unm='$email'";
      $result1=mysqli_query($conn,$q2) or die("Query Failed!!!".mysqli_error($conn));
     if( $r2=mysqli_fetch_array($result1)){
      // print_r($r1);
      header("location:./regist/forgotpwd.php?id=$r2[0]");
     }else{
      echo "<script>alert('email or username is not present !!!');</script>";
     }
  
  }
  // print_r($_SESSION);
  // echo "<--- session<br> cookie  ---> ";
  // print_r($_COOKIE);
    
?>