<?php
    include "../model/pdo.php";
    include "../model/danhmuc.php";
    include "header.php";

    if(isset($_GET['act'])) {
        $act=$_GET['act'];
        switch ($act) {
            case 'adddm':
                // kiểm tra xem người dùng có click vào nút add hay không
                if(isset($_POST['themmoi'])&&($_POST['themmoi'])) {
                    $tenloai=$_POST['tenloai'];
                    insert_danhmuc($tenloai);
                    $thongbao="Thêm thành công";
                }
                include "danhmuc/add.php";
                break;
            case 'addsp':
                include "sanpham/add.php";
                break;
            case 'qldm':
                $sql="select * from danhmuc order by id desc";
                $listdanhmuc=pdo_query($sql);
                include "danhmuc/quanlyloaihang.php";
                break;
            case 'xoadm':
                if(isset($_GET['id'])&&($_GET['id']>0)) {
                    delete($_GET[''])
                }
                $sql="select * from danhmuc order by id desc";
                $listdanhmuc=pdo_query($sql);
                include "danhmuc/quanlyloaihang.php";
                break;
            
            case 'suadm':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $sql="select * from danhmuc where id=".$_GET['id'];
                    $dm=pdo_query_one($sql);
                }
                include "danhmuc/sualoaihang.php";
                break;

            case 'updatedm':
                if(isset($_POST['update'])&&($_POST['update'])) {
                    $tenloai=$_POST['tenloai'];
                    $id=$_POST['id'];
                    $sql="update danhmuc set name='".$tenloai."' where id=".$id;
                    pdo_execute($sql);
                    $thongbao="Update thành công";
                }
                $sql="select * from danhmuc order by id desc";
                $listdanhmuc=pdo_query($sql);
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