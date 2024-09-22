<?php include('../head_tag.php'); 
include('../conn.php');
include("Nav.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <style>
        /* body{background-color: rgb(67, 143, 169);}
        
		audio::-webkit-media-controls-panel {
        background-color:rgb(67, 143, 169);
            color: black; */
     /* } */
    </style>
    <script>
        $(document).ready(function(){
        //    alert('hill');
           $("#search").keyup(function(){
        //    alert("hello");
           var q = $("#search").val();
           $.ajax({
                url:'fetch_song.php',
                method:'POST',
                data:{
                    q:q
                },
                success:function(data){
                  //  alert(data);
                    $("#result").html(data);
                }
           });
           });
        });
    </script>
</head>
<body>
<div class="container-fulid mt-lg-5">
    <div class="text-center mt-lg-5">
        <h1 class="mb-5"> Search Any Song</h1>
        <center>
                 <div class="input-group my-3 w-50 align-center ">
                    <div class="input-group-prepend border-dark">
                         <span class="input-group-text"><i class='bx bx-search-alt-2'></i></span>
                    </div>
                    <input type="text" class="form-control" id="search" placeholder="Searching..." >
                    <div class="input-group-append">
                        <span class="input-group-text"><i class='bx bx-search-alt-2'></i></span>
                    </div>
                </div>
                 <p id="result"></p>
        </center>
       
    </div>
</div>        
</body>
</html>