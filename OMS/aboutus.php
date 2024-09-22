<?php
session_start();
include('head_tag.php'); 
include('conn.php'); 
include('nav.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
        .bg > img{
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            /* height: 50px; */
        }
        img{
            /* height: 85vh !important; */
            /* height: 50%;
            width: 100%; */
        }
        .word{
            line-height: 30px;
    font-size: 18px;
    letter-spacing: 2px;
        }
        body{
            background-color: #f2f2f2;
        }
    </style>
</head>
<body class="bg">
    <div class="container-fuild">
        <img src="https://img.freepik.com/free-photo/business-people-partnership-support-team-urban-scene-concept_53876-144834.jpg?w=740&t=st=1694943331~exp=1694943931~hmac=10c074b0ea225ed89b1e00124125c8bc29376ad4c9286436c4710913379f2836" class="  img-fluid" style="width: 100%; height: auto; " alt="">
            
        </div>
    <div class="container-fuild m-5 p-5 word">  
    
            <p> With HiLyrics, it’s easy to find the right music or podcast for every moment – on your phone, your computer, your tablet and more. There are millions of tracks and episodes on HiLyrics. So whether you’re behind the wheel, working out,partying or relaxing, the right music or podcast is always at your fingertips. Choose what you want to listen to, or let HiLyrics surprise you. You can also browse through the collections of friends, artists, and celebrities, or create a radio station and just sit back. Soundtrack your life with HiLyrics. So, listen for free.</p>
            <p class="mt-5">
            HiLyrics is a well-known digital music service that provides access to millions of songs from various genres and artists. It offers a user-friendly web player and a dedicated application that allows you to discover music, create playlists, and follow your favorite artists.Online music Website's allow you to listen to music directly through a web browser  without the need for downloading or storing music files locally.
            </p>
                   
            <div class="social">
                <a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-twitter"></a>
                <a href="#" class="fa fa-instagram"></a>   
            </div>     
    </div>
    <footer class=" pt-3"><?php include('footer.php');?></footer>
</body>
</html>


<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AboutUs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
                        * {
                        margin: 0px;
                        padding: 0px;
                        box-sizing: border-box;
                        font-family: Georgia, 'Times New Roman', Times, serif;
                    }
                    .fa {
                    padding: 15px;
                    font-size: 25px;
                    width: 40px;
                    text-align: center;
                    text-decoration: none;
                    margin: 5px 3px;
                    }

                    .fa:hover {
                        opacity: 0.7;
                    }

                    .fa-facebook {
                    background: #3B5998;
                    color: white;
                    }

                    .fa-twitter {
                    background: #55ACEE;
                    color: white;
                    }
                    .fa-instagram {
                    background: #125688;
                    color: white;
                    }


                    .section {
                        width: 100%;
                        min-height: 100vh;
                        background-color: #ddd;
                    }

                    .container {
                        width: 80%;
                        display: block;
                        margin: auto;
                        padding-top: 100px;
                    }

                    .content-section {
                        float: left;
                        width: 60%;
                    }

                    .img-section{
                        background-color:#ddd;
                        display: flex;
                        border-radius: 24px 0 0 24px;
                    }
                    .img-section img{
                    height:50vh;
                    margin:60px auto
                    }
                    .card {
                    box-shadow: 4px 0 0 4px rgba(0, 0, 0, 0.2);
                    margin: 3px;
                    background-color: #ddd;
                    }

                    .rounded-circle{
                        width:50vh;
                        height:50vh;
                        margin:60px auto 
                    }

    </style>
</head>

<body>
    <div class="section">
        <div class="container">
            <div class="content-section">
                <div class="title">
                    <h1>About Us</h1>
                </div>
                <div class="content">
                    <h3> With HiLyrics.</h3>
                    <p> With HiLyrics, it’s easy to find the right music or podcast for every moment – on your phone, your computer, your tablet and more. There are millions of tracks and episodes on Spotify. So whether you’re behind the wheel, working out,
                        partying or relaxing, the right music or podcast is always at your fingertips. Choose what you want to listen to, or let Spotify surprise you. You can also browse through the collections of friends, artists, and celebrities, or
                        create a radio station and just sit back. Soundtrack your life with HiLyrics. Subscribe or listen for free.</p>
                    <div class="button">Read More
                    </div>
                    </div>
                    <div class="social">
                        <a href="#" class="fa fa-facebook"></a>
                        <a href="#" class="fa fa-twitter"></a>
                        <a href="#" class="fa fa-instagram"></a>
                    </div>
                </div>    
                    <div class="img-section">  
                    <img src="img/abouus.jpg">
                    </div>
        </div>
    </div>
    <div class ="container text-center py-4">
      <tr>
        <td><h1>OUR TEAM</h1></td>
      </tr>
    </div>
    <div class="row">
  <div class="column 'col-sm-12 col-md-10  col-lg-12 col-xl-4 mt-5 mb-5">
    <div class="card">
      <img src="img/WhatsApp Image 2023-09-17 at 2.44.28 PM.jpeg" class="rounded-circle">
        <h2 align="center" >ANJALI VAGHASIYA</h2>
        <p  align="center"class="title">ADMIN USER</p>
        <p align="center">Some text that describes me lorem ipsum ipsum lorem.</p>

    </div>
  </div>

  <div class="column 'col-sm-12 col-md-10  col-lg-12 col-xl-4 mt-5 mb-5">
    <div class="card">
      <img src="img/WhatsApp Image 2023-09-17 at 2.41.05 PM.jpeg"  class="rounded-circle">
        <h2  align="center">DHURVI VAVIYA</h2>
        <p  align="center"class="title">USER </p>
        <p  align="center">Some text that describes me lorem ipsum ipsum lorem.</p>
    </div>
  </div>
  
  <div class="column 'col-sm-12 col-md-10  col-lg-12 col-xl-4 mt-5 mb-5">
    <div class="card">
      <img src="img/mansi.jpeg" class="rounded-circle">
        <h2 align="center">MANSI KHUNT</h2>
        <p   align="center"class="title">GUEST USER</p>
        <p align="center">Some text that describes me lorem ipsum ipsum lorem.</p>
    </div>
  </div>
    </div>
</body>

</html> -->