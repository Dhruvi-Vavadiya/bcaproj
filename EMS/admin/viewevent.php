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

    $q="Select e.*,c.nm from event as e,cate as c where e.cid=c.cid";
    $result=mysqli_query($conn,$q) or die("Query Failed!!!");
    if(mysqli_num_rows($result)>0){
        echo "<div class='container'>
        <a href='addevent.php' style='text-decoration: none'><button type='button' class='btn btn-primary float-right mr-5 mb-3'>Add Event</button></a>
        <table  class='table mt-5 '>";
echo "<thead><tr>
                
                <th>EID</th>
                <th>Name</th>
                <th>category</th>
                <th>Price</th>
                <th>Image</th>
                <th>Venue</th>
                <th>Picture</th>
                <th>Description</th>
                <th>Action</th>
                </tr></thead> <tbody>";
            while($r=mysqli_fetch_array($result)){                   
                    echo "<tr>
                    
                        <td>$r[0]</td> 
                        <td>$r[1]</td>
                        <td>$r[8]</td>
                        <td>₹$r[2]</td>
                        <td><img src='../pic/$r[3]'  width=70 height=70 class='rounded-circle'></td>
                        <td>$r[4]</td>
                       <td><img src='../pic/$r[5]'  width=70 height=70 class='rounded-circle'></td>
                        <td>$r[6]</td>
                        <td><a href='upevent.php?eid=$r[0]' style='font-size:19px' class='badge badge-primary'><i class='bx bxs-edit'></i></a>
                            <a href='delevent.php?eid=$r[0]' style='font-size:19px' class='badge badge-danger'><i class='fa fa-trash-o'></i></a>
                       </td>
                        </tr>";
            }
            echo " </tbody></table></div>";
    }
?>
</div>
