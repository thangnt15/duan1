<?php

    include "header.php";

    if(isset($_GET['act'])) {
        $act=$_GET['act'];
        switch ($act) {
            case 'adddm':
                # code...
                break;
            
            default:
                include "home.php";
                break;
        }
    } else





    
    include "footer.php"

?>