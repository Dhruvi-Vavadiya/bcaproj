<?php include('../head_tag.php'); 
include('../conn.php');
include("Nav.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container-fluid row mt-5">
        <center>
            <!-- search bar -->
            <form method="get">
            <h1 class="text-center">Playlist wise Song</h1>
                    <div class="input-group mb-3 mt-5 col-sm-12 col-md-12 col-lg-12 col-xl-9">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class='bx bx-search-alt-2'></i></span>
                            </div>
                            <select name="id" class="form-control" required>
                                <option selected="selected" disabled="disabled">----Select----</option>
                                            <?php
                                            $q="select * from playlist order by pnm";
                                            $res1=mysqli_query($conn,$q) or die("Error".mysqli_error($conn));
                                                while($r=mysqli_fetch_array($res1)){
                                                    echo "<option value=$r[0]>$r[1]</option>";
                                                }
                                            ?>
                            </select>
                            <div class="input-group-append">    
                                <input type="submit" class="btn btn-primary" name="search" value="Search" />
                            </div>
                    </div>    
                </form>
         </center>
</div>
</body>
</html>
<?php
if(isset($_REQUEST['search'])){
    $id=$_REQUEST['id'];
    
        $q="Select p.*,s.snm,s.song_pic,s.file from song as s,playlist_details as p where p.sid=s.sid and pid='$id'";
        $res=mysqli_query($conn,$q) or die("Error...".mysqli_error($conn));
    if(mysqli_num_rows($res)>0){	      
        echo "<div class='container '><table class='table p-5'>";
        echo "<thead><tr><th>Id</th><th>Playlist ID</th><th>Song ID</th><th>Song Name</th><th>Pic</th><th>Audio</th></thead><tbody>";
        while($r=mysqli_fetch_array($res)){
            echo "<tr>
                        <td>$r[0]</td>
                        <td>$r[1]</td>
                        <td>$r[2]</td>
                        <td>$r[3]</td>  
                        <td>
                            <img src='../pic/$r[4]'  width=70 height=70 class='rounded-circle'>
                        </td>
                        <td> 
                            <audio controls>
                                <source src='../$r[5]' type='audio/mp3'>
                            </audio>
                        </td>
                </tr>";
        }	
        echo "</tbody></table>";		
    }else{
    echo "<b><h3 class='text-center text-danger'>song is not add...</h3>";
    }	
} 
?>