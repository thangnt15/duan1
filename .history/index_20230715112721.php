<?php 
    include "view/header.php";
    if((isset($_GET['act']))&&($_GET['act']!="")) {
        $act=$_GET['act'];
        switch ($act) {
            case 'gioithieu':
                include "view/gioithieu.php";
                break;
            case 'gioithieu':
                    include "view/gioithieu.php";
                    break;
        }
    }
    include "view/home.php";
    include "view/footer.php";

?>