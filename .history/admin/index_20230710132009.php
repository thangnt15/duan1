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
                $listdanhmuc=loadall_danhmuc();
                include "danhmuc/quanlyloaihang.php";
                break;
            case 'xoadm':
                if(isset($_GET['id'])&&($_GET['id']>0)) {
                    delete($_GET['id']);
                }
                $listdanhmuc=loadall_danhmuc();
                include "danhmuc/quanlyloaihang.php";
                break;
            
            case 'suadm':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $sql="select * from danhmuc where id=".$_GET['id'];
                    $dm=loadone_danhmuc($_GET['id']);
                }
                include "danhmuc/sualoaihang.php";
                break;

            case 'updatedm':
                if(isset($_POST['update'])&&($_POST['update'])) {
                    $tenloai=$_POST['tenloai'];
                    $id=$_POST['id'];
                    update_danhmuc($id,$tenloai);
                    $thongbao="Update thành công";
                }
                $listdanhmuc=loadall_danhmuc();
                include "danhmuc/quanlyloaihang.php";
                break;


                // Sản phẩm

                case 'addsp':
                    // kiểm tra xem người dùng có click vào nút add hay không
                    if(isset($_POST['themmoi'])&&($_POST['themmoi'])) {
                        $tenloai=$_POST['tenloai'];
                        insert_danhmuc($tenloai);
                        $thongbao="Thêm thành công";
                    }
                    include "sanpham/add.php";
                    break;
                
                case 'qlsp':
                    $sql="select * from sanpham order by id desc";
                    $listdanhmuc=loadall_sanpham();
                    include "sanpham/quanlyhanghoa.php";
                    break;
                case 'xoasp':
                    if(isset($_GET['id'])&&($_GET['id']>0)) {
                        delete($_GET['id']);
                    }
                    $listdanhmuc=loadall_sanpham();
                    include "danhmuc/quanlyhanghoa.php";
                    break;
                
                case 'suasp':
                    if(isset($_GET['id'])&&($_GET['id']>0)){
                        $sql="select * from sanpham where id=".$_GET['id'];
                        $dm=loadone_danhmuc($_GET['id']);
                    }
                    include "sanpham/sualoaihang.php";
                    break;
    
                case 'updatesp':
                    if(isset($_POST['update'])&&($_POST['update'])) {
                        $tenloai=$_POST['tenloai'];
                        $id=$_POST['id'];
                        update_danhmuc($id,$tenloai);
                        $thongbao="Update thành công";
                    }
                    $listdanhmuc=loadall_danhmuc();
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