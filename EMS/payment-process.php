<?php 

session_start();
    // include('head.php');
    // include('nav.php'); 
    include('conn.php');
    // print_r($_SESSION);

    // booking_id:bookingid,
    //              payment_id:paymentid

$paymentid=$_POST['payment_id'];
$bookingid=$_POST['booking_id'];

// $paymentid="pay_NikeO0SAIRApMW" ;
// $bookingid=18;

$sql="INSERT INTO `pay` VALUES (NULL,'$bookingid','$paymentid',current_timestamp());";


$result=mysqli_query($conn,$sql);

if($result)
{
	echo 'done';
	$_SESSION['paymentid']=$paymentid;
    unset($_SESSION['dat']);
    
}
else 
{
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>