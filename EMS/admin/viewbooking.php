<?php
    ob_start();
//   session_start();
    include("../conn.php");
    include("../head.php");
    include("dashbord.php");
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
      $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
    </script>
 </head>
 <body>
    
<!-- !PAGE CONTENT! -->

<div class="w3-main" style="margin-left:300px;margin-top:0px;">

<?php

$limit = 5;    
// update the active page number
if (isset($_GET["page"])) {    
    $page_number  = $_GET["page"];    
}    
else {    
  $page_number=1;    
}       
// get the initial page number
$initial_page = ($page_number-1) * $limit;       




    $q="SELECT b.*,e.Name,e.Price,u.Name FROM booking as b,event as e,user as u where e.EID=b.EID AND u.UID=b.UID order by BID LIMIT $initial_page, $limit";
    $result=mysqli_query($conn,$q) or die("Query Failed!!!");
    if(mysqli_num_rows($result)>0){
        echo "<div class='container '>
        <h1 class='text-center mt-5'>Booking</h1>
        <table  class='table  border table-sm-responsive mt-3'>";
  echo "<thead><tr>
        <th>ID</th>
        <th>User name</th>
        <th>Event Name</th>
        <th>Starting Date</th>
        <th>End Date</th>
        <th>No of Guest</th>
        <th>Booking_date</th>
        <th>Price</th>
        <th>action</th>
        </tr></thead> <tbody>";
            while($r=mysqli_fetch_array($result)){                   
                    echo "<tr>
                            <td>$r[0]</td>
                            <td>$r[11]</td>
                            <td>$r[9]</td>
                            <td>$r[3]</td>
                            <td>$r[4]</td>
                            <td>$r[6]</td>
                            <td>$r[7]</td>
                            <td>$r[10]</td>
                            <td>";?>
                                <?php
                                  if($r[8]==0){
                                    echo "<a href='Cancle.php?bid=$r[0]' class='badge badge-danger text-decoration-none' data-toggle='tooltip' title='change status'>Pending</a>";
                                 
                                  }else{
                                    echo "<a href='#' class='badge badge-success text-decoration-none'>Confirm</a>";
                                  }
                                ?>
                            <?php echo "</td>
                          
                        </tr>";
            }
            echo " </tbody></table></div>";
    }
    $getQuery = "SELECT COUNT(*) FROM invoice";     
        $result = mysqli_query($conn, $getQuery);     
        $row = mysqli_fetch_row($result);     
        $total_rows = $row[0];              
    echo "</br>";            
        // get the required number of pages
        $total_pages = ceil($total_rows / $limit);     
        $pageURL = "";

        echo '<nav aria-label="Page navigation">
        <ul class="pagination justify-content-end  pr-3">';

        if($page_number>=2){   
          echo "<li class='page-item'><a class='active page-link'  href='viewbooking.php?page=".($page_number-1)."'>  Previous </a></li>";   
        }
        
        for ($i=1; $i<=$total_pages; $i++) {   
          if ($i == $page_number) {   
              $pageURL .= "<li class='page-item'><a class = 'active page-link' href='viewbooking.php?page=".$i."'>".$i." </a></li>";   
          }               
          else  {   
              $pageURL .= "<li class='page-item'><a class='active page-link' href='viewbooking.php?page=".$i."'>".$i." </a></li>";     
          }   
        };

        echo $pageURL;    
        if($page_number<$total_pages){   

            echo "<li class='page-item'><a class='active page-link' href='viewbooking.php?page=".($page_number+1)."'>  Next </a>";   
        } 


        echo '</ul>
        </nav>';
?>

</div>

<!-- <nav aria-label="Page navigation">
  <ul class="pagination justify-content-end  pr-3">
    <li class="page-item "><a class="page-link" href="#" >Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav> -->

 </body>
 </html>