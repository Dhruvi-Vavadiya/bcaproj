<?php
ob_start();
include('../head_tag.php'); 
include('../conn.php');
include("Nav.php");
    if(isset($_GET['aid'])){
        $aid=$_GET['aid'];
        $q="select * from artist where aid='$aid'";
        $result=mysqli_query($conn,$q) or die();
        $r=mysqli_fetch_array($result);
    }else{
        header("location:View_Artists.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Artists</title>
</head>
<body>
    <div class="container-fluid">
    <center>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4 mt-5">
    <form action="" method="post" enctype="multipart/form-data">
    <table  class="table table-borderless">
        <h1 align="center">Update Artists</h1>
        <tr>
            <td>Name</td>
            <td>
                <input  type="text" class="form-control" name="anm" required value="<?php echo $r[1];?>">
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
                        echo "<option value='$t'";
                        if($t==$r[3]) echo "selected";
                                 echo ">$t</option>";
                    }
                echo "</select>";
                ?>
            </td>
        </tr>
        <tr>
            <td>Gender</td>
            <td >&nbsp;&nbsp;
                <input type="radio"  name="gender" value="Male"  selected="<?php echo $r[2];?>" id=""> Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="gender" value="Female"  selected="<?php echo $r[2];?>" id=""> Female
            </td>
        </tr>
        
        <tr>
            <td>Picture</td>
            <td>
            <input  type="file" name="pic"  class="form-control"  required value="<?php echo $r[3];?>">
            </td>
        </tr>
        <tr>
        <td><input type="reset" name="cancel" value="Cancel" class="btn btn-success btn-block btn-lg"></td>
            <td><input type="submit" name="update" value="Update" class="btn btn-primary btn-block btn-lg"></td>
            
        </tr>
    </table>
    </form>
</center>
</div>
</div>
</body>
</html>
<?php

    if(isset($_REQUEST['update'])){
            $anm=$_REQUEST['anm'];
            $gender=$_REQUEST['gender'];

            if(isset($_FILES['pic'])){
                $pic_name=$_FILES['pic']['name'];
                $pic_loc=$_FILES['pic']['tmp_name'];	
            }else{
                $pic_name=$r[4];
            }

             $type=$_REQUEST['type'];

            
             $q="update artist set anm='$anm',gender='$gender',type='$type',pic='$pic_name' where aid='$aid'";
            echo $q;
             if(mysqli_query($conn,$q)){
             move_uploaded_file($pic_loc,"../pic/".$pic_name);
                header("location:View_Artists.php");
             }else {   
                die("Update Failed!!!".mysqli_error($conn));
             }
     }
    
   
?>
