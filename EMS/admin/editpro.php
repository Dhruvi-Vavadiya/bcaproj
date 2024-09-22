<?php
     include("../head.php");
     include("../conn.php");
     ob_start();
    session_start();
     if(isset($_SESSION['aid'])){
         $id=$_SESSION['aid'];
         
         $q="select * from login where Id='$id'";
         $result=mysqli_query($conn,$q) or die();
         $r=mysqli_fetch_row($result); 
        // print_r($r);
     }else{
        header('location:index.php');
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
<div class="container-fluid row">   
            <center>
                
                     <div class="col-xl-5 mt-5 pb-2">
                        <form method="post">
                        <div class="row m-3 ml-5">
                            <div > <h3 align="center" class='text-center mt-4 ml-5'>Edit Profile</h3></div>
                              </div>
                            <table  class="table table-borderless">
                                <tr>
                                    <th class="text-right"><span >User Name :</span></th>
                                    <td>
                                        <input type="text" class="form-control" name="unm" value="<?php echo $r[1];?>" >
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-right"><span >Email ID :</span></th>
                                    <td>
                                        <input type="email"  class="form-control" name="email"  value="<?php echo $r[2];?>" >
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-right"><span >Password :</span></th>
                                    <td>
                                        <input type="password"  class="form-control"  name="pwd"  value="<?php echo $r[3];?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="align-middle">
                                        <input type="submit" class="btn btn-primary btn-block btn-lg" style="padding-left: 3rem; padding-right: 3rem;" value="Edit" name="submit">
                                        
                                    </td>
                                </tr>
                                
                            </table>
                        </form>
                </div>
            </center>
    </div>

    <!-- view -->
    <div id="id02" class="modal">
    <center>
      <div class="col-md-9 col-lg-6 col-xl-4 mt-5 ">
            <form class="modal-content animate" method="post" >
            <p class="float-right mt-3 mr-4"><span onclick="document.getElementById('id02').style.display='none'"  class="close" style="font-size: 35px;cursor: pointer;" title="Close Modal">&times;</span></p>
            <div class="container py-4">
                
                   <div class="row">
                        <div class="col-sm-4">
                            <img src="https://static.vecteezy.com/system/resources/previews/026/619/142/non_2x/default-avatar-profile-icon-of-social-media-user-photo-image-vector.jpg" class='rounded-circle ml-5' alt='Cinque Terre' width='300' height='250'>
                        </div>
                        <div class="row mt-5">
                        <div class="col-sm-12">
                                <h3>UserName</h3>
                                <h5 class="lead"><?php echo $r[1];?></h5>
                        </div>
                       
                   </div>
                   <div class="row mt-5">
                        <div class="col-sm-12">
                                <h3>Email Id</h3>
                                <h5 class="lead"><?php echo $r[3];?></h5>
                        </div>
                       
                   </div>
            </div>
            </form>
      </div>
    </center>
</div>

    <script>
var modal1 = document.getElementById('id02');
window.onclick = function(event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
    }
}
</script>
</body>
</html>
<?php
    if(isset($_REQUEST['submit'])){
        $unm=$_REQUEST['unm'];
        $email=$_REQUEST['email'];
        $pwd=$_REQUEST['pwd'];
            $q= "update login set Name='$unm',email='$email',pwd='$pwd' where Id=$id";
            $res =mysqli_query($conn,$q);
                if(mysqli_affected_rows($conn)>0){
                 header("location:Login.php");
                 
                }else{
                    echo "not done";
                }
            }
   
?>