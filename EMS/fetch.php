<?php
   include("conn.php");
   include("head.php");
    if(isset($_POST['q'])){
        $q = "SELECT * FROM `event` where Name LIKE '%" . trim($_POST['q']) ."%'";
        $result = mysqli_query($conn,$q);
        if(mysqli_num_rows($result)>0){
           
            while($r=mysqli_fetch_row($result)){
                $output = '<div class="card mb-3 shadow-sm p-2" >
                <div class="row no-gutters">
                    <div class="col-md-5 pl-5">
                        <img src="./pic/'.$r[3].'"  class="img-rounded rounded  p-4" alt="Cinque Terre" >
                    </div>
                    <div class="col-md-7 p-3">
                        <div class="card-body">
                            <h2 class="card-title">'.$r[1].'</h2>
                            <h5 class="card-text">Venue : '.$r[4].'</h5>
                            <p class="card-text"><small class="text-muted">$'.$r[2].'</small></p>
                            <p class="card-text">'.$r[6].'</p>
                            <a href="viewdetails.php?vid='.$r[0].'" class="btn btn-primary btn-lg text-center">VIEW DETAILS >></a>                       
                        </div>
                    </div> 
                </div>
            </div>';
              }
            echo $output;  
        }else{
            echo "<br><h3 align=center><font color=red >Event is not available ......</font></h3>";           
        } 
    } 
   
 
    
    
?>

