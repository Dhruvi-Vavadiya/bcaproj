<?php
ob_start();
if(!isset($_GET['cid'])){
    header("location:view_all_song.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        audio::-webkit-media-controls-play-button,
     audio::-webkit-media-controls-panel {
        background-color: cornflowerblue;
            color: blue;
     }
    </style>
</head>
<body class="bg-dark text-white ">
            <button type="button" class="btn btn-primary float-left mb-5 mx-5">
                <a href="view_all_song.php" class="previous text-dark text-decoration-none font-weight-bold">&laquo; Previous</a>
            </button>
            <button type="button" class="btn btn-primary float-right mb-5 mx-5 disabled">
                <a href="../playlist_view.php" class="next text-dark text-decoration-none font-weight-bold">Next &raquo;</a>
            </button>
<?php include('head_tag.php'); include('conn.php'); 

if(isset($_GET['cid'])){
    $cid=$_GET['cid'];

    $q="Select s.*,a.anm from artist as a,song as s where s.aid=a.aid and sid='$cid'";
        $res=mysqli_query($conn,$q) or die("Error...".mysqli_error($conn));
        
        if(mysqli_num_rows($res)>0){	       
            while($r=mysqli_fetch_array($res)){
                // print_r($r);
               echo ' <div class="container mt-5">
                        <h1 class="text-center mt-5"><u>Songs Details</u></h1>
                        <div class="row">
                            <div class="col-sm-7 col-md-6 col-lg-4 col-xl-4 mt-5">
                                <img src="./pic/'.$r[7].'" class="img-rounded  rounded" alt="Cinque Terre" width="300" height="300">
                            </div>
                            <div class="col-sm-5 col-md-6 col-lg-8 col-xl-8 my-5">
                                <table class="table w-100 my-5 text-white table-borderless table-responsive">
                                    <tr>
                                        <td><h2>Song Name :</h2></td>
                                        <td><h2>'.$r[1].'</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h5>Artist Name :</h5></td>
                                        <td><h5>'.$r[8].'</h5></td>
                                    </tr>
                                    <tr>
                                        <td><h4>Type :</h4></td>
                                        <td><h4>'.$r[2].'</h4></td>
                                    </tr>
                                    <tr>
                                        <td><h4>Audio :</h4></td>
                                        <td><audio controls autoplay>
                                                <source class="bg-dark" src="'.$r[5].'" type="audio/mp3">
                                            </audio>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>';
                } 
                    
                    
        }else{
              echo "<b><font color=red>No employees working in $r[0] department.</font>";
        }
}
$q1="Select s.*,a.anm from artist as a,song as s where s.aid=a.aid ";
        $res1=mysqli_query($conn,$q1) or die("Error...".mysqli_error($conn));
        
        if(mysqli_num_rows($res1)>0){	
            echo "<div class='container'><div class='row'>";
            while($r1=mysqli_fetch_array($res1)){
                // print_r($r1);
               echo " <div class='col-sm-12 col-md-12 col-lg-12 col-xl-4 mt-5 mb-5'><div class='card bg-dark'>
               <a href='card.php?cid=$r1[0]' class='text-decoration-none'>
                      <img class='card-img-top h-75 w-75 ml-5 pt-3' src='./pic/".$r1[7]."' alt='Card image' '>
               </a>
               <div class='card-body  text-center '>
                 <h4 class='card-title'>$r1[1]</h4>
                 <p>$r1[8]</p>
                 <audio controls>
                    <source src='./$r1[5]' type='audio/mp3'>
                 </audio>
               </div>
             </div></div>";
            }
        }            
?>

    
    
<!-- <div class="container-fulid">
    <table>
        <tr>
            <div class="row">
                <div class="col-sm-7 col-md-6 col-lg-4 col-xl-6 mt-5">
                    <img src="./pic/arijitsingh.jpg"class="img-rounded  rounded" alt="Cinque Terre" width="300" height="300">
                </div>
        </tr>
        <tr>
                <div class="col-sm-5 col-md-6 col-lg-8 col-xl-6  my-5">
                    <table class="table w-75 my-5 text-white table-borderless table-responsive">
                        <tr>
                            <td><h2>Song Name :</h2></td>
                            <td><h2>2nd td</h2></td>
                        </tr>
                        <tr>
                            <td><h5>Artist Name :</h5></td>
                            <td><h5>2nd td</h5></td>
                        </tr>
                        <tr>
                            <td><h4>Type :</h4></td>
                            <td><h4>2nd td</h4></td>
                        </tr>
                        <tr>
                            <td><h4>Audio :</h4></td>
                            <td><audio controls >
                                    <source class="bg-dark" src="./music\Mere Yaaraa.mp3" type='audio/mp3'>
                                </audio>
                            </td>
                        </tr>
                    </table>
                </div>
        </tr>
            </div>
    </table>
</div> -->

</body>
</html>