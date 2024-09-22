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

    $q="Select * from feedback order by date desc";
    $result=mysqli_query($conn,$q) or die("Query Failed!!!");
    if(mysqli_num_rows($result)>0){
        echo "<div class='container'>
        <h1 class='text-center'>Feedback</h1>
        <table  class='table mt-5 table-responsive-sm'>";
echo "<thead><tr> 
                <th>ID</th>
                <th>Email</th>
                <th>Message</th>
                <th>Date</th>
                
                </tr></thead> <tbody>";
            while($r=mysqli_fetch_array($result)){                   
                    echo "<tr>
                    
                        <td>$r[0]</td> 
                        <td>$r[1]</td>
                        <td>$r[2]</td>
                        <td>$r[3]</td>
                        </tr>";
            }
            echo " </tbody></table></div>";
    }
?>
</div>
