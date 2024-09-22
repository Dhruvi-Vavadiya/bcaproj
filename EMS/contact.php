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
    <style>
        .img-fluid {
            max-width: 70%;
            max-height: 70%;
            }
            .head{
                font-family: cursive;

            }
    </style>
</head>
<body>
    <div class="conatiner  ml-5 ">
            <div class="container">

                    <section class="dark-grey-text">

                        <div class="row ">
                                
                                <div class="col-md-5 mt-5 align-items-center">
                                    <div class="mt-5">
                                        
                                        <h3 class="font-weight-bold mb-4 display-4 head">Contact US</h3>

                                        <form method="post">
                                            <div class="form-outline mb-4">
                                                <div class="input-group mb-3"> 
                                                    <div class="input-group-append">
                                                         <span class="input-group-text" id="basic-addon2"><i class="bx bxs-user"></i></span>
                                                    </div>                  
                                                    <input class="form-control form-control-lg" type="text" placeholder="Name" name="nm" required>
                                                                    
                                                </div>
                                             </div>
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
                                <div class="col-md-7 mb-4 mt-5 pt-5 ">

                                    <div class="view">
                                        <img src="https://static1.s123-cdn-static-a.com/ready_uploads/svg/normal_604d33453977c.svg" class="img-fluid" alt="smaple image">
                                    </div>

                                </div>
                        </div>

                    </section>
        


        </div>
    </div>
    <footer ><?php include('footer.php');?></footer>
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
        $q="INSERT INTO `contact` VALUES (Null,'$nm','$email','$mess',current_timestamp())";
        // INSERT INTO `contact` (`CID`, `Name`, `Email`, `Message`, `date`) VALUES (NULL, 'dhruv', 'dhruvi@gmail.com', 'abcdef...', current_timestamp());
      
        if(mysqli_query($conn,$q)){
             header("location:index.php");
            // echo "<script>alert('suucessfully contact');</script>";
        }else{
            die("Could not add dept.".mysqli_error($conn));
        }
    }
?>