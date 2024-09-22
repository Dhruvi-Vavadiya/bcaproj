<?php
ob_start();
include('../head_tag.php'); 
include('../conn.php');
include("Nav.php");
    if(isset($_GET['sid'])){
        $sid=$_GET['sid'];
        $q="select * from song where sid='$sid'";
        $result=mysqli_query($conn,$q) or die();
        $r=mysqli_fetch_array($result);
    }else{
        header("location:view_song.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Song</title>
</head>
<body>
    <div class="container-fluid">
    <center>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4 mt-5">
    <form action="" method="post" enctype="multipart/form-data">
    <table border=5 class="table mt-2">
        <h1 align="center">Update Song</h1>
        <tr>
            <td>Name</td>
            <td>
                <input  type="text" class="form-control" name="snm" required value="<?php echo $r[1];?>">
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
                       echo "<option value='$t'";
                       if($t==$r[2]) echo "selected";
                                echo ">$t</option>";
                    }
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
                        echo "<option value='$l'";
                       if($l==$r[3]) echo "selected";
                                echo ">$l</option>";
                    }
                echo "</select>";
                ?>
            </td>
        </tr>
        <tr>
            <td>ArtistName</td>
            <td>
                <select name="aid" class="form-control" >
                    <option selected disabled>---Select ArtistsName---</option>
                    <?php
                        $q="select * from artist order by anm";
                        $res=mysqli_query($conn,$q) or die();
                        
                         
                        while($r1=mysqli_fetch_array($res)){
                            echo "<option value=$r1[0] ";
                            if($r1[0]==$r[4]) echo "selected";
                            echo ">$r1[1]</option>";
                        }
                        ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
            Audio_File</td>
            <td>
            <input type="file" name="filetoupload" class="form-control" value="<?php echo $r[5];?>"/>
            
            </td>
        </tr>
        
        <tr>
            <td>Song_Pic</td>
            <td>
            <input  type="file" name="pic"  class="form-control" >
            </td>
        </tr>

        <tr>
        <td><input type="reset" name="cancel" value="Cancel" class="btn btn-primary btn-block btn-lg"></td>
            <td><input type="submit" name="update" value="Update" class="btn btn-success btn-block btn-lg"></td>
           
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
        $snm=$_REQUEST['snm'];
        $type=$_REQUEST['type'];
        $lan=$_REQUEST['lan'];
        $aid=$_REQUEST['aid'];
        if(isset($_FILES['pic'])){
			$pic_name=$_FILES['pic']['name'];
			$pic_loc=$_FILES['pic']['tmp_name'];	
		}else{
			$pic_name=$r[7];
		}

        
        $filetoupload="music/".$_FILES['filetoupload']['name'];

       

        $q="update `song` SET snm='$snm',type='$type',lang='$lan',aid='$aid',file='$filetoupload',create_date=current_timestamp(),song_pic='$pic_name' where sid ='$sid'";
        // UPDATE `song` SET `aid` = '2', `create_date` = '2023-09-06 19:10:13' WHERE `song`.`sid` = 4;
        // echo $q;
        
      if(mysqli_query($conn,$q)){
        move_uploaded_file($pic_loc,"../pic/".$pic_name);
        move_uploaded_file($_FILES['filetoupload']['tmp_name'],$filetoupload);
            header("location:view_song.php");
       } else{
          die("Could not update song.".mysqli_error($conn));
       }
    }
?>


    