<?php
    ob_start();
//   session_start();
    include("../conn.php");
    include("../head.php");
    include("dashbord.php");
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
                    <table class="table table-borderless">
                    <h2 class="text-center mb-2 lead display-6"> Add Event</h2>
                          
                        </div>
                        <tr>
                            <td>Name</td>
                            <td>
                                <input type="text" class="form-control" name="enm" placeholder="Enter Name" required>
                            </td>
                        </tr> 
                        <tr>
                        <td>Category Name</td>
                            <td>
                            <select name="cid" class="form-control">
                                        <option selected disabled>---Select Category---</option>
                                        <?php
                                                 $q="select * from cate order by nm";
                                                $r=mysqli_query($conn,$q) or die();
                                                while($result=mysqli_fetch_array($r)){
                                                        echo "<option value='$result[0]'>$result[1]</option>";
                                            }
                                    ?>
                            </select>
                            </td>
                                        </tr>
                        <tr>
                            <td>Price</td>
                            <td>
                                <input type="number" class="form-control" name="price" placeholder="Enter Price"
                                    required>
                            </td>
                        </tr>
                        <td>Image</td>
                        <td>
                            <input type="file" name="img" class="form-control" required>
                        </td>
                        </tr>
                        <tr>
                            <td>Venue</td>
                            <td>
                                <input type="text" class="form-control" name="venue" placeholder="Enter Venue" required>
                            </td>
                        </tr>
                        <td>Picture</td>
                        <td>
                            <input type="file" name="pic" class="form-control" required>
                        </td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>
                                <textarea type="text" class="form-control" name="desc" id="" cols="5" rows="4" placeholder="Enter Description" required></textarea>
                                
                            </td>
                        </tr>
                        <tr>
                            <td><input type="reset" name="Reset" value="Reset"
                                    class="btn btn-success  btn-block btn-lg"></td>
                            <td><input type="submit" name="add" value="Add" class="btn btn-primary btn-block btn-lg">
                            </td>

                        </tr>
                    </table>
                </form>
        </center>
    </div>

</div>
 </body>
 </html>
 <?php
  if(isset($_REQUEST['add'])){
        $enm=$_REQUEST['enm'];
        $cid=$_REQUEST['cid'];
        $price=$_REQUEST['price'];
        $pic_name=$_FILES['pic']['name'];
        $pic_loc=$_FILES['pic']['tmp_name'];
        move_uploaded_file($pic_loc,"../pic/".$pic_name);
        $venue=$_REQUEST['venue'];
        $img_name=$_FILES['img']['name'];
        $img_loc=$_FILES['img']['tmp_name'];
       move_uploaded_file($img_loc,"../pic/".$img_name);
        $desc=$_REQUEST['desc'];
       $q="INSERT INTO `event` VALUES (NULL, '$enm','$price', '$img_name','$venue','$pic_name','$desc','$cid');";
    //    INSERT INTO `event`(`EID`, `Name`, `Price`, `Image`, `Venue`, `Picture`, `Description`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]')
       
    echo $q;
         if(mysqli_query($conn,$q)){
           
         header("location:viewevent.php");
         }else {   
             die("Insertion Failed!!!".mysqli_error($conn));
         }
    }

?>