<?php
ob_start();
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
        .bg {
  /* The image used */
  background-image: url("https://images.unsplash.com/photo-1513623935135-c896b59073c1?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D");

  /* Full height */
  width: 100%;
                height: 400px;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
img{
            max-height: 100%;
            max-width: 100%;
        }
        @media (min-width:300px)and (max-width:700px) {
            .card-body{
                text-align: center;
            }
            .rounded{
                margin-top:20px;
            }
        }
    </style>
</head>
<body>
<div class="bg"></div>
  
<div class="container">
        <?php
          if(isset($_GET['cid'])){
            $cid=$_GET['cid'];
              $q="select * from event where cid='$cid'";
          }else
          $q="select * from event";
          $res=mysqli_query($conn,$q) or die("Error!!!");
          if(mysqli_num_rows($res)>0){
            echo "<div class='mt-4'>";
              while($r=mysqli_fetch_array($res)){
                  echo '<div class="card mb-3 shadow-sm p-2" >
                  <div class="row no-gutters">
                      <div class="col-md-5 pl-5">
                          <img src="./pic/'.$r[3].'"  class="img-rounded rounded  p-2" style="width:80%; height:80%" alt="Cinque Terre" >
                      </div>
                      <div class="col-md-7 p-2">
                          <div class="card-body">
                              <h2 class="card-title">'.$r[1].'</h2>
                              <h5 class="card-text">Venue : '.$r[4].'</h5>
                              <p class="card-text"><small class="text-muted">$'.$r[2].'</small></p>
                              <p class="card-text">'.$r[6].'</p>
                              <a href="viewdetails.php?vid='.$r[0].'" class="btn btn-primary btn-lg text-center">VIEW DETAILS >></a>                       
                          </div>
                      </div> 
                  </div>
              </div>';    
              }
              echo '</div>';
          }else{
            echo "<script>alert('There are no events in this category!!')</script>";
            header("location:gallary.php");
          }
        ?>
    </div>
    </body>
    <footer ><?php include('footer.php');?></footer>
</html>
<?php

// while($r=mysqli_fetch_array($res)){
            //   echo '<div class="col-xl-3 col-md-4 col-lg-6 col-sm-12">
            //           <section class="container">
            //             <div class="card">

            //               <div class="content d-flex flex-wrap align-content-center">
            //                   <a href="viewdetails.php?vid='.$r[0].'" class="text-decoration-none">
            //                       <img src="./pic/'.$r[3].'" alt="" class=" w-100 h-100" srcset="">
            //                   </a>
            //                   <div class="h6 mt-2">'.$r[1].'</div>
            //                       <div class="hover_content text-center mt-3">
            //                         <p class="text-center">'.$r[2].'</p>
            //                         <p class="text-center">'.$r[4].'</p>
            //                         <p class="text-center">'.$r[6].'</p>
            //                       </div>
            //               </div>

            //             </div>       
            //           </section>
            //       </div>
            //   ';
            // }