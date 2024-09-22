<?php
session_start();
    include('head.php');
    include('nav.php'); 
    include('conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <style>
        body{background-color:#f2f2f2;}
        
		audio::-webkit-media-controls-panel {
            background-color:#f2f2f2;
            color: black;
     }
     
     .blink {
                animation: blinker 1.5s linear infinite;
                color: black;
                font-family: sans-serif;
            }
            @keyframes blinker {
                50% {
                    opacity: 0;
                }
            }
            .circle{
                letter-spacing:10px;
                font-size:25px;
            }
            .circle:hover {
            padding: 7px;
            transition: 0.4s ease;
            box-shadow: 0 0 5px black,
                        0 0 20px black,
                        0 0 60px black,
                        0 0 150px black;
            color:red;
            }
            
            @media (min-width:300px)and (max-width:700px) {
                body{
              
                    max-width:100px;
             
 
             }
            
        }
        .table-wrapper {
    overflow: auto;
}
    </style>
   
</head>
<body>  

<?php
    echo "<div class='text-center pt-5 mt-5 '>";
    for($i=65;$i<=90;$i++){
        echo "<a class='text-decoration-none  fw-bold circle rounded-circle' href='event_wise.php?ch=$i'>".chr($i)."</a>";  
    }
    echo "</div>";
   
    if(isset($_GET['ch'])){
    
        $ch =$_GET['ch'];
        $q ="Select * from event where Name LIKE '%" . chr($ch) ."%'";  
   }else

        $q = "Select * from event";

        $result = mysqli_query($conn, $q);

        if(mysqli_num_rows($result)>0){
            $output = '<div class="ml-5 text-center"><table class="table table-borderless  w-100   mt-5 scroll table-wrapper">
            <th>Event ID</th>
            <th>Event Name</th>
            <th>Price</th>
            <th>Image</th>
            <th>Venue</th>
            <th>Picture</th>
            <th>Description</th>
            ';
            while($r=mysqli_fetch_row($result)){
                $output .= " <tr class='font-weight-normal'>
                <td>$r[0]</td>
                <td>$r[1]</td>
                <td>$r[2]</td>
                
                <td><img src='./pic/$r[3]' width=80 height=80 class='rounded-circle'></td>
                <td>$r[4]</td>
                <td><img src='./pic/$r[5]' width=80 height=80 class='rounded-circle'></td>
                 <td>$r[6]</td>
            </tr>";
            }$output .= "</table></div>";
            echo $output;
        }
        else{
           
            echo "<div align=center class='blink mt-5 pt-5' behavior='alternate'><h2 style='color:red'>NO DATA FOUND</h2></div>";
       }
?>     
 
</body>
<footer><?php include('footer.php');?></footer>
</html>