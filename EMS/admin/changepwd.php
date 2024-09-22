
<?php
    ob_start();
//   session_start();
    include("../conn.php");
    include("../head.php");
    include("dashbord.php");
    if(isset($_SESSION['aid'])){
        $aid=$_SESSION['aid'];
        
        $q="select * from login where ID='$aid'";
        $result=mysqli_query($conn,$q) or die();
        $r=mysqli_fetch_array($result); 
       //  print_r($r[1]);
       //  echo "<script>alert('".$r[1]."');</script>";
    }else{
       echo "<script>alert('and your name');</script>";
       header('location:index.php');
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
    
<!-- !PAGE CONTENT! -->

<div class="w3-main" style="margin-left:300px;margin-top:0px;">
<div class="container-fluid row ">
            <center>
                <div class="col-md-10 col-lg-10 col-xl-10 ">
                        <form method="post">
                            <table class="table table-borderless">
                                 <h2 class="text-center mb-2 lead display-6"> Change Password</h2>
                                 <p class="text-center">Welcome, <?php echo $r[1];?></p>
                                 <tr>
                                    <td>
                                        <div class="form-group">
                                                <input type="password" name="old" class="form-control form-control-lg"placeholder="Old password" required/>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                                <input type="password" name="change" class="form-control form-control-lg"placeholder="New password" required/>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                                <input type="password" name="confirm" class="form-control form-control-lg"placeholder="New Confirm password" required/>
                                        </div>
                                    </td>
                                </tr> 
                                <tr>
                                    <td>
                                        <input type="submit" name="submit" class="btn btn-primary btn-block btn-lg" style="padding-left: 3rem; padding-right: 3rem;" value="FORGET">
                                    </td>
                                </tr>                              
                            </table>
                        </form>
                </div>
            </center>
        </div>
</div>
 </body>
 </html>
 
 <?php
    if(isset($_REQUEST['submit'])){
        $pwd=$_REQUEST['old'];
        $change=$_REQUEST['change'];
        $confirm=$_REQUEST['confirm'];
        
        if($pwd == $r[3]){
            if($change == $confirm){
                $q ="update login set Password='$confirm' where ID=$aid";
                if(mysqli_query($conn,$q)){
                    header("location:dashbord.php");
                }else{
                    die("Could not update dept.".mysqli_error($conn));
                }
            }else{
                echo "<script>alert('new pasword ($change)and new pwd ($confirm) !!!');</script>";
                echo "<script>alert('pleace enter new pwd same as confirm new pwd !!!');</script>";
            }

        }else{
            echo "<script>alert('Enter old pwd !!!');</script>";
        }
    }

              
    
?>