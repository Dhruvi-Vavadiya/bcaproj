<?php
// sleep(9);
// header('location:http://localhost/ems/user_wise.php');
// exit;
?>
<?php
    // echo "<script>alert('Thank you ');</script>";
    ob_start();
session_start();

// $_SESSION['paymentid']="pay_NmUU1CpE3I5kmD";
// session_destroy();
// print_r($_SESSION);
    include('head.php');
    include('conn.php');
    include('nav.php');

   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* h1{
            font-size:clamp(12px,4vw,32px);
        } */
        .h1{
            position: absolute;
  top: 3%;
  left: 45%;
  
  /* transform: translate(-50%, -50%); */
  
        }
        .h1 {
          -webkit-animation: animatezoom 0.6s;
          animation: animatezoom 0.6s
        }

        @-webkit-keyframes animatezoom {
          from {-webkit-transform: scale(0)} 
          to {-webkit-transform: scale(1)}
        }
          
        @keyframes animatezoom {
          from {transform: scale(0)} 
          to {transform: scale(1)}
        }
        .alert{
            /* background-size:cover; */
            border-left:6px solid green;
        }
        .shadow{
          /* visibility: hidden; */
          /* display:none; */
        }
       
    </style>
    <script>
       
    </script>
</head>
<body>
<?php   if(isset( $_SESSION['paymentid'])){?>
    <!-- <h1>hellooo</h1> -->
<div class="container mt-5 pt-lg-5">
<div class="alert alert-success alert-dismissible ">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Please note your payment id!</strong>
                <?php 
              
                    echo $_SESSION['paymentid'];
                   
                    ?> 
            </div>
  <div class="row">
    <div class="col-12 text-center">
        <h1 class="text-success h1">Success</h1>
      <a href="user_wise.php">
      <img src="./pic/success.gif" class="img-thumbnail d-block mx-auto" alt="Thumbnail Image" style="width: 500px; height: 400px;" />
      </a>
    
           <!-- https://cdn.dribbble.com/users/28588/screenshots/3669080/holfuy_done_gifconvert.gif -->
           <!-- <a href="" class="btn btn-primary mt-5" onload="printDiv('printableArea')">Genrate Bill</a> -->
           <input type="submit" name="print" class="btn btn-primary btn-lg mt-3"  onclick="printDiv('printableArea')" value="Generate Bill">
         
          
           <!-- <audio src="./pic/Krishna Flute.mp3" preload="auto" autoplay controls>
      Your browser does not support the audio element.
   </audio> -->

  
<!-- bill -->
<?php

if(isset($_SESSION['paymentid'])){
  $pay_id=$_SESSION['paymentid'];
  // include("nav.php");
  

  
  $q1="SELECT b.*,u.*,e.*,i.IID,p.* FROM `booking` as b,user as u,event as e,invoice as i,pay as p WHERE u.UID=b.UID and e.EID=b.EID and i.BID=b.BID and p.BID=b.BID and p.payment_id='$pay_id'";
  $result1=mysqli_query($conn,$q1) or die("Query faild".mysqli_error($conn));
  $r=mysqli_fetch_array($result1);
  // print_r($r);
  $pday=$r[5];
  $pri=$r[19];
  $total=($pday*$pri);
  echo '<div id="printableArea">
            <div class="container p-5  mt-5 ">
    
                    <div class="container">
                       <div class="row">
                            <div class="col align-self-start">
                                    <img src="https://www.shutterstock.com/image-vector/people-holding-handslogo-management-consultation-260nw-631175897.jpg" class="float-left" style="width: 100px;height: 100px;" alt="" srcset="">
                            </div>
                            
                            <div class="col align-self-end">
                                <h4 class="text-center pr-5 float-right display-4" >Bill</h4>
                            </div>
                        </div>
                   
                        <div class="row ">
                            <div class="col align-self-start text-left mt-5">
                                <h4>BILL TO :</h4>
                                <h5>'.$r[10].'</h5>
                                <h5>+91 '.$r[12].'</h5>
                                <h5>'.$r[11].'</h5>
                            </div>
                            <div class="col align-self-end text-right" >
                            <h4>PAYMENT INFO :</h4>
                            
                            <h5>RazorPay</h5>
                            <h5>'.$r[28].'</h5>
                            <h5>Pay by : '.$r[29].'</h5>
                            </div>
                        </div>
                    </div>

                        <div class="container mx-2 mt-5">
                            <table class="table  table-striped">
                                <thead >
                                    <tr>
                                        <th class="text-left">Event Name</th>
                                        <th></th> <th></th><th></th><th></th><th></th> <th></th><th></th><th></th>
                                        <th> Day</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody >
                                <tr>
                                    <td class="text-left">'.$r[18].'</td>
                                    <td></td> <td></td> <td></td><td></td><td></td> <td></td> <td></td><td></td>
                                    <td>'.$r[5].'</td>
                                    <td>'.$r[19].'</td>
                                
                                    <td>₹'.$total.'</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="container">
                            <div class="row justify-content-end d-flex float-right mr-3">
                                <h5>subtotal :    ₹'.$total.'</h5>
                            </div>
                        </div>                    
                        
                        <div class="container mt-5 pt-lg-1">
                            <h1 class="text-left mt-5"> Thank You.</h1>
                        </div>
                       

                    </div>
                 </div>       
            </div>
        </div>';

}
?>

<!-- end bill -->

    </div>
    
  </div>
</div>
<?php
 }else{
  echo "<script>alert('Error: Session is not set..')</script>" . mysqli_error($conn);
  header("location:index.php");
}
?>
<script>
  function printDiv(divId) {
     var printContents = document.getElementById(divId).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
</body>
</html>
 