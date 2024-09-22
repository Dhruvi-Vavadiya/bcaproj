<?php
    ob_start();
//   session_start();
//   print_r($_SESSION);
    include("../conn.php");
    include("../head.php");
    include("dashbord.php");
    if(isset($_SESSION['aid'])){
        $aid=$_SESSION['aid'];

        $q="select * from login where ID='$aid'";
        $result=mysqli_query($conn,$q) or die();
        $r=mysqli_fetch_array($result);
        // print_r($r);
        $_SESSION['img']=$r[4];
        $img=$_SESSION['img'];
    }else{
        header("location:index.php");
    }
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .gradient-custom-3 {
/* fallback for old browsers */
background: #84fab0;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5))
}
.gradient-custom-4 {
/* fallback for old browsers */
background: #84fab0;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1))
}
.image {
  display: block;
  width: 100%;
  height: auto;
}

.overlay {
  position: absolute; 
  bottom: 0; 
  background: rgb(0, 0, 0);
  background: rgba(0, 0, 0, 0.5); /* Black see-through */
  color: #f1f1f1; 
  width: 100%;
  transition: .5s ease;
  opacity:0;
  color: white;
  font-size: 20px;
  padding: 20px;
  text-align: center;
}

.card:hover .overlay {
  opacity: 1;
}
    </style>
 </head>
 <body>
    
<!-- !PAGE CONTENT! -->

<div class="w3-main" style="margin-left:300px;margin-top:0px;">

    <div class="container">
        <div class="row">
            <?php
                echo "<div class='col-sm-4'>
                        <div class='card'>
                            <img class='card-img-top h-100 w-75 ml-5 pt-3 rounded-circle h1' src='../pic/".$r[4]."' alt='Card image' style='max-height: 350px;'>
                            <div class='overlay'>$r[5]</div>
                            <div class='card-body  text-center '>
                                <h3 class='card-title fw-bold'>$r[1]</h3>
                                <p>$r[2]</p> 
                            </div>
                        </div>
                    </div>";
            ?>
            <div class="col-sm-8">
                <!--  -->
                
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
       
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              

              <form method="post" enctype="multipart/form-data">

                <div class="form-outline mb-4">
                <label class="form-label fw-bold" for="form3Example1cg">Your Name</label>
                  <input type="text" name="nm" class="form-control form-control-lg" required value="<?php echo $r[1];?>" />
                
                </div>

                <div class="form-outline mb-4">
                <label class="form-label fw-bold" for="form3Example3cg">Your Email</label>
                  <input type="email" name="email" class="form-control form-control-lg" required value="<?php echo $r[2];?>"/>
                  
                </div>

                <div class="form-outline mb-4">
                <label class="form-label fw-bold" for="form3Example4cg">Your Mobile No</label>
                  <input type="text" name="mno" class="form-control form-control-lg" required value="<?php echo $r[5];?>"/>
                  
                </div>

                <div class="form-outline mb-4">
                <label class="form-label fw-bold" for="form3Example4cg">Your Password</label>
                  <input type="password" name="pwd" class="form-control form-control-lg" required value="<?php echo $r[3];?>"/>
                </div>

                <div class="form-outline mb-4">
                <label class="form-label fw-bold" for="form3Example4cg">Your Image</label>
                  <input type="file" name="img" class="form-control form-control-lg" accept="image/*"/>
                </div>
               

                <div class="d-flex justify-content-center">
                  <input type="submit" name="submit"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" value="Edit Profile"/>
                </div>

               

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

                   <!--  -->
            </div>
        </div>
    </div>
</div>





 </body>
 </html>

 <?php
    if(isset($_REQUEST['submit'])){
        $nm=$_REQUEST['nm'];
        $email=$_REQUEST['email'];
        $mno=$_REQUEST['mno'];
        $pwd=$_REQUEST['pwd'];
        
        if(isset($_FILES['img'])){
            $img_name=$_FILES['img']['name'];
            $img_loc=$_FILES['img']['tmp_name'];
		}else{
			$img_name=$r[4];
		}
    if($img_name==""){
      $img_name=$img;
    }
        
            $q= "update login set Name='$nm',Email='$email',Password='$pwd',img='$img_name',mobileno='$mno' where ID=$aid";
        if(mysqli_query($conn,$q)){
            move_uploaded_file($img_loc,"../pic/".$img_name);
            header("Location:profile.php");
        }
        else{
            die("Updaction failll!!!".mysqli_error($conn));
        }

    }
   
?>