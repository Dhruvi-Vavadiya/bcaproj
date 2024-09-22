<?php
     include("head.php");
     include("conn.php");
     ob_start();
     session_start();
    //  print_r($_SESSION);    
     if(isset($_GET['id'])){
         $id=$_GET['id'];
         
         $q="select * from user where UID='$id'";
         $result=mysqli_query($conn,$q) or die();
         $r=mysqli_fetch_array($result); 
        //  echo $r;
     }else{
        echo "<script>alert('id is not present in this page');</script>";
       header('location:login.php');
     }
    //  print_r($_COOKIE);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot page</title>
    
</head>

<body>
    <br>
    <br>
    <div class="container" style="  box-shadow: 5px 5px 15px 15px lightblue;">
        <div class="container-fluid row">
            <center>
                <section class="vh-50 p-5">
                    <div class="container-fluid p-5x">
                        <div class="row d-flex justify-content-center align-items-center  h-100">
                            <div class="col-md-9 col-lg-6 col-xl-5 ">
                                <img src="https://img.freepik.com/premium-vector/vector-illustration-idea-lock-cartoon-scene-with-guy-with-lock-protect-idea-copyright-symbol-isolated-white-background-intellectual-property-copyright-protection_812561-443.jpg?w=740"
                                    class="img-fluid mt-5 float-right"
                                    style="mix-blend-mode:darken; height: 350px; width: 450px; " alt="Sample image">
                            </div>
                            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 ">
                                
                                <!-- Nav tabs -->
                                    <ul class="nav nav-pills" role="tablist">
                                        <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#home">Home</a>
                                        </li>
                                        <?php
                                            if(!isset($_SESSION['ans'])){
                                                echo '<li class="nav-item">
                                                <a class="nav-link" data-toggle="pill" href="#menu1">Step 1</a>
                                                </li>';
                                            }
                                       ?>
                                        
                                       <?php
                                            if(isset($_SESSION['ans'])){
                                                echo ' <li class="nav-item">
                                                <a class="nav-link" data-toggle="pill" href="#menu2">Step 2</a>
                                                </li>';
                                            }
                                       ?>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="home" class="container tab-pane active"><br>
                                            <h3 class="display-1 lead">Welcome</h3>
                                            <h1><?php echo $r[1]; ?></h1>
                                        </div>

                                        <div id="menu1" class=" tab-pane fade"><br>
                                             <h3 class="text-center">Security Questions</h3>
                                            <form  method="post">
                                                <div class="form-outline mb-3">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-append">
                                                                <span class="input-group-text" id="basic-addon2"><i class='bx bx-question-mark'></i></span>
                                                        </div>
                                                        <input type="text" name="" class="form-control form-control-lg" value="<?php echo $r[6]; ?>" id="" readonly>
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
                                                        <input type="submit" name="forgetqueans" class="btn btn-primary btn-block btn-lg" style="padding-left: 3rem; padding-right: 3rem;" value="Submit">
                                                </div>
                                            </form>
                                        </div>

                                        <div id="menu2" class="container tab-pane fade"><br>
                                            <h3 class="text-center mb-5">Forgot Password</h3>
                                            <form action="" method="post">
                                                    <table border="2" class="table">
                                                        <tr>
                                                            <div class="form-outline mb-3">
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text" id="basic-addon2"><i
                                                                                class='bx bxs-lock-alt'></i></span>
                                                                    </div>
                                                                    <input type="password" name="npwd"
                                                                        class="form-control form-control-lg" placeholder="New  Password"
                                                                        required>

                                                                </div>
                                                            </div>
                                                        </tr>

                                                        <div class="form-outline mb-3">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon2"><i
                                                                            class='bx bxs-lock-alt'></i></span>
                                                                </div>
                                                                <input type="password" name="cpwd" class="form-control form-control-lg"
                                                                    placeholder=" Password" required>
                                                            </div>
                                                        </div>
                                                        </tr>

                                                        <tr>
                                                            <div class="text-center text-lg-start mt-4 pt-2">
                                                                <input type="submit" name="submit"
                                                                    class="btn btn-primary btn-block btn-lg"
                                                                    style="padding-left: 3rem; padding-right: 3rem;" value="Forgot">

                                                            </div>
                                                        </tr>
                                                    </table>
                                             </form> 
                                        </div>
                                    </div>
                            </div>
                        </div>
                </section>
            </center>
        </div>
    </div>
</body>

</html>

<?php
     
    if(isset($_REQUEST['forgetqueans'])){
        $ans=$_REQUEST['ans'];
        // print_r($r[7]);
        if($ans==$r[7]){
                $_SESSION['ans']=$ans;
                // print_r($_SESSION);
                $q1="select * from user where ans='$ans'and UID='$id'";
                $res=mysqli_query($conn,$q1);
                    $r1=mysqli_fetch_array($res);

                    header("location:forgot.php?id=$r1[0]");
        }else{
            echo "<script>alert('ans not match!!')</script>";
        }
    }
    if(isset($_REQUEST['submit'])){
        $npwd=$_REQUEST['npwd'];
        $cpwd=$_REQUEST['cpwd'];
            if($npwd==$cpwd){
                $q2="update user set Password='$cpwd' where UID='$id'";
                    if(mysqli_query($conn,$q2)){
                        session_destroy();

                        header("location:login.php");
                        // echo "done";
                    }else{
                        die("Could not update password.".mysqli_error($conn));
                    }
            }else{
                echo "<script>alert('new pasword ($npwd)and new pwd ($cpwd) !!!');</script>";
            }
        }  
?>