<?php 
    include "view/header.php";
    if((isset($_GET['act']))&&($_GET['act']!="")) {
        $act=$_GET['act'];
        switch ($act) {
            case 'gioithieu':
                include "view/gioithieu.php";
                break;
            case 'lienhe':
                include "view/lienhe.php";
                break;
            case 'tintuc':
                include "view/tintuc.php";
                break;

            default: 
                include "view"
        }
    }
    include "view/home.php";
    include "view/footer.php";

?>