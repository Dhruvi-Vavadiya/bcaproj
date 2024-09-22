<?php
session_start();
    include('head.php');
    include('nav.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body, html {
        height: 100%;
        margin: 0;
        }

        .bg {
        /* The image used */
        background-image: url("./pic/aboutus.jpg");

        /* Full height */
        height: 70%; 

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
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
<body>
    <div class="bg mt-5"></div>
    <div class="container-fuild m-5 p-5 word">  
    
            <p> This is an indigo event management system software project that serves the functionality of an event manager. The system allows only registered users to login and new users are allowed to resister on the application. This is a web application developed in Asp.net and Sql but desktop application of the same application is also available. The project provides most of the basic functionality required for an event. It allows the user to select from a list of event types. </p>
            <p class="mt-5">
            Once the user enters an event type eg(Marriage, Dance Show etc), the system then allows the user to select the date and time of event, place and the event equipment’s. All this data is logged in the database and the user is given a receipt number for his booking. This data is then sent to the administrator (website owner) and they may interact with the client as per his requirements and his contact data stored in the database.
            </p>
                   
                
    </div>
    <footer ><?php include('footer.php');?></footer>
</body>
</html>