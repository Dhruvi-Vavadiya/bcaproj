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
             
        $q="SELECT p.*,b.*,u.Name,e.Name,e.Price FROM `pay` as p,booking as b,user as u,event as e WHERE p.BID=b.BID and u.UID=b.UID and e.EID=b.EID";
        $result=mysqli_query($conn,$q);
       
        if(mysqli_num_rows($result)> 0){
            echo "<div class='container'>
               <h2 class='text-center p-2 pb-3'>Payment</h2>
        <table  class='table  border'>";
echo "<thead><tr>
        <th>ID</th>
        <th>User name</th>
        <th>Event Name</th>
        <th>Starting Date</th>
        <th>Ending Date</th>
        <th>Payment ID</th>
        <th>Amount</th>
       
        </tr></thead> <tbody>";
            while($r=mysqli_fetch_array($result)){                   
                    echo "<tr>
                            <td>$r[0]</td>
                            <td>$r[13]</td>
                            <td>$r[14]</td>
                            <td>$r[7]</td>
                            <td>$r[8]</td>
                            <td>$r[2]</td> 
                            <td>
                            ";?> <?php $pday=$r[9];
                            $pri=$r[15];
                            $total=($pday*$pri);
                            echo "₹".$total.""; ?>
                             <?php echo"
                            </td>
                                                    

                            </td>
                        </tr>";
            }
            echo " </tbody></table></div>";

        }
        
    ?>
</div>


</body>
</html>