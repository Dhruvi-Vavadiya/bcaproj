<?php
    ob_start();
//   session_start();
    include("../conn.php");
    include("../head.php");
    include("dashbord.php");
    if(isset($_GET['cid'])){
        $cid=$_GET['cid'];
        $q="select * from cate where cid='$cid'";
        $result=mysqli_query($conn,$q) or die();
        $r=mysqli_fetch_array($result);
        
    }else{
        header("location:viewcate.php");
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
            <div class="col-md-10 col-lg-10 col-xl-10 mt-5">
                <h2 class="text-center mb-2 lead display-6"> Update Event Category</h2>
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
                                        foreach($cate as $d){
                                            echo "<option value='$d'";
                                        if($d==$r[1]) echo "selected";
                                            echo ">$d</option>";
                                    }
                                    ?>
                                </select>
                                </td>
                            </tr>
                            <tr>
                                 <td ><input type="submit" name="add" value="Update" class="btn btn-primary btn-block btn-lg">
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
   
   $q1="update cate set nm='$cnm',date=current_timestamp() where cid=$cid";
// INSERT INTO `cate`(`id`, `nm`, `date`) VALUES ('[value-1]','[value-2]','[value-3]')
   
// echo $q;
     if(mysqli_query($conn,$q1)){
       
     header("location:viewcate.php");
     }else {   
         die("Insertion Failed!!!".mysqli_error($conn));
     }
}
?>