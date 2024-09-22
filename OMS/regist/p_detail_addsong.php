<?php
 include('../head_tag.php'); include('../conn.php'); ob_start();
 session_start();
    if(!isset($_SESSION['unm'])){
        header('location:../login.php');
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
</head>
<body>
    <div class="container-fluid row mt-1">
        <center>
            <button type="button" class="btn btn-primary float-left m-5 ">
                <a href="../p_add.php" class="previous text-dark text-decoration-none font-weight-bold">&laquo; Previous</a>
            </button>
            <button type="button" class="btn btn-primary float-right m-5 ">
                <a href="../playlist_report.php" class="next text-dark text-decoration-none font-weight-bold">Next &raquo;</a>
            </button>

        <h1 class="align-middle mt-5">Playlist add a song</h1>
            
       <!-- add song -->
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4 mt-2 ">
                <form method="post">
                    <table border="2" class="table my-5">
                            <tbody>                 
                                <tr>
                                    <td>
                                    <!-- <input type="text" class="form-control "readonly name="pid" value="" id="" required> -->
                                    <select name="pid" class="form-control" required>
                                        <option selected="selected" class="to" disabled="disabled">------------------Select Playlist Name--------------------</option>
                                            <?php
                                                if(isset($_SESSION['pid'])){
                                                    $e=$_SESSION['pid'];
                                                 
                                                   $q1="Select p.*,u.unm from user as u,playlist as p where p.uid=u.uid and p.uid='$e'";
                                                   $res=mysqli_query($conn,$q1) or die("Error".mysqli_error($conn)); 
                                                   while($r1=mysqli_fetch_array($res)){
                                                        echo "<option value=$r1[0]> $r1[1]</option>";
                                                    }
                                                }
                                                ?>
                                    </select>
                                </td>
                                </tr>
                                <tr>
                                    <td>
                                    <select name="sid" class="form-control" required>
                                        <option selected="selected" class="to" disabled="disabled">------------------Select Like Song--------------------</option>
                                            <?php
                                                    $q="select * from song order by snm";
                                                    $res=mysqli_query($conn,$q) or die("Error".mysqli_error($conn));

                                                    while($r2=mysqli_fetch_array($res)){
                                                        echo "<option value=$r2[0]>$r2[1]</option>";
                                                    }
                                                ?>
                                    </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <input type="submit" class="btn btn-primary btn-block btn-lg " style="padding-left: 3rem; padding-right: 3rem;" value="Add Song" name="submit">
                                    </td>
                                </tr>
                            </tbody>
                    </table>
                </form>
        </div>
      </center>
    </div>
</body>
</html>
<?php
    if(isset($_REQUEST['submit'])){
        $pid=$_REQUEST['pid'];
        $sid=$_REQUEST['sid'];
        // print_r($_REQUEST);
       
        if(empty($pid) || empty($sid)){
            echo "<script>alert('Fill TextBox');</script>";
        }else{
            $q="insert into playlist_details value(null,'$pid','$sid')";
        // echo $q;
        $re=mysqli_query($conn,$q) or die("Error".mysqli_error($conn));
        if($re){
            header("location:../user_wise_view_playlist.php");
        }else{
            echo "<h1>inserted query falied!!!</h1>";
        }
        }
    } 
?>
 