<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
    <?php
    ob_start();
    include('../head.php'); 
    include('../conn.php');
    include("dashbord.php");
    ?>
<div class="w3-main" style="margin-left:300px;margin-top:30px;">
<?php

    $q="Select * from cate";
    $result=mysqli_query($conn,$q) or die("Query Failed!!!");
    if(mysqli_num_rows($result)>0){
        echo "<div class='container'>
        <a href='addcate.php' style='text-decoration: none'><button type='button' class='btn btn-primary float-right mr-5 mb-3'>Add category</button></a>
        <table  class='table mt-5'>";
echo "<thead><tr>
                
                <th>CID</th>
                <th>Name</th>
                <th>Date</th>
                
                <th>Action</th>
                </tr></thead> <tbody>";
            while($r=mysqli_fetch_array($result)){                   
                    echo "<tr>
                    
                        <td>$r[0]</td> 
                        <td>$r[1]</td>
                        <td>$r[2]</td>
                        
                        <td><a href='upcate.php?cid=$r[0]' style='font-size:19px' class='badge badge-primary'><i class='bx bxs-edit'></i></a>
                            <a href='delcate.php?cid=$r[0]' style='font-size:19px' class='badge badge-danger'><i class='fa fa-trash-o'></i></a>
                       </td>
                        </tr>";
            }
            echo " </tbody></table></div>";
    }
?>
</div>
