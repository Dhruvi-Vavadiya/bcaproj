<?php
 include('../head_tag.php'); include('../conn.php'); ob_start();
if(isset($_GET['pid'])){
    
    $pid=$_GET['pid'];
    $q="select * from playlist where pid='$pid'";
    $result=mysqli_query($conn,$q) or die("Error!!!");
    $r=mysqli_fetch_row($result);
    // print_r($r);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<div class="container-fluid row mt-2">
    
            <center>
            <button type="button" class="btn btn-primary float-left m-5 ">
                <a href="../user_wise_view_playlist.php" class="previous text-dark text-decoration-none font-weight-bold">&laquo; Previous</a>
            </button>
            <button type="button" class="btn btn-primary float-right m-5 disabled">
                <a href="#" class="next text-dark text-decoration-none font-weight-bold">Next &raquo;</a>
            </button>
           
                     <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4 mt-5">
                        <form method="post">
                        <h1 class="align-middle">Playlist Update</h1><br>
                            <table border="2" class='table'>
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" name="pnm" id="" placeholder="Playlist Name"value="<?php echo $r[1];?>" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <select name="uid" class="form-control" required>
                                    
                                        <?php                                                
                                                $q="select * from user order by unm";
                                                
                                                $res=mysqli_query($conn,$q) or die("Error".mysqli_error($conn));

                                                while($r1=mysqli_fetch_array($res)){
                                                    echo "<option value=$r1[0] ";
                                                    if($r1[0]==$r[2]) echo "selected";
                                                    echo ">$r1[1]</option>";
                                                }
                                            ?>
                                </select>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" name="year" placeholder="Year" value="<?php echo $r[3];?>" min="4" max="4" id="" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <input type="submit" class="btn btn-primary btn-block btn-lg" style="padding-left: 3rem; padding-right: 3rem;" value="Create" name="submit">
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
        $pnm=$_REQUEST['pnm'];
        $uid=$_REQUEST['uid'];
        $year=$_REQUEST['year'];

        print_r($_REQUEST);
        $q="update playlist set pnm='$pnm',uid='$uid',year='$year' where pid=$pid";
        echo $q;
		if(mysqli_query($conn,$q)){
			
			header("location:../user_wise_view_playlist.php");
		}else{
			echo "Error..".mysqli_error($conn);
		}
    }
?>