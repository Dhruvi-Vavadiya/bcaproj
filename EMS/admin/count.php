<?php
    ob_start();
//   session_start();
    include("../conn.php");
    include("../head.php");
    if(!isset($_SESSION['aid'])){
      header("location:index.php");
    }
 ?>
<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      @media (min-width:300px)and (max-width:700px) {
            .h1{
              display:none;

            }
                    }
        .fa,{
          transition: box-shadow .10s; 
          box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12); 
          /* background-color: #fff; */
    border-radius: 2px;
    background-size:cover;
     
        }
        .fa:hover{
  box-shadow: 0 12px 20px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
}
    </style>
 </head>
 <body>
    
<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:30px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>
<!-- fiest four -->
  <div class="w3-row-padding w3-margin-bottom h2 ">
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16 shadow shadow-dark">
        <div class="w3-left"><i class="fa fa-comment w3-xxxlarge" ></i></div>
        <div class="w3-right">
        <?php
              $q="select * from event";
              $res=mysqli_query($conn,$q);
              if($event_total=mysqli_num_rows($res)){
                  echo " <h3>".$event_total."</h3>";
              }else{
                echo "<h3>Empty event data</h3>";
              }
          ?>
        </div>
        <div class="w3-clear"></div>
        <h4><a href="viewevent.php" class="text-decoration-none text-white">Event</a></h4>
      </div>
    </div>

    <div class="w3-quarter ">
      <div class="w3-container w3-blue w3-padding-16 shadow shadow-dark">
        <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
        <div class="w3-right">
        <?php
              $q1="select * from booking ";
              $res1=mysqli_query($conn,$q1);
              if($booking_total=mysqli_num_rows($res1)){
                  echo " <h3>".$booking_total."</h3>";
              }else{
                echo "<h3>Empty booking data</h3>";
              }
          ?>
        </div>
        <div class="w3-clear"></div>
        <h4><a href="viewbooking.php" class="text-decoration-none text-white">Booking</a></h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16 shadow shadow-dark">
        <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
        <div class="w3-right">
        <?php
              $q2="select * from invoice";
              $res2=mysqli_query($conn,$q2);
              if($invoice_total=mysqli_num_rows($res2)){
                  echo " <h3>".$invoice_total."</h3>";
              }else{
                echo "<h3>Empty invoice data</h3>";
              }
          ?>
        </div>
        <div class="w3-clear"></div>
        <h4><a href="viewinvoice.php" class="text-decoration-none text-white">Invoice</a></h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16 shadow shadow-dark">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <?php
              $q3="select * from user";
              $res3=mysqli_query($conn,$q3);
              if($user_total=mysqli_num_rows($res3)){
                  echo " <h3>".$user_total."</h3>";
              }else{
                echo "<h3>Empty User data</h3>";
              }
          ?>
        </div>
        <div class="w3-clear"></div>
        <h4><a href="viewuser.php" class="text-decoration-none text-white">User</a></h4>
      </div>
    </div>
  </div>

  <!-- second four -->
   <div class="w3-row-padding w3-margin-bottom h1">
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16 shadow shadow-dark">
        <div class="w3-left"><i class="fa fa-times w3-xxxlarge"></i></div>
        <div class="w3-right">
        <?php
              $q="select * from booking where status=0";
              $res=mysqli_query($conn,$q);
              if($cancle_total=mysqli_num_rows($res)){
                  echo " <h3>".$cancle_total."</h3>";
              }else{
                echo "<h3>Empty cancel booking data</h3>";
              }
          ?>
        </div>
        <div class="w3-clear"></div>
        <h4><a href="pen_book_wise.php" class="text-decoration-none text-white">Pending booking</a></h4>
      </div>
    </div>

    
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16 shadow shadow-dark">
        <div class="w3-left"><i class="fa fa-comments-o w3-xxxlarge"></i></div>
        <div class="w3-right">
        <?php
              $q1="select * from feedback";
              $res1=mysqli_query($conn,$q1);
              if($feedback_total=mysqli_num_rows($res1)){
                  echo " <h3>".$feedback_total."</h3>";
              }else{
                echo "<h3>Empty feedback data</h3>";
              }
          ?>
        </div>
        <div class="w3-clear"></div>
        <h4><a href="viewfeed.php" class="text-decoration-none text-white">feedback</a></h4>
      </div>
    </div>


    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16 shadow shadow-dark">
        <div class="w3-left"><i class="fa fa-question-circle w3-xxxlarge"></i></div>
        <div class="w3-right">
        <?php
              $q2="select * from contact";
              $res2=mysqli_query($conn,$q2);
              if($contact=mysqli_num_rows($res2)){
                  echo " <h3>".$contact."</h3>";
              }else{
                echo "<h3>Empty invoice data</h3>";
              }
          ?>
        </div>
        <div class="w3-clear"></div>
        <h4><a href="#" class="text-decoration-none text-white">Inquery</a></h4>
      </div>
    </div>
    <div class="w3-quarter">
   
      <div class=" w3-container w3-red w3-padding-16 shadow shadow-dark">
        <div class="w3-left"><i class="fa fa-inr w3-xxxlarge"></i></div>
        <div class="w3-right">
          <?php
              $q3="select sum(price) from event as e,booking as b where  e.EID=b.EID AND b.status=1";
              $result=mysqli_query($conn,$q3);
              if(mysqli_num_rows($result) >0){
                while($r=mysqli_fetch_array($result)){ 
                  echo " <h3>".$r[0]."</h3>";
                }
              }else{
                echo "<h3>Empty event booking data</h3>";
              }
          ?>
        </div>
        <div class="w3-clear"></div>
        <h4><a href="#" class="text-decoration-none text-white">Revenue</a></h4>
      </div>
    </div>
  </div>


  
  <!-- End page content -->
</div>


 </body>
 </html>