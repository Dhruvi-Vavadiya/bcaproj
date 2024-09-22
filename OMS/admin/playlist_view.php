<?php
ob_start();
include("../conn.php");
include("../head_tag.php");
include("nav.php");
session_start();
 if(!isset($_SESSION['uname'])){
  header("location:index.php");
}
       $q1="Select p.*,u.unm from user as u,playlist as p where p.uid=u.uid";
       $result=mysqli_query($conn,$q1) or die("Query Failed!!!");
       if(mysqli_num_rows($result)>0){
           echo "<div class='container'>
                    <h1 class='text-center mt-5'>Playlist Details</h1>
                    <table  class='table mt-5'>";
           echo "<thead><tr> 
                    
                    
                   <th>Playlist id</th>
                   <th>Name</th>
                   <th>User Id</th>
                   <th>User Name</th>
                   <th>Year</th>
                   
               </tr></thead> <tbody>";
               while($r=mysqli_fetch_array($result)){
                    //    print_r($r);                    
                       echo "<tr>
                             <td>$r[0]</td>
                           <td>$r[1]</td>
                           <td>$r[2]</td>
                           <td>$r[4]</td>
                           <td>$r[3]</td>
                           
                           </tr>";
               }
           echo " </tbody></table></div>";
       }
?>