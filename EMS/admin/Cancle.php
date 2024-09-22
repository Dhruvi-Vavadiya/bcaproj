<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include("../conn.php");
        include("../head.php");
        if(isset($_GET['bid'])){
        $bid=$_GET['bid'];
        
        $q="update `booking` SET  status=1 where BID=$bid";
        if(mysqli_query($conn,$q)){
       
            header("location:viewbooking.php");
            }else {   
                die("Update Failed!!!".mysqli_error($conn));
            }
        }
    ?>
   
</html>