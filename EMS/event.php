<!-- INSERT INTO `event` (`EID`, `Name`, `Price`, `Image`, `Venue`, `Picture`, `Description`) VALUES (NULL, 'mehendi', '15000', 'reg.png', 'jaipur', 'reg.png', 'sfcdefv.....'); -->
<?php
session_start();
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
        .banner {
      background: #a770ef;
      background: -webkit-linear-gradient(to right, #a770ef, #cf8bf3, #fdb99b);
      background: linear-gradient(to right, #a770ef, #cf8bf3, #fdb99b);
        }
    
        .card {
        border: none;
        }
        img,
        .card-img-top {
        border-radius: 0em;
        }

        @media (min-width: 576px) {
        .card-columns {
            column-count: 2;
        }
        }

        @media (min-width: 768px) {
        .card-columns {
            column-count: 3;
        }
        }

        @media (min-width: 992px) {
        .card-columns {
            column-count: 4;
        }
        }

        @media (min-width: 1200px) {
        .card-columns {
            column-count: 5;
        }
        }
        
        /* Make the image fully responsive */
        .carousel-inner img {
            width: 100%;
            height: 100%;
        }

        @media (max-width: 400px) {
            .carousel-inner img{
                width: 100vh;
            height: 50vh;
        }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
            <div class="">
                <div class="row">
                    <div class="col-lg-12 ">
                        
                        <div id="demo" class="carousel slide" data-ride="carousel">
                        
                                
                                 <!-- The slideshow -->
                                <div class="carousel-inner">
                                    <div class="carousel-item ">
                                        <img src="./pic/g1.jpg" alt="Los Angeles" width="1100" style="max-height:120vh;">
                                        <div class="carousel-caption">
                                             <h3 >Haldi</h3>
                                        </div>    
                                     </div>
                                    <div class="carousel-item active">
                                        <img src="./pic/g2.webp" alt="Chicago" width="1100" style="max-height:120vh;">
                                        <div class="carousel-caption">
                                             <h3>Mahendi</h3>
                                        </div> 
                                    </div>
                                    <div class="carousel-item">
                                    <img src="./pic/g3.jpg" alt="New York" width="1100" style="max-height:120vh;">
                                    <div class="carousel-caption">
                                             <h3>Sangeet</h3>
                                        </div> 
                                    </div>
                                    <div class="carousel-item">
                                    <img src="https://images.unsplash.com/photo-1524824267900-2fa9cbf7a506?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="New York" width="1100" style="max-height:120vh;">
                                    <div class="carousel-caption">
                                             <h3>Dinner</h3>
                                        </div> 
                                    </div>
                                </div>
                            
                           <!-- Left and right controls -->
                            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </a>
                            <a class="carousel-control-next" href="#demo" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="container p-5">
        <div class="card-columns">
        <?php
             $q="select * from event";
             $res=mysqli_query($conn,$q) or die("Error!!!");
             if(mysqli_num_rows($res)>0){
                 while($r=mysqli_fetch_array($res)){
                    echo '<div class="card "> 
                            <a href="viewdetails.php?vid='.$r[0].'" class="text-decoration-none">   
                                <img class="card-img-top" src="./pic/'.$r[3].'" alt="Card image cap">
                            </a> 
                            <a href="viewdetails.php?vid='.$r[0].'" class="text-decoration-none">   
                                <img class="card-img-top" src="./pic/'.$r[5].'" alt="Card image cap">
                            </a>        
                        </div>';
                 }
            }
        ?>
        </div>
    </div> 

       
</body>
<footer class="w-100"><?php include('footer.php');?></footer>
</html>





<!-- <table> -->
            <?php
            //  $q="select * from event";
            //  $res=mysqli_query($conn,$q) or die("Error!!!");
            //  if(mysqli_num_rows($res)>0){
            //      while($r=mysqli_fetch_array($res)){
            //          echo '<div class="card mb-3 shadow-sm p-2" >
            //          <div class="row no-gutters">
            //              <div class="col-md-5 pl-5">
            //                  <img src="./pic/'.$r[3].'"  class="img-rounded rounded  p-2" style="width:80%; height:80%" alt="Cinque Terre" >
            //              </div>
            //              <div class="col-md-7 p-2">
            //                  <div class="card-body">
            //                      <h2 class="card-title">'.$r[1].'</h2>
            //                      <h5 class="card-text">Venue : '.$r[4].'</h5>
            //                      <p class="card-text"><small class="text-muted">$'.$r[2].'</small></p>
            //                      <p class="card-text">'.$r[6].'</p>
            //                      <a href="viewdetails.php?vid='.$r[0].'" class="btn btn-primary btn-lg text-center">VIEW DETAILS >></a>                       
            //                  </div>
            //              </div> 
            //          </div>
            //      </div>';    
            //      }
            //  }
            ?>   
            <!-- </table> -->