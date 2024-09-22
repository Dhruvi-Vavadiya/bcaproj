<?php
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
</head>
<body>
<div class="w3-main" style="margin-left:300px;margin-top:0px;">
<br>

    <?php
     
        // $q="select * from  booking where status=1";
        // $Q="select b.*,e.*,u.* from booking as b,user as u,event as e where u.UID=b.UID and b.EID=e.EID and b.status=1";
        
        $q="select b.*,u.name ,e.* from booking as b,user as u,event as e where u.UID=b.UID and b.EID=e.EID and b.status=0 order by BID ";
        $result=mysqli_query($conn,$q);
       
        if(mysqli_num_rows($result)> 0){
            echo "<div class='container'>
               <h2 class='text-center p-2 pb-3'>Pending Booking</h2>
        <table  class='table  border'>";
echo "<thead><tr>
        <th>BID</th>
        <th>User name</th>
        <th>Event Name</th>
        <th>Starting Date</th>
        <th>Ending Date</th>
        
        
        <th>Price</th>
        <th>action</th>
        
        </tr></thead> <tbody>";
            while($r=mysqli_fetch_array($result)){                   
                    echo "<tr>
                            <td>$r[0]</td>
                            <td>$r[9]</td>
                            <td>$r[11]</td>
                            <td>$r[3]</td>
                            <td>$r[4]</td>
                            
                            
                            <td>₹$r[12]</td>
                            <td><a href='#' class='badge badge-danger text-decoration-none' >Pending</a></td>
                           

                            </td>
                        </tr>";
            }
            echo " </tbody></table></div>";

        }
        
    ?>
</div>
<script>
// $(document).ready(function(){
//   $('[data-toggle="tooltip"]').tooltip();   
// });
</script>

</body>
</html>