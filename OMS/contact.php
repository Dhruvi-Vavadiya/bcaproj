<?php ob_start(); session_start(); include('head_tag.php'); include('conn.php'); include('nav.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>body{background-color: lightblue;}
    a{
        background-color: rgb(125 125 125 / 25%);
  border-radius: 30px;
  text-decoration: none;
    }
    body{
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<div class="container row mt-5 ml-5">
            
              
                 <div class="col-sm-6 col-md-4 col-lg-4 col-xl-6 mt-5">
                     <img src="./pic/Contactus.PNG"  class="rounded-lg" alt="">
                     <div class="mt-3">
                        <h4>Email</h4>
                        <h6 class="lead"><span> 💌 </span>HiLyrics@gmail.com</h6>
                     </div> 
                     <div class="mt-3 ">
                        <h4>Follow Us</h4>
                        <h5>
                            <a href="http://www.YouTube.com" target="_blank" class="badge badge-pill badge-danger rounded-pill text-light m-3"><i
                            class="fa fa-youtube fa-lg yt"></i>Youtube</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                            <a href="http://www.facebook.com" target="_blank" class="badge badge-pill badge-info rounded-pill text-light m-3"><i
                            class="fa fa-linkedin fa-lg link"></i>LinkedIn</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                            <a href="http://www.instragram.com" target="_blank" style="background-color: #dd2a7b;" class="badge badge-pill rounded-pill text-light m-3"><i
                            class="fa fa-instagram fa-lg inst"></i>Instragram</a>&nbsp;&nbsp;&nbsp;&nbsp;
                        </h5>
                     </div>
                </div>
                <div class="col-sm-6 col-md-8 col-lg-8 col-xl-6 mt-5">
                    <form method="post">       
                          <table  class='table table-borderless mt-3'>
                                     <tbody>
                                         <tr>
                                             <td>
                                                 <input type="text" class="form-control form-control-lg p-4 mb-3" placeholder="Name" name="nm" required id="">
                                             </td>
                                         </tr>
                                         <tr>
                                             <td>
                                                 <input type="email" class="form-control form-control-lg p-4 mb-3" placeholder="Email " name="email" required id="">
                                             </td>
                                         </tr>
                                         <tr>
                                             <td>
                                             <textarea name="mess" id="" class="form-control form-control-lg p-4 mb-4" cols="50" placeholder="Message...." required rows="5"></textarea>
                                             </td>
                                         </tr>
                                         <tr>
                                             <td>
                                             <input type="submit" class="btn btn-primary btn-block btn-lg rounded-pill" style="padding-left: 3rem; padding-right: 3rem;" value="Contact" name="submit">
                                             </td>
                                         </tr>
                                     </tbody>
                                 </table>
                     </form>
                </div>
</div>
<footer class=" pt-3"><?php include('footer.php');?></footer>
</body>
</html>
<?php
    if(isset($_REQUEST['submit'])){
        $nm=$_REQUEST['nm'];
        $email=$_REQUEST['email'];
        $mess=$_REQUEST['mess'];
        
        if(empty($email) || empty($mess) || empty($nm)){
            echo "<script>alert('Fill TextBox');</script>";
        }
        $q="INSERT INTO `contact` VALUES (NULL,'$nm', current_timestamp(), '$mess', '$email');";
      
        if(mysqli_query($conn,$q)){
             header("location:view_all_song.php");
        }else{
            die("Could not add dept.".mysqli_error($conn));
        }
    }
?>
