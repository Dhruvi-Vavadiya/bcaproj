<?php
include('../head_tag.php'); 
include('../conn.php');
include("Nav.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container-fluid row mt-1">
    <center>
        <h1 class="text-center mt-5">Year Wise song</h1>
            <!-- search bar -->
        <form method="get">
            <div class="input-group mb-3 mt-5 col-sm-12 col-md-12 col-lg-12 col-xl-9">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class='bx bx-search-alt-2'></i></span>
                    </div>
                    <select name="id" class="form-control" required>
                        <option selected="selected" disabled="disabled">----Select----</option>
                                    <?php
                                     $q="select * from playlist where year";
                                     $res1=mysqli_query($conn,$q) or die("Error".mysqli_error($conn));
                                        while($r=mysqli_fetch_array($res1)){
                                            echo "<option value=$r[0]>$r[3]</option>";
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
    
        $q="Select p.*,s.snm,s.file,s.song_pic from song as s,playlist_details as p where p.sid=s.sid and pid='$id'";
       
   	
} else
$q="Select p.*,s.snm,s.file,s.song_pic from song as s,playlist_details as p where p.sid=s.sid";

 $res=mysqli_query($conn,$q) or die("Error...".mysqli_error($conn));
if(mysqli_num_rows($res)>0){	      
    echo "<div class='container'><div class='row'>";
    while($r=mysqli_fetch_array($res)){
        echo "<div class='col-sm-12 col-md-12 col-lg-12 col-xl-4 mt-5 mb-5'><div class='card'>
        <img class='card-img-top h-75 w-75 ml-5 pt-3' src='../pic/$r[5]' alt='Card image' '>
        <div class='card-body'>
          <h4 class='card-title text-center'>$r[3]</h4>
          
          <audio controls>
             <source src='../$r[4]' type='audio/mp3'>
          </audio>
        </div>
      </div></div>";
    }	
    echo "</div>";		
}else{
echo "<b><h3 class='text-center text-danger'>song is not add...</h3>";
}
?>