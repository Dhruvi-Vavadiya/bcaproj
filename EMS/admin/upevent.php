<?php
    ob_start();
//   session_start();
    include("../conn.php");
    include("../head.php");
    include("dashbord.php");
    if(isset($_GET['eid'])){
        $eid=$_GET['eid'];
        $q="select * from event where EID='$eid'";
        $result=mysqli_query($conn,$q) or die();
        $r=mysqli_fetch_array($result);
        
        $_SESSION['img']=$r[3];
        $img=$_SESSION['img'];

        $_SESSION['pic']=$r[5];
        $pic=$_SESSION['pic'];
        
    }else{
        header("location:viewevent.php");
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
<div class="container-fluid">
        <center>
        <div class="col-md-10 col-lg-10 col-xl-10 ">
                <form action="" method="post" enctype="multipart/form-data">
                    <table border=5 class="table mt-2">
                        <h1 align="center">Update Event</h1>
                       
                        <tr>
                            <td>Name</td>
                            <td>
                                <input type="text" class="form-control" name="enm" required value="<?php echo $r[1];?>">
                            </td>
                        </tr>
                        <tr>
                        <td>Category Name</td>
                            <td>
                            <select name="cid" class="form-control">
                                        <option selected disabled>---Select Category---</option>
                                        <?php
                                        
                                        $q="select * from cate order by nm";
                                        $res=mysqli_query($conn,$q) or die();
                                        
                                         
                                        // while($r1=mysqli_fetch_array($res)){
                                        //     echo "<option value=$r1[0] ";
                                        //     if($r1[0]==$r[2]) echo "selected";
                                        //     echo ">$r1[1]</option>";
                                        // }

                                        while($r1=mysqli_fetch_array($res)){
                                            echo "<option value=$r1[0] ";
                                            if($r1[0]==$r[7]) echo "selected";
                                            echo ">$r1[1]</option>";
                                        }
                                           
                                               
                                    
                                         
                                        ?>
                             </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td>
                                <input type="number" class="form-control" name="price" placeholder="Enter Price"
                                    required value="<?php echo $r[2];?>">
                            </td>
                        </tr>
                        <td>Image</td>
                        <td>
                            <input type="file" name="img" class="form-control" >
                        </td>
                        </tr>
                        <tr>
                            <td>Venue</td>
                            <td>
                                <input type="text" class="form-control" name="venue" placeholder="Enter Venue" required
                                    value="<?php echo $r[4];?>">
                            </td>
                        </tr>
                        <td>Picture</td>
                        <td>
                            <input type="file" name="pic" class="form-control" >
                        </td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>
                                <input type="text" class="form-control" name="desc" placeholder="Enter Description"
                                    required value="<?php echo $r[6];?>">
                            </td>
                        </tr>
                        </td>
                        </tr>
                        <tr>
                            <td><input type="reset" name="cancel" value="Cancel"
                                    class="btn btn-primary btn-block btn-lg"></td>
                            <td><input type="submit" name="update" value="Update"
                                    class="btn btn-success btn-block btn-lg"></td>

                        </tr>
                    </table>
                </form>
                <?php    ?>
        </center>
    </div>
</div>
 </body>
 </html>
 <?php


    if(isset($_REQUEST['update'])){
        $enm=$_REQUEST['enm'];
        $cid=$_REQUEST['cid'];
        $price=$_REQUEST['price'];
        $venue=$_REQUEST['venue'];
        $desc=$_REQUEST['desc'];

    //   $img=$_SESSION['img'];
      
    
        // event pic
        if(isset($_FILES['img'])){
            $img_name=$_FILES['img']['name'];
            $img_loc=$_FILES['img']['tmp_name'];
		}else{
			$img_name=$img;
		}
        if($img_name==""){
            $img_name=$img;
        }

        // venue pic
        if(isset($_FILES['pic'])){
			$pic_name=$_FILES['pic']['name'];
			$pic_loc=$_FILES['pic']['tmp_name'];	
		}else{
			$pic_name=$r[5];
		}
        if($pic_name==""){
            $pic_name=$pic;
        }

        $q="update `event` SET Name='$enm',Price='$price',Image='$img_name',Venue='$venue',Picture='$pic_name',Description='$desc',Cid='$cid' where EID ='$eid'";
       
      if(mysqli_query($conn,$q)){
        move_uploaded_file($pic_loc,"../pic/".$pic_name);
        move_uploaded_file($img_loc,"../pic/".$img_name);
            header("location:viewevent.php");
       } else{
          die("Could not update song.".mysqli_error($conn));
       }
    }
?>