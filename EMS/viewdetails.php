<?php
ob_start();
session_start();
if(!isset($_GET['vid'])){
    header("location:event.php");
}
    include('head.php');
    include('nav.php'); 
    include('conn.php');
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      .box>img{
        max-height: 50%;
        max-width: 50%;
    }
    .f1 img{
        aspect-ratio:90/90;
        object-fit:contain;
    }
    </style>
</head>
<body>
    <?php
        if(isset($_GET['vid'])){
            $vid=$_GET['vid'];
        
            $q="SELECT * FROM `event` WHERE EID='$vid'";
                $res=mysqli_query($conn,$q) or die("Error...".mysqli_error($conn));
                
                if(mysqli_num_rows($res)>0){	       
                    while($r=mysqli_fetch_array($res)){
                        // print_r($r);
                        echo '<div class="container mt-5 pt-3">
                        <div class="card mt-5 ">
                            <div class="row  ">
                                <div class="col-md-4 mt-2 f1">
                                    <img src="./pic/'.$r[3].'"  class="img-rounded rounded h-90 w-100 p-4 " alt="Cinque Terre">
                                </div>
                                <div class="col-md-3 my-5">
                                    <div class="m-2">
                                        <h2 class="mb-3">Event Name :-'.$r[1].'</h2>
                                        <h3 class="mb-3">Price :-₹'.$r[2].'</h3>
                                        <h4 class="mb-4">Description :-'.$r[6].'</h4>
                                        <a href="booking.php?vid='.$r[0].'" class="btn btn-primary btn-lg text-center">BOOKING NOW>></a>  
                                    </div>
                                </div>
                                <div class="col-md-4 mx-4 my-5">
                                    <img src="./pic/'.$r[5].'"  class="img-rounded rounded h-70 w-90 p-4 mt-4" alt="Cinque Terre" style="max-height: 270px;">
                                    <h5 class="text-center mr-5">Venue :- '.$r[4].'</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    ';
                        } 
                            
                            
                }else{
                      echo "<b><font color=red>No employees working in  department.</font>";
                }
        }
        $q1="SELECT * FROM `event`";
        $res1=mysqli_query($conn,$q1) or die("Error...".mysqli_error($conn));
        
        if(mysqli_num_rows($res1)>0){	
            echo "<div class='container '>
            <div class='row'>";
            while($r1=mysqli_fetch_array($res1)){
                // print_r($r1);
               echo " <div class='col-sm-12 col-md-12 col-lg-12 col-xl-4 mt-5 mb-5'>
                         <div class='card'>
                                <a href='viewdetails.php?vid=".$r1[0]."' class='text-decoration-none'>
                                    <img class='card-img-top h-75 w-75 ml-5 pt-3' src='./pic/".$r1[3]."' alt='Card image' style='max-height: 270px;'>
                                 </a>
                                 <div class='card-body  text-center '>
                                        <h4 class='card-title'>$r1[1]</h4>
                                        <p>₹$r1[2]</p>
                                        <h5>$r1[4]</h5>
                                        <a href='viewdetails.php?vid=".$r1[0]."' class='btn btn-primary btn-lg text-center'>VIEW DETAILS >></a>
                                </div>
                        </div>
                    </div>
             ";
            }
            echo "</div>
            </div>";
        } 
    ?>
    
    </body>
     <footer ><?php include('footer.php');?></footer>
</html>
