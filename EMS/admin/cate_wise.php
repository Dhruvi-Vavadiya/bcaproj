<?php include('../head.php'); 
include('../conn.php');

 include("dashbord.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .card{
  display: block; 
    margin-bottom: 20px;
    line-height: 1.42857143;
    background-color: #fff;
    border-radius: 2px;
    box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12); 
    transition: box-shadow .10s; 
}
.card:hover{
  box-shadow: 0 12px 20px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
}
.img-card {
  width: 100%;
  height:200px;
  border-top-left-radius:2px;
  border-top-right-radius:2px;
  display:block;
    overflow: hidden;
}
.img-card img{
  width: 100%;
  height: 200px;
  object-fit:cover; 
  transition: all .25s ease;
} 
.card-content {
  padding:15px;
  text-align:left;
}
.card-title {
  margin-top:0px;
  font-weight: 700;
  font-size: 1.65em;
}
.card-title a {
  color: #000;
  text-decoration: none !important;
}
.card-read-more {
  border-top: 1px solid #D4D4D4;
}
.card-read-more a {
  text-decoration: none !important;
  padding:10px;
  font-weight:600;
  font-size:20px;
  text-transform: uppercase
}
    /* ennd card */
    </style>
</head>
<body>
<div class="w3-main" style="margin-left:300px;margin-top:30px;">
<div class="container-fluid row mt-5">
        <center>
            <h1 class="text-center">Event Category</h1>
            <!-- search bar -->
            <form method="get">
            <!-- <h1 class="text-center">Event wise </h1> -->
                    <div class="input-group mb-3 mt-5 col-sm-12 col-md-12 col-lg-12 col-xl-9">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class='bx bx-search-alt-2'></i></span>
                            </div>
                            <select name="id" class="form-control form-control-lg" required>
                                <option selected="selected" disabled="disabled">----Select----</option>
                                            <?php
                                            $q="select * from cate order by nm";
                                            $res1=mysqli_query($conn,$q) or die("Error".mysqli_error($conn));
                                                while($r=mysqli_fetch_array($res1)){
                                                    echo "<option value=$r[0]>$r[1]</option>";
                                                }
                                            ?>
                            </select>
                            <div class="input-group-append">    
                                <input type="submit" class="btn btn-success px-5 font-weight-bolder" style="font-size:20px;" name="search" value="Search" />
                            </div>
                    </div>    
                </form>
         </center>
</div>
</body>
</html>
<?php
// if(isset($_REQUEST['search'])){
    // if(isset($_GET['eventid'])){
    //     $eventid=$_GET['eventid'];
    
        
//id wise 

if(isset($_REQUEST['search'])){
    $id=$_REQUEST['id'];
        $q="Select * from event where cid='$id' ";
}
else
$q="select * from event";
    
        $res=mysqli_query($conn,$q) or die("Error...".mysqli_error($conn));
    if(mysqli_num_rows($res)>0){	      
        echo "<div class='container '><div class='row'>";
        while($r=mysqli_fetch_array($res)){
            echo '<div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mt-5">
                        <div class="card ">
                            <a class="img-card" >
                                 <img src="../pic/'.$r[5].'" />
                            </a>
                            <div class="card-content">
                                <h4 class="card-title">
                                    <a > '.$r[1].'</a>
                                    <div><a> Venue : '.$r[4].'</a></div>
                                </h4>
                                <p class="">'.$r[6].'</p>
                            </div>
                            <div class="card-read-more">
                                <a  class="btn btn-link btn-block">₹'.$r[2].'</a>
                            </div>
                        </div>
                    </div>';
        }	
        echo " </div></div>";		
    }else{
    echo "<b><h3 class='text-center text-danger'>event is not add...</h3>";
    }	




?>