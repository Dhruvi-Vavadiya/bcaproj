<!-- 5267 3181 8797 5449 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<style>
     .blink {
                animation: blinker 1.5s linear infinite;
                color: red;
                font-family: sans-serif;
            }
            @keyframes blinker {
                50% {
                    opacity: 0;
                }
            }
</style>
</head>
<body>
  <?php
    ob_start();
    session_start();
    // print_r($_SESSION);
    include('head.php');
    include('conn.php');
   
    if(isset($_SESSION['dat'])){
        $dat=$_SESSION['dat'];

        // $dat="2024-03-07 00:20:12";
        // $dat="2024-03-05 23:07:23";
       
        $q="select * from booking where Booking_date='$dat'";
        $result=mysqli_query($conn,$q) or die("Query faild".mysqli_error($conn));
        $r1=mysqli_fetch_array($result);
        $bid=$r1[0];
        // print_r($bid);

        // $invoice="select * from invoice";
        // $resultinvoice=mysqli_query($conn,$invoice);

        // $r2=mysqli_fetch_array($resultinvoice);

        // if($r2[2]

        $in="INSERT INTO `invoice` VALUES (NULL,'$bid',current_timestamp())";
        if(mysqli_query($conn,$in)){
            echo "<script>alert('Invoice Created Successfully.')</script>";
        }else{
            echo "Query Failed!!" or die("Query faild".mysqli_error($conn));
        }

        $q1="SELECT b.*,u.*,e.*,i.IID FROM `booking` as b,user as u,event as e,invoice as i WHERE u.UID=b.UID and e.EID=b.EID and i.BID=b.BID and b.BID='$bid'";
        $result1=mysqli_query($conn,$q1) or die("Query faild".mysqli_error($conn));
        $r=mysqli_fetch_array($result1);

        $pday=$r[5];
        $pri=$r[19];
        $total=($pday*$pri);
          

        if(mysqli_num_rows($result1)==1){
            echo '<div class="container p-5 shadow shadow-dark mt-5">
            <div class="row">
                <div class="col-lg-12">
                <div >
                     <h4 class="text-center p-2 " style="background-color:#5AA1C3; ">INVOICE</h4>
                </div>
                    <center>
                        <h2 style="color:#5AA1C3; " class="p-4">INDIGO EVENT</h2>
                       
                    </center>
                   
                    <div class="row">
                        <div class="col-lg-6">
                        <table>
                            <tr>
                                <th><h3>Name :-</h3></th>
                                <td> <h4>'.$r[10].' </h4></td>
                            </tr>
                            <tr >
                                <th><h3>Email :-</h3></th>
                                <td><h4> '.$r[11].'</h34></td>
                            </tr>
                        </table>
                        </div>
                        <div class="col-lg-6">
                        <table class=" float-right mr-3">
                            <tr>
                                <th><h3>Invoice ID :-</h3></th>
                                <td> <h4>'.$r[25].' </h4></td>
                            </tr>
                            <tr >
                                <th><h3>Mobile No :-</h3></th>
                                <td> <h4>'.$r[12].'</h4></td>
                            </tr>
                           
                        </table>
                        </div>
                    </div>
    
    
                    <table class="table  table-striped">
                        <thead style="background-color:#5AA1C3; ">
                            <tr>
                                <th>Booking ID</th>
                                <th> Name</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Venue</th>
                                <th>Day</th>
                                <th>Per_Day_Price</th>
                            </tr>
                        </thead>
                        <tbody >
                         <tr>
                            <td>'.$r[0].'</td>
                            <td>'.$r[18].'</td>
                            <td>'.$r[3].'</td>
                            <td>'.$r[4].'</td>
                            <td>'.$r[21].'</td>
                            <td>'.$r[5].'</td>
                            <td>₹'.$r[19].'</td>
                        </tr>
                        </tbody>
                    </table>
                        
                        <div class="container">
                            <table class=" float-right mr-5">
                                <tr class="mr-5">
                                    <th class="float-right">Total amount</th>
                                </tr> 
                                <tr>
                                     <td><h2>₹'. $total.'.000</h2></td>
                                </tr>
                                <tr>
                                    <td>';
                                            ?>
                                        <?php
                                        // pending  = cancel = 0
                                        // approval = confirm = pass = 1
                        
                                        if($r[8]==1){
                                            echo '<a href="javascript:void(0)" 
                                            data-bookingid="'.$r[0].'"
                                            data-eventname="'.$r[18].'Event"
                                            data-amount="'.$total.'" 
                                            class="btn btn-primary btn-block fw-bold bookingnow">Pay Now
                                            </a>';
                                        }else{
                                            include("nav.php");
                                            date_default_timezone_set('Asia/Calcutta');
                                            $time=date("H");
                                            if($time<=24)
                                                echo "<marquee  class='blink text-danger fw-bold' behavior='alternate'><h2>Pending</h2></marquee>";
                                        }
                                        ?>
                                        <?php echo'
                                    </td>
                                </tr>
                             </table>
                        </div>

                            </div>
                        </div>       
                    </div>';

        }else{
            echo "record is not added";
        }
    }else{
        header("location:viewdetails.php");
    }
?>  
<script>

    $(".bookingnow").click(function()
    {

   var amount=$(this).attr('data-amount');	
    var bookingid=$(this).attr('data-bookingid');	
    var eventname=$(this).attr('data-eventname');	
        
   var options = {
   "key": "rzp_test_YjmS5vZgBVXJvR", // Enter the Key ID generated from the Dashboard
    "amount": amount*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "name": "The Indigo ",
    "description": eventname,
    "image": "https://www.shutterstock.com/image-vector/people-holding-handslogo-management-consultation-260nw-631175897.jpg",
    "handler": function (response){
       var paymentid=response.razorpay_payment_id;
    // var paymentid=123;
		
		$.ajax({
			url:"payment-process.php",
			type:"POST",
			data:{
                booking_id:bookingid,
                 payment_id:paymentid},
			success:function(finalresponse)
			{
                  alert(finalresponse);
				if(finalresponse=='done')
				{
					window.location.href="http://localhost/ems/wait.php";
				}
				else 
				{
					alert('Please check console.log to find error');
					console.log(finalresponse);
				}
			}
		})
        
    },
    "theme": {"color": "blue"}
    };
    var rzp1 = new Razorpay(options);
    rzp1.open();
    e.preventDefault();
    });
</script>
</body>
</html>




