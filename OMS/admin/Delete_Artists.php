<?php
include("../conn.php");
if(isset($_GET['aid'])){
   
    $aid=$_GET['aid'];
     $q="delete from artist where aid='$aid'";
    if(mysqli_query($conn,$q))
        header("location:View_Artists.php");
    else    
        die("Deletion Failed!!!".mysqli_error($conn));
}else{
    header("location:View_Artists.php");
}
?>
