<?php
ob_start();
session_start();
    include('head.php');
    // include('conn.php');
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <style>
        body{
            margin: 0px;
            padding: 0px;
        }
        #image {
            letter-spacing: 5px;
    /* transform: rotate(4deg); */
    font-family: undefined;
    font-size: 24px;
    border: groove;
    user-select: none;
    text-decoration: line-through;
    background-image: url(./pic/captcha.jpg);
    /* background-repeat: no-repeat; */
    background-size: cover;
        }
        
    </style>
</head>

<body onload="generate()">

    <div class="container">
        <div class="row ">
            <center>
                <div class="col-sm-6 col-xl-6 col-sm-6 col-md-6 justify-content-center mt-5 ">
                    <!-- captcha code -->
                    <div id="image" class="inline h-25 w-25 p-2 " selectable="False"></div>
                        <p id="key"></p>
                        <div class="inline" onclick="generate()">
                            <i class="fas fa-sync"></i>
                        </div>
                    <div class="d-flex justify-content-between align-items-center  mt-2">

                        <div class="form-outline input-group m-2">
                            <input type="text" id="c_text" class="form-control form-control-lg"
                                placeholder="Enter Captcha Code" />
                        </div>
                        
                        

                    </div>
                    <input type="submit" name="submit" class="btn btn-primary btn-block btn-lg"
                        style="padding-left: 3rem; padding-right: 3rem;" value="Submit" onclick="printmsg()">

                </div>
            </center>
        </div>
    </div>

    <script>

        let captcha;
        function generate() {

            // Clear old input
            document.getElementById("c_text").value = "";

            // Access the element to store
            // the generated captcha
            captcha = document.getElementById("image");
            let uniquechar = "";

            const randomchar = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

            // Generate captcha for length of
            // 5 with random character
            for (let i = 1; i < 5; i++) {
                uniquechar += randomchar.charAt(
                    Math.random() * randomchar.length)
            }

            // Store generated input
            captcha.innerHTML = uniquechar;
        }

        function printmsg() {
            const usr_input = document.getElementById("c_text").value;
            if (usr_input == captcha.innerHTML) {
                let s = document.getElementById("key").innerHTML = "Matched";generate();
                window.location.href = "http://localhost/ems/index.php";
            }
            else {
                let s = document.getElementById("key").innerHTML = "not Matched"; generate();
                window.location.href="http://localhost/ems/captcha.php";
            }
        }
    </script>
</body>

</html>