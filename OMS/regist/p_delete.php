<?php
if(isset($_GET['pid'])){
   include("../conn.php");
    $pid=$_GET['pid'];
    //echo "Dept is $dno";
    $q="delete from playlist where pid='$pid'";
    //echo $q;
    if(mysqli_query($conn,$q))
        header("location:.../user_wise_view_playlist.php");
    else    
        die("Deletion Failed!!!".mysqli_error($conn));
}else{
    header("location:../user_wise_view_playlist.php");
}

?>