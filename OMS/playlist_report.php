<!-- playlist_report.php -->
<?php
ob_start();
 include('head_tag.php'); include('conn.php'); 
 session_start();
 if(!isset($_SESSION['unm'])){
    header('location:login.php');
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        $(document).ready(function(){
			$("#d1").hover(function(){
				$("#menu").slideToggle();	
			});
		});
    </script>
</head>
<body>
<div class="container-fluid row mt-5">
        <center>
                <button type="button" class="btn btn-primary float-left mx-5 ">
                    <a href="view_all_song.php" class="previous text-dark text-decoration-none font-weight-bold">&laquo; Previous</a>
                </button>
                <button type="button" class="btn btn-primary float-right mx-5 disabled">
                    <a href="./regist/p_detail_addsong.php" class="next text-dark text-decoration-none font-weight-bold">Next &raquo;</a>
                </button>
        <?php
                if(isset($_SESSION['pid'])){
                     $e=$_SESSION['pid'];
                          
                     
                        $q="Select p.*,u.unm from user as u,playlist as p where p.uid=u.uid and p.uid='$e'";
                         $res1=mysqli_query($conn,$q) or die("Error".mysqli_error($conn));
                         if(mysqli_num_rows($res1)>0){
                            echo '<div class="container mt-5"><table class="table border border-3 border-primary text-center">';
                            echo "<tr><h3>";
                            while($r=mysqli_fetch_array($res1)){
                                // print_r($r);
                                
                                echo '<th><a href="playlist_report.php?id='.$r[0].'" class="text-decoration-none text-dark" role="button">'. $r[1] .'</a></th>';
                                
                            }
                            echo "</h3></tr>";
                            echo "</table></div>";
                         }else{
                            echo "<h1 class='text-center'><a href='p_add.php' class='text-danger text-decoration-none' >Add Playlist</a></h1>";
                        }  
                }      
        ?>
         </center>
</div>
</body>
</html>
<?php
if(isset($_REQUEST['id'])){
    $id=$_REQUEST['id'];
    
    $q2="select * from playlist where pid='$id'";
    $res2=mysqli_query($conn,$q2);
    $r2=mysqli_fetch_array($res2);

    $qu="SELECT pl.*,s.snm,s.file,s.song_pic FROM `playlist_details` as pl,song as s WHERE pl.sid=s.sid and pid='$id'";
    $res=mysqli_query($conn,$qu) or die("Error".mysqli_error($conn));
    if(mysqli_num_rows($res)>0){
        echo "<div class='container'>
            <h2 class='text-center m-4'>Song In The Playlist Named $r2[1]</h2>
        <table class='table border border-1 border-dark text-center'>";
        echo "<tr>
                <th>Add song</th>
                <th>Delete</th>
                <th>Pd_ID</th>
                <th>Song_id</th>
                <th>Song ID</th>
                <th>Song</th>
                <th>Song Pic</th>
            </tr>";
       while($r1=mysqli_fetch_array($res)){
    //    print_r($r1);
       echo '<tr>
       <td><a href="./regist\p_detail_addsong.php" style="text-decoration: none"><span style="font-size:50px;color:black;">&plus;</span></a></td>
       <td><a href="./regist/p_detail_deletesong.php?pid='.$r1[0] .'" style="text-decoration: none"><span style="font-size:40px;color:black;"><i class="bx bx-trash"></i></span></a></td>           
       <td>'.$r1[0].'</td>
       <td>'.$r1[2].'</td>
       <td>'.$r1[3].'</td>
       <td>
       <audio controls>
            <source src="./'.$r1[4] .'" type="audio/mp3">
        </audio>
       </td>
       <td><img src="./pic/'.$r1[5] .'" width=70 height=70 class="rounded-circle"></td>
       
       
   </tr>';
       }
       echo "</table></div>";
    } 	else{
        echo "<h1 class='text-center mt-5 '><a href='./regist/p_detail_addsong.php' class='text-decoration-none text-danger'>Add Song in your Playlist</a></h1>";
    }
} 
?>

<!-- <div id="accordion">
                        <div class="card">

                            <div class="card-header">
                                <a class="card-link" data-toggle="collapse" href="#collapseOne">
                                Collapsible Group Item #1
                                </a>
                            </div>

                            <div id="collapseOne" class="collapse " data-parent="#accordion">
                                <div class="card-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </div>
                            </div>

                        </div>
                    </div> -->
<!--                     
                     echo '<div id="collapseOne" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        </div>
                                    </div>'; -->