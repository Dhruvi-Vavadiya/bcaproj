<?php 
    ob_start();
    session_start();
    include('head_tag.php'); include('conn.php'); include('nav.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>body{background-color: lightblue;}</style>
</head>
<body>
<div class="container-fluid row mt-5">
            <center>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4 mt-5">
                        <form method="post">
                            <h1 class="align-middle">FeedBack</h1><br>
                                 <table border="2" class='table'>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input type="email" name="email" class="form-control" id="" placeholder="Enter Email address" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <textarea name="cmt" id="" class="form-control" cols="50" placeholder="Comment...." rows="5" required></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <input type="submit" class="btn btn-primary btn-block btn-lg" style="padding-left: 3rem; padding-right: 3rem;" value="Send Feedback" name="send">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                        </form>
                    </div>
            </center>
</div>
<footer class="fixed-bottom"><?php include('footer.php');?></footer>
</body>
</html>
<?php
    if(isset($_REQUEST['send'])){
        $email=$_REQUEST['email'];
        $cmt=$_REQUEST['cmt'];

        if(empty($email) || empty($cmt)){
            echo "<script>alert('Fill TextBox');</script>";
        }else{
             $q="INSERT INTO `feedback` VALUES (NULL, '$email', '$cmt', current_timestamp())";
        if(mysqli_query($conn,$q)){
            header("location:index.php");
       }else{
           die("Could not add dept.".mysqli_error($conn));
       }
        }
       
       
    }
?>