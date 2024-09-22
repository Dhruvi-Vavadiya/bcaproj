<?php
ob_start();
include('../head_tag.php'); 
include('../conn.php');
include("Nav.php");
session_start();
if(!isset($_SESSION['uname'])){
    header("location:index.php");
    }
    $q="select * from user";
    $result=mysqli_query($conn,$q) or die("Query Failed!!!");
    if(mysqli_num_rows($result)>0){
        echo "<div class='container mt-5'>
                    <h1 class='text-center mt-5'>User's Details</h1>
                    <table  class='table mt-5 '>";
           echo "<thead><tr> 
                <th>UserId</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>MobileNo</th>
                <th>Gender</th>
                <th>DOJ</th>
               
                </tr></thead> <tbody>";
            while($r=mysqli_fetch_array($result)){                   
                    echo "<tr>
                        <td>$r[0]</td>
                        <td>$r[1]</td>
                        <td>$r[2]</td>
                        <td>$r[3]</td>
                        <td>$r[4]</td>
                        <td>$r[5]</td>
                        <td>$r[6]</td>
                        
                        </tr>";
            }
            echo " </tbody></table></div>";
    }
?>




<!-- <center>
<?php
// ob_start();
//     include('../head_tag.php'); 
//     include('../conn.php');
//     include("Nav.php");
//     session_start();
//  if(!isset($_SESSION['uname'])){
//   header("location:index.php");
// }
//     $q="select * from user";
//     $result=mysqli_query($conn,$q) or die("Query Failed!!!");
//     if(mysqli_num_rows($result)>0){
//         echo "<div class='container'>
//                     <h1 class='text-center mt-5'>User's Details</h1>
//                     <table  class='table mt-5'>";
//            echo "<thead><tr> 
//                 <th>UserId</th>
//                 <th>Name</th>
//                 <th>Email</th>
//                 <th>Password</th>
//                 <th>MobileNo</th>
//                 <th>Gender</th>
//                 <th>DOJ</th>
               
//                 </tr></thead> <tbody>";
//             while($r=mysqli_fetch_array($result)){                   
//                     echo "<tr>
//                         <td>$r[0]</td>
//                         <td>$r[1]</td>
//                         <td>$r[2]</td>
//                         <td>$r[3]</td>
//                         <td>$r[4]</td>
//                         <td>$r[5]</td>
//                         <td>$r[6]</td>
                        
//                         </tr>";
//             }
//             echo " </tbody></table></div>";
//     }
?>
</center> -->