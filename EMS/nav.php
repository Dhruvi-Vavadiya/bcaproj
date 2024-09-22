<?php 
ob_start();
// session_start();
include('head.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <?php ?>
    <script>
      $(document).ready(function(){
			$("#123").click(function(){
				$("#collapsibleNavId").slideToggle(1000);	
			});
		});
    
  
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
    
    <style>
      nav{
      color:818483 ;
    }
    .text{
      font-size:25px;
    }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-sm  text-dark fixed-top shadow-sm bg-white mb-5 ">
        <a class="navbar-brand" href="index.php"><h3>Indigo</h3></a>
       
        <div class="navbar-toggler  d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" id="123"
            aria-expanded="false" aria-label="Toggle navigation"> <i class="bx bx-menu rounded-circle" style="font-size:25px; border-radius:2px;"></i></div>
            <!-- <i class='bx bx-menu'></i> -->
        
            <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav justify-content-center mr-auto text-dark mt-2 mt-lg-0 ">
               <li class="nav-item active">
                      <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                  </li>
                  
               
                  
                  <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="gallary.php" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                  <?php
                    require('conn.php');
                    
                    $q="select * from cate";
                    $res=mysqli_query($conn,$q) or die("Error".mysqli_error($conn));
                    while($r1=mysqli_fetch_array($res)){
                      echo '<a class="dropdown-item" href="gallary.php?cid='.$r1[0].'">'.$r1[1].'</a>';
                    }
                  ?>
                  <a class="dropdown-item" href="gallary.php">-----All-----</a>             
                </div>
            </li>
            <li class="nav-item">
                      <a class="nav-link" href="event.php">Gallery</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="aboutus.php">About</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="feedback.php">Feedback</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="contact.php">Contact</a>
                  </li>
                  
                  <li class="nav-item">
                      <a class="nav-link" href="event_wise.php">Search</a>
                  </li>
                  <?php
                     if(isset($_SESSION['unm']) && !isset($_SESSION['record'])){
                       echo '<li class="nav-item">
                                <a class="nav-link" href="user_wise.php" >Booking</a>
                            </li>';
                      }elseif(isset($_SESSION['record'])){
                        echo '<li class="nav-item">
                                <a class="nav-link" href="user_wise.php" data-toggle="tooltip" title="Plz Booking Event!">Booking</a>
                            </li>';
                      }
             ?>
                  <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Report</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="user_wise.php">User wise</a>
                    <a class="dropdown-item" href="#">Event wise</a>
                </div>
            </li> -->
                  <?php
                     if(isset($_SESSION['unm'])){
                       echo '<li class="nav-item">
                      <a href="logout.php"  class="nav-link">Logout</a>
                      </li>';
                     }
                  ?>
              </ul>
              <ul class="float-right mr-5">
                <?php
                  if(isset($_SESSION['unm'])){
                    echo '<div class=" dropdown dropleft">
                    <a href="#"  data-toggle="dropdown" class="text-decoration-none dropdown-toggle  text">Hi,'.$_SESSION['unm'].'</a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="Editprofile.php">Manage Profile</a>
                      <a class="dropdown-item" href="changepwd.php">Change password</a>
                    </div>
                  </div>';
                  }else{
                    echo '<ul class="float-right nav navbar-nav navbar-right  mt-2">
                              <a href="login.php" class="text-decoration-none">Login</a> 
                              </ul>';
                  }
                ?>
              </ul>
              <?php
                // if(isset($_SESSION['unm'])){
                //   echo "<a href='Editprofile.php' class='text-decoration-none'><h4 class='mr-3'>Hi,".$_SESSION['unm']."</h4></a>";
                //   // echo '<ul class="float-right nav navbar-nav navbar-right mr-5"><h4>Hi,'.$_SESSION['unm'].'</h4>
                //   //           <a href="logout.php" class="text-decoration-none">Logout</a>
                //   //       </ul>';  
                // }else{
                //   echo '<ul class="float-right nav navbar-nav navbar-right mr-5">
                //             <a href="login.php" class="text-decoration-none">Login</a> 
                //             </ul>';
                // }
              ?>
              <!-- <ul class="float-right nav navbar-nav navbar-right mr-5">
                <a href="login.php" class="text-decoration-none">Login</a> 
              </ul> -->
        </div>
    </nav>
</body>
</html>
<?php
                      // if(isset($_SESSION['unm'])){
                      //   echo '| <a href="logout.php" class="text-decoration-none">&nbsp; Logout</a>';
                      // }
                  ?> 


