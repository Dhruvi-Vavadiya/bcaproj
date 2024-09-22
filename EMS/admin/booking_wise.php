<?php include('../head.php'); 
include('../conn.php');

include("dashbord.php");
ob_start();
// session_start();
//include("Nav.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <style>
    .box {
        overflow1:hidden;
        border-radius:4px;
        /* width:270px;
        height:200px; */
    }
    .box img{
        transition: transform 900ms;
        /* width:100%;
        height: 100%; */
        object-fit:cover;
    }
    .box:hover img{
        /* scale:1.2; */
        transform:scale(1.2);
    }
    /* card */
    @import url(https://fonts.googleapis.com/css?family=Roboto:400,100,900);



 .b1{
  display: block; 
    margin-bottom: 20px;
    line-height: 1.42857143;
    background-color: #fff;
    border-radius: 2px;
    box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12); 
    transition: box-shadow .10s; 
}
 .b1:hover{
  box-shadow: 0 12px 20px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
}

   </style>
</head>
<body>
    
<div class="w3-main" style="margin-left:300px;margin-top:30px;">    

<div class="container-fluid row mt-1">
    <center>
        <!-- <h1 class="text-center mt-5">Event Wise </h1> -->

        
        <form method="get">
           
                    <?php
                        $q1="select * from event";
                        $res1=mysqli_query($conn,$q1);
                        if(mysqli_num_rows($res1)>0){
                                echo '<div class="row mt-5">';
                            while($r1=mysqli_fetch_array($res1)){
                                echo '<div class="col-xl-4  mb-5 box">
                                            <a href="booking_wise.php?eventid='.$r1[0].'" class="text-decoration-none ">
                                                 <img src="../pic/'. $r1[3] .'"  height=220 width=220 class="b1" alt="">
                                                 <h4 class="text-dark mt-3">'. $r1[1] .'<h4>
                                            </a>
                                             
                                     </div>';
                                    
                            }
                            echo '</div>';
                        }

                    ?> 
        </form>
        </center>
        
</div>

</body>
</html>
<?php
  
    if(isset($_GET['eventid'])){
        $eventid=$_GET['eventid'];
        $q="select * from event where EID='$eventid'";
        $res1=mysqli_query($conn,$q) or die("Error...".mysqli_error($conn));
        $r1=mysqli_fetch_array($res1);
         //
   
    $q1="SELECT e.Name,e.Price,b.*,c.nm,u.Name  from event as e,booking as b,cate as c,user as u where e.EID = b.EID and  u.UID=b.UID and e.cid=c.cid and e.EID='$eventid'";
    $res=mysqli_query($conn,$q1) or die("Error...".mysqli_error($conn));
    // echo"<h1 align='center'>Booking WISE</h1>";
    if(mysqli_num_rows($res)>0){	
        echo "<h1 class='text-center '><span class='border border-dark p-2'>$r1[1]</span></h1><div class='container '><div class='row'>";
        while($r=mysqli_fetch_array($res)){  
            $pday=$r[7];
        $pri=$r[1];
        $total=($pday*$pri);     
        echo '<div class="col-sm-6 col-md-4 col-lg-4 col-xl-6 my-5">
                <div class="card p-5 text-center">
                    <div class="card-body">
                        <h2 class="card-title">'.$r[12].'</h2>
                        <p class="card-text">
                            <div><h4>₹'.$total.'</h4></div>
                        </p>
                        <div class="p-2">
                            <a href="#" class="card-link  text-dark"><h5>Starting Date :-</h5></a>
                            <a href="#" class="card-link text-decoration-none">'.$r[5].'</a>
                            
                        </div>
                            <div>
                                <a href="#" class="card-link  text-dark"><h5>Ending Date :-</h5></a>
                                <a href="#" class="card-link text-decoration-none">'.$r[6].'</a>
                            </div>
                            ';?>
                                <?php
                                  if($r[10]==0){
                                    echo "<div class='mt-3'><span class='btn btn-danger text-decoration-none p-2'>Pending</span></div>";
                                 
                                  }else{
                                    echo "<div class='mt-3'><span class='btn btn-success text-decoration-none p-2'>Confirm</span></div>";
                                  }
                                ?>
                            <?php echo '
                    </div>
                </div>
            </div>';
        }
        echo " </div></div>";
        }else{
            echo "<script>alert('Booking is not avaliable!!')</script>";
        }
    } 
   
?>
 <!-- <div class="card mt-3 ">
            <div class="row  mt-5">
                <div class="col-md-4 mt-2">
                    <img src="../pic/'.$r[3].'"  class="img-rounded rounded h-90 w-100 p-4 " alt="Cinque Terre">
                </div>
                <div class="col-md-3 my-5">
                    <div class="m-2">
                        
                      
                        <h4 class="mb-4">Category :-'.$r[15].'</h4>
                       
                        <h4 class="mb-4">Booking start dadt :-'.$r[11].'</h4>
                        <h4 class="mb-4">Booking end date :-'.$r[12].'</h4>
                        <h4 class="mb-4">No of user :-'.$r[13].'</h4>
                    </div>
                </div>
                <div class="col-md-4 my-5">
                    <img src="../pic/'.$r[5].'"  class="img-rounded rounded h-70 w-90 p-4" alt="Cinque Terre" style="max-height: 270px;">
                    <h5 class="text-center mr-5">Venue :- '.$r[4].'</h5>
                </div>
            </div>
        </div> -->