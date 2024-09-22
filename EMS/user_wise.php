<?php
    ob_start();
  session_start();
    include("conn.php");
    include("head.php");
    include("nav.php");
    
   
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
  overflow: scroll; /* Show scrollbars */
}
    </style>
 </head>
 <body>
 <?php

 if(isset($_SESSION['id'])){
        $id=$_SESSION['id'];

        unset($_SESSION['record']);
        $q1="SELECT b.*,e.*,u.* from booking as b,event as e,user as u WHERE  b.EID=e.EID and b.UID=u.UID and b.UID=$id";
         $re=mysqli_query($conn,$q1);
      $t=0;
        if($record=mysqli_num_rows($re)>0){
            // $_SESSION['record']=$record;
           
            echo '<div class="pt-5" id="printableArea">
            <h1 class="text-center mt-5 ">Invoice</h1>
            <div class="container mt-3">
                  <table class="table table-restrict">
                      <thead>
                        <tr>
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
                        while($r=mysqli_fetch_array($re)){  
                                //   print_r($r);                 
                                        echo '<tr>
                                        <td>'.$r[10].'</td>
                                        <td>'.$r[3].'</td>
                                        <td>'.$r[4].'</td>
                                        <td>₹'.$r[11].'</td>
                                        <td>'.$r[7].'</td>

                                        
                                        <td>'.$r[13].'</td>
                                       
                                        <td><img src="./pic/'.$r[14].'"  width=70 height=70 ></td>


                                        
                                        
                                        <td>';?> <?php $pday=$r[5];
                                        $pri=$r[11];
                                        $total=($pday*$pri);
                                        echo "₹".$total.""; 

                                        $t=$t+$total;
                                        ?>
                                         <?php echo'</td>
                                        <td>';?>
                                <?php
                                  if($r[8]==0){
                                    echo "<span class='badge badge-danger text-decoration-none'>Pending</span>";
                                 
                                  }else{
                                    echo "<span class='badge badge-success text-decoration-none'>Confirm</span>";
                                      // $query="select b.*,p.* from booking as b,pay as p WHERE p.BID=b.BID and b.UID='$id'";
                                      // $result=mysqli_query($conn,$query);
                                      // // $r1=mysqli_fetch_array($result);

                                      // if(mysqli_num_rows($result)>0){
                                      //   while($r1=mysqli_fetch_array($result)){
                                      //     echo "<a href='succss.php?pid=".$r1[11]."'><span class='badge badge-success text-decoration-none'>Confirm</span> </a>";
                                      //   }
                                      // }else{
                                      //   echo "payment pendding";
                                      // }
                                                                       
                                  }
                                ?>
                            <?php echo '</td>
                                        
                                    </tr>';
                        }
                    echo '</tbody>
                  </table>
              </div>
              <div class="container">
                            <table class=" float-right mr-5">
                                <tr class="mr-5">
                                    <th class="float-right">Total amount</th>
                                </tr> 
                                <tr>
                                     <td><h2>₹'. $t.'.000</h2></td>
                                </tr>
                            </table>
              </div>
            </div>';   
        }else{
        
        header("location:index.php");
        $_SESSION['record']=0;
        
        }
}else{
        header("location:login.php");
}


?>

 </body>
 </html>


