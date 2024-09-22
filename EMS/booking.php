
<?php 
date_default_timezone_set('Asia/Calcutta');
session_start();
ob_start();
include("head.php");
include("conn.php");
include("nav.php"); 
print_r($_SESSION);
if(isset($_GET['vid'])){
    $eid= $_GET['vid'];
    //  echo "$vid";
    if(isset($_SESSION['id'])){
        $uid= $_SESSION['id'];
        $q="select * from event where EID='$eid'";
    $res=mysqli_query($conn,$q) or die("Error...".mysqli_error($conn));
    $r=mysqli_fetch_array($res); 
    }else{
        header("location:login.php");
    }
    //  echo "$uid";
    
    // print_r($r);//  echo $r;
}else{
    header("location:viewdetails.php");
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Booking</title>
    
    </head>
    <body>
        <div class="container-fluid mt-5">
        <center>
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4 mt-3">
        <form action="" method="post">
            
        <table  class="table table-borderless">
            <div class="row m-3">
                <div class="col-sm-9"> <h3 class='text-center mt-5'>Add Booking</h3></div>
            </div>
            <tr>
                <td>Starting_Date</td>
                <td>
                    <input  type="date" class="form-control" name="start" placeholder="Enter Starting Date" required>
                </td>
            </tr>
            <tr>
                <td>Ending_Date</td>
                <td>
                    <input  type="date" class="form-control" name="end" placeholder="Enter Ending Date" required>
                    
                </td>
            </tr>
            <tr>
                <td>No_of_Guest</td>
                <td>
                    <input  type="number" class="form-control" name="no" placeholder="Enter no of guest" required>
                </td>
            </tr>

            <!-- <tr>
                <td>Status</td>
                <td> -->
                <!-- <select name="status" class="form-control ">
                                        <option selected disabled>--Select Category--</option>
                                        <?php
                                        //     $sta=array('Approval','Pending');
                                        // foreach($sta as $c)
                                        //     echo "<option value='$c'>$c</option>";
                                        ?>
                </select> -->
                <!-- <input type="radio" name="status" value="1" id="" class="mr-2" required>Approval
                            <input type="radio" name="status" value="0" class="mr-2" id="" required>Pending
                </td>
            </tr> -->
            
            <tr>
                <td colspan=2><input type="submit" name="add" value="Add" class="btn btn-primary btn-block btn-lg"></td>
            </tr>
        </table>
        </form>
    </center>
    </div>
    </div>
    <!-- <footer class="fixed-bottom"><?php
    //  include('footer.php');
     ?></footer> -->
    <script>
                    var time = new Date();
                    var localTimeStr = time.toLocaleString('en-US', { timeZone: 'Asia/Shanghai' });
                    today = new Date(localTimeStr)
                    tomorrow = new Date(today.setDate(today.getDate() + 1)).toISOString().split('T')[0];
                    t = String(tomorrow)
                    document.getElementsByName("start")[0].setAttribute('min', t);

                    var time = new Date();
                    var localTimeStr = time.toLocaleString('en-US', { timeZone: 'Asia/Shanghai' });
                    today = new Date(localTimeStr)
                    tomorrow = new Date(today.setDate(today.getDate() + 2)).toISOString().split('T')[0];
                    t = String(tomorrow)
                    document.getElementsByName("end")[0].setAttribute('min', t);
        </script>
    </body>
</html>
<?php
  if(isset($_REQUEST['add'])){

        $sdate=$_REQUEST['start'];
        $edate=$_REQUEST['end'];
        $no=$_REQUEST['no'];
        

        // echo $sdate;
        // echo "<br>";
        // echo $edate;
      
        // The period between the start date and the end date
        $co="SELECT EID, max($sdate)-min($edate)
        from Booking
        where $sdate != '' and $edate != ''";
        $res1=mysqli_query($conn,$co);
        $r1=mysqli_fetch_array($res1);
        // print_r($r[1]);
        $pday=$r1[1];

            // check condition starting ending date booking is available or not
        $d="SELECT * from booking where B_StartingDate BETWEEN '$sdate' and '$edate' OR B_EndingDate BETWEEN '$sdate' and '$edate'";
        $result=mysqli_query($conn,$d);
        if($user_total=mysqli_num_rows($result)){
                echo " <h3>".$user_total."</h3>";
                // while($ro=mysqli_fetch_array($result)){
                //     print_r($ro[0]); echo "<br>";
                //     print_r($ro[3]); echo "<br>";
                //     print_r($ro[4]);
                //     echo "<br>";
                // }
                $status=0;
            }else{
            // echo "<h3>Confirm booking </h3>";
                $status=1;
            }

        // insert query
            $in="INSERT INTO `booking` VALUES (NULL,'$uid','$eid', '$sdate', '$edate','$pday', '$no',current_timestamp(),'$status');";
           
            echo $in;
            // $d="2024-03-06 13:23:02";

            $d=date('Y-m-d H:i:s');
            $_SESSION['dat']=$d;

            // print_r($_SESSION);
            // header("location:invoice.php");



             if(mysqli_query($conn,$in)){
                // $_SESSION['no']=$no;
             echo "<script>alert('booking done!!')</script>";
             header("location:invoice.php");
            }else {   
                die("Insertion Failed!!!".mysqli_error($conn));
             }
            
           
            }
   
   
?>
