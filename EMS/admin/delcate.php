<?php
include("../conn.php");
if(isset($_GET['cid'])){
   
    $cid=$_GET['cid'];
     $q="delete from cate where cid='$cid'";
     echo $q;
    if(mysqli_query($conn,$q))
        header("location:viewcate.php");
    else    
        die("Deletion Failed!!!".mysqli_error($conn));
}else{
    header("location:viewcate.php");
}
?>
