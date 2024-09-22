<?php
    session_start();
    if(isset($_SESSION['aid'])){
        //  $_SESSION['unm']= "yvj";
        unset($_SESSION['aid']);
        unset($_SESSION['aunm']);
        print_r($_SESSION);
        // session_destroy();
        // print_r($_SESSION);
         header("location:index.php");
        }else{
          header("location:dashbord.php");
        //   $_SESSION['unm']= "yvj";
    }


    
?>
