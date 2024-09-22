<center>
<?php
ob_start();
    include('../head_tag.php'); 
    include('../conn.php');
    include("Nav.php");
    session_start();
 if(!isset($_SESSION['uname'])){
  header("location:index.php");
}
    $q="Select s.*,a.anm from artist as a,song as s where s.aid=a.aid";
    $result=mysqli_query($conn,$q) or die("Query Failed!!!");
    if(mysqli_num_rows($result)>0){
        echo "<div class='container'>
        <h1 class='text-center mt-5'>Song Details</h1>
        <table  class='table mt-5 '>";
echo "<thead><tr>
                <th>Add</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>SongId</th>
                <th>Name</th>
                <th>Type</th>
                <th>Language</th>
                <th>Artist_Name</th>
                <th>Audio_File</th>
                <th>Created_Date</th>
                <th>Song_pic</th>
                </tr></thead> <tbody>";
            while($r=mysqli_fetch_array($result)){                   
                    echo "<tr>
                    <td><a href='Add_song.php' style='text-decoration: none'><span style='font-size:50px;color:red;'>&plus;</span></a></td>
                        <td><a href='Update_song.php?sid=$r[0]'style='text-decoration: none'><span style='font-size:40px;;color:green;'>&#9997;</span></a></td>
                        <td><a href='Delete_song.php?sid=$r[0]'style='text-decoration: none'><span style='font-size:40px;color:red;'>&#10008;</span></a></td>
                        <td>$r[0]</td>
                        <td>$r[1]</td>
                        <td>$r[2]</td>
                        <td>$r[3]</td>
                       <td>$r[8]</td>
                        <td>
                        <audio controls>
                            <source src='../$r[5]' type='audio/mp3'>
                        </audio>
                        </td>
                        <td>$r[6]</td>
                        <td><img src='../pic/$r[7]'  width=70 height=70 class='rounded-circle'></td>
                        
                        </tr>";
            }
            echo " </tbody></table></div>";
    }
?>
</center>