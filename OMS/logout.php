<?php
    session_start();
    if(isset($_SESSION['unm'])){
        //  $_SESSION['unm']= "yvj";
        // unset($_SESSION['unm']);
        print_r($_SESSION);
        session_destroy();
        // print_r($_SESSION);
         header("location:index.php");
        }else{
          header("location:login.php");
        //   $_SESSION['unm']= "yvj";
    }
?>