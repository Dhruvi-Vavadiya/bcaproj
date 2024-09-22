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
            <div class="col-md-10 col-lg-10 col-xl-10 mt-5">
                <h2 class="text-center mb-2 lead display-6"> Add Event Category</h2>
                    <form action="" method="post" enctype="multipart/form-data">
                        <table class="table table-borderless mt-5">  
                            <tr>
                            <td class="text-center"><h3>Category :-</h3></td>
                            </tr>    
                            <tr> 
                                <td>
                                <select name="cnm" class="form-control form-control-lg">
                                    <option selected disabled>--Select Category--</option>
                                    <?php
                                        $cate=array('Wedding','Celebration','Office ','Home','Collage','Kids');
                                    foreach($cate as $c)
                                        echo "<option value='$c'>$c</option>";
                                    ?>
                                </select>
                                </td>
                            </tr>
                            <tr>
                                 <td ><input type="submit" name="add" value="Add" class="btn btn-primary btn-block btn-lg">
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
  if(isset($_REQUEST['add'])){
        $cnm=$_REQUEST['cnm'];
       
       $q="INSERT INTO `cate` VALUES (NULL, '$cnm',current_timestamp());";
    // INSERT INTO `cate`(`id`, `nm`, `date`) VALUES ('[value-1]','[value-2]','[value-3]')
       
    echo $q;
         if(mysqli_query($conn,$q)){
           
         header("location:viewcate.php");
         }else {   
             die("Insertion Failed!!!".mysqli_error($conn));
         }
    }

?>