<?php
include("../head_tag.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <script>
		$(document).ready(function(){
			$("#d1").hover(function(){
				$("#menu").slideToggle();	
			});
		});
	
       $(document).ready(function(){
			$(".s1").mouseenter(function(){
				$(".s2").show(1000);
			});
		});
    $(document).ready(function(){
			$("#123").click(function(){
				$("#collapsibleNavId").slideToggle(1000);	
			});
		});
    </script>
    <style>
        .s2{
            display:none;
        }
    </style>
</head>
<body>
<div >
<nav class="navbar navbar-expand-sm navbar-dark bg-primary  fixed-top ">
        <a class="navbar-brand" href="#"><h3><u>HiLy</u>rics</h3></a>
       
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" id="123"
            aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span></button>
        
            <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav justify-content-center ml-auto  mt-2 mt-lg-0">
                <li class="nav-item active">
                  <a class="nav-link" href="Welcome.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Add_song.php">Song</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Add_Artists.php">Artists</a>
                </li>
                <li class="nav-item dropdown" id="d1">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reprt</a>
                    <div class="dropdown-menu" id="menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="R_year.php">YearWise</a>
                        <a class="dropdown-item" href="R_artist.php">ArtistsWise</a>
                        <a class="dropdown-item" href="R_playlist.php">PlaylistWise</a>
                        <a class="dropdown-item" href="R_song.php">SongWise</a>
                    </div>
                 </li>
                <li class="nav-item">
                  <a class="nav-link" href="View_ContactUs.php">ContactUs</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="View_Feedback.php">Feedback</a>
                </li> 
              </ul>
              <ul class="nav navbar-nav navbar-right mr-4">
                    <li> <a href="logout.php" class="text-light text-decoration-none">&nbsp; Logout</a></li>
              </ul>
            
</nav>
      </div>
<br>
<div class="main-content">
              <div class="content">
              
              </div>
</div>
   
    
</body>
</html>


