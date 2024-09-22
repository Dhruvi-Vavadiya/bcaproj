<?php
session_start();
    include('head.php');
    include('nav.php');
    // print_r($_SESSION); 
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
        overflow-x: hidden;
        overflow-y: hidden;
        }
        /* .bg {
        background-image: url("https://miro.medium.com/v2/resize:fit:720/format:webp/1*Pb2izE8Nmog9RL419YojIw.png");
        height: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        } */
      .bg{
  width: 100%; /* https://images.unsplash.com/photo-1519225421980-715cb0215aed?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D */
  height: 100%;/*https://miro.medium.com/v2/resize:fit:720/format:webp/1*Pb2izE8Nmog9RL419YojIw.png*/
  background-image: url('https://images.unsplash.com/photo-1511795409834-ef04bbd61622?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxleHBsb3JlLWZlZWR8NHx8fGVufDB8fHx8fA%3D%3D');
  background-size: cover;
}
      .h{
        font-size: 76px;
      }
      p{
        font-size:20px;
        
      }
    
      .z1 {
          -webkit-animation: animatezoom 0.6s;
          animation: animatezoom 0.6s
        }

        @-webkit-keyframes animatezoom {
          from {-webkit-transform: scale(0)} 
          to {-webkit-transform: scale(1)}
        }
          
        @keyframes animatezoom {
          from {transform: scale(0)} 
          to {transform: scale(1)}
        }
    </style>
</head>

<body class="">    
          <div class="text-light bg align-items-center mt-5">
              <div class="container-fulid">
                <div class="row ml-3">
                  <div class="col-md-12 col-xl-12 col-lg-12 col-sm-12 mt-5">
                    <div class="h1-reponsive lead h text-dark text-monospace  mt-lg-5 pt-5 z1"><strong>One Stop</strong></div>
                    <p class="  text-dark lead z1" ><strong>Event Planner</strong></p>
                    <a  href="gallary.php" class="mt-2 btn text-uppercase btn-danger z1">GET STARTED!</a>         
                 </div>
                </div>
              </div>
          </div>
</body>
</html>
       