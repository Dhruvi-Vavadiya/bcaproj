<?php
ob_start();
include("../conn.php");
include("../head_tag.php");
include("nav.php");
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
    <title>Add Artists</title>
</head>
<body>
    <div class="container-fluid">
    <center>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4 mt-2">
    <form action="" method="post" enctype="multipart/form-data">
    <table  class="table table-borderless">
        <div class="row m-3">
            <div class="col-sm-9"><h2 align="center" class='text-center mt-5'>Add Artists</h2></div>
            <div class="col-sm-3">
                <a href="View_Artists.php"><h4 class='text-center mt-5'><em><i>View</i></em></h4></a> 
            </div>
        </div>
        <tr>
            <td>Name</td>
            <td>
                <input  type="text" class="form-control" name="anm" placeholder="Enter Name" required>
            </td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>&nbsp;&nbsp;
                <input type="radio"  name="gender" value="Male" id=""> Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="gender" value="Female" id=""> Female
            </td>
        </tr>
        <tr>
            <td>Picture</td>
            <td>
            <input  type="file" name="pic"  class="form-control" required>
            </td>
        </tr>
        <tr>
            <td>Type</td>
            <td>
            <select name="type" class="form-control">
                <option selected disabled>---Select Type---</option>
                 <?php 
                    $type=array('Singer','Composer','Writer');
                    foreach($type as $t){
                       echo "<option value='$t'>$t</option>";
                    }
                echo "</select>";
                ?>
            </td>
        </tr>

        <tr>
        <td><input type="reset" name="Reset" value="Reset" class="btn btn-success  btn-block btn-lg"></td>
            <td><input type="submit" name="add" value="Add" class="btn btn-primary btn-block btn-lg"></td>
           
        </tr>
    </table>
    </form>
</center>
</div>
</div>
<footer class="fixed-bottom"><?php include('../footer.php');?></footer>
</body>
</html>
<?php

    if(isset($_REQUEST['add'])){
        $anm=$_REQUEST['anm'];
        $gender=$_REQUEST['gender'];
        $pic_name=$_FILES['pic']['name'];
        $pic_loc=$_FILES['pic']['tmp_name'];
        move_uploaded_file($pic_loc,"../pic/".$pic_name);
         $type=$_REQUEST['type'];
        $q="INSERT INTO artist VALUE(NULL, '$anm','$gender','$type','$pic_name');";
       echo $q;
         if(mysqli_query($conn,$q))
         header("location:view_Artists.php");
     else    
        die("Insertion Failed!!!".mysqli_error($conn));
    }
   
?>
