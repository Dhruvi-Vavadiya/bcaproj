<?php  
    session_start(); include('head_tag.php');include('nav.php'); include('conn.php');
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .dropdown a{
            text-decoration: none;
        }
    </style>
    <script>
		$(document).ready(function () {
	            $(".s1").click(function () {
                $(".show").show();
            });
		});

        
		$(document).ready(function(){
			$("#d1").hover(function(){
				$("#menu").slideToggle();	
			});
		});
	
        $(document).ready(function(){
        $(".s1").click(function () {
                $(".footer").css("padding-bottom", "100px"); //chaining
            });
        });
	</script>
</head>
<body class="bg-dark text-light">
    <div class="mt-5 container ">
        <!-- img + social media -->
            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-4 col-xl-3 mt-5">
                        <img src="https://img.freepik.com/premium-photo/music-mind-music-abstract-art-created-with-generative-ai-technology_545448-15311.jpg"  class="img-rounded rounded" alt="Cinque Terre" width="250" height="236"> 
                </div>
                <div class="col-sm-6 col-md-8 col-lg-8 col-xl-9 mt-5">
                        <h2 class="mt-4 text-uppercase" >stream live to the world</h2>
                        <h6 class="text-secondary mt-2">Lastly brodcast live and connect with funs for free</h6>
                        <a type="button" class="btn btn-danger rounded-pill mt-3"><i style="font-size:20px;" class='bx bx-play'></i>Play Now</a>
                        <hr class="hr-light w-100 font-weight-bolder mt-4 mr-5">
                        <div style="font-size:22px;">
                            <a href="http://www.facebook.com" target="_blank" class=" text-decoration-none text-light"><i class='bx bxl-facebook'></i></a>
                            <a href="https://www.twitter.com" target="_blank" class=" text-decoration-none text-light"><i class='bx bxl-twitter ml-3' ></i></a>
                            <a href="http://www.instragram.com" target="_blank" class=" text-decoration-none text-light"><i class='bx bxl-instagram ml-3'></i></a>
                            <a href="http://www.spotify.com" target="_blank" class=" text-decoration-none text-light"> <i class='bx bxl-spotify ml-3'></i></a>
                            <a href="http://www.youtube.com" target="_blank" class=" text-decoration-none text-light"> <i class='bx bxl-youtube ml-3'></i></a>
                        </div>
                        
                </div>
            </div>
        
            <div class="row">
                    <!-- artist -->
                    <div class="col-sm-6 col-md-4 col-lg-4 col-xl-3 ">
                        <h4 class="mt-3 mb-3">Artists</h4>
                        <?php                    
                            $q1="select * from artist";
                            $res=mysqli_query($conn,$q1) or die("Error!!!");
                            if(mysqli_num_rows($res)>0){
                                while($r=mysqli_fetch_array($res)){
                                    echo "<img src='./pic/$r[4]' class='rounded-circle my-1' alt='Cinque Terre' width='60'  height='60'><span>&nbsp; &nbsp; $r[1]</span><br>";    
                                }
                            }
                        ?>        
                    </div>
                            <!-- song play download playlist -->
                    <div class="col-sm-6 col-md-8 col-lg-8 col-xl-9 mt-3 ">
                            <table class="table text-white table-borderless">
                                <tr class="mt-5">
                                    <td><h4 >Similer Songs</h4></td>
                                    <td></td>
                                    <td class="float-right ml-5 "><a href="search_song.php" class="text-decoration-none">Search</a></td>
                                </tr>
                            <?php                    
                                    $q1="Select s.*,a.anm from artist as a,song as s where s.aid=a.aid";
                                    $res=mysqli_query($conn,$q1) or die("Error!!!");
                                    if(mysqli_num_rows($res)>0){
                                        while($r=mysqli_fetch_array($res)){
                                            echo "<tr>";

                                                echo "<td>
                                                        <a href='./card.php?cid=$r[0]' class='text-decoration-none'>
                                                            <img src='./pic/$r[7]' class='rounded my-3' alt='Cinque Terre' width='60' height='60'>
                                                        
                                                        <span class='text-light'>&nbsp; &nbsp; $r[1]</span></a>
                                                    </td>";

                                                echo "<td>
                                                    <td>
                                                        <div class='float-right'>
                                                            <a class='ml-5 text-decoration-none' href='filedownload.php?f1=".$r[5]."'>
                                                                <i class='bx bx-download ' style='font-size:25px; color:white;'></i>
                                                            </a>
                                                            <a class='ml-3 text-decoration-none float-right' href='view_all_song.php?p1=".$r[0]."'>
                                                                <i class='bx bx-play-circle s1 mx-2' name='a1' style='font-size:25px; color:white;'></i>
                                                            </a>
                                                        </div>";
                                                        
                                                      echo "</div>    
                                                    </td>
                                                    <td>
                                                        <div class='dropdown ml-2' id='d1'>
                                                            <i data-toggle='dropdown' class='bx bx-dots-vertical-rounded'></i>
                                                            <div class='dropdown-menu bg-info' id='menu'>
                                                                <a class='dropdown-item ' href='p_add.php'><i class='bx bx-list-plus' style='font-size:22px; color:black;' ></i>Add To Playlist </a>
                                                                <a class='dropdown-item' href='playlist_report.php'><i class='bx bx-book-reader' style='font-size:22px; color:black;'></i>Reports</a>
                                                                <a class='dropdown-item' href='https://web.whatsapp.com/' target='_blank'><i class='bx bxs-share-alt' style='font-size:22px; color:black;'></i>Share</a>  
                                                            </div>
                                                        </div>
                                                    
                                                    </td>";

                                        echo " </tr>";
                                            
                                        }
                                    }
                        ?>    
                            </table>
                    </div>

            </div>
    </div>
            <footer class="footer"><?php include('footer.php');?></footer>
</body>
</html>

<?php
if(isset($_GET['p1'])){
    $p1=$_GET['p1'];
    $query="select * from song where sid='$p1'";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($result);

    echo "<audio controls style='display;' autoplay id='play' class='w-100 form-control show bg-dark fixed-bottom'>
                <source src='./$row[5]' type='audio/mp3'>
          </audio>";

}
//     if(isset($_REQUEST['a1'])){
// 		$a1=$_REQUEST['a1'];
//         $q="select * from song where sid='$a1'";
// 			$res=mysqli_query($conn,$q) or die("Error...".mysqli_error($conn));
//             if(mysqli_num_rows($res)>0){	
//                 $r1=mysqli_fetch_array($res);
//                 echo "<audio controls style='display: none;'  class='w-100 form-control bg-info show fixed-bottom'>
// <source src='./$r1[5]' type='audio/mp3'>
// </audio>";
//             }
//     }


                                                        // <a class='ml-3 text-decoration-none float-right'>
                                                        //         <i class='bx bx-play-circle touch s1 mx-5' name='a1' value='$r[0]' style='font-size:25px; color:white;'></i>
                                                        //     </a>
                                                        // </div>
                                                        // <audio controls style='display: none;'  class='w-100 form-control bg-dark show fixed-bottom'>
                                                        // <source src='./$r[5]' type='audio/mp3'>
                                                        // </audio>
?>