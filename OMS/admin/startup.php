<?php
ob_start();
    include("../head_tag.php");
   include("Nav.php"); 
   session_start();
 if(!isset($_SESSION['uname'])){
  header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body, html {
        height: 100%;
        }
        .bg {
        background-image: url("https://img.freepik.com/free-photo/volumetric-musical-background-with-treble-clef-notes-generative-ai_169016-29575.jpg?w=826&t=st=1694436246~exp=1694436846~hmac=6668d11ca56e1504d76f70c3de73c0d09aae21d862d1fc55c1315aba054b4fac");
        height: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        }
    </style>
</head>

<body class="bg">    

    <div class="text-light align-items-center">
              <div class="container">
                <div class="row mt-5">
                  <div class="col-xl-3 mt-lg-5 ">
                    <h1 class="mt-5">  <?php echo "Welcome ". $_SESSION['uname'] .""; ?> </h1>
                    <a  href="welcome.php" class="mt-4 btn text-uppercase btn-primary">start</a>         
                 </div>
                </div>
              </div>
            </div>
</body>
</html>