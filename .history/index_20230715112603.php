<?php 
    include "view/header.php";
    if((isset($_GET['act']))&&($_GET['act']!="")) {
        $act=$_GET
    }
    include "view/home.php";
    include "view/footer.php";

?>