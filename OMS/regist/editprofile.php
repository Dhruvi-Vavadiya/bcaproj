<?php
     include("../head_tag.php");
     include("../conn.php");
     ob_start();
    session_start();
     if(isset($_SESSION['pid'])){
         $uid=$_SESSION['pid'];
         
         $q="select * from user where uid='$uid'";
         $result=mysqli_query($conn,$q) or die();
         $r=mysqli_fetch_row($result); 
     }else{
        header('location:../login.php');
     }
    //  print_r($_COOKIE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
<div class="container-fluid row">   
            <center>
                
                     <div class="col-xl-5 mt-2">
                        <form method="post">
                        <div class="row m-3 ml-5">
                            <div class="col-sm-7"> <h1 align="center" class='text-center mt-4 ml-5'>Edit Profile</h1></div>
                            <div class="col-sm-5"><a href="#" onclick="document.getElementById('id02').style.display='block'" ><h5 class='text-center mt-4'><em><i>View Profile</i></em></h5></a></div>
                        </div>
                            <table  class="table table-borderless">
                                <tr>
                                    <th class="text-right"><span >User Name :</span></th>
                                    <td>
                                        <input type="text" title="Enter User name" class="form-control" name="user" id="" value="<?php echo $r[1];?>" >
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-right"><span >Email ID :</span></th>
                                    <td>
                                        <input type="email" title="Enter Email ID" class="form-control" name="email" id="" value="<?php echo $r[2];?>" >
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-right"><span >Password :</span></th>
                                    <td>
                                        <input type="password"  title="Enter PAssword" class="form-control"  name="pwd" id="" value="<?php echo $r[3];?>">
                                    </td>
                                </tr>
                                <tr>
                                <th class="text-right"><span >Confirm Password :</span></th>
                                    <td>
                                        <input type="password"  title="Enter Confirm Password" class="form-control" name="cpwd" id="" value="<?php echo $r[3];?>" >
                                    </td>
                                </tr>
                                <tr>
                                <th class="text-right"><span >Mobile No :</span></th>
                                    <td>
                                        <input type="text"  title="Enter Mobile Number" class="form-control" name="mno" id="" value="<?php echo $r[4];?>" >
                                    </td>
                                </tr>
                                <tr>
                                <tr>
                                    <th class="text-right"><span >Gender :</span></th>
                                    <td>
                                    <select name="gender" class="form-control">
                                        <option selected disabled>--Select--</option>
                                            <?php
                                                $gender=array('Male','Female','Other');
                                            foreach($gender as $g){
                                                    echo "<option value='$g'";
                                                if($g==$r[5]) echo "selected";
                                                    echo ">$g</option>";
                                            }
                                            ?>
                                    </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="align-middle">
                                        <input type="submit" class="btn btn-primary btn-block btn-lg" style="padding-left: 3rem; padding-right: 3rem;" value="Update" name="submit">
                                    </td>
                                </tr>
                            </table>
                        </form>
                </div>
            </center>
    </div>

    <!-- view -->
    <div id="id02" class="modal">
    <center>
      <div class="col-md-9 col-lg-6 col-xl-4 mt-5 ">
            <form class="modal-content animate" method="post" >
            <p class="float-right mt-3 mr-4"><span onclick="document.getElementById('id02').style.display='none'"  class="close" style="font-size: 35px;cursor: pointer;" title="Close Modal">&times;</span></p>
            <div class="container py-4">
                
                   <div class="row">
                        <div class="col-sm-4">
                            <img src="https://media.istockphoto.com/id/1316420668/vector/user-icon-human-person-symbol-social-profile-icon-avatar-login-sign-web-user-symbol.jpg?s=612x612&w=0&k=20&c=AhqW2ssX8EeI2IYFm6-ASQ7rfeBWfrFFV4E87SaFhJE=" class='rounded-circle ml-5' alt='Cinque Terre' width='120' height='120'>
                        </div>
                        <div class="col-sm-8 mt-3">
                            <h1><u><?php echo $r[1];?></u></h1>
                        </div>
                   </div>
                   <div class="row mt-5">
                        <div class="col-sm-12">
                                <h3>Email Id</h3>
                                <h5 class="lead"><?php echo $r[2];?></h5>
                        </div>
                       
                   </div>
                   <div class="row mt-5">
                        <div class="col-sm-6">
                                <h3>Mobile No</h3>
                                <h5 class="lead"><?php echo $r[4];?></h5>
                        </div>
                        <div class="col-sm-6">
                                <h3>Gender</h3>
                                <h5 class="lead"><?php echo $r[5];?></h5>
                        </div>
                   </div>
            </div>
            </form>
      </div>
    </center>
</div>

    <script>
var modal1 = document.getElementById('id02');
window.onclick = function(event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
    }
}
</script>
</body>
</html>
<?php
    if(isset($_REQUEST['submit'])){
        $user=$_REQUEST['user'];
        $email=$_REQUEST['email'];
        $pwd=$_REQUEST['pwd'];
        $cpwd=$_REQUEST['cpwd'];
        $mno=$_REQUEST['mno'];
        $gender=$_REQUEST['gender'];
        // $currentDate = date('Y-m-d'); 

        if($pwd == $cpwd){
            $q= "update user set unm='$user',email='$email',pwd='$cpwd',mno='$mno',gender='$gender',doj=current_timestamp() where uid=$uid";
            $res =mysqli_query($conn,$q);
                if(mysqli_affected_rows($conn)>0){
                 header("location:../login.php");
                 
                }else{
                    echo "not done";
                }
        }else{
            echo "<script>alert('pwd and conpwd mismatch!!!');</script>";
        }

    }
   
?>