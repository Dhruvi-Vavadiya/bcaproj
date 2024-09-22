<?php
session_start();
    include('head_tag.php');
    include('nav.php');
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
  
  /* .bg >img {
        
        height: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        }
  img{
    width: 100%;
    height: 100vh;
  } */
        body, html {
        height: 100%;
        }
        .bg {
        background-image: url("https://img.freepik.com/free-vector/silhouette-excited-audience-colourful-music-notes-background_1048-14332.jpg?w=740&t=st=1694436949~exp=1694437549~hmac=36c35e6fbba513d429b1074b0891e18fc38338d8c4818de40daa7309bb5168e8");
        height: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        }
      .h{
        font-size: 76px;
      }
      p{
        font-size:20px;
        
      }
    </style>
</head>

<body class="bg">    

    <div class="text-light align-items-center">
              <div class="container">
                <div class="row ">
                  <div class="col-md-12 col-xl-12 col-lg-12 col-sm-12 text-center text-dark">
                    <div class="h1-reponsive lead h white-text text-monospace  mb-0 mt-lg-5 pt-5"><strong>Discover Music</strong></div>
                    <p class=" mt-2 white-text lead" ><strong>Share & Promote your music online</strong></p>
                    <a  href="view_all_song.php" class="mt-4 btn text-uppercase btn-outline-primary">Lession >>>  </a>         
                 </div>
                </div>
              </div>
    </div>

<!-- <div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
    <li data-target="#demo" data-slide-to="3"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://img.freepik.com/premium-photo/silhouettes-concert-crowd-event-with-lot-people-big-club-night-party_367038-111.jpg?w=740" class="img-responsive" alt="Los Angeles" >
        
    </div>
    <div class="carousel-item">
      <img src="https://img.freepik.com/free-vector/silhouette-excited-audience-colourful-music-notes-background_1048-14332.jpg?w=740&t=st=1694436949~exp=1694437549~hmac=36c35e6fbba513d429b1074b0891e18fc38338d8c4818de40daa7309bb5168e8" alt="Chicago" class="img-responsive"  >
        
    </div>
    <div class="carousel-item">
      <img src="https://img.freepik.com/free-photo/closeup-shot-dj-s-equipment-people-dancing-club_181624-58753.jpg" alt="New York" class="img-responsive"  >
    </div>
    <div class="carousel-item">
      <img src="https://as1.ftcdn.net/v2/jpg/06/22/65/42/1000_F_622654222_xm070Xzuz6R8vVaEX0Du7Gw98sImUs5W.jpg" alt="New York" class="img-responsive"  >
    </div>
  </div>

</div> -->
</body>
</html>