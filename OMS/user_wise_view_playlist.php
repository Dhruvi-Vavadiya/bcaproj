<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
            <button type="button" class="btn btn-primary float-left mx-5 ">
                <a href="view_all_song.php" class="previous text-dark text-decoration-none font-weight-bold">&laquo; Previous</a>
            </button>
            <button type="button" class="btn btn-primary float-right mx-5 ">
                <a href="./regist/p_detail_addsong.php" class="next text-dark text-decoration-none font-weight-bold">Next &raquo;</a>
            </button>
           
<?php
 include('head_tag.php'); 
 include('conn.php');
//  if(isset($_SESSION['pid'])){
//     $e=$_SESSION['pid'];
//     echo $e;}
session_start();
    if(isset($_SESSION['pid'])){
        $e=$_SESSION['pid'];
     
       $q1="Select p.*,u.unm from user as u,playlist as p where p.uid=u.uid and p.uid='$e'";
       $result=mysqli_query($conn,$q1) or die("Query Failed!!!");
       if(mysqli_num_rows($result)>0){
           echo "<div class='container text-center'>
                    <h1 class='mt-5 mb-5'>Playlist Details</h1>
                    
                    <table  class='table '>";
           echo "<thead><tr> 
                    <th>Add</th>
                    <th>Edit</th>
                    <th>Delete</th>
                   <th>Playlist id</th>
                   <th>Name</th>
                   <th>User Id</th>
                   <th>User Name</th>
                   <th>Year</th>
                   
               </tr></thead> <tbody>";
               while($r=mysqli_fetch_array($result)){
                    //    print_r($r);                    
                       echo "<tr>
                            <td><a href='p_add.php' style='text-decoration: none'><span style='font-size:50px;color:red;'>&plus;</span></a></td>
                            <td><a href='./regist/p_update.php?pid=$r[0]' style='text-decoration: none'><span style='font-size:40px;;color:green;'>&#9997;</span></a></td>
                            <td><a href='./regist/p_delete.php?pid=$r[0]' style='text-decoration: none'><span style='font-size:40px;color:red;'>&#10008;</span></a></td>           
                             <td>$r[0]</td>
                           <td>$r[1]</td>
                           <td>$r[2]</td>
                           <td>$r[4]</td>
                           <td>$r[3]</td>
                           
                           </tr>";
               }
           echo " </tbody></table></div>";
       }else{
        echo "<h1 class='text-center mt-5'><a href='p_add.php'  class='text-danger text-decoration-none' >Add Playlist</a></h1>";
       }
    }else{
        header('location:login.php');
    }
?>
</body>

</html>