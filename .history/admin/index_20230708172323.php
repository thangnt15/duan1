<?php
    include "../model/pdo.php";
    include "header.php";

    if(isset($_GET['act'])) {
        $act=$_GET['act'];
        switch ($act) {
            case 'adddm':
                // kiểm tra xem người dùng có click vào nút add hay không
                if(isset($_POST['themmoi'])&&($_POST['themmoi'])) {
                    $tenloai=$_POST['tenloai'];
                    $sql="insert into danhmuc(name) values('$tenloai')";
                    pdo_execute($sql);
                }
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