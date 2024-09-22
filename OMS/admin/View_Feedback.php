<?php
ob_start();
    include('../head_tag.php'); 
    include('../conn.php');
    include("nav.php");
    session_start();
 if(!isset($_SESSION['uname'])){
  header("location:index.php");
}
    $q="select * from feedback";
    $result=mysqli_query($conn,$q) or die("Query Failed!!!");
    if(mysqli_num_rows($result)>0){
        echo "<div class='container'>
                    <h1 class='text-center mt-5'>Feedback Details</h1>
                    <table  class='table mt-5 table-bordered border border-dark'>";
           echo "<thead><tr> 
                <th>Id</th>
                <th>Email</th>
                <th>Comment</th>
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