<?php 
include('./head_tag.php'); 
include('./conn.php'); 

ob_start(); 
session_start();
    if(!isset($_SESSION['unm'])){
        header('location:login.php');
    }
    if(isset($_SESSION['pid'])){
        $e=$_SESSION['pid'];
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: lightblue;
        }
    </style>
    <script>
        $(document).ready(function () {
	            $("#s1").click(function () {
                    $('#s1').attr("disabled", true);
            });
		});
       
    </script>
</head>
<body>

<div class="container-fluid row mt-1">
            <center >
            <button type="button" class="btn btn-primary float-left m-5 ">
                <a href="view_all_song.php" class="previous text-dark text-decoration-none font-weight-bold">&laquo; Previous</a>
            </button>
            <button type="button" class="btn btn-primary float-right m-5 ">
                <a href="./regist/p_detail_addsong.php" class="next text-dark text-decoration-none font-weight-bold">Next &raquo;</a>
            </button>
                     <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 mt-5">
                        <form method="post">
                        <h1 class="align-middle">Playlist Creation</h1>
                        <!-- <span><a href="user_wise_view_playlist.php?id=".$pid .""><h4 class='text-center mt-5'><em><i>View</i></em></h4></a> </span> -->
                        <br>
                        <!-- <a href="view_song.php"><h4 class='text-center mt-5'><em><i>View</i></em></h4></a>  -->
                            <table border="2" class='table'>
                                <!-- <tr class="text-center">
                                    <td>
                                            <h3><a href="./regist/p_detail_addsong.php" class="text-decoration-none">Add a song old playlist</a></h3>
                                    </td>
                                </tr> -->
                                <tr>
                                    <td >
                                        <input type="text" class="form-control" name="pnm" id="" placeholder="Playlist Name" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <select name="uid" class="form-control" id="s1" required>
                                        <option selected="selected" disabled="disabled">-----Select User Name-----</option>
                                        <?php     
                                            // if(isset($_GET['id'])){
                                            //     $pid=$_GET['id'];
                                        
                                            //     $q="select * from user where uid='$pid'";
                                            //     $res=mysqli_query($conn,$q);
                                            //     $re=mysqli_fetch_array($res);
                                            //     // print_r($res);
                                            // }else{
                                            //     header("location:user_wise_view_playlist.php");
                                            // }
                                        
                                                $q="select * from user order by unm";
                                                // dnm a.b.c.d....z asending order 
                                                $res=mysqli_query($conn,$q) or die("Error".mysqli_error($conn));

                                                while($r=mysqli_fetch_array($res)){
                                                    // echo "<option value=$r[0]>$r[1]</option>";

                                                    echo "<option value=$r[0] ";
                                                    if($r[0]==$e) echo "selected";
                                                    echo ">$r[1]</option>";
                                                }
                                            ?>
                                    </select>
                                <!-- <input type="text" class="form-control" name="uid"  placeholder="Username" value="<?php 
                                        // if(isset($_SESSION['unm'])){
                                        //     $e=$_SESSION['unm'];
                                        //     echo $e;
                                        // }
                                    ?>" id=""> -->
                                    </td>
                                </tr>
                                <tr>
                                    <td >
                                        <input type="text" class="form-control" name="year" placeholder="Year" min="4" max="4" id="" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td >
                                             <input type="submit" class="btn btn-primary btn-block btn-lg" style="padding-left: 3rem; padding-right: 3rem;" value="Create Playlist" name="submit">
                                    </td>
                                </tr>
                                <tr>
                                    <td >
                                            
                                            <a href="user_wise_view_playlist.php" class="btn btn-primary btn-block btn-lg" style="padding-left: 3rem; padding-right: 3rem;">View Playlist</a>
                                    </td>
                                </tr>
                            </table>
                        </form>
                </div>
            </center>
</div>
<footer class="fixed-bottom"><?php include('footer.php');?></footer>

</body>
</html>
<?php
    if(isset($_REQUEST['submit'])){
        $pnm=$_REQUEST['pnm'];
        $uid=$_REQUEST['uid'];
        $year=$_REQUEST['year'];

        // print_r($_REQUEST);
        
        if(empty($uid) || empty($year) || empty($pnm)){
            echo "<script>alert('Fill TextBox');</script>";
        }
        $q="insert into playlist values(null,'$pnm','$uid','$year')";
      echo $q;
        if(mysqli_query($conn,$q)){
             header("location:./regist/p_detail_addsong.php");
            echo "done";
        }else{
            die("Could not add dept.".mysqli_error($conn));
        }
    }
?>
