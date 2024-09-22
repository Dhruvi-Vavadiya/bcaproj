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
    .box {
        overflow1:hidden;
    }
    .box img{
        transition: all ease 1s;
    }
    .box:hover img{
        scale:1.2;
    }
   </style>
</head>
<body>
    
<div class="container-fluid row mt-1">
    <center>
        <h1 class="text-center mt-5">Artists Wise Play Song</h1>

        
        <form method="get">
           
                    <?php
                        $q1="select * from artist";
                        $res1=mysqli_query($conn,$q1);
                        if(mysqli_num_rows($res1)>0){
                                echo '<div class="row mt-5">';
                            while($r1=mysqli_fetch_array($res1)){
                                echo '<div class="col-xl-4 mb-5 box">
                                            <a href="R_artist.php?aid='.$r1[0].'" class="text-decoration-none">
                                                 <img src="../pic/'. $r1[4] .'" class="rounded-circle"  height=220 width=220  alt="">
                                                 <h4 class="text-dark">'. $r1[1] .'<h4>
                                            </a>
                                             
                                     </div>';
                                    
                            }
                            echo '</div>';
                        }

                    ?> 
        </form>
        </center>
        
</div>
</body>
</html>
<?php

            

            if(isset($_GET['aid'])){
                $aid=$_GET['aid'];
            
                $q2="select * from artist where aid='$aid'";
                $res2=mysqli_query($conn,$q2);
                $r2=mysqli_fetch_array($res2);

                $q="SELECT * FROM `song` WHERE aid='$aid'";
                    $res=mysqli_query($conn,$q) or die("Error...".mysqli_error($conn));
                    
                    if(mysqli_num_rows($res)>0){
                        echo "<h1 class='text-center '><span class='border border-bottom-0   p-2 border-primary'>$r2[1]</span></h1>";
                        while($r=mysqli_fetch_array($res)){
                            // print_r($r);
                           echo ' <div class="container">
                         
                                    <div class="row mx-5 mb-3">
                                        <div class="col-sm-7 col-md-6 col-lg-4 col-xl-4 mt-5">
                                            <img src="../pic/'.$r[7].'" class="img-rounded  rounded  border border-3 p-2 border-dark" alt="Cinque Terre" width="300" height="300">
                                        </div>
                                        <div class="col-sm-5 col-md-6 col-lg-8 col-xl-8 my-3">
                                            <table class="table w-100 my-5  table-borderless table-responsive">
                                                <tr>
                                                    <td><h2>Song Name :</h2></td>
                                                    <td><h2>'.$r[1].'</h2></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td><h4>Type :</h4></td>
                                                    <td><h4>'.$r[2].'</h4></td>
                                                </tr>
                                                <tr>
                                                    <td><h4>Lanuage :</h4></td>
                                                    <td><h4>'.$r[3].'</h4></td>
                                                </tr>
                                                <tr>
                                                    <td><h4>Audio :</h4></td>
                                                    <td><audio controls >
                                                            <source class="bg-dark" src="../'.$r[5].'" type="audio/mp3">
                                                        </audio>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>';
                            } 
                                
                                
                    }else{
                          echo "<b><font color=red>No employees working in $r[0] department.</font>";
                    }
            }
        ?>
