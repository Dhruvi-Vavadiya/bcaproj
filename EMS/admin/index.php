<center>
<?php
    ob_start();
  session_start();
    include("../conn.php");
    include("../head.php");
    // print_r($_SESSION);
// print_r($_COOKIE);
    // $_SESSION['paymentid']="pay_NivlNCX6qkEsQ2";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>  
    <style>
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

<section class="vh-50" style="background-color: #9A616D;">
  <div class="container py-5 h-80">
    <div class="row d-flex justify-content-center align-items-center h-80">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-6 d-none d-md-block">
              <img src="../pic/admin.webp"  alt="login form" class="img-fluid h-100 w-100" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-6 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form>

                  
                    <h1 class="text-center fw-bold">Login</h1>
                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                  <div class="form-outline mb-4">
                  <label class="form-label" for="form2Example17">User Name</label>
                    <input type="text" id="form2Example17" name="unm" class="form-control form-control-lg" value="<?php 
                                        if(isset($_COOKIE['aunm'])){
                                            $e=$_COOKIE['aunm'];
                                            echo $e;}
                                        ?>"/>
                    
                  </div>

                  <div class="form-outline mb-4">
                     <label class="form-label" for="form2Example27">Password</label>
                      <input type="password" id="show"  name="pwd" class="form-control form-control-lg" value="<?php 
                                        if(isset($_SESSION['aid'])){
                                            $e=$_SESSION['aid'];
                                            echo $e;}
                                        ?>"/>
                  </div>

                  <div class="form-outline mb-4 ">
                          <input type="checkbox" name="" onclick="myfunction()"id="">
                          <label for="">Show Password</label>
                  </div>
                        
                  <div class="pt-1 mb-4">
                    <input class="btn btn-dark btn-lg btn-block" type="submit" name="login" value="Login">
                  </div>

                  
                  <a href="#" onclick="document.getElementById('id01').style.display='block'" class="small text-muted">Forgot password?</a>

                   

                   <!-- <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="#!"
                      style="color: #393f81;">Register here</a></p>
                  <a href="#!" class="small text-muted">Terms of use.</a>
                  <a href="#!" class="small text-muted">Privacy policy</a> -->
                </form>

    </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> 
<div id="id01" class="modal">
    <center>
      <div class="col-md-9 col-lg-6 col-xl-4 mt-5 ">
            <form class="modal-content animate" method="post" >
            <p class="float-right mt-3 mr-4"><span onclick="document.getElementById('id01').style.display='none'"  class="close" style="font-size: 35px;cursor: pointer;" title="Close Modal">&times;</span></p>
              <div class="container p-4">
                <h1 class="text-center">Forget Password</h1><br>
                <table class="table table-borderless">
                    <tr>
                        <td>  
                        <input type="text" name="email" placeholder="Name or Email address" class="form-control form-control-lg">
                          </td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="forgetnmorem" class="btn btn-success btn-block btn-lg" style="padding-left: 3rem; padding-right: 3rem;" value="Submit"></td>
                    </tr>
                </table>
              </div>
            </form>
      </div>
    </center>
</div>
<script>
  var modal1 = document.getElementById('id01');
window.onclick = function(event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
    }
}
function myfunction(){
            var show = document.getElementById('show');
            if (show.type== 'password'){
                show.type='text';
            }
            else{
                show.type='password';
            }
        }
</script>
</body>
</html>
<?php
    if(isset($_REQUEST['login'])){
        $user=$_REQUEST['unm'];
        $pwd=$_REQUEST['pwd'];
        $q="select * from login where Name='$user' and Password='$pwd'";
        $res=mysqli_query($conn,$q) or die("Error...".mysqli_error($conn));
        $r=mysqli_fetch_array($res);
        if(mysqli_num_rows($res)>0){
            $_SESSION['aunm']= $r[1];
            setcookie("aunm",$r[1],time() + 172800);
            $_SESSION['aid']= $r[0];
            setcookie("aid",$r[0],time() + 172800);
            
            header("location:dashbord.php");

       }else{
        session_destroy();
        echo "<script>alert('unm and pwd mismatch!!!');</script>";
        // header("location:index.php");
       }
       
    }
    
    if(isset($_REQUEST['forgetnmorem'])){
        $email=$_REQUEST['email'];

        $q="select * from login where Name='$email' OR Email='$email'";
            $result=mysqli_query($conn,$q) or die("Query Failed!!!".mysqli_error($conn));
           if( $r1=mysqli_fetch_array($result)){
            // print_r($r1);
            
            header("location:forgot.php?id=$r1[0]");

           }else{
            echo "<script>alert('email is not present !!!');</script>";
           }
    }
?>
</center>