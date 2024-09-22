<?php
session_start();
    include('head.php');
    include('nav.php'); 
    include('conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <div class="container my-5 z-depth-1">

        <!--Section: Content-->
        <section class="dark-grey-text">

        <div class="row pr-lg-5">
            <div class="col-md-7 mb-4 pt-5 ">
                <div class="view  mb-4  pt-5 ">
                    <img src="https://www.discountclubs.com/media/vxxa14fm/contactus.png" class="img-fluid mt-lg-5" alt="smaple image">
                </div>
            </div>
            <div class="col-md-5 mt-5 align-items-center">
                                <div class="mt-5">
                                        <form method="post">
                                            
                                             <div class="form-outline mb-4">
                                                <div class="input-group mb-3"> 
                                                    <div class="input-group-append">
                                                         <span class="input-group-text" id="basic-addon2"><i class='bx bx-envelope'></i></span>
                                                    </div>                  
                                                    <input class="form-control form-control-lg" type="email" placeholder="Email" name="email" required>
                                                                    
                                                </div>
                                             </div>
                                             <div class="form-outline mb-4">
                                                <div class="input-group mb-3">        
                                                   
                                                    <textarea class="form-control form-control-lg" type="text"  rows="3" placeholder="Message" name="mess" required></textarea>
                                                                    
                                                </div>
                                             </div>
                                             <input type="submit" name="submit" class="btn btn-primary btn-block btn-lg" style="padding-left: 3rem; padding-right: 3rem;" value="Send Message">
                                        </form>

            </div>
            </div>
        </div>

        </section>
        <!--Section: Content-->


    </div>
    <footer ><?php include('footer.php');?></footer>
</body>
</html>
<?php
    if(isset($_REQUEST['submit'])){
        $email=$_REQUEST['email'];
        $mess=$_REQUEST['mess'];

        if(empty($email) || empty($mess)){
            echo "<script>alert('Fill TextBox');</script>";
        }else{
             $q="INSERT INTO `feedback` VALUES (NULL, '$email', '$mess', current_timestamp())";
            //  INSERT INTO `feedback`(`FID`, `Email`, `Message`, `date`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]')
        if(mysqli_query($conn,$q)){
            header("location:index.php");
       }else{
           die("Could not add dept.".mysqli_error($conn));
       }
        }
       
       
    }
?>