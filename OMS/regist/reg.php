<?php include('../head_tag.php'); include('../conn.php');  ob_start(); session_start(); 
    if(isset($_SESSION['unm'])){
        header("location:../login.php");
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: lightblue;
        }
    </style>
</head>
<body>
    <div class="container-fluid row">   
            <center>
                     <div class=" col-xl-5 mt-2">
                        <form method="post">
                        <h1 class="align-middle mt-4">Registration</h1><br>
                            <table border="2" class="table">
                                <tr>
                                    <th class="text-right"><span >User Name :</span></th>
                                    <td>
                                        <input type="text" title="Enter User name" class="form-control" name="user" id="" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-right"><span >Email ID :</span></th>
                                    <td>
                                        <input type="email" title="Enter Email ID" class="form-control" name="email" id="" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-right"><span >Password :</span></th>
                                    <td>
                                        <input type="password"  title="Enter PAssword" class="form-control"  name="pwd" id="" required>
                                    </td>
                                </tr>
                                <tr>
                                <th class="text-right"><span >Confirm Password :</span></th>
                                    <td>
                                        <input type="password"  title="Enter Confirm Password" class="form-control" name="cpwd" id="" required>
                                    </td>
                                </tr>
                                <tr>
                                <th class="text-right"><span >Mobile No :</span></th>
                                    <td>
                                        <input type="text"  title="Enter Mobile Number" class="form-control" name="mno" id="" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-right"><span >Gender :</span></th>
                                    <td>
                                        <select name="gender" class="form-control">
                                            <option selected disabled>--Select--</option>
                                            <?php
                                                $gender=array('Male','Female','Other');
                                            foreach($gender as $g)
                                                echo "<option value='$g'>$g</option>";
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="align-middle">
                                        <input type="submit" class="btn btn-primary btn-block btn-lg" style="padding-left: 3rem; padding-right: 3rem;" value="Registration" name="submit">
                                    </td>
                                </tr>
                            </table>
                        </form>
                </div>
            </center>
    </div>
    
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

            $q="select * from user";
            $res =mysqli_query($conn,$q);
            $r=mysqli_fetch_array($res);
            if($r[4]==$mno){
                echo "<script>alert('pleace check your mobile number!!!');</script>";
            }else{
                if($pwd == $cpwd){
                        $q1= "INSERT INTO `user` VALUE (NULL, '$user','$email','$pwd','$mno','$gender', current_timestamp())";
                        $res1 =mysqli_query($conn,$q1);
                            if(mysqli_affected_rows($conn)>0){
                                $_SESSION['unm']= $user;
                                header("location:../login.php");
                             
                            }else{
                                echo "not done";
                            }
                    }else{
                        echo "<script>alert('pwd and conpwd mismatch!!!');</script>";
                    }
            }


            
    }
?>
