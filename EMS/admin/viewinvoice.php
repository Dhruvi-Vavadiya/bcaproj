<?php
    ob_start();
//   session_start();
    include("../conn.php");
    include("../head.php");
    include("dashbord.php");
    
    
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      /* .row{
        height: 60vh;
        width: auto;
        background-color:red;
      } */
    </style>
 </head>
 <body>
    
<!-- !PAGE CONTENT! -->

<div class="w3-main" style="margin-left:300px;margin-top:0px;">
<?php

$q="SELECT i.*,b.*,e.*,u.Name FROM `invoice` as i,user as u,booking as b,event as e WHERE b.BID=i.BID and e.EID=b.EID and u.UID=b.UID ORDER by IID";
$result=mysqli_query($conn,$q) or die("Query Failed!!!");

if(mysqli_num_rows($result)>0){
  // $_SESSION['record']=$record;
 
  echo '
  <h1 class="text-center mt-5 ">Invoice</h1>
  <div class="container mt-3">
                      
                              
                                  <table class="table table-restrict">
                                  <thead>
                                  <tr>
                                          <th>ID</th>
                                          <th>Event Name</th>
                                          <th>Starting Date</th>
                                          <th>Ending Date</th>
                                          <th>Price</th>
                                          <th>Booking Date</th>

                                         
                                          <th>Venue</th>
                                          <th>Venue Pic</th>
                                  
                                          
                                          
                                          <th>Total amount</th>
                                          <th>Status</th>
                                          
                                      </tr>
                                  </thead>
                                      <tbody>';
                      while($r=mysqli_fetch_array($result)){  
                      //   print_r($r);                 
                              echo '<tr>
                              <td>'.$r[0].'</td>
                              <td>'.$r[13].'</td>
                              <td>'.$r[6].'</td>
                              <td>'.$r[7].'</td>
                              <td>₹'.$r[14].'</td>
                              <td>'.$r[10].'</td>

                              
                              <td>'.$r[16].'</td>
                             
                              <td><img src="../pic/'.$r[17].'"  width=70 height=70 ></td>


                              
                              
                              <td>';?> <?php $pday=$r[8];
                              $pri=$r[14];
                              $total=($pday*$pri);
                              echo "₹".$total.""; ?>
                               <?php echo'</td>
                              <td>';?>
                      <?php
                        if($r[11]==0){
                          echo "<span class='badge badge-danger text-decoration-none'>Pending</span>";
                       
                        }else{
                          echo "<span class='badge badge-success text-decoration-none'>Confirm</span>";
                        }
                      ?>
                  <?php 
                      }
                  echo '</tbody>
                  </table>
              
              </div>';   
}


// if(mysqli_num_rows($result)>0){
//     echo "<div class='' id='printableArea' style='margin-left:300px; margin-right:5px;'>
//     <h1 class='text-center mt-5 '>Invoice</h1>
//     ";
//         while($r=mysqli_fetch_array($result)){  
//             // print_r($r);                 
//                 echo '<div class="container mt-3">
//                 <div class="row border border-dark">
//                     <div class="col-xl-6 col-lg-6 col-md-8 col-sm-4 col-6">
//                     <h3 class="text-center">User</h3>
//                         <table class="table table-borderless table-responsive">
//                             <tbody>
//                             <tr>
//                                 <th>Name</th>
//                                 <td>'.$r[19].'</td>
//                             </tr>
//                             <tr>
//                                 <th>Email</th>
//                                 <td>'.$r[20].'</td>
//                             </tr>
//                             <tr>
//                                 <th>Mobile No</th>
//                                 <td>'.$r[21].'</td>
//                             </tr>
//                             <tr>
//                                 <th>Booking Date</th>
//                             <td>'.$r[6].'</td>
//                             </tr>
//                             <tr>
//                                 <th>Total Guest</th>
//                             <td>'.$r[5].'</td>
//                     </tr>
//                             </tbody>
//                         </table>
//                     </div>
//                     <div class="col-xl-6 col-lg-6 col-md-4 col-sm-8 col-6">
//                     <h3 class="text-center">Event</h3>
//                     <table class="table table-borderless table-responsive">
//                             <tbody>
//                             <tr>
//                                 <th>Invoice ID</th>
//                                 <td>'.$r[7].'</td>
//                             </tr>
//                             <tr>
//                                 <th>Event Name</th>
//                                 <td>'.$r[11].'</td>
//                             </tr>
//                             <tr>
//                                 <th>From</th>
//                                 <td>'.$r[3].'</td>
//                             </tr>
//                             <tr>
//                                 <th>To</th>
//                                 <td>'.$r[4].'</td>
//                             </tr>
//                             <tr>
//                                 <th>Price</th>
//                                 <td>₹'.$r[12].'</td>
//                             </tr>
//                             <tr>
//                                 <th>Venue</th>
//                                 <td>'.$r[14].'</td>
//                             </tr>
//                             </tbody>
//                         </table>
//                     </div>
//                 </div>
//             </div>';
//         }
//         echo '<center>' ?>
              <!-- <input type="submit" name="print" class="btn btn-primary btn-lg mt-3"  onclick="printDiv('printableArea')" value="print"> -->
            <?php 
            // echo ' </center>
//           </div>'; 
// }

?>
  
</div>
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


 