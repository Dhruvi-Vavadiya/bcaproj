<?php
include("../conn.php"); 
include("../head.php"); 
include("dashbord.php");
?>
<center>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="w3-main" style="margin-left:300px;margin-top:30px;">
<div class="container-fluid">
    <center>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4 mt-2">
    <form action="" method="post">
    
    <table  class="table table-borderless">
        <tr>
            <td>FROM</td>
            <td>
                  <input type="date" name="sdate" class="form-control"   required>
            </td>
        </tr>
        <tr>
            <td>TO</td>
            <td>
            <input type="date" name="edate" class="form-control" required></td>
        </tr>
       
        <tr>
        <tr>
            <td colspan=2><input type="submit" name="search" value="Search" class="btn btn-primary btn-block btn-lg"></td>
           
        </tr>
    </table>
    </form>
</center>
</div>
</div>

</body>

</html>
           
<div class="w3-main" style="margin-left:300px;margin-top:30px;">         
       
<?php

    if(isset($_REQUEST['search'])){
       $sdate=$_REQUEST['sdate'];
       $edate=$_REQUEST['edate'];
      
        $q="SELECT u.Name,b.B_StartingDate,b.B_EndingDate,b.NO_of_guest,e.Name,e.Price,e.Image,e.Venue,e.Picture,e.Description  FROM booking as b,user as u,event as e where b.UID=u.UID and e.EID=b.EID and  B_StartingDate>='$sdate' and B_EndingDate<='$edate' ";
    }
    else
        $q="SELECT u.Name,b.B_StartingDate,b.B_EndingDate,b.NO_of_guest,e.Name,e.Price,e.Image,e.Venue,e.Picture,e.Description FROM booking as b,user as u,event as e where b.UID=u.UID and e.EID=b.EID";
        $result=mysqli_query($conn,$q) or die("Query Failed!!");
        if(mysqli_num_rows($result)>0){
            echo "<center>";
            echo "<div class='container'>
      
        <table  class='table mt-5 '>";
echo "<thead><tr>
            <th>User Name</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>No of Guest</th>
            <th>Name</th>
            <th>Price</th>
            <th>Image</th>
            <th>Venue</th>
            <th>Picture</th>
          
            </tr></thead> <tbody>";
       
            while($r=mysqli_fetch_array($result)){
                echo "<tr>
                <td>$r[0]</td>
                <td>$r[1]</td>
                <td>$r[2]</td>
                <td>$r[3]</td>
                <td>$r[4]</td>
                <td>$r[5]</td>
                <td><img src='../pic/$r[6]'  width=70 height=70 class='rounded-circle'></td>
                <td>$r[7]</td>
                       <td><img src='../pic/$r[8]'  width=70 height=70 class='rounded-circle'></td>
                        
                        </tr>";
                    }
                    echo " </tbody></table></div>";
                    echo "</center>";
                }
                else{
                    die("data not found");
                }

        ?>
        </center>
       
            </div>