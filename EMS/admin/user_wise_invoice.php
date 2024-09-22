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
<div class="container-fluid">
    <center>
    <h1 class="text-center mt-5">user wise Invoice</h1>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8 mt-5">
    <form action="" method="post" >
      <table  class="table mt-5">
      <tr >
        <td>
        <div class="form-group">
          <input type="text" name="nm" id="" class="form-control form-control-lg" size="20" placeholder="Enter Invoice Id or Name" required>
    </div>
        </td>
      </tr>
      <tr >
        <td>
          <input type="submit" value="submit" name="submit" class="btn btn-lg btn-primary btn-block">
        </td>
      </tr>
    </table>
    </form>
    </div>
    </center>
    </div>
 
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

 <?php
if(isset($_REQUEST['submit'])){
  $nm=$_REQUEST['nm'];
    $q="select * from user where Name='$nm'";
    $res=mysqli_query($conn,$q);
    $r= mysqli_fetch_array($res);
// print_r($r);
    if(mysqli_num_rows($res)>0){
      header("location:user_wise_invoice.php?id=$r[0]");
    } else{
        echo "<script>alert('user is not reg user');</script>";
      header("location:user_wise_invoice.php");
    }
  
}
 
if(isset($_GET['id'])){
  $id=$_GET['id'];


  $q1="select * from user where UID=$id";
  $re=mysqli_query($conn,$q1);
  $r1=mysqli_fetch_array($re);
  
 if(mysqli_num_rows($re)>0){
  $q="SELECT b.*,u.*,i.* from booking as b,user as u,invoice as i where b.UID=u.UID and b.BID=i.BID and u.UID=$id";
  $result=mysqli_query($conn,$q) or die("Query Failed!!!");
  if(mysqli_num_rows($result)>0){
      echo "<div class='' id='printableArea' style='margin-left:300px; margin-right:5px;'>
      <h1 class='text-center mt-5 '>Invoice</h1>
      ";
          while($r=mysqli_fetch_array($result)){  
              print_r($r);                 
                  echo '<div class="container mt-3">
                  <div class="row border border-dark">
                      <div class="col-xl-6 col-lg-6 col-md-8 col-sm-4 col-6">
                      <h3 class="text-center">User</h3>
                          <table class="table table-borderless">
                              <tbody>
                              <tr>
                                  <th>Name</th>
                                  <td>'.$r[8].'</td>
                              </tr>
                              <tr>
                                  <th>Email</th>
                                  <td>'.$r[9].'</td>
                              </tr>
                              <tr>
                                  <th>Mobile No</th>
                                  <td>'.$r[10].'</td>
                              </tr>
                              <tr>
                                  <th>Booking Date</th>
                              <td>'.$r[6].'</td>
                              </tr>
                              <tr>
                                  <th>Total Guest</th>
                              <td>'.$r[5].'</td>
                      </tr>
                              </tbody>
                          </table>
                      </div>
                      <div class="col-xl-6 col-lg-6 col-md-4 col-sm-8 col-6">
                      <h3 class="text-center">Event</h3>
                      <table class="table table-borderless">
                              <tbody>
                              <tr>
                                  <th>Invoice ID</th>
                                  <td>'.$r[7].'</td>
                              </tr>
                              <tr>
                                  <th>Event Name</th>
                                  <td>'.$r[11].'</td>
                              </tr>
                              <tr>
                                  <th>From</th>
                                  <td>'.$r[3].'</td>
                              </tr>
                              <tr>
                                  <th>To</th>
                                  <td>'.$r[4].'</td>
                              </tr>
                              <tr>
                                  <th>Price</th>
                                  <td>₹'.$r[12].'</td>
                              </tr>
                              <tr>
                                  <th>Venue</th>
                                  <td>'.$r[14].'</td>
                              </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>';
            
            
          }
        echo '</div>';   
  }
 }else{
  echo "<script>alert('invoice is not avaliable');</script>";
  // header("location:viewinvoice.php");
 }

}else{
  // header("location:viewinvoice.php");
}
 ?>
 