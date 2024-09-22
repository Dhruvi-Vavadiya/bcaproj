<?php
include("../conn.php");
if(isset($_GET['sid'])){
   
    $sid=$_GET['sid'];
     $q="delete from song where sid='$sid'";
    if(mysqli_query($conn,$q))
        header("location:view_song.php");
    else    
        die("Deletion Failed!!!".mysqli_error($conn));
}else{
    header("location:view_song.php");
}
?>
