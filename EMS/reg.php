<?php 
include("head.php");
include("conn.php");
include("nav.php"); 
ob_start();
?>
<?php
if(isset($_POST['submit'])){
    $err="";
    // user name
    
        if (!preg_match("/^[a-zA-Z ]*$/",($_POST['unm']))) {  
            $err .= "<li>Name :- Only alphabets and white space are allowed.</li>";  
        } 
    
    // email
    if (!filter_var(($_POST['email']), FILTER_VALIDATE_EMAIL)) {  
        $err .= "<li>Email :- Invalid email format.</li>";  
    }  

    // mobile number
    if (!preg_match ("/^[6-9][0-9]{9}$/", ($_POST['mno'])) ) {  
        $err .= "<li>Mobile No  :- Only numeric value is allowed.</li>";  
        }  
    //check mobile no length should not be less and greator than 10  
    if (strlen (($_POST['mno'])) != 10) {  
        $err .= "<li> Mobile No :- Mobile no must contain 10 digits.</li>";  
        } 

    // dropdown
    if(empty($_POST['que'])){
        $err .= "<li>Que :- Please Select Any Question.</li>";
    }
    
    // pwd
    $p=($_POST['pwd']);
    $c=($_POST['cpwd']);

    if($p!=$c){
        $err .= "<li>Password :- pwd and cpwd mismatch!!!.</li>";
    }
    
    
    if(!empty($err)){
        // echo "<ul><script>alert('".$err."');</script></ul>";
        echo '<div class="alert alert-danger mt-5 pt-lg-5">
        <strong>Warning!</strong><ul>'.$err.'</ul>
      </div>';
    }else{
        echo '<div class="alert alert-success mt-lg-5 pt-5">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Your Form Suucessfully Done!!</strong>
      </div>';
        if(isset($_REQUEST['submit'])){
            $unm=$_REQUEST['unm'];
            $email=$_REQUEST['email'];
            $mno=$_REQUEST['mno'];
            $pwd=$_REQUEST['pwd'];
            $cpwd=$_REQUEST['cpwd'];
            $que=$_REQUEST['que'];
            $ans=$_REQUEST['ans'];
            $q="select * from user";
            $res=mysqli_query($conn,$q);
            $r=mysqli_fetch_array($res);
            
                if($pwd == $cpwd){
                        $q1= "INSERT INTO `user` VALUES (NULL, '$unm','$email','$mno','$pwd', current_timestamp(),'$que','$ans')";
                       echo $q1;
                       
                            if(mysqli_query($conn,$q1)){
                                setcookie("ruser",$unm,time() + 120);
                                header("location:login.php");
                            }
                            else{
                                echo "not done";
                            }
                    }else{
                        echo "<script>alert('pwd and cpwd mismatch!!!');</script>";
                    }
        }
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  
</head>
<body>
    <center>
    <div class="container"  >
        <br>  
                <section class="vh-50 mt-5">
                    <div class="container">
                        <div class="row mb-5">
                                                       
                    <div class="col-md-5">
                        <form method="post">
                            <h2 class="text-center mb-4"> Sign Up</h2>
                                <div class="form-outline mb-3">
                                        <div class="input-group mb-3">
                                             <div class="input-group-append">
                                                     <span class="input-group-text" id="basic-addon2"><i class='bx bxs-user'></i></span>
                                            </div>
                                            <input type="unm" name="unm"  class="form-control form-control-lg" placeholder="UserName" required>
                                        </div>
                                </div>
                                 <div class="form-outline mb-3">
                                        <div class="input-group mb-3">
                                             <div class="input-group-append">
                                                     <span class="input-group-text" id="basic-addon2"><i class='bx bxs-envelope'></i></span>
                                            </div>
                                            <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" required>
                                        </div>
                                </div>
                                <div class="form-outline mb-3">
                                        <div class="input-group mb-3">
                                             <div class="input-group-append">
                                                     <span class="input-group-text" id="basic-addon2"><i class='bx bxs-phone'></i></span>
                                            </div>
                                            <input type="mobileno" name="mno" class="form-control form-control-lg" placeholder="MobileNo" required>
                                        </div>
                                </div>
                                <div class="form-outline mb-3">
                                        <div class="input-group mb-3">
                                             <div class="input-group-append">
                                                     <span class="input-group-text" id="basic-addon2"><i class='bx bxs-lock-alt'></i></span>
                                            </div>
                                            <input type="password" name="pwd"  class="form-control form-control-lg" placeholder="Password" required>
                                        </div>
                                </div>
                               <div class="form-outline mb-3">
                                        <div class="input-group mb-3">
                                             <div class="input-group-append">
                                                     <span class="input-group-text" id="basic-addon2"><i class='bx bxs-lock-alt'></i></span>
                                            </div>
                                            <input type="password" name="cpwd"  class="form-control form-control-lg" placeholder="Confirm Password" required>
                                        </div>
                                </div>
                                 <div class="form-outline mb-3">
                                        <div class="input-group mb-3">
                                             <div class="input-group-append">
                                                     <span class="input-group-text" id="basic-addon2"><i class='bx bx-question-mark'></i></span>
                                            </div>
                                            <select name="que" class="form-control form-control-lg">
                                                <option selected disabled>--Select questions--</option>
                                                <?php
                                                    $que=array('Your Fav color ?','Your fav car ?','Your fav food ?','Your fav Movie ?','Your fav Comady show ?','Your fav series ?');
                                                foreach($que as $q)
                                                    echo "<option value='$q'>$q</option>";
                                                ?>
                                            </select>
                                        </div>
                                </div>
                                 <div class="form-outline mb-3">
                                        <div class="input-group mb-3">
                                             <div class="input-group-append">
                                                     <span class="input-group-text" id="basic-addon2"><i class='bx bx-reply-all' ></i></span>
                                            </div>
                                            <input type="text" name="ans"  class="form-control form-control-lg" placeholder="answer" required>
                                        </div>
                                </div> 
                                <div class="text-center text-lg-start mt-4 pt-2">
                                        <input type="submit" name="submit" class="btn btn-primary btn-block btn-lg" style="padding-left: 3rem; padding-right: 3rem;" value="Registration">
                                </div>
                        </form>
                </div>
                <div class="col-md-7">
                     <img src="./pic/reg.png"class="img-fluid rounded float-right" style="mix-blend-mode:darken;" alt="Sample image">
                </div>
            </div>
            
</div>
</section>
    </div>
</center>
<footer ><?php include('footer.php');?></footer>
</body>
</html>



