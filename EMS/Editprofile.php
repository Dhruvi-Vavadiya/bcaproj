<?php
     ob_start();
     session_start();
       include("conn.php");
       include("head.php");
       include("nav.php");
     if(isset($_SESSION['id'])){
         $uid=$_SESSION['id'];
         
         $q="select * from user where UID='$uid'";
         $result=mysqli_query($conn,$q) or die();
         $r=mysqli_fetch_row($result); 
     }else{
        header('location:login.php');
     }
    //  print_r($_COOKIE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit  Profile</title>
    
</head>
<body>
 
<div class="conatiner  ml-5 ">
            <div class="container">

                    <section class="dark-grey-text">

                        <div class="row ">
                                
                                <div class="col-md-5 mt-5 align-items-center">
                                    <div class="mt-5">
                                        
                                        <h1 class="font-weight-bold mb-4 text-center">Edit  Profile</h1>

                                        <form method="post">
                                            <div class="form-outline mb-4">
                                                
                                                   
                                                    <h6 >User Name</h6>               
                                                    <input type="text" title="Enter User name" class="form-control" name="user" id="" value="<?php echo $r[1];?>" required>
                                                                    
                                                
                                             </div>
                                             <div class="form-outline mb-4">
                                             <h6 >Email Address</h6>     
                                                    <input type="email" title="Enter Email ID" class="form-control" name="email" id="" value="<?php echo $r[2];?>" required>
                                                                    
                                                
                                             </div>
                                             <div class="form-outline mb-4">
                                             <h6 >Mobile No.</h6>   
                                                <input type="text"  title="Enter Mobile Number" class="form-control" name="mno" id="" value="<?php echo $r[3];?>" required>
                                                                    
                                            
                                             </div>

                                             <div class="form-outline mb-4">
                                             <h6 >Password</h6>    
                                                    <input type="password"  title="Enter PAssword" class="form-control"  name="pwd" id="" value="<?php echo $r[4];?>"required>           
                                                
                                             </div>

                                             <div class="form-outline mb-4">
                                                <h6 >Question ?</h6>
                                                    <select name="que" class="form-control">
                                                    <option selected disabled>--Select questions--</option>
                                                    <?php
                                                            $que=array('Your Fav color ?','Your fav car ?','Your fav food ?','Your fav Movie ?','Your fav Comady show ?','Your fav series ?');
                                                    foreach($que as $d){
                                                            echo "<option value='$d'";
                                                        if($d==$r[6]) echo "selected";
                                                            echo ">$d</option>";
                                                    }
                                                    ?>
                                                    </select>
                                            </div>

                                            <div class="form-outline mb-4">
                                             <h6 >Answer</h6>    
                                             <input type="text" name="ans"  class="form-control form-control-lg" placeholder="answer" value="<?php echo $r[7];?>" required>
                                             </div>

                                             <input type="submit" name="submit" class="btn btn-primary btn-block btn-lg" style="padding-left: 3rem; padding-right: 3rem;" value="Edit">
                                        </form>
                                    </div>
                                </div>
                                

                                <div class="col-md-7">
                                    <img src="https://scpmarts.in/static/frontend/Scpmarts/default/en_US/images/forgetpassword-bg.png"class="img-fluid rounded float-right" style="mix-blend-mode:darken;" alt="Sample image">
                                </div>

                                
                        </div>

                    </section>
        


        </div>
    </div>                     
      
   
 
</body>
<footer class="mt-5"><?php include('footer.php');?></footer>
</html>
<?php
    if(isset($_REQUEST['submit'])){
        $user=$_REQUEST['user'];
        $email=$_REQUEST['email'];
        $mno=$_REQUEST['mno'];
        $pwd=$_REQUEST['pwd'];
        // $cpwd=$_REQUEST['cpwd'];
        $_SESSION['unm']=$user;
        // $currentDate = date('Y-m-d'); 
        $que=$_REQUEST['que'];
        $ans=$_REQUEST['ans'];

        // include("Connection.php");
            $q= "update user set Name='$user',Email='$email',Mobileno='$mno',Password='$pwd',date=current_timestamp(),que='$que',ans='$ans' where UID=$uid";
        if(mysqli_query($conn,$q)){
            echo "<script>alert('Sussfully!!!');</script>";
            header("Location:index.php");
        }
        else{
            die("Updaction failll!!!".mysqli_error($conn));
        }

    }
   
?>