<?php

    include "header.php";

    if(isset($_GET['act'])) {
        $act=$_GET['act'];
        switch ($act) {
            case 'adddm':
                // kiểm tra xem người dùng có click vào nút add hay không
                $tenloai=$_POST
                include "danhmuc/add.php";
                break;
            case 'addsp':
                include "sanpham/add.php";
                break;
            case 'qldm':
                include "danhmuc/quanlyloaihang.php";
                break;
            
            default:
                include "home.php";
                break;
        }
    } else {
        include "home.php";
    }





    
    include "footer.php"

?>