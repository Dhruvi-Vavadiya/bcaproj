<?php
if(isset($_GET['pid'])){
   include("../conn.php");
    $pid=$_GET['pid'];
    //echo "Dept is $dno";
    $q="DELETE FROM `playlist_details` WHERE pdid='$pid'";
    //echo $q;
    if(mysqli_query($conn,$q))
        header("location:../playlist_report.php");
    else    
        die("Deletion Failed!!!".mysqli_error($conn));
}else{
    header("location:../playlist_report.php");
} 
?>