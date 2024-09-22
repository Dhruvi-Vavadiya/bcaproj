<?php
    if(isset($_GET['f1'])){
        $file=$_GET['f1'];
                if(file_exists($file)){
                    header('Content-Description: File Transfer');
                    header('Content-Type: application/octet-stream');
                    header('Cache-Control:no-cache, must-revalidate');
                    header('Expires: 0');
                    header('Content-Disposition: attachment; filename='.basename($file));
                    header('Content-Length: ' . filesize($file));
                    header('Pragma: public');
                    flush();
                    readfile($file);
                    die();
                }else{
                    echo "file does not exist";
                }
    }else{
        echo "filename is not defined";
    }
?>