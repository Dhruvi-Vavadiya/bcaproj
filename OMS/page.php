<?php
ob_start();
 include('head_tag.php'); include('conn.php'); 
 session_start();
 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <?php

    $page=$_GET['p1'];

    if($page=="" || $page=="1"){
        $page1=0;
    }else{
        $page1=($page*3)-3;
    }
    
    $q="select * from playlist_details limit $page1,3";

    $res=mysqli_query($conn,$q);
    while($row=mysqli_fetch_array($res)){
        echo $row['pdid']." ". $row['pid'];
        echo "<br>";
    }


    $q1="select * from playlist_details";
    $res1=mysqli_query($conn,$q1);

    $cou=mysqli_num_rows($res1);

    $a=$cou/3;
    // echo ceil($a);
    $a=ceil($a);
    echo "<br>"; echo "<br>";
    echo '<nav aria-label="Page navigation example">
    <ul class="pagination">';
        for($b=1;$b<=$a;$b++){
           echo '<li class="page-item"><a href="page.php?p1='.$b.'" style="text-decoration-none" class="page-link"  >'.$b.' </a></li>';
        }
        echo '</ul>
        </nav>';
?>
</body>
</html>
<!-- <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav> -->