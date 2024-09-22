<?php
    ob_start();
//   session_start();
    include("../conn.php");
    include("../head.php");
    include("dashbord.php");
    if(isset($_GET['iid'])){
        $iid=$_GET['iid'];
        $_SESSION['iid']=$iid;
    }else{
      echo "no done session iid not store in session";
    }
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      .bo{
        border:2px solid black;
      }
      @media (min-width:300px)and (max-width:700px) {
            .bo{
              
            }
            
        }
        
    </style>
 </head>
 <body>
    
<!-- !PAGE CONTENT! -->

<div class="w3-main" style="margin-left:300px;margin-top:0px;">
<?php

    $q="SELECT b.*,i.*,u.Name,e.* from booking as b,invoice as i,user as u,event as e where i.BID=b.BID and b.UID=u.UID and b.EID=e.EID";
    $result=mysqli_query($conn,$q) or die("Query Failed!!!");
    if(mysqli_num_rows($result)>0){
        echo "<div class='container  row'>
        <h1 class='text-center'>Invoice</h1>
        <table  class='table col-sm-3 col-md-3 col-lg-3 col-xl-4  mr-3 bo text-center  mt-5'>";
      echo "<thead ><tr>
            <th>Invoic ID</th>
            
            <th>Print</th>
            </tr></thead> <tbody>";
            while($r=mysqli_fetch_array($result)){                   
                    echo "<tr>
                            <td>$r[7]</td>
                            
                            <td><a href='viewinvoice.php?iid=$r[7]' data-toggle='modal' data-target='#exampleModal'  class='btn btn-primary'>Print</a></td>
                        </tr>";
            }
            echo " </tbody></table></div>";
    }elseif(isset($_SESSION['iid'])){
      $q1="SELECT b.*,i.*,e.*,u.* from booking as b,invoice as i,event as e,user as u where i.BID=b.BID and b.UID=u.UID and b.EID=e.EID and IID=$iid";
      $res=mysqli_query($conn,$q1) or die("Query Failed!!!");
      $r1=mysqli_fetch_array($res); 
      echo '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>User</h4>
                        <h6>Name :-  '.$r1[11].'</h6>
                        <h6>Bill No :-  '.$r1[7].'</h6>
                        <h6>Email ID :-  '.$r1[12].'</h6>
                    </div>
                    <div class="col-sm-6"></div>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>';
    }else{
      echo "if condition failed!!";
    }

    
   
  //   if(mysqli_num_rows($result)>0){
  //     echo "<div class='container'>
  //     <h1 class='text-center'>Invoice</h1>
  //     <table  class='table  border mt-5'>";
  //   echo "<thead><tr>
  //         <th>Invoic ID</th>
  //         <th>Booking id</th>
  //         <th>Booking_date</th>
  //         <th>user name</th>

  //         <th>event name</th>
  //         <th>event price</th>
  //         <th>starting date</th>

  //         <th>Ending date</th>
  //         <th>event Image</th>
  //         <th>Venue</th>

  //         <th>Venue Image</th>
  //         <th>Print</th>
  //         </tr></thead> <tbody>";
  //         while($r=mysqli_fetch_array($result)){                   
  //                 echo "<tr>
  //                         <td>$r[7]</td>
  //                         <td>$r[0]</td>
  //                         <td>$r[6]</td>
  //                         <td>$r[10]</td>

  //                         <td>$r[12]</td>
  //                         <td>$r[13]</td>
  //                         <td>$r[3]</td>

  //                         <td>$r[4]</td>
  //                         <td>$r[14]</td>
  //                         <td>$r[15]</td>

  //                         <td>$r[16]</td>
  //                         <td><a href='viewinvoice.php?iid=$r[7]' data-toggle='modal' data-target='#exampleModal'  class='btn btn-primary'>Print</a></td>
  //                     </tr>";
  //         }
  //         echo " </tbody></table></div>";
  // }
?>

</div>

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" >
  Launch demo modal
</button> -->

<!-- Modal -->

 </body>
 </html>
 