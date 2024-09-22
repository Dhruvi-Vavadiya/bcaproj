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
    <title>Welcome</title>
  <style>
    .text-decoration-none:hover {
            padding: 5px;
            border-radius:10px;
            transition: 0.4s ease;
            box-shadow: 0 0 5px black,
                        0 0 20px black,
                        0 0 60px black,
                        0 0 150px black;
            color:blue;
            }
            body{
              background-image:url("https://img.freepik.com/free-photo/microphone-with-unfocused-background-audience_1232-991.jpg?w=740&t=st=1694872766~exp=1694873366~hmac=e9cd1344c1da234401de2d6e02d0751d31e5ffb168150fd91eefc752c0c7d663");
              background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
            }
            a {
            color: white;
            }
  </style>
</head>
<body>
<div class="container-fluid row mt-5">
    
      <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5 mt-2 ml-5">
        <form action="" method="post" enctype="multipart/form-data">
          <table  class="table mt-5 text-center text-light table-borderless" >
            <tr>
              <th><h3 ><u>Title</u></h3></th>
              <th><h3><u>View</u></h3></th>
            </tr>
            <tr>
              <td><h5>User :-</h5></td>
              <td><a href="View_User.php" class="text-decoration-none ">Click here >>></a></td>
            </tr>
            <tr>
              <td><h5>Song :-</h5></td>
              <td><a href="view_song.php" class="text-decoration-none ">Click here >>></a></td>
            </tr>
            <tr>
              <td><h5>Playlist :-</h5></td>
              <td><a href="playlist_view.php" class="text-decoration-none ">Click here >>></a></td>
            </tr>
            <tr> 
              <td><h5>Artists :-</h5></td>
              <td><a href="View_Artists.php" class="text-decoration-none ">Click here >>></a></td>
            </tr>
            
            <tr>
              <td><h5>Contact :-</h5></td>
              <td><a href="View_ContactUs.php" class="text-decoration-none ">Click here >>></a></td>
            </tr>
            <tr>
              <td><h5>Feedback :-</h5></td>
              <td><a href="View_Feedback.php" class="text-decoration-none ">Click here >>></a></td>
            </tr>
          </table>
        </form>
      </div>
    </center>
  </div>
</body>
</html>