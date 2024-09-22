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
    <title>Add Song</title>
   
</head>
<body>
    <div class="container-fluid">
    <center>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4 mt-2">
    <form action="" method="post" enctype="multipart/form-data">
    <table  class="table table-borderless">
        <div class="row m-3">
            <div class="col-sm-9"> <h1 align="center" class='text-center mt-5'>Add Song</h1></div>
            <div class="col-sm-3">
                <a href="view_song.php"><h4 class='text-center mt-5'><em><i>View</i></em></h4></a> 
            </div>
        </div>
        <tr>
            <td>Name</td>
            <td>
                <input  type="text" class="form-control" name="snm" placeholder="Enter Name" required>
            </td>
        </tr>
        <tr>
            <td>Type</td>
            <td>
            <select name="type" class="form-control">
                <option selected disabled>---Select Type---</option>
                 <?php 
                    $type=array('Bollywood','Hollywood','Pop','Rock music');
                    foreach($type as $t){
                       echo "<option value='$t'>$t</option>";
                    }
                echo "</select>";
                ?>
            </td>
        </tr>
        <tr>
            <td>Language</td>
            <td>
            <select name="lan" class="form-control">
                <option selected disabled>---Select Language---</option>
                 <?php 
                    $lan=array('Gujarati','Hindi','English');
                    foreach($lan as $l){
                       echo "<option value='$l'>$l</option>";
                    }
                echo "</select>";
                ?>
            </td>
        </tr>
        <tr>
            <td>ArtistName</td>
            <td>
                <select name="aid" class="form-control">
                    <option selected disabled>---Select ArtistsName---</option>
                    <?php
                        $q="select * from artist order by anm";
                        $r=mysqli_query($conn,$q) or die();
                        while($result=mysqli_fetch_array($r)){
                            echo "<option value='$result[0]'>$result[1]</option>";
                        }
                        ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
            Audio_File</td>
            <td>
            <input type="file" name="filetoupload" class="form-control"/>
            
            </td>
        </tr>        
        <tr>
            <td>Song_Pic</td>
            <td>
            <input  type="file" name="pic"  class="form-control" required>
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
<footer class="fixed-bottom"><?php ?></footer>
</body>
</html>
<?php

    if(isset($_REQUEST['add'])){
        $snm=$_REQUEST['snm'];
        $type=$_REQUEST['type'];
        $lan=$_REQUEST['lan'];
        $aid=$_REQUEST['aid'];
        $pic_name=$_FILES['pic']['name'];
        $pic_loc=$_FILES['pic']['tmp_name'];
       
        $filetoupload="music/".$_FILES['filetoupload']['name'];
      
        $q="INSERT INTO `song` VALUE(NULL, '$snm', '$type', '$lan','$aid', '$filetoupload', current_timestamp(), '$pic_name');";
       echo $q;
         if(mysqli_query($conn,$q)){
          move_uploaded_file($pic_loc,"../pic/".$pic_name);
          move_uploaded_file($_FILES['filetoupload']['tmp_name'],$filetoupload);
         header("location:view_song.php");
         }else {   
             die("Insertion Failed!!!".mysqli_error($conn));
         }
    }
   
?>
