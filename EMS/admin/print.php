<?php
ob_start();
//   session_start();
    include("../conn.php");
    include("../head.php");
    // include("dashbord.php");
if(isset($_GET['id'])){
    $id=$_GET['id'];


    $q1="select * from invoice where IID=$id";
    $re=mysqli_query($conn,$q1);
    $r1=mysqli_fetch_array($re);
    
   if(mysqli_num_rows($re)==1){
    $q="SELECT b.*,i.*,e.*,u.* from booking as b,invoice as i,event as e,user as u where i.BID=b.BID and b.UID=u.UID and b.EID=e.EID and IID=$id";
    $result=mysqli_query($conn,$q) or die("Query Failed!!!");
    if(mysqli_num_rows($result)>0){
        echo "<div class='container'>
        <h1 class='text-center mt-5 '>Invoice</h1>
        ";
            while($r=mysqli_fetch_array($result)){  
                // print_r($r);                 
                    echo '<div class="container mt-3">
                    <div class="row border border-dark">
                        <div class="col-xl-6 col-lg-6 col-md-8 col-sm-4 col-6">
                        <h3 class="text-center">User</h3>
                            <table class="table table-borderless">
                                <tbody>
                                <tr>
                                    <th>Name</th>
                                    <td>'.$r[19].'</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>'.$r[20].'</td>
                                </tr>
                                <tr>
                                    <th>Mobile No</th>
                                    <td>'.$r[21].'</td>
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
            echo '
            <center>
            
                <input type="submit" name="print" class="btn btn-primary btn-lg mt-3"  onclick="window.print()" value="print">
                
    </center>
               
            </div>';
    }
   }else{
    echo "<script>alert('unm and pwd mismatch!!!');</script>";
    header("location:viewinvoice.php");
   }

}else{
    header("location:viewinvoice.php");
}
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td{
            text-align: start;
        }
    </style>
</head>
<body> -->
    

    <!-- <div class="container">
        <div class="row border border-dark">
            <div class="col-xl-6 col-lg-6 col-md-8 col-sm-4 col-6">
                <table class="table table-borderless">
                    <tbody>
                    <tr>
                        <th>Name</th>
                        <td>fgxfg</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>fgxfg</td>
                    </tr>
                    <tr>
                        <th>Mobile No</th>
                        <td>fgxfg</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-4 col-sm-8 col-6">
            <table class="table table-borderless">
                    <tbody>
                    <tr>
                        <th>Booking ID</th>
                        <td>fgxfg</td>
                    </tr>
                    <tr>
                        <th>Event Name</th>
                        <td>fgxfg</td>
                    </tr>
                    <tr>
                        <th>From</th>
                        <td>fgxfg</td>
                    </tr>
                    <tr>
                        <th>To</th>
                        <td>fgxfg</td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <td>fgxfg</td>
                    </tr>
                    <tr>
                        <th>Venue</th>
                        <td>fgxfg</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div> -->
<!-- </body>
</html> -->