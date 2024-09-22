<?php
    ob_start();
  session_start();
    include("../conn.php");
    include("../head.php");
    

    if(isset($_SESSION['aid'])){
      $aid=$_SESSION['aid'];
      
      $q="select * from login where ID='$aid'";
      $result=mysqli_query($conn,$q) or die();
      $r=mysqli_fetch_array($result); 
      // print_r($r);
  }else{
    header('location:index.php');
  }
 ?>
<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
</head>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right"><a href="dashbord.php" class="text-decoration-none text-white">Indigo</a> </span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <?php
      echo '<div class="w3-col s4 mt-3">
      <a href="profile.php"><img src="../pic/'.$r[4].'" class="w3-circle w3-margin-right  w-50 h-50"> </a>
    </div>
    <div class="w3-col s8 w3-bar mt-3">
      <span>Welcome, <strong>'.$r[1].'</strong></span><br>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="viewuser.php" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="changepwd.php" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
    </div>';
    ?>
  </div>
 
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="dashbord.php" class="w3-bar-item w3-button w3-padding w3-blue text-decoration-none"><i class="fa fa-users fa-fw"></i>  Overview</a>
    <a href="profile.php" class="w3-bar-item w3-button w3-padding text-decoration-none"><i class="fa fa-user fa-fw"></i>  Profile</a>
    <div class="w3-dropdown-hover">
      <button class="w3-button"><i class="fa fa-eye fa-fw"></i>  Booking <i class="fa fa-caret-down"></i></button>
      <div class="w3-dropdown-content w3-bar-block">
        <a href="viewbooking.php" class="w3-bar-item w3-button w3-padding text-decoration-none">Manage Booking</a>
      </div>
    </div>

    <button class="w3-button w3-block w3-left-align" onclick="myAccFunc()"><i class="fa fa-eye fa-fw"></i>  Event  <i class="fa fa-caret-down"></i></button>
    <div id="demoAcc" class="w3-hide w3-white w3-card">
      <a href="addevent.php" class="w3-bar-item w3-button text-decoration-none">Add Event</a>
      <a href="viewevent.php" class="w3-bar-item w3-button text-decoration-none">View Event</a>
    </div>

    <button class="w3-button w3-block w3-left-align" onclick="myAccFuncccc()"><i class="fa fa-eye fa-fw"></i>  Category  <i class="fa fa-caret-down"></i></button>
    <div id="demoAcc3" class="w3-hide w3-white w3-card">
      <a href="addcate.php" class="w3-bar-item w3-button text-decoration-none">Add Category</a>
      <a href="viewcate.php" class="w3-bar-item w3-button text-decoration-none">View Category</a>
    </div>

    <a href="viewfeed.php" class="w3-bar-item w3-button w3-padding text-decoration-none"><i class="fa fa-users fa-fw"></i>  Feedback</a>
    <a href="viewinvoice.php" class="w3-bar-item w3-button w3-padding text-decoration-none"><i class="fa fa-bullseye fa-fw"></i>  Invoice</a>  
    <a href="viewcon.php" class="w3-bar-item w3-button w3-padding text-decoration-none"><i class="fa fa-diamond fa-fw"></i> Contact  </a>
    <a href="viewpayment.php" class="w3-bar-item w3-button w3-padding text-decoration-none"><i class="fa fa-inr fa-fw" ></i>Payment  </a>

    
    <button class="w3-button w3-block w3-left-align" onclick="myAccFunccc()"><i class="fa fa-cog fa-fw"></i> Report <i class="fa fa-caret-down"></i></button>
    <div id="demoAcc2" class="w3-hide w3-white w3-card">
      <!-- <a href="date_wise.php" class="w3-bar-item w3-button text-decoration-none">Date wise</a> -->
      <a href="cate_wise.php" class="w3-bar-item w3-button text-decoration-none">Category wise</a>
      <a href="booking_wise.php" class="w3-bar-item w3-button text-decoration-none">Booking wise</a>
      <a href="date_wise.php" class="w3-bar-item w3-button text-decoration-none">Date wise</a>
      <a href="pen_book_wise.php" class="w3-bar-item w3-button text-decoration-none">Pending Booking</a>
    </div>

    <button class="w3-button w3-block w3-left-align" onclick="myAccFuncc()"><i class="fa fa-cog fa-fw"></i>  Settings <i class="fa fa-caret-down"></i></button>
    <div id="demoAcc1" class="w3-hide w3-white w3-card">
      <a href="changepwd.php" class="w3-bar-item w3-button text-decoration-none">Change password</a>
      <!-- <a href="editpro.php" class="w3-bar-item w3-button text-decoration-none">Edit Profile</a> -->
      <a href="logout.php" class="w3-bar-item w3-button text-decoration-none">logout</a>
    </div>

    <br><br>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<!-- <div class="w3-main" style="margin-left:300px;margin-top:30px;"> -->

<?php include("count.php");?>
  <!-- Header -->
  <!-- <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
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
        <h4>Event</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
        <div class="w3-right">
        <?php
              $q1="select * from booking";
              $res1=mysqli_query($conn,$q1);
              if($booking_total=mysqli_num_rows($res1)){
                  echo " <h3>".$booking_total."</h3>";
              }else{
                echo "<h3>Empty booking data</h3>";
              }
          ?>
        </div>
        <div class="w3-clear"></div>
        <h4>Booking</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
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
        <h4>Invoice</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
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
        <h4>Users</h4>
      </div>
    </div>
  </div> -->

  
  <!-- End page content -->
<!-- </div> -->

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}

function myAccFunc() {
  var x = document.getElementById("demoAcc");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-green";
  } else { 
    x.className = x.className.replace(" w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-green", "");
  }
}
function myAccFuncc() {
  var x = document.getElementById("demoAcc1");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-red";
  } else { 
    x.className = x.className.replace(" w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-red", "");
  }
}
function myAccFunccc() {
  var x = document.getElementById("demoAcc2");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-yellow";
  } else { 
    x.className = x.className.replace(" w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-yellow", "");
  }
}
function myAccFuncccc() {
  var x = document.getElementById("demoAcc3");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-pink";
  } else { 
    x.className = x.className.replace(" w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-pink", "");
  }
}
</script>

</body>
</html>

