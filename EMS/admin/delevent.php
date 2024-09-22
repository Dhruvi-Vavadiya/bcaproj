<?php
include("../conn.php");
if(isset($_GET['eid'])){
   
    $eid=$_GET['eid'];
     $q="delete from event where EID='$eid'";
    if(mysqli_query($conn,$q))
        header("location:viewevent.php");
    else    
        die("Deletion Failed!!!".mysqli_error($conn));
}else{
    header("location:viewevent.php");
}
?>
