<?php 
ob_start();
// session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <?php include('head_tag.php');?>
    <script>
      $(document).ready(function(){
			$("#123").click(function(){
				$("#collapsibleNavId").slideToggle(1000);	
			});
		});
    </script>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-primary  fixed-top ">
        <a class="navbar-brand" href="#"><h3><u>HiLy</u>rics</h3></a>
       
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" id="123"
            aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span></button>
        
            <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav justify-content-center mr-auto  mt-2 mt-lg-0">
               <li class="nav-item active">
                      <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="view_all_song.php">Gallery</a>
                  </li>
                <li class="nav-item">
                      <a class="nav-link" href="contact.php">Conatct</a>
                  </li>
                  
                  <li class="nav-item">
                      <a class="nav-link" href="aboutus.php">About</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="feedback.php">Feedback</a>
                  </li>
              </ul>
              <ul class="float-right nav navbar-nav navbar-right mr-5">
                <a href="login.php" class="text-light text-decoration-none">Login&nbsp; 
                  <?php
                      if(isset($_SESSION['unm'])){
                        echo '| <a href="logout.php" class="text-light text-decoration-none">&nbsp; Logout</a>';
                      }
                  ?> 
                </a> 
              </ul>
        </div>
    </nav>
</body>
</html>

<!-- card  -->
<!-- <div class="container">
  <h2>Card Image</h2>
  <p>Image at the top (card-img-top):</p>
  <div class="card" style="width:400px">
    <img class="card-img-top" src="img_avatar1.png" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">John Doe</h4>
      <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
      <a href="#" class="btn btn-primary">See Profile</a>
    </div>
  </div>
</div> -->



<!-- Card -->
  <!-- <div
    class="bg-image card shadow-1-strong"
    style="background-image: url('https://mdbcdn.b-cdn.net/img/new/slides/003.webp');"
  >
    <div class="card-body text-white">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">
        Some quick example text to build on the card title and make up the bulk of the
        card's content.
      </p>
      <a href="#!" class="btn btn-outline-light">Button</a>
    </div>
  </div> -->
<!-- Card -->