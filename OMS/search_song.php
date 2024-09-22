<?php include('head_tag.php');   include('conn.php');?>
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
    </style>
   
</head>
<body>
<button type="button" class="btn btn-primary float-left mx-5 ">
                <a href="view_all_song.php" class="previous text-dark text-decoration-none font-weight-bold">&laquo; Previous</a>
            </button>
            <button type="button" class="btn btn-primary float-right mx-5 disabled">
                <a href="../playlist_view.php" class="next text-dark text-decoration-none font-weight-bold">Next &raquo;</a>
            </button>
<h1 class="m-5 text-center"> Search Any Music</h1>
<?php
    echo "<div class='text-center'>";
    for($i=65;$i<=90;$i++){
        echo "<a class='text-decoration-none  fw-bold circle rounded-circle' href='search_song.php?ch=$i'>".chr($i)."</a>";  
    }
    echo "</div>";
   
    if(isset($_GET['ch'])){
    
        $ch =$_GET['ch'];
        $q ="Select s.*,a.anm from artist as a,song as s where s.aid=a.aid and snm LIKE '%" . chr($ch) ."%'";  
   }else

        $q = "Select s.*,a.anm from artist as a,song as s where s.aid=a.aid";

        $result = mysqli_query($conn, $q);

        if(mysqli_num_rows($result)>0){
            $output = '<div class="ml-5 text-center"><table class="table table-borderless  w-100   mt-5 ">
            <th>Song ID</th>
            <th>Song Name</th>
            <th>Music</th>
            <th>Song Pic</th>
            <th>Artist Name</th>
            <th>Create date</th>
            ';
            while($r=mysqli_fetch_row($result)){
                $output .= " <tr class='font-weight-normal'>
                <td>$r[0]</td>
                <td>$r[1]</td>
                <td>
                    <audio controls>
                        <source src='./$r[5]' type='audio/mp3'>
                    </audio>
                </td>
                <td><img src='./pic/$r[7]' width=70 height=70 class='rounded-circle'></td>
                <td>$r[8]</td>
                 <td>$r[6]</td>
            </tr>";
            }$output .= "</table></div>";
            echo $output;
        }
        else{
           
            echo "<div align=center class='blink mt-5' behavior='alternate'><h2 style='color:red'>NO DATA FOUND</h2></div>";
       }
?>     
</body>
</html>