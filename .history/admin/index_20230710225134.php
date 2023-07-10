<?php
    include "../model/pdo.php";
    include "../model/danhmuc.php";
    include "../model/sanpham.php";
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
                        $iddm=$_POST['iddm'];
                        $tensp=$_POST['tensp'];
                        $giacu=$_POST['giacu'];
                        $giamoi=$_POST['giamoi'];
                        $mota=$_POST['mota'];
                        $filename=$_FILES['hinh']['name'];
                        $target_dir = "../upload/";
                        $target_file = $target_dir.basename($_FILES["hinh"]["name"]);
                        if(move_uploaded_file($_FILES["hinh"]["tmp_name"],$target_file)){

                        }else {
                        
                        }


                        $timetao = time();
                        $ngaytao = date('Y-m-d H:i:s',$timetao);
                        $timesua = time();
                        $ngaysua = date('Y-m-d H:i:s',$timesua);


                        insert_sanpham($tensp,$giacu,$giamoi,$filename,$mota,$ngaytao,$ngaysua,$iddm);
                        $thongbao="Thêm thành công";
                    }
                    $listdanhmuc=loadall_danhmuc();
                    include "../admin/sanpham/add.php";
                    break;
                
                case 'qlsp':
                    $sql="select * from sanpham order by id desc";
                    $listsanpham=loadall_sanpham();
                    include "sanpham/quanlyhanghoa.php";
                    break;
                case 'xoasp':
                    if(isset($_GET['id'])&&($_GET['id']>0)) {
                        delete($_GET['id']);
                    }
                    $listsanpham=loadall_sanpham();
                    include "sanpham/quanlyhanghoa.php";
                    break;
                
                case 'suasp':
                    if(isset($_GET['id'])&&($_GET['id']>0)){
                        $sql="select * from sanpham where id=".$_GET['id'];
                        $dm=loadone_danhmuc($_GET['id']);
                    }
                    include "sanpham/suahanghoa.php";
                    break;
    
                case 'updatesp':
                    if(isset($_POST['update'])&&($_POST['update'])) {
                        $tenloai=$_POST['tenloai'];
                        $id=$_POST['id'];
                        update_sanpham($id,$tenloai);
                        $thongbao="Update thành công";
                    }
                    $listsanpham=loadall_sanpham();
                    include "sanpham/quanlyhoanghoa.php";
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