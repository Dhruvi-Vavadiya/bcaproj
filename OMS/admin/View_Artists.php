
<?php
ob_start();
    include('../head_tag.php'); 
    include('../conn.php');
    include("nav.php");
    session_start();
 if(!isset($_SESSION['uname'])){
  header("location:index.php");
}
    $q="select * from artist";
    $result=mysqli_query($conn,$q) or die("Query Failed!!!");
    if(mysqli_num_rows($result)>0){
        echo "<div class='container'>
        <h1 class='text-center mt-5'>Artist Details</h1>
        <table  class='table mt-5'>";
echo "<thead><tr> 
<th>Add</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>ArtistsId</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Type</th>
                <th>Picture</th>
                </tr></thead> <tbody>";
            while($r=mysqli_fetch_array($result)){                   
                    echo "<tr>
                    <td><a href='Add_Artists.php' style='text-decoration: none'><span style='font-size:60px;color:red;'>&plus;</span></a></td>
                        <td><a href='Update_Artists.php?aid=$r[0]'style='text-decoration: none'><span style='font-size:40px;;color:green;'>&#9997;</span></a></td>
                        <td><a href='Delete_Artists.php?aid=$r[0]'style='text-decoration: none'><span style='font-size:40px;color:red;'>&#10008;</span></a></td>
                        <td>$r[0]</td>
                        <td>$r[1]</td>
                        <td>$r[2]</td>
                        <td>$r[3]</td>
                       <td><img src='../pic/$r[4]'  width=70 height=70 class='rounded-circle'></td>
                        
                        
                        </tr>";
            }
            echo " </tbody></table></div>";
    }
?>